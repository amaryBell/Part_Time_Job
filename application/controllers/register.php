<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function reg()
	{
		$data = array(
			'PassWord' => $this->input->post('password'),
			'Email' => $this->input->post('email'),
			'UserName' => $this->input->post('username'),
			'Address' => $this->input->post('addr'),
			'Sex' => $this->input->post('addr'),
			'Telephone' => $this->input->post('addr'),
			'UserNumber' => $this->input->post('usernumber'),
			'ResumeID' => 0,
		);
		
		$this->load->model("user_model", "user");
		$info = $this->user->regsiter($data);
		$this->load->view('bootstrap/index.html', array('info' => $info));
		//var_dump($info);
	}
}
