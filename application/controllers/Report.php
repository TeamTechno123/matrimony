<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Member_Model');
    $this->load->model('Report_Model');
  }

  public function franchise_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $franchise_type_id = $this->uri->segment(3);
    if($franchise_type_id > 5){ header('location:'.base_url().'Report/franchise_list'); }
    if($mat_role_id == 4){
      $data['franchise_list'] = $this->Report_Model->franchise_list($mat_user_id,'');
    } else{
      $data['franchise_list'] = $this->Report_Model->franchise_list('',$franchise_type_id);
    }

    if(!$data['franchise_list']){ header('location:'.base_url().'User/dashboard'); }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/franchise_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function member_list_by_user($fra_user_id){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['members_list'] = $this->User_Model->get_member_list_by_user('',$fra_user_id);
    if(!$data['members_list']){ header('location:'.base_url().'Report/franchise_list'); }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/members_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function franchise_member_commission_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    if($mat_role_id == 4){
      $data['franchise_list'] = $this->Report_Model->franchise_list($mat_user_id,'');
    } else{
      $data['franchise_list'] = $this->Report_Model->franchise_list('','');
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/franchise_member_commission_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function franchise_adv_commission_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    if($mat_role_id == 4){
      $data['franchise_list'] = $this->Report_Model->franchise_list($mat_user_id,'');
    } else{
      $data['franchise_list'] = $this->Report_Model->franchise_list('','');
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/franchise_adv_commission_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function advertise_payment_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['advertise_payment_list'] = $this->Report_Model->advertise_payment_list();

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/advertise_payment_list',$data);
    $this->load->view('Include/footer',$data);
  }

  /*********************************** Franchise Report ***************************************/

  public function member_commission_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['member_commission_list'] = $this->Report_Model->member_commission_list($mat_user_id);

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/member_commission_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function adv_commission_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['adv_commission_list'] = $this->Report_Model->adv_commission_list($mat_user_id);

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/adv_commission_list',$data);
    $this->load->view('Include/footer',$data);
  }


/************************************* Invoice **********************************/

  public function member_invoice_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['member_invoice_list'] = $this->Report_Model->member_invoice_list('');

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/member_invoice_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function member_invoice_print($member_id){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $company_info = $this->User_Model->get_info_array('company_id', $company_id, 'company');

    $data['company_name'] = $company_info[0]['company_name'];
    $data['company_address'] = $company_info[0]['company_address'];
    $data['company_city'] = $company_info[0]['company_city'];
    $data['company_state'] = $company_info[0]['company_state'];
    $data['company_statecode'] = $company_info[0]['company_statecode'];
    $data['company_district'] = $company_info[0]['company_district'];
    $data['company_pincode'] = $company_info[0]['company_pincode'];
    $data['company_mob1'] = $company_info[0]['company_mob1'];
    $data['company_mob2'] = $company_info[0]['company_mob2'];
    $data['company_email'] = $company_info[0]['company_email'];
    $data['company_website'] = $company_info[0]['company_website'];
    $data['company_pan_no'] = $company_info[0]['company_pan_no'];
    $data['company_gst_no'] = $company_info[0]['company_gst_no'];
    $data['company_lic1'] = $company_info[0]['company_lic1'];
    $data['company_lic2'] = $company_info[0]['company_lic2'];
    $data['company_start_date'] = $company_info[0]['company_start_date'];
    $data['company_end_date'] = $company_info[0]['company_end_date'];

    $data['member_invoice_info'] = $this->Report_Model->member_invoice_list($member_id);
    if(!$data['member_invoice_info']){ header('location:'.base_url().'Report/member_invoice_list'); }
    // print_r($data);

    $this->load->view('Report/member_invoice_print',$data);
  }

  public function adv_invoice_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['adv_invoice_list'] = $this->Report_Model->advertise_payment_list('');

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/adv_invoice_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function adv_invoice_print($adv_id){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $company_info = $this->User_Model->get_info_array('company_id', $company_id, 'company');

    $data['company_name'] = $company_info[0]['company_name'];
    $data['company_address'] = $company_info[0]['company_address'];
    $data['company_city'] = $company_info[0]['company_city'];
    $data['company_state'] = $company_info[0]['company_state'];
    $data['company_statecode'] = $company_info[0]['company_statecode'];
    $data['company_district'] = $company_info[0]['company_district'];
    $data['company_pincode'] = $company_info[0]['company_pincode'];
    $data['company_mob1'] = $company_info[0]['company_mob1'];
    $data['company_mob2'] = $company_info[0]['company_mob2'];
    $data['company_email'] = $company_info[0]['company_email'];
    $data['company_website'] = $company_info[0]['company_website'];
    $data['company_pan_no'] = $company_info[0]['company_pan_no'];
    $data['company_gst_no'] = $company_info[0]['company_gst_no'];
    $data['company_lic1'] = $company_info[0]['company_lic1'];
    $data['company_lic2'] = $company_info[0]['company_lic2'];
    $data['company_start_date'] = $company_info[0]['company_start_date'];
    $data['company_end_date'] = $company_info[0]['company_end_date'];

    $data['adv_invoice_info'] = $this->Report_Model->advertise_payment_list($adv_id);
    // $data['member_invoice_info'] = $this->Report_Model->member_invoice_list($member_id);
    if(!$data['adv_invoice_info']){ header('location:'.base_url().'Report/adv_invoice_list'); }
    // print_r($data);

    $this->load->view('Report/adv_invoice_print',$data);
  }

/************************************** Member List *************************************/
  public function member_list_report(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('state_id','State','trim|required');
    if($this->form_validation->run() != FALSE){
      $state_id = $this->input->post('state_id');
      $district_id = $this->input->post('district_id');
      $tahasil_id = $this->input->post('tahasil_id');
      $city_id = $this->input->post('city_id');
      $status = $this->input->post('status');
      $data['load_member_list'] = 'true';
      $data['member_list_report'] = $this->Report_Model->member_list_report($state_id,$district_id,$tahasil_id,$city_id,$status);

    }

    $data['state_list'] = $this->User_Model->get_list1('state_id','ASC','state');
		$data['district_list'] = $this->User_Model->get_list1('district_id','ASC','district');
		$data['tahasil_list'] = $this->User_Model->get_list1('tahasil_id','ASC','tahasil');
		$data['city_list'] = $this->User_Model->get_list1('city_id','ASC','city');

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Report/member_list_report',$data);
    $this->load->view('Include/footer',$data);

  }

}
