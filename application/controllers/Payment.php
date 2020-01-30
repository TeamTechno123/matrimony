<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Member_Model');
  }

  public function payment(){
    $this->load->view('Website/payment');
  }

  public function make_payment(){
    
  }
}
?>
