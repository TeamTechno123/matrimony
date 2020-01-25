<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Member_Model');
  }

  public function logout(){
    $this->session->unset_userdata('mat_member_id');
    $this->session->unset_userdata('member_is_login');
    // $this->session->sess_destroy();
    header('location:'.base_url().'Website');
  }

  public function save_member(){
    $today = date('d-m-Y');
    $save_data = array(
      'company_id' => 0,
      'member_name' => $this->input->post('member_name'),
      'member_address' => $this->input->post('member_address'),
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $this->input->post('district_id'),
      'tahasil_id' => $this->input->post('tahasil_id'),
      'city_id' => $this->input->post('city_id'),
      'member_area' => $this->input->post('member_area'),
      'member_gender' => $this->input->post('member_gender'),
      'member_birth_date' => $this->input->post('member_birth_date'),
      'language_id' => $this->input->post('language_id'),
      'religion_id' => $this->input->post('religion_id'),
      'member_email' => $this->input->post('member_email'),
      'member_mobile' => $this->input->post('member_mobile'),
      'member_password' => $this->input->post('member_password'),
      'mamber_date' => $today,
      'onbehalf_id' => $this->input->post('onbehalf_id'),
      'marital_status' => $this->input->post('marital_status'),
      'cast_id' => $this->input->post('cast_id'),
      'member_addedby' => 0,
    );
    $this->User_Model->save_data('member', $save_data);
  }

  public function check_login(){
    $mobile_no = $this->input->post('mobile_no');
    $password = $this->input->post('password');

    $login = $this->Member_Model->check_login($mobile_no, $password);
    if($login == null){
      $this->session->set_flashdata('msg','login_error');
      header('location:'.base_url().'Website');
    }
    else{
      foreach ($login as $login){
        $this->session->set_userdata('mat_member_id', $login['member_id']);
        $this->session->set_userdata('member_is_login', 'member_login_success');
      }
      header('location:'.base_url().'Member/active_members');
      echo 'login';
    }
  }

/**************************************** User Profile *****************************************/
  public function profile(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $data['member_info'] = $this->Member_Model->get_member_info($mat_member_id);

    $today = date('d-m-Y');
    $birthdate = $data['member_info'][0]['member_birth_date'];
    $age =  date_diff(date_create($birthdate), date_create($today))->y;
    $data['age'] = $age;

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

    $data['sub_cast_list'] = $this->User_Model->get_list1('sub_cast_id','ASC','sub_cast');
    $data['blood_group_list'] = $this->User_Model->get_list1('blood_group_id','ASC','blood_group');
    $data['body_type_list'] = $this->User_Model->get_list1('body_type_id','ASC','body_type');
    $data['complexion_list'] = $this->User_Model->get_list1('complexion_id','ASC','complexion');
    $data['diet_list'] = $this->User_Model->get_list1('diet_id','ASC','diet');
    $data['education_list'] = $this->User_Model->get_list1('education_id','ASC','education');
    $data['family_status_list'] = $this->User_Model->get_list1('family_status_id','ASC','family_status');
    $data['family_type_list'] = $this->User_Model->get_list1('family_type_id','ASC','family_type');
    $data['family_value_list'] = $this->User_Model->get_list1('family_value_id','ASC','family_value');
    $data['gothram_list'] = $this->User_Model->get_list1('gothram_id','ASC','gothram');
    $data['height_list'] = $this->User_Model->get_list1('height_id','ASC','height');
    $data['income_list'] = $this->User_Model->get_list1('income_id','ASC','income');
    $data['moonsign_list'] = $this->User_Model->get_list1('moonsign_id','ASC','moonsign');
    $data['occupation_list'] = $this->User_Model->get_list1('occupation_id','ASC','occupation');
    $data['resident_status_list'] = $this->User_Model->get_list1('resident_status_id','ASC','resident_status');

    $member_info2 = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    if(!$member_info2){ header('location:'.base_url().'Website'); }
    $data['update'] = 'update';
    $data['member_id'] = $member_info2[0]['member_id'];
    $data['member_name'] = $member_info2[0]['member_name'];
    $data['member_address'] = $member_info2[0]['member_address'];
    $data['country_id'] = $member_info2[0]['country_id'];
    $data['state_id'] = $member_info2[0]['state_id'];
    $data['district_id'] = $member_info2[0]['district_id'];
    $data['tahasil_id'] = $member_info2[0]['tahasil_id'];
    $data['city_id'] = $member_info2[0]['city_id'];
    $data['member_area'] = $member_info2[0]['member_area'];
    $data['member_gender'] = $member_info2[0]['member_gender'];
    $data['member_birth_date'] = $member_info2[0]['member_birth_date'];
    $data['language_id'] = $member_info2[0]['language_id'];
    $data['religion_id'] = $member_info2[0]['religion_id'];
    $data['member_email'] = $member_info2[0]['member_email'];
    $data['member_mobile'] = $member_info2[0]['member_mobile'];
    $data['member_password'] = $member_info2[0]['member_password'];
    $data['onbehalf_id'] = $member_info2[0]['onbehalf_id'];
    $data['marital_status'] = $member_info2[0]['marital_status'];
    $data['cast_id'] = $member_info2[0]['cast_id'];
    $data['sub_cast_id'] = $member_info2[0]['sub_cast_id'];
    $data['blood_group_id'] = $member_info2[0]['blood_group_id'];
    $data['body_type_id'] = $member_info2[0]['body_type_id'];
    $data['complexion_id'] = $member_info2[0]['complexion_id'];
    $data['diet_id'] = $member_info2[0]['diet_id'];
    $data['education_id'] = $member_info2[0]['education_id'];
    $data['family_status_id'] = $member_info2[0]['family_status_id'];
    $data['family_type_id'] = $member_info2[0]['family_type_id'];
    $data['family_value_id'] = $member_info2[0]['family_value_id'];
    $data['gothram_id'] = $member_info2[0]['gothram_id'];
    $data['height_id'] = $member_info2[0]['height_id'];
    $data['income_id'] = $member_info2[0]['income_id'];
    $data['moonsign_id'] = $member_info2[0]['moonsign_id'];
    $data['occupation_id'] = $member_info2[0]['occupation_id'];
    $data['resident_status_id'] = $member_info2[0]['resident_status_id'];

    $get_sent_interest = $this->Member_Model->get_interest($mat_member_id,'','interest_id');
    $sent_interest_cnt = 0;
    foreach ($get_sent_interest as $get_sent_interest) {
      $sent_interest_cnt++;
    }
    $get_received_interest = $this->Member_Model->get_interest('',$mat_member_id,'interest_id');
    $rec_interect_cnt = 0;
    foreach ($get_received_interest as $get_received_interest) {
      $rec_interect_cnt++;
    }
    $data['sent_interest_cnt'] = $sent_interest_cnt;
    $data['rec_interect_cnt'] = $rec_interect_cnt;

	  $this->load->view('Website/profile',$data);
	}

  public function update_profile(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    $update_data = array(
      'member_name' => $this->input->post('member_name'),
      'member_address' => $this->input->post('member_address'),
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $this->input->post('district_id'),
      'tahasil_id' => $this->input->post('tahasil_id'),
      'city_id' => $this->input->post('city_id'),
      'member_area' => $this->input->post('member_area'),
      'member_gender' => $this->input->post('member_gender'),
      'member_birth_date' => $this->input->post('member_birth_date'),
      'language_id' => $this->input->post('language_id'),
      'religion_id' => $this->input->post('religion_id'),
      'member_email' => $this->input->post('member_email'),
      'member_mobile' => $this->input->post('member_mobile'),
      'member_password' => $this->input->post('member_password'),
      'onbehalf_id' => $this->input->post('onbehalf_id'),
      'marital_status' => $this->input->post('marital_status'),
      'cast_id' => $this->input->post('cast_id'),
      'member_addedby' => 0,
    );
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }

  public function update_profile_basic(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    $update_data = array(
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $this->input->post('district_id'),
      'tahasil_id' => $this->input->post('tahasil_id'),
      'city_id' => $this->input->post('city_id'),
      'member_area' => $this->input->post('member_area'),
      'religion_id' => $this->input->post('religion_id'),
      'cast_id' => $this->input->post('cast_id'),
      'sub_cast_id' => $this->input->post('sub_cast_id'),
      'complexion_id' => $this->input->post('complexion_id'),
      'blood_group_id' => $this->input->post('blood_group_id'),
      'body_type_id' => $this->input->post('body_type_id'),
      'diet_id' => $this->input->post('diet_id'),
      'education_id' => $this->input->post('education_id'),
      'family_status_id' => $this->input->post('family_status_id'),
      'family_type_id' => $this->input->post('family_type_id'),
      'family_value_id' => $this->input->post('family_value_id'),
      'gothram_id' => $this->input->post('gothram_id'),
      'height_id' => $this->input->post('height_id'),
      'income_id' => $this->input->post('income_id'),
      'moonsign_id' => $this->input->post('moonsign_id'),
      'occupation_id' => $this->input->post('occupation_id'),
      'resident_status_id' => $this->input->post('resident_status_id'),
    );
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }

/************************************* Active Members *************************************/

  public function active_members(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $franchise_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $gender = $franchise_info[0]['member_gender'];

    $data['active_members_list'] = $this->Member_Model->active_members_list($gender,'active');

    // print_r($data['active_members_list']);
    $this->load->view('Website/active_members', $data);
  }

/*******************************************Active Full Profile ***********************************/
  public function active_full_profile($member_id){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $member_info = $this->Member_Model->get_member_info($member_id);
    if(!$member_info){
      header('location:'.base_url().'Member/active_members');
    }

    $get_interest = $this->Member_Model->get_interest($mat_member_id,$member_id,'*');
    if($get_interest){
      $data['interest_sent'] = 'sent';
      $data['interest_status'] = $get_interest[0]['interest_status'];
    }

    $get_shortlist = $this->Member_Model->get_shortlist($mat_member_id,$member_id,'*');
    if($get_shortlist){
      $data['shortlist_sent'] = 'sent';
    }

    // print_r($data['shortlist_sent']);

    $data['member_info'] = $member_info;
    $today = date('d-m-Y');
    $birthdate = $data['member_info'][0]['member_birth_date'];
    $age =  date_diff(date_create($birthdate), date_create($today))->y;
    $data['age'] = $age;

    $this->load->view('Website/active_full_profile',$data);
  }

  public function add_interest(){
    $data['from_member_id'] = $this->input->post('from_member_id');
    $data['to_member_id'] = $this->input->post('to_member_id');
    $data['interest_date'] = date('d-m-Y');
    $data['interest_time'] = date('h:m:s A');

    $interest_id = $this->User_Model->save_data('interest', $data);
    if($interest_id){
      echo 'success';
    } else{
      echo 'error';
    }
  }

  public function add_shortlist(){
    $data['from_member_id'] = $this->input->post('from_member_id');
    $data['to_member_id'] = $this->input->post('to_member_id');
    $data['shortlist_date'] = date('d-m-Y');
    $data['shortlist_time'] = date('h:m:s A');

    $shortlist_id = $this->User_Model->save_data('shortlist', $data);
    if($shortlist_id){
      echo 'success';
    } else{
      echo 'error';
    }
  }

  public function add_message(){
    $data['from_member_id'] = $this->input->post('from_member_id');
    $data['to_member_id'] = $this->input->post('to_member_id');
    $data['message_text'] = $this->input->post('message_text');
    $data['message_date'] = date('d-m-Y');
    $data['message_time'] = date('h:m:s A');

    $message_id = $this->User_Model->save_data('message', $data);
    if($message_id){
      echo 'success';
    } else{
      echo 'error';
    }
  }

  /************************************** Interest List *****************************/
  public function sent_interest_list(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $data['interest_list'] = $this->Member_Model->get_interest_member_list($mat_member_id,'');
    $data['sent_list'] = 'sent_list';
    $this->load->view('Website/interest_list',$data);
  }

  public function received_interest_list(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $data['interest_list'] = $this->Member_Model->get_interest_member_list('',$mat_member_id);
    $data['received_list'] = 'received_list';
    // print_r($data['interest_list']);
    $this->load->view('Website/interest_list',$data);
  }


  public function accept_interest(){
    $from_member_id = $this->input->post('from_member_id');
    $to_member_id = $this->input->post('to_member_id');
    $interest = $this->input->post('interest');

    $this->Member_Model->accept_interest($from_member_id,$to_member_id,$interest);
  }

  public function messages_list(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $data['messages_member_list'] = $this->Member_Model->masseges_member_list($mat_member_id);
    $this->load->view('Website/messages_list',$data);
  }

  public function messages($to_member_id){

    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    // $to_member_id = $this->input->post('to_member_id');
    $data['to_member_id'] = $to_member_id;
    $data['masseges_list'] = $this->Member_Model->masseges_list($mat_member_id,$to_member_id);
    if(!$data['masseges_list']){ header('location:'.base_url().'Member/messages_list'); }

    $this->load->view('Website/messages',$data);
  }

}
