<?php
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		if($this->form_validation->run() === FALSE)
		{
			//Field validation failed.  User redirected to login page
			$this->load->view('login_view');
		}
		else
		{
			//Go to private area
			redirect('home', 'refresh');
		}
	}
	
	public function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');

		//query the database
		$result = $this->user_model->login($username, $password);

		if($result)
		{
			$sess_array = array();
			foreach($result as $row)
			{
				$sess_array = array(
					'id' => $row->id,
					'username' => $row->username
					);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return FALSE;
		}
	}
	
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('login', 'refresh');
	}
	
	public function register()
	{
		$this->load->helper('url');
		$this->load->helper('form');
		
		//This method will have the credentials validation
		$this->load->library('form_validation');

		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_username_taken');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('repassword', 'Repassword', 'trim|required|callback_check_retype');	

		if($this->form_validation->run() === FALSE)
		{
			//Field validation failed.  User redirected to register page
			$this->load->view('register_view');
		}
		else
		{
			// Add user to database
			$this->user_model->add_user();
			
			
			
			//Go to login
			redirect('login', 'refresh');
		}
	}

	public function check_username_taken()
	{
		$username = $this->input->post('username');
		
		if($this->user_model->username_exists($username) === TRUE)
		{
			$this->form_validation->set_message('check_username_taken', 'Username already taken');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	// Checks if the both typed passwords are the same.
	public function check_retype()
	{
		$password = $this->input->post('password');
		$repassword = $this->input->post('repassword');
		
		if($password === $repassword)
		{
			return TRUE;
		}
		else
		{
			$this->form_validation->set_message('check_retype', 'Passwords don\'t match');
			return FALSE;
		}
	}
}
