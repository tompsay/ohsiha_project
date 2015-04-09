<?php
Class User_model extends CI_Model
{
	public function __construct()
    {
		$this->load->database();
    }

	public function login($username, $password)
	{
		/*
		$this->db->select('id, username, pwd');
		$this->db->from('users');
		$this->db->where('username', $username);
		$this->db->where('pwd', $password);
		$this->db->limit(1);
	 
		$query = $this->db->get();
		*/
		$query = $this->db->get_where('users', array('username' => $username, 'pwd' => $password), 1);
	 
		if($query->num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return FALSE;
		}
	}
	
	public function username_exists($username)
	{
		$query = $this->db->get_where('users', array('username' => $username));
		
		var_dump($query);
		var_dump($query->num_rows);
		
		if($query->num_rows == 0)
		{
			return FALSE;
		}
		else
		{	
			return TRUE;
		}		
	}
	
	public function add_user()
	{
		$data = array(
				'username' => $this->input->post('username'),
				'pwd' => $this->input->post('password')
			);
	
		$this->db->insert('users', $data);
	}
}
