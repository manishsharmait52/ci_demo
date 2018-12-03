<?php

Class Login_Database extends CI_Model {

	// Insert registration data in database
	public function registration_insert($data) {

		// Query to check whether username already exist or not
		$condition = "user_name =" . "'" . $data['user_name'] . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();
		if ($query->num_rows() == 0) {

			// Query to insert data in database
			$this->db->insert('user_login', $data);
			if ($this->db->affected_rows() > 0) {
				return true;
			}
		} else {
			return false;
		}
	}

	// Read data using username and password
	public function login($data) {

		$condition = "user_name =" . "'" . $data['username'] . "' AND " . "user_password =" . "'" . md5($data['password']) . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}

	// Read data from database to show data in admin page
	public function read_user_information($username) {
		$condition = "user_name =" . "'" . $username . "'";
		$this->db->select('*');
		$this->db->from('user_login');
		$this->db->where($condition);
		$this->db->limit(1);
		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}

	public function sendForgotLink(){ 		
 		$email=$this->input->get('email');
 		$this->db->select('*');
        $this->db->from('users');
        $this->db->where(array('email' => $email, 'status'=>1));
		$query = $this->db->get();
		
		if ( $query->num_rows() > 0 )
        {   
			$check_record = $query->result_array();
			$reset_code = getTokenKey();
			$this->admin_model->custom_update_record_with_key('users', array('reset_verifycode' => $reset_code,'modified'=>CURRENT_DATE_TIME, 'last_updated_by' => $this->uidVals), array('email' => $email,'login_user_id' => $login_user_id));
			$resetLink = BASE_URL.'#/reset-password/'. $reset_code;
			
			$content = array('0'=>$resetLink);
			$record = $query->result_array();
			$user_company_id = $record[0]['company_id'];
			$response = sendEmail($email, 'Reset Password', NULL, NULL,$from_email , NULL, $resetLink,$company_logo,$company_name);							
			
			if($response){
				$data['status'] = TRUE;
				$data['message'] = "Reset password link has been sent on your email id.";
			}else{
				$data['status'] = FALSE;
				$data['message'] = "Email address does not exist.";
			}
		}
        else {            
            $data['status'] = FALSE;
            $data['message'] = "Email address does not exist.";
        }
        return $data;
 	}

}

?>