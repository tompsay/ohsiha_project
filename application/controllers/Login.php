<?php
class Login extends CI_Controller {

 public function __construct()
 {
   parent::__construct();
 }

 public function index()
 {
	$this->load->helper('url');
	$this->load->helper('form');
	$this->load->view('login_view');
 }

}
