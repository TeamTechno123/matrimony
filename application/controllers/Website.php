<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
		$this->load->model('Member_Model');
  }

	public function index(){
		$data['country_list'] = $this->User_Model->get_list1('country_id','ASC','country');
		$data['state_list'] = $this->User_Model->get_list1('state_id','ASC','state');
		$data['district_list'] = $this->User_Model->get_list1('district_id','ASC','district');
		$data['tahasil_list'] = $this->User_Model->get_list1('tahasil_id','ASC','tahasil');
		$data['city_list'] = $this->User_Model->get_list1('city_id','ASC','city');
		$data['language_list'] = $this->User_Model->get_list1('language_id','ASC','language');
		$data['religion_list'] = $this->User_Model->get_list1('religion_id','ASC','religion');
		$data['onbehalf_list'] = $this->User_Model->get_list1('onbehalf_id','ASC','onbehalf');
		$data['cast_list'] = $this->User_Model->get_list1('cast_id','ASC','cast');
		$data['marital_status_list'] = $this->User_Model->get_list1('marital_status_id','ASC','marital_status');

	  $this->load->view('Website/index',$data);
	}




	public function pack()
	{
		$this->load->view('Website/pack');
	}
	public function policy()
	{
	  $this->load->view('Website/policy');
	}
	public function terms()
	{
	  $this->load->view('Website/terms');
	}


	public function contact()
	{

	  $this->load->view('Website/contact');
	}

	public function send_mail(){
			 $this->load->library('email');
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			// $subject = $this->input->post('subject');
			$mobile = $this->input->post('mobile');
			$message = $this->input->post('message');
			$message1 = $message.' mobile No.'.$mobile;
			$from_email = $email;
			$recipient = "demo@gmail.com";
			$subject = "Enquiry Mail";
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
			$headers .= 'From: '.$from_email."\r\n".
			'Reply-To: '.$from_email."\r\n" .
			'X-Mailer: PHP/' . phpversion();

				$send = mail($recipient, $subject, $message1, $headers);
				if($send){
					$this->session->set_flashdata('send_email','success');
				}
				else{
					$this->session->set_flashdata('send_email','error');
				}
				header('Location:'.base_url('Website/contact'));
				}
}
