<?php 
class Verifylogin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		echo "validcon";
		//$this->load->model('user_model');
	}

	public function index()
	{
		echo "validindex";
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
		$result = $this->user->login($username, $password);

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
			return false;
		}
	}
}