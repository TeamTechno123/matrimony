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
    $member_otp = mt_rand(100000, 999999);

    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    $mat_member_user_id = $this->session->userdata('mat_member_user_id');
    if($mat_member_id==null && $member_is_login == null ){ $member_addedby = 0; }
    else{ $member_addedby =  $mat_member_user_id; }

    $save_user_data = array(
      'role_id' => 6,
      'user_name' => $this->input->post('member_name'),
      'user_mobile' => $this->input->post('member_mobile'),
      'user_password' => $this->input->post('member_password'),
      'user_status' => 'deactivate',
      'user_addedby' => 0,
    );
    $member_user_id = $this->User_Model->save_data('user', $save_user_data);

    $save_data = array(
      'company_id' => 0,
      'member_user_id' => $member_user_id,
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
      'member_otp' => $member_otp,
      'mamber_date' => $today,
      'onbehalf_id' => $this->input->post('onbehalf_id'),
      'marital_status' => $this->input->post('marital_status'),
      'cast_id' => $this->input->post('cast_id'),
      'member_addedby' => $member_addedby,
    );
    $this->User_Model->save_data('member', $save_data);
    // Send SMS...
    $password = $this->input->post('member_password');
    $mobile_no = $this->input->post('member_mobile');
    $message2 = "You are registered on bharatiyshadi.com username: ".$mobile_no." password: ".$password." OTP:".$member_otp."" ;
    $message = urlencode($message2);
    // $message = 'hello';
    $send_sms = $this->Member_Model->send_sms($mobile_no,$message);
    // echo $send_sms;
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    else{ header('location:'.base_url().'Member/profile'); }

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
        $otp = $login[0]['member_otp'];
        $is_otp_check = $login[0]['is_otp_check'];
        if($is_otp_check == 1){
          $this->session->set_userdata('mat_member_id', $login[0]['member_id']);
          $this->session->set_userdata('mat_member_user_id', $login[0]['member_user_id']);
          $this->session->set_userdata('member_is_login', 'member_login_success');
          header('location:'.base_url().'Member/active_members');
        } else{
          $this->session->set_userdata('otp_member_id', $login[0]['member_id']);
          header('location:'.base_url().'Member/check_otp');
        }


      // echo 'login';
    }
  }
/********************************* Check OTP ***************************************/
  public function check_otp(){
    $otp_member_id = $this->session->userdata('otp_member_id');
    if($otp_member_id==null){ header('location:'.base_url().'Website'); }
    $this->load->view('Website/check_otp');
  }

  public function verify_otp(){
    $otp_member_id = $this->session->userdata('otp_member_id');
    if($otp_member_id==null){ header('location:'.base_url().'Website'); }
    $member_otp = $this->input->post('member_otp');

    $verify_otp = $this->Member_Model->verify_otp($otp_member_id,$member_otp);
    if($verify_otp){
      $member_data['is_otp_check'] = '1';
      $this->User_Model->update_info('member_id', $otp_member_id, 'member', $member_data);
      $this->session->set_userdata('mat_member_id', $otp_member_id);
      header('location:'.base_url().'Member/active_members');
    } else{
      $this->session->set_flashdata('invalid_otp','invalid_otp');
      header('location:'.base_url().'Member/check_otp');
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
    $data['member_img'] = $member_info2[0]['member_img'];
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

    $data['member_image_list'] = $this->Member_Model->member_image_list($mat_member_id);

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
      // 'member_mobile' => $this->input->post('member_mobile'),
      // 'member_password' => $this->input->post('member_password'),
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

    $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $gender = $member_info[0]['member_gender'];

    $data['active_members_list'] = $this->Member_Model->active_members_list($gender,'active');

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
      $to_member_info = $this->User_Model->get_info_array('member_id', $data['to_member_id'], 'member');
      $from_member_info = $this->User_Model->get_info_array('member_id', $data['from_member_id'], 'member');
      $mobile_no = $to_member_info[0]['member_mobile'];
      $from_name = $from_member_info[0]['member_name'];
      $message2 = ''.$from_name.' sent you interest on bharatiyshadi.com';
      $message = urlencode($message2);
      $send_sms = $this->Member_Model->send_sms($mobile_no,$message);
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

    $to_member_info = $this->User_Model->get_info_array('member_id', $data['to_member_id'], 'member');
    $from_member_info = $this->User_Model->get_info_array('member_id', $data['from_member_id'], 'member');
    $mobile_no = $to_member_info[0]['member_mobile'];
    $from_name = $from_member_info[0]['member_name'];
    if($interest == 1){ $int = 'accepted'; }
    else{ $int = 'rejected'; }
    $message2 = ''.$from_name.' '.$int.' your interest request on bharatiyshadi.com';
    $message = urlencode($message2);
    $send_sms = $this->Member_Model->send_sms($mobile_no,$message);

    $this->Member_Model->accept_interest($from_member_id,$to_member_id,$interest);
  }

/************************************* Message ***********************************/
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

/***************************************** Advance Search **********************************/
  public function search_member_list(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $min_age = $this->input->post('min_age');
    $max_age = $this->input->post('max_age');
    $min_height = $this->input->post('min_height');
    $max_height = $this->input->post('max_height');
    $marital_status_id = $this->input->post('marital_status_id');
    $occupation_id = $this->input->post('occupation_id');
    $city_id = $this->input->post('city_id');
    $language_id = $this->input->post('language_id');
    $religion_id = $this->input->post('religion_id');
    $cast_id = $this->input->post('cast_id');

    $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $gender = $member_info[0]['member_gender'];

    $data['active_members_list'] = $this->Member_Model->search_member_list($gender,$min_age,$max_age,$min_height,$max_height,$marital_status_id,$occupation_id,$city_id,$language_id,$religion_id,$cast_id);

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

    // print_r($data['active_members_list']);
    $this->load->view('Website/active_members', $data);
  }

  /***************************** Profile Gallery ****************************************/

  public function profile_gallery(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $data['member_img'] = $member_info[0]['member_img'];
    $data['member_image_list'] = $this->Member_Model->member_image_list($mat_member_id);
    // print_r($data['member_image_list']);
    $this->load->view('Website/profile_gallery',$data);
  }

  public function update_profile_gallery(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    // $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    // $member_img = $member_info[0]['member_img'];
    $old_member_img = $this->input->post('old_member_img');

    if($_FILES['member_img']['name']){
      $time = time();
      $image_name = 'profile_'.$mat_member_id.'_'.$time;
      $config['upload_path'] = 'assets/images/profile/';
      $config['allowed_types'] = 'jpg|png';
      $config['file_name'] = $image_name;
      $filename = $_FILES['member_img']['name'];
      $this->upload->initialize($config);
      $ext = pathinfo($filename, PATHINFO_EXTENSION);
      if ($this->upload->do_upload('member_img')){
        // echo 'Profile Success';
        $up_member_img['member_img'] = $image_name.'.'.$ext;
        $this->User_Model->update_info('member_id', $mat_member_id, 'member', $up_member_img);
        if($old_member_img != 'default_profile.png'){
          unlink("assets/images/profile/".$old_member_img);
        }
      } else{
        $error = $this->upload->display_errors();
        // echo $error;
      }
    }

    if(isset($_FILES['member_image_name']['name'])){
      $files = $_FILES;
      $cpt = count($_FILES['member_image_name']['name']);
      for ($i=0; $i < $cpt; $i++) {
        $member_image_id = $_POST['member_image_id'][$i];
        $j = $i+1;
        $time = time();
        $image_name = 'member_image_'.$mat_member_id.'_'.$time;
        $_FILES['member_image_name']['name']= $files['member_image_name']['name'][$i];
        $_FILES['member_image_name']['type']= $files['member_image_name']['type'][$i];
        $_FILES['member_image_name']['tmp_name']= $files['member_image_name']['tmp_name'][$i];
        $_FILES['member_image_name']['error']= $files['member_image_name']['error'][$i];
        $_FILES['member_image_name']['size']= $files['member_image_name']['size'][$i];
        $config2['upload_path'] = 'assets/images/profile/';
        $config2['allowed_types'] = 'jpg|png';
        $config2['file_name'] = $image_name;
        $config2['overwrite']     = FALSE;
        $filename = $files['member_image_name']['name'][$i];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config2);
        if($this->upload->do_upload('member_image_name')){
          $file_data['member_id'] = $mat_member_id;
          $file_data['member_image_name'] = $image_name.'.'.$ext;
          if($member_image_id == ''){
            $this->User_Model->save_data('member_image', $file_data);
          } else{
            $this->User_Model->update_info('member_image_id', $member_image_id, 'member_image', $file_data);
          }
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
          // echo $error;
        }
      }
    }
    header('location:'.base_url().'Member/profile_gallery');
  }

/*************************************** Add Member/Lead ************************************/
  public function add_member(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    $mat_member_user_id = $this->session->userdata('mat_member_user_id');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

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

    $this->load->view('Website/add_member',$data);

  }
}
