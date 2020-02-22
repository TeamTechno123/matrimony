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


  public function register_member(){
    $today = date('d-m-Y');
    $member_otp = mt_rand(100000, 999999);
    $member_firstname = $this->input->post('member_name');
    $member_lastname = $this->input->post('member_lastname');
    $member_name = $member_firstname.' '.$member_lastname;

    $save_user_data = array(
      'role_id' => 6,
      'user_name' => $member_name,
      'user_mobile' => $this->input->post('member_mobile'),
      'user_password' => $this->input->post('member_password'),
      'user_status' => 'deactivate',
      'user_addedby' => 0,
    );
    $member_user_id = $this->User_Model->save_data('user', $save_user_data);
    $birthdate = $this->input->post('member_birth_date');
    $age =  date_diff(date_create($birthdate), date_create($today))->y;
    $save_data = array(
      'company_id' => 0,
      'member_user_id' => $member_user_id,
      'member_name' => $member_name,
      'member_gender' => $this->input->post('member_gender'),
      'member_birth_date' => $this->input->post('member_birth_date'),
      'member_age' => $age,
      'member_mobile' => $this->input->post('member_mobile'),
      'member_password' => $this->input->post('member_password'),
      'member_otp' => $member_otp,
      'mamber_date' => $today,
      'member_addedby' => 0,
    );
    $otp_member_id = $this->User_Model->save_data('member', $save_data);

    // Send SMS...
    $password = $this->input->post('member_password');
    $mobile_no = $this->input->post('member_mobile');

    $message2 = "You are registered on \nbhartiyashadi.com \nusername: ".$mobile_no." \npassword: ".$password." \nOTP:".$member_otp."" ;
    $message = urlencode($message2);
    $send_sms = $this->Member_Model->send_sms($mobile_no,$message);

    $this->session->set_flashdata('reg_success','success');

    $this->session->set_userdata('otp_member_id', $otp_member_id);
    $this->session->set_userdata('mat_member_status', 'free');
    header('location:'.base_url().'Member/check_otp');
    // if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    // else{ header('location:'.base_url().'Member/profile'); }
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
        $member_id = $login[0]['member_id'];
        $this->session->set_userdata('mat_member_id', $login[0]['member_id']);
        $this->session->set_userdata('mat_member_user_id', $login[0]['member_user_id']);
        $this->session->set_userdata('mat_member_status', $login[0]['member_status']);
        $this->session->set_userdata('member_is_login', 'member_login_success');
        $member_status = $login[0]['member_status'];

        if($member_status == 'free' ){
          header('location:'.base_url().'Payment/member_payment');
        } else{
          header('location:'.base_url().'Member/active_members');
        }
      } else{
        $this->session->set_userdata('otp_member_id', $login[0]['member_id']);
        $this->session->set_userdata('mat_member_status', $login[0]['member_status']);
        header('location:'.base_url().'Member/check_otp');
      }
    }
  }
/*************************** Complete Profile ***********************/
  public function complete_profile(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    $data['country_list'] = $this->User_Model->get_list1('country_id','ASC','country');
    $data['state_list'] = $this->User_Model->get_list1('state_id','ASC','state');
    $data['district_list'] = $this->User_Model->get_list1('district_id','ASC','district');
    $data['tahasil_list'] = $this->User_Model->get_list1('tahasil_id','ASC','tahasil');
    $data['religion_list'] = $this->User_Model->get_list1('religion_id','ASC','religion');
    $data['cast_list'] = $this->User_Model->get_list1('cast_id','ASC','cast');
    $data['marital_status_list'] = $this->User_Model->get_list1('marital_status_id','ASC','marital_status');
    $data['education_list'] = $this->User_Model->get_list1('education_id','ASC','education');
    $data['occupation_list'] = $this->User_Model->get_list1('occupation_id','ASC','occupation');
    $data['marriage_type_list'] = $this->User_Model->get_list1('marriage_type_id','ASC','marriage_type');
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
    $data['show_email'] = $member_info2[0]['show_email'];
    $data['show_mobile'] = $member_info2[0]['show_mobile'];
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
    $data['occupation_details'] = $member_info2[0]['occupation_details'];
    $data['resident_status_id'] = $member_info2[0]['resident_status_id'];
    $data['marriage_type_id'] = $member_info2[0]['marriage_type_id'];
    // $data['member_id'] = $mat_member_id;
    // print_r($data['member_info']);
    $this->load->view('Website/complete_profile', $data);
  }

  public function update_complete_profile(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $cast_id = $this->input->post('cast_id');
    if($cast_id == '-1'){
      $save_cast_data['cast_name'] = $this->input->post('other_cast_name');
      $save_cast_data['religion_id'] = $this->input->post('religion_id');
      $cast_id = $this->User_Model->save_data('cast', $save_cast_data);
    }

    $district_id = $this->input->post('district_id');
    if($district_id == '-1'){
      $save_district_data['district_name'] = $this->input->post('other_district_name');
      $save_district_data['country_id'] = $this->input->post('country_id');
      $save_district_data['state_id'] = $this->input->post('state_id');
      $district_id = $this->User_Model->save_data('district', $save_district_data);
    }

    $tahasil_id = $this->input->post('tahasil_id');
    if($tahasil_id == '-1'){
      $save_tahasil_data['tahasil_name'] = $this->input->post('other_tahasil_name');
      $save_tahasil_data['country_id'] = $this->input->post('country_id');
      $save_tahasil_data['state_id'] = $this->input->post('state_id');
      $save_tahasil_data['district_id'] = $district_id;
      $tahasil_id = $this->User_Model->save_data('tahasil', $save_tahasil_data);
    }

    $education_id = $this->input->post('education_id');
    if($education_id == '-1'){
      $save_education_data['education_name'] = $this->input->post('other_education_name');
      $education_id = $this->User_Model->save_data('education', $save_education_data);
    }


    $update_data['cast_id'] = $cast_id;
    $update_data['district_id'] = $district_id;
    $update_data['tahasil_id'] = $tahasil_id;
    $update_data['education_id'] = $education_id;
    $update_data['country_id'] = $this->input->post('country_id');
    $update_data['state_id'] = $this->input->post('state_id');
    $update_data['religion_id'] = $this->input->post('religion_id');
    $update_data['occupation_id'] = $this->input->post('occupation_id');
    $update_data['occupation_details'] = $this->input->post('occupation_details');
    $update_data['marital_status'] = $this->input->post('marital_status');
    $update_data['marriage_type_id'] = $this->input->post('marriage_type_id');

    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/upload_photo');


  }

  public function upload_photo(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $data['member_img'] = $member_info[0]['member_img'];
    $data['member_image_list'] = $this->Member_Model->member_image_list($mat_member_id);
    $this->load->view('Website/upload_photo', $data);
  }
/*************************** Forgot Password ***********************/
  // Check Mobile No. Send OTP...
  public function check_mobile(){
    $member_mobile = $this->input->post('member_mobile');
    $check = $this->Member_Model->check_mobile($member_mobile);
    if($check){
      $member_otp = mt_rand(100000, 999999);
      $update_data['member_otp'] = $member_otp;
      $this->User_Model->update_info('member_mobile', $member_mobile, 'member', $update_data);
      $mobile_no = $check[0]['member_mobile'];
      $message2 = "bhartiyashadi.com \nOTP:".$member_otp."" ;
      $message = urlencode($message2);
      $send_sms = $this->Member_Model->send_sms($mobile_no,$message);
      // $this->session->set_flashdata('otp_sent','otp_sent');
      echo 'success';
    } else{
      echo 'invalid';
      // $this->session->set_flashdata('invalid_mobile','invalid_mobile');
      // header('location:'.base_url().'Website');
    }
  }

  // Check Verify OTP...
  public function verify_otp_password(){
    $member_mobile = $this->input->post('member_mobile');
    $member_otp = $this->input->post('member_otp');
    $check = $this->Member_Model->verify_otp_password($member_mobile,$member_otp);
    if($check){
      echo 'success';
    } else{
      echo 'invalid';
    }
  }

  // Change Password...
  public function change_password(){
    $member_mobile = $this->input->post('member_mobile');
    $member_data['member_password'] = $this->input->post('member_password');
    $this->User_Model->update_info('member_mobile', $member_mobile, 'member', $member_data);
  }


/********************************* Check OTP ***************************************/
  public function check_otp(){
    $otp_member_id = $this->session->userdata('otp_member_id');
    if($otp_member_id==null){ header('location:'.base_url().'Website'); }
    $this->load->view('Website/check_otp');
  }

  public function verify_otp(){
    $otp_member_id = $this->session->userdata('otp_member_id');
    $member_status = $this->session->userdata('mat_member_status');
    if($otp_member_id==null){ header('location:'.base_url().'Website'); }
    $member_otp = $this->input->post('member_otp');

    $member_info = $this->User_Model->get_info_array('member_id', $otp_member_id, 'member');

    $verify_otp = $this->Member_Model->verify_otp($otp_member_id,$member_otp);
    if($verify_otp){
      $member_data['is_otp_check'] = '1';
      $this->User_Model->update_info('member_id', $otp_member_id, 'member', $member_data);
      $this->session->set_userdata('mat_member_id', $otp_member_id);

      if($member_status == 'free'){
        header('location:'.base_url().'Payment/member_payment');
      } else{
        header('location:'.base_url().'Member/active_members');
      }
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
    $data['marriage_type_list'] = $this->User_Model->get_list1('marriage_type_id','ASC','marriage_type');


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
    $data['show_email'] = $member_info2[0]['show_email'];
    $data['show_mobile'] = $member_info2[0]['show_mobile'];
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
    $data['education_details'] = $member_info2[0]['education_details'];
    $data['family_status_id'] = $member_info2[0]['family_status_id'];
    $data['family_type_id'] = $member_info2[0]['family_type_id'];
    $data['family_value_id'] = $member_info2[0]['family_value_id'];
    $data['gothram_id'] = $member_info2[0]['gothram_id'];
    $data['height_id'] = $member_info2[0]['height_id'];
    $data['income_id'] = $member_info2[0]['income_id'];
    $data['moonsign_id'] = $member_info2[0]['moonsign_id'];
    $data['occupation_id'] = $member_info2[0]['occupation_id'];
    $data['occupation_details'] = $member_info2[0]['occupation_details'];
    $data['occ_company_name'] = $member_info2[0]['occ_company_name'];
    $data['occ_company_addr'] = $member_info2[0]['occ_company_addr'];
    $data['occ_company_con_no'] = $member_info2[0]['occ_company_con_no'];
    $data['resident_status_id'] = $member_info2[0]['resident_status_id'];
    $data['marriage_type_id'] = $member_info2[0]['marriage_type_id'];
    $data['member_smoker'] = $member_info2[0]['member_smoker'];
    $data['member_drink'] = $member_info2[0]['member_drink'];
    $data['member_mangalik'] = $member_info2[0]['member_mangalik'];

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

    $page = 'My Profile';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

	  $this->load->view('Website/profile',$data);
	}

/***************************** Update Profile *******************************/
  public function update_personal_info(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    $birthdate = $this->input->post('member_birth_date');
    $today = date('d-m-Y');
    $age =  date_diff(date_create($birthdate), date_create($today))->y;

    $cast_id = $this->input->post('cast_id');
    if($cast_id == '-1'){
      $save_cast_data['cast_name'] = $this->input->post('other_cast_name');
      $save_cast_data['religion_id'] = $this->input->post('religion_id');
      $cast_id = $this->User_Model->save_data('cast', $save_cast_data);
    }
    $sub_cast_id = $this->input->post('sub_cast_id');
    if($sub_cast_id == '-1'){
      $save_subcast_data['sub_cast_name'] = $this->input->post('other_subcast_name');
      $save_subcast_data['cast_id'] = $cast_id;
      $save_subcast_data['religion_id'] = $this->input->post('religion_id');
      $sub_cast_id = $this->User_Model->save_data('sub_cast', $save_subcast_data);
    }

    $update_data = $_POST;
    $update_data['member_age'] = $age;
    $update_data['cast_id'] = $cast_id;
    $update_data['sub_cast_id'] = $sub_cast_id;
    unset($update_data['other_cast_name']);
    unset($update_data['other_subcast_name']);

    $this->session->set_flashdata('update_success','success');
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }

  // Update Address Information...
  public function update_address_info(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $district_id = $this->input->post('district_id');
    if($district_id == '-1'){
      $save_district_data['district_name'] = $this->input->post('other_district_name');
      $save_district_data['country_id'] = $this->input->post('country_id');
      $save_district_data['state_id'] = $this->input->post('state_id');
      $district_id = $this->User_Model->save_data('district', $save_district_data);
    }

    $tahasil_id = $this->input->post('tahasil_id');
    if($tahasil_id == '-1'){
      $save_tahasil_data['tahasil_name'] = $this->input->post('other_tahasil_name');
      $save_tahasil_data['country_id'] = $this->input->post('country_id');
      $save_tahasil_data['state_id'] = $this->input->post('state_id');
      $save_tahasil_data['district_id'] = $district_id;
      $tahasil_id = $this->User_Model->save_data('tahasil', $save_tahasil_data);
    }

    $city_id = $this->input->post('city_id');
    if($city_id == '-1'){
      $save_city_data['city_name'] = $this->input->post('other_city_name');
      $save_city_data['country_id'] = $this->input->post('country_id');
      $save_city_data['state_id'] = $this->input->post('state_id');
      $save_city_data['district_id'] = $district_id;
      $save_city_data['tahasil_id'] = $tahasil_id;
      $city_id = $this->User_Model->save_data('city', $save_city_data);
    }

    $update_data = $_POST;
    $update_data['district_id'] = $district_id;
    $update_data['tahasil_id'] = $tahasil_id;
    $update_data['city_id'] = $city_id;
    unset($update_data['other_district_name']);
    unset($update_data['other_tahasil_name']);
    unset($update_data['other_city_name']);

    $this->session->set_flashdata('update_success','success');
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }

  // Update Education Information...
  public function update_education_info(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $education_id = $this->input->post('education_id');
    if($education_id == '-1'){
      $save_education_data['education_name'] = $this->input->post('other_education_name');
      $education_id = $this->User_Model->save_data('education', $save_education_data);
    }

    $update_data = $_POST;
    $update_data['education_id'] = $education_id;
    unset($update_data['other_education_name']);

    $this->session->set_flashdata('update_success','success');
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }

  // Update Career Information ...
  public function update_career_info(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $update_data = $_POST;
    $this->session->set_flashdata('update_success','success');
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }

  // Update Family Details...
  public function update_family_details(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $update_data = $_POST;
    $this->session->set_flashdata('update_success','success');
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }

  // Update Social Information...
  public function update_social_info(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $update_data = $_POST;
    $this->session->set_flashdata('update_success','success');
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
    header('location:'.base_url().'Member/profile');
  }


  // public function update_profile(){
  //   $mat_member_id = $this->session->userdata('mat_member_id');
  //   $member_is_login = $this->session->userdata('member_is_login');
  //   if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
  //   $birthdate = $this->input->post('member_birth_date');
  //   $today = date('d-m-Y');
  //   $age =  date_diff(date_create($birthdate), date_create($today))->y;
  //   $update_data = array(
  //     'member_name' => $this->input->post('member_name'),
  //     'member_gender' => $this->input->post('member_gender'),
  //     'member_birth_date' => $this->input->post('member_birth_date'),
  //     'member_age' => $age,
  //     'language_id' => $this->input->post('language_id'),
  //     'member_email' => $this->input->post('member_email'),
  //     'member_mobile' => $this->input->post('member_mobile'),
  //     'show_email' => $this->input->post('show_email'),
  //     'show_mobile' => $this->input->post('show_mobile'),
  //     'onbehalf_id' => $this->input->post('onbehalf_id'),
  //     'marital_status' => $this->input->post('marital_status'),
  //     'marriage_type_id' => $this->input->post('marriage_type_id'),
  //     // 'member_addedby' => 0,
  //   );
  //   $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_data);
  //   header('location:'.base_url().'Member/profile');
  // }

  // Change Member Password...
  public function change_member_password(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    $mat_member_user_id = $this->session->userdata('mat_member_user_id');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $new_password = $this->input->post('new_password');
    $update_password['member_password'] = $new_password;
    $this->User_Model->update_info('member_id', $mat_member_id, 'member', $update_password);

    $update_user_password['user_password'] = $new_password;
    $this->User_Model->update_info('user_id', $mat_member_user_id, 'user', $update_user_password);

    header('location:'.base_url().'Member/profile');
  }

/************************************* Active Members *************************************/

  public function active_members(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $gender = $member_info[0]['member_gender'];

    $data['active_members_list'] = $this->Member_Model->active_members_list($gender,'free');

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
    $data['marriage_type_list'] = $this->User_Model->get_list1('marriage_type_id','ASC','marriage_type');

    $page = 'Active Members';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

    // print_r($advertisement);
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
    $data['member_img'] = $member_info[0]['member_img'];

    $get_interest = $this->Member_Model->get_interest($mat_member_id,$member_id,'*');
    if($get_interest){
      $data['interest_sent'] = 'sent';
      $data['interest_status'] = $get_interest[0]['interest_status'];
    }

    $get_shortlist = $this->Member_Model->get_shortlist($mat_member_id,$member_id,'*');
    if($get_shortlist){
      $data['shortlist_sent'] = 'sent';
    }

    $data['member_info'] = $member_info;
    $today = date('d-m-Y');
    $birthdate = $data['member_info'][0]['member_birth_date'];
    $age =  date_diff(date_create($birthdate), date_create($today))->y;
    $data['age'] = $age;

    $data['member_image_list'] = $this->Member_Model->member_image_list($member_id);

    $page = 'User Profile';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');

    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

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
      $message2 = "".$from_name." sent you interest on \nbhartiyashadi.com";
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

    $page = 'Interest List';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

    $this->load->view('Website/interest_list',$data);
  }

  public function received_interest_list(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $data['interest_list'] = $this->Member_Model->get_interest_member_list('',$mat_member_id);
    $data['received_list'] = 'received_list';

    $page = 'Interest List';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }
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
    $message2 = "".$from_name." ".$int." your interest request on \nbhartiyashadi.com";
    $message = urlencode($message2);
    $send_sms = $this->Member_Model->send_sms($mobile_no,$message);

    $this->Member_Model->accept_interest($from_member_id,$to_member_id,$interest);
  }

/************************************* Message ***********************************/
  public function messages_list(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    // $data['messages_member_list'] = $this->Member_Model->masseges_member_list($mat_member_id);
    $data['messages_member_list'] = $this->Member_Model->masseges_member_list2($mat_member_id);

    $page = 'Message List';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

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

    $page = 'Message Details';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

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

    $state_id = $this->input->post('state_id');
    $district_id = $this->input->post('district_id');
    $education_id = $this->input->post('education_id');
    $diet_id = $this->input->post('diet_id');
    $marriage_type_id = $this->input->post('marriage_type_id');

    $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $gender = $member_info[0]['member_gender'];

    $data['active_members_list'] = $this->Member_Model->search_member_list($gender,$min_age,$max_age,$min_height,$max_height,$marital_status_id,$occupation_id,$city_id,$language_id,$religion_id,$cast_id,$state_id,$district_id,$education_id,$diet_id,$marriage_type_id);

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
    $data['marriage_type_list'] = $this->User_Model->get_list1('marriage_type_id','ASC','marriage_type');

    $page = 'Active Members';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

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
    $page = 'Photo Gallery';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

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
        $up_member_img['member_img'] = $image_name.'.'.$ext;
        $this->User_Model->update_info('member_id', $mat_member_id, 'member', $up_member_img);
        if($old_member_img != 'default_profile.png'){
          unlink("assets/images/profile/".$old_member_img);
        }
      } else{
        $error = $this->upload->display_errors();
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
          $this->session->set_flashdata('upload_error',$this->upload->display_errors());
        }
      }
    }
    $page = $this->input->post('upload_page');
    if($page == 'upload_photo_page'){ header('location:'.base_url().'Member/active_members'); }
    else{ header('location:'.base_url().'Member/profile_gallery'); }

  }

/*************************************** Add Member/Lead ************************************/
  public function lead_list(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    $mat_member_user_id = $this->session->userdata('mat_member_user_id');
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }

    $data['lead_list'] = $this->User_Model->get_member_list_by_user('',$mat_member_user_id);
    // print_r($data['lead_list']);
    $data['tot_mem_commission'] = $this->User_Model->tot_commission('commission_amount',$mat_member_user_id);
    $data['tot_mem_tds'] = $this->User_Model->tot_commission('tds_amount',$mat_member_user_id);
    $data['tot_mem_amt'] = $this->User_Model->tot_commission('final_commission_amount',$mat_member_user_id);

    $page = 'Add Lead';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

    $this->load->view('Website/lead_list',$data);
  }
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

    $page = 'Add Lead';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv1.png'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv2.png'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv3.png'; }

    $this->load->view('Website/add_member',$data);
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

    // Save Member...
    $cast_id = $this->input->post('cast_id');
    if($cast_id == '-1'){
      $save_cast_data['cast_name'] = $this->input->post('other_cast_name');
      $save_cast_data['religion_id'] = $this->input->post('religion_id');
      $cast_id = $this->User_Model->save_data('cast', $save_cast_data);
    }

    $district_id = $this->input->post('district_id');
    if($district_id == '-1'){
      $save_district_data['district_name'] = $this->input->post('other_district_name');
      $save_district_data['country_id'] = $this->input->post('country_id');
      $save_district_data['state_id'] = $this->input->post('state_id');
      $district_id = $this->User_Model->save_data('district', $save_district_data);
    }

    $tahasil_id = $this->input->post('tahasil_id');
    if($tahasil_id == '-1'){
      $save_tahasil_data['tahasil_name'] = $this->input->post('other_tahasil_name');
      $save_tahasil_data['country_id'] = $this->input->post('country_id');
      $save_tahasil_data['state_id'] = $this->input->post('state_id');
      $save_tahasil_data['district_id'] = $district_id;
      $tahasil_id = $this->User_Model->save_data('tahasil', $save_tahasil_data);
    }

    $city_id = $this->input->post('city_id');
    if($city_id == '-1'){
      $save_city_data['city_name'] = $this->input->post('other_city_name');
      $save_city_data['country_id'] = $this->input->post('country_id');
      $save_city_data['state_id'] = $this->input->post('state_id');
      $save_city_data['district_id'] = $district_id;
      $save_city_data['tahasil_id'] = $tahasil_id;
      $city_id = $this->User_Model->save_data('city', $save_city_data);
    }

    $birthdate = $this->input->post('member_birth_date');
    $age =  date_diff(date_create($birthdate), date_create($today))->y;
    $save_data = array(
      'company_id' => 0,
      'member_user_id' => $member_user_id,
      'member_name' => $this->input->post('member_name'),
      'member_address' => $this->input->post('member_address'),
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $district_id,
      'tahasil_id' => $tahasil_id,
      'city_id' => $city_id,
      'member_area' => $this->input->post('member_area'),
      'member_gender' => $this->input->post('member_gender'),
      'member_birth_date' => $this->input->post('member_birth_date'),
      'member_age' => $age,
      'language_id' => $this->input->post('language_id'),
      'religion_id' => $this->input->post('religion_id'),
      'member_email' => $this->input->post('member_email'),
      'member_mobile' => $this->input->post('member_mobile'),
      'member_password' => $this->input->post('member_password'),
      'member_otp' => $member_otp,
      'mamber_date' => $today,
      'onbehalf_id' => $this->input->post('onbehalf_id'),
      'marital_status' => $this->input->post('marital_status'),
      'cast_id' => $cast_id,
      'member_addedby' => $member_addedby,
    );
    $this->User_Model->save_data('member', $save_data);
    // Send SMS...
    $password = $this->input->post('member_password');
    $mobile_no = $this->input->post('member_mobile');
    $message2 = "You are registered on \nbhartiyshadi.com \nusername: ".$mobile_no." \npassword: ".$password." \nOTP: ".$member_otp."" ;
    $message = urlencode($message2);
    // $message = 'hello';
    $send_sms = $this->Member_Model->send_sms($mobile_no,$message);
    // echo $send_sms;
    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    else{ header('location:'.base_url().'Member/lead_list'); }
  }

  public function payment_success(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    $mat_member_user_id = $this->session->userdata('mat_member_user_id');
    $mat_member_status = $this->session->userdata('mat_member_status');
    if($mat_member_status == 'free'){ header('location:'.base_url().'Member/active_members'); }
    $this->load->view('Website/payment_success');
  }

}
