<?php

//session_start(); //we need to start session in order to access it through CI

Class Userauthentication extends CI_Controller {

	public function __construct() {
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');
		// Load database
		$this->load->model('login_database');
	}

	// Show login page
	public function index() {
		$this->load->view('users/login_form');
	}

	// Show registration page
	public function user_registration_show() {
		$this->load->view('users/registration_form');
	}

	// Validate and store registration data in database
	public function new_user_registration() {

		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('username', 'username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('email_value', 'email', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'trim|required|xss_clean');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('users/registration_form');
		} else {
			$data = array(
			'user_name' => $this->input->post('username'),
			'user_email' => $this->input->post('email_value'),
			'user_password' => md5($this->input->post('password'))
			);
			/*Send email*/

			//$to_user = NULL, $to_subject = NULL, $to_message = NULL, $attachment = NULL, $from = NULL, $newFileName = NULL, $forgot_link = NULL
			
			/*sendEmail('Email.com','Test','test email',Null,'demo@ci.com');
			exit;*/

			$result = $this->login_database->registration_insert($data);
			if ($result == TRUE) {
				$data['message_display'] = 'Registration Successfully !';
				$this->load->view('users/login_form', $data);
			} else {
				$data['message_display'] = 'Username already exist!';
				$this->load->view('users/registration_form', $data);
			}
		}
	}

	// Check for user login process
	public function user_login_process() {

		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			if(isset($this->session->userdata['logged_in'])){
				$this->load->view('admin/admin_page');
			}else{
				$this->load->view('users/login_form');
			}
		} else {

			$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
			);

			$result = $this->login_database->login($data);
			if ($result == TRUE) {
				$username = $this->input->post('username');
				$result = $this->login_database->read_user_information($username);
				if ($result != false) {
					$session_data = array(
					'username' => $result[0]->user_name,
					'email' => $result[0]->user_email,
					);
					// Add user data in session
					$this->session->set_userdata('logged_in', $session_data);
					$this->load->view('admin/admin_page');
				}
			} else {
				$data = array(
				'error_message' => 'Invalid Username or Password'
				);
				$this->load->view('users/login_form', $data);
			}
		}
	}

	// Logout from admin page
	public function logout() {

		// Removing session data
		$sess_array = array('username' => '');
		$this->session->unset_userdata('logged_in', $sess_array);
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('users/login_form', $data);
	}

	public function sendForgotLink() {
		$print_demo = $this->login_database->sendForgotLink();
		echo $print_demo;
	}

	/*Function:
   	* Name: resetPassword()
   	* Parameters: We will pass here reset token & new password in hidden
   	* Response: - return TRUE OR FALSE after validate token
   	* Description: This function is used for reset password feature, if token valid & exist then we will send update the new password
   	*/	
	public function resetPassword(){
		$token = $this->input->get('resetcode');
		
		$userDetails = $this->admin_model->selectRecords('users', array('reset_verifycode' => $token),array('user_id','company_id','fname','lname','company_code'));
		$user = $userDetails[0];
		
		$current_user_full_name = $user['fname'] . " " . $user['lname'];
		$log_message = '<b>' . $current_user_full_name.' ('.$user['company_code'].')'. '</b> has reset password.';
		$log_data = array(
					'user_id' => $user['user_id'],
					'log_message' => $log_message,
					'module' => '37',
					'module_name'=>'User Management',
					'company_id'=>$user['company_id'],
					'created' => CURRENT_DATE_TIME,
					'modified' => CURRENT_DATE_TIME,
					'edit_record_id'=>''
		);
		add_system_log($log_data);
		$result = $this->Auth_model->resetPassword();
		
        echo json_encode($result);	

	}

	

}

?>