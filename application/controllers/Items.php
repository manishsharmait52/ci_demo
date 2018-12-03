<?php

//session_start(); //we need to start session in order to access it through CI

Class Items extends CI_Controller {

	public function __construct() {
		parent::__construct();
		check_login();
		// Load form helper library
		$this->load->helper('form');
		// Load database
		$this->load->model('Items_model');
	}

	// Show login page
	public function index() {
		echo "data";
		//$this->load->view('users/login_form');
	}

	// Logout from admin page
	public function get_items() {
		$this->Items_model->get_items_list();
	}
	
	public function add_item(){
		$this->load->view('items/add_item.php');
	}
 
	public function insert(){
		$item['title'] = $this->input->post('title');
		$item['description'] = $this->input->post('description');
		$item['size'] = implode(",",$this->input->post('size'));
		$item['type'] = $this->input->post('type');
		$item['date'] = $this->input->post('date');
		$item['file_name'] = '';
		$item['preference'] = $this->input->post('preference');
		//print_r($_FILES);
		if(isset($_FILES['itemfile'])){

			$uploadPath = './assets/uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $newName = rand().$_FILES['itemfile']['name'];
            $config['file_name'] = $newName;
            
            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            /*var_dump($this->upload->do_upload('itemfile'));
            $error = array('error' => $this->upload->display_errors()); 
            print_r($error);
            exit;*/
            // Upload file to server
            if($this->upload->do_upload('itemfile')){
                // Uploaded file data
                $fileData = $this->upload->data();
                $item['file_name'] = $newName;
            }
		}

		$query = $this->Items_model->insertitem($item);
 
		if($query){
			header('location:'.base_url().'userauthentication/user_login_process');
		}
 
	}
 
	public function edit_item($id){
		$data['item'] = $this->Items_model->getItem($id);
		$this->load->view('items/edit_item', $data);
	}
 
	public function update($id){
		$item['title'] = $this->input->post('title');
		$item['description'] = $this->input->post('description');
		$item['size'] = implode(",",$this->input->post('size'));
		$item['type'] = $this->input->post('type');
		$item['date'] = $this->input->post('date');
		//$item['file_name'] = '';
		$item['preference'] = $this->input->post('preference');

		if(isset($_FILES['itemfile'])){

			$old_file = $this->input->post('itemfile_old');
			unlink('./assets/uploads/'.$old_file);
			
			$uploadPath = './assets/uploads/';
            $config['upload_path'] = $uploadPath;
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $newName = rand().$_FILES['itemfile']['name'];
            $config['file_name'] = $newName;
            

            // Load and initialize upload library
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            
            /*var_dump($this->upload->do_upload('itemfile'));
            $error = array('error' => $this->upload->display_errors()); 
            print_r($error);
            exit;*/
            // Upload file to server
            if($this->upload->do_upload('itemfile')){
                // Uploaded file data
                $fileData = $this->upload->data();
                $item['file_name'] = $newName;
            }
		}
 
		$query = $this->Items_model->updateitem($item, $id);
 
		if($query){
			header('location:'.base_url().'userauthentication/user_login_process');
		}
	}
 
	public function delete($id){
		$query = $this->Items_model->deleteitem($id);
 
		if($query){
			header('location:'.base_url().$this->index());
		}
	}


}

?>