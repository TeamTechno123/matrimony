<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class API extends CI_Controller{

  public function __construct(){
    header('Access-Control-Allow-Origin: *');
	  header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Member_Model');
    $this->load->model('API_Model');
  }

  // Sign Up / Register ...
  public function sign_up(){
    $today = date('d-m-Y');
    $member_otp = mt_rand(100000, 999999);
    $member_firstname = $_REQUEST['member_firstname'];
    $member_lastname = $_REQUEST['member_lastname'];
    $role_id = 6;
    $member_mobile = $_REQUEST['member_mobile'];
    $member_password = $_REQUEST['member_password'];
    $member_gender = $_REQUEST['member_gender'];
    $member_birth_date = $_REQUEST['member_birth_date'];
    $member_name = $member_firstname.' '.$member_lastname;

    $check = $this->User_Model->check_duplication('',$member_mobile,'member_mobile','member');
    if($check){
      $response["status"] = FALSE;
      $response["msg"] = "Mobile Number Exist";
    } else{
      $save_user_data = array(
        'role_id' => 6,
        'user_name' => $member_name,
        'user_mobile' => $member_mobile,
        'user_password' => $member_password,
        'user_status' => 'deactivate',
        'user_addedby' => 0,
      );
      $member_user_id = $this->User_Model->save_data('user', $save_user_data);
      $age =  date_diff(date_create($member_birth_date), date_create($today))->y;
      $save_data = array(
        'company_id' => 0,
        'member_user_id' => $member_user_id,
        'member_name' => $member_name,
        'member_gender' => $member_gender,
        'member_birth_date' => $member_birth_date,
        'member_age' => $age,
        'member_mobile' => $member_mobile,
        'member_password' => $member_password,
        'member_otp' => $member_otp,
        'mamber_date' => $today,
        'member_addedby' => 0,
      );
      $otp_member_id = $this->User_Model->save_data('member', $save_data);

      $message2 = "You are registered on \nbhartiyshadi.com \nusername: ".$member_mobile." \npassword: ".$member_password." \nOTP:".$member_otp."" ;
      $message = urlencode($message2);
      $send_sms = $this->Member_Model->send_sms($member_mobile,$message);

      $response["status"] = TRUE;
  		$response["msg"] = "Registered Successful";
      $response['otp'] = $member_otp;
      $response['member_id'] = $otp_member_id;
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Verify OTP...
  public function verify_otp(){
    $member_id = $_REQUEST['member_id'];
    $member_otp = $_REQUEST['otp'];

    $check_otp = $this->API_Model->verify_otp($member_id,$member_otp);
    if($check_otp == null){
      $response["status"] = FALSE;
			$response["msg"] = "Incorrect OTP";
    }
    else{
      $response["status"] = TRUE;
			$response["msg"] = "Correct OTP";
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Sign In / Login
  public function sign_in(){
    $member_mobile = $_REQUEST['mobile_no'];
    $member_password = $_REQUEST['password'];

    $login = $this->Member_Model->check_login($member_mobile, $member_password);
    if($login == null){
      $response["status"] = FALSE;
			$response["msg"] = "Invalid Mobile No or Password";
    } else{
      $response["status"] = TRUE;
			$response["msg"] = "Login Successful";
      $response["member_id"] = $login[0]['member_id'];
      $response["member_user_id"] = $login[0]['member_user_id'];
      $response["member_status"] = $login[0]['member_status'];
    }
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Change Password...
  public function change_password(){
    $member_id = $_REQUEST['member_id'];
    $new_password = $_REQUEST['new_password'];
    $update_password['member_password'] = $new_password;
    $this->User_Model->update_info('member_id', $member_id, 'member', $update_password);

    $update_user_password['user_password'] = $new_password;
    $member_info = $this->User_Model->get_info_array('member_id', $member_id, 'member');
    $user_id = $member_info[0]['member_user_id'];
    $this->User_Model->update_info('user_id', $user_id, 'user', $update_user_password);

    $response["status"] = TRUE;
    $response["msg"] = "Password Changed Successfully";
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

  // Profile...
  public function my_profile(){
    $member_id = $_REQUEST['member_id'];
    $member_info = $this->Member_Model->get_member_info($member_id);

    $response["status"] = TRUE;
    $response["active_members_profile"] = $member_info;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
  	echo str_replace('\\/','/',$json_response);
  }

  // Update Profile...
  public function update_profile(){

    $member_id = $_REQUEST['member_id'];
    $birthdate = $_REQUEST['member_birth_date'];
    $today = date('d-m-Y');
    $age =  date_diff(date_create($birthdate), date_create($today))->y;

    $update_data['member_name'] = $_REQUEST['member_name'];
    $update_data['member_gender'] = $_REQUEST['member_gender'];
    $update_data['member_birth_date'] = $birthdate;
    $update_data['member_age'] = $age;
    $update_data['language_id'] = $_REQUEST['language_id'];
    $update_data['member_email'] = $_REQUEST['member_email'];
    $update_data['member_mobile'] = $_REQUEST['member_mobile'];
    $update_data['show_email'] = $_REQUEST['show_email'];
    $update_data['show_mobile'] = $_REQUEST['show_mobile'];
    $update_data['marital_status'] = $_REQUEST['marital_status'];
    $update_data['marriage_type_id'] = $_REQUEST['marriage_type_id'];
    $update_data['onbehalf_id'] = $_REQUEST['onbehalf_id'];
    $update_data['member_address'] = $_REQUEST['member_address'];
    $update_data['country_id'] = $_REQUEST['country_id'];
    $update_data['state_id'] = $_REQUEST['state_id'];
    $update_data['district_id'] = $_REQUEST['district_id'];
    $update_data['tahasil_id'] = $_REQUEST['tahasil_id'];
    $update_data['city_id'] = $_REQUEST['city_id'];
    $update_data['member_area'] = $_REQUEST['member_area'];
    $update_data['religion_id'] = $_REQUEST['religion_id'];
    $update_data['cast_id'] = $_REQUEST['cast_id'];
    $update_data['sub_cast_id'] = $_REQUEST['sub_cast_id'];
    $update_data['complexion_id'] = $_REQUEST['complexion_id'];
    $update_data['blood_group_id'] = $_REQUEST['blood_group_id'];
    $update_data['body_type_id'] = $_REQUEST['body_type_id'];
    $update_data['diet_id'] = $_REQUEST['diet_id'];
    $update_data['education_id'] = $_REQUEST['education_id'];
    $update_data['family_status_id'] = $_REQUEST['family_status_id'];
    $update_data['family_type_id'] = $_REQUEST['family_type_id'];
    $update_data['family_value_id'] = $_REQUEST['family_value_id'];
    $update_data['gothram_id'] = $_REQUEST['gothram_id'];
    $update_data['height_id'] = $_REQUEST['height_id'];
    $update_data['income_id'] = $_REQUEST['income_id'];
    $update_data['moonsign_id'] = $_REQUEST['moonsign_id'];
    $update_data['occupation_id'] = $_REQUEST['occupation_id'];
    $update_data['occupation_details'] = $_REQUEST['occupation_details'];
    $update_data['resident_status_id'] = $_REQUEST['resident_status_id'];

    $this->User_Model->update_info('member_id', $member_id, 'member', $update_data);

    $response["status"] = TRUE;
    $response["msg"] = 'Information Updated Successfully';

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }



// Active Members list..
  public function active_members_list(){
    $member_gender = $_REQUEST['member_gender'];

    $active_members_list = $this->Member_Model->active_members_list($member_gender,'');
    $response["status"] = TRUE;
    $response["active_members_list"] = $active_members_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Active Members Profile..
  public function active_members_profile(){
    $member_id = $_REQUEST['active_member_id'];
    $member_info = $this->Member_Model->get_member_info($member_id);

    $response["status"] = TRUE;
    $response["active_members_profile"] = $member_info;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

/****************************       Interest      *****************************/

// Send Interest...
  public function send_interest(){
    $data['from_member_id'] = $_REQUEST['from_member_id'];
    $data['to_member_id'] = $_REQUEST['to_member_id'];

    $data['interest_date'] = date('d-m-Y');
    $data['interest_time'] = date('h:m:s A');

    $interest_id = $this->User_Model->save_data('interest', $data);
    if($interest_id){
      $to_member_info = $this->User_Model->get_info_array('member_id', $data['to_member_id'], 'member');
      $from_member_info = $this->User_Model->get_info_array('member_id', $data['from_member_id'], 'member');
      $mobile_no = $to_member_info[0]['member_mobile'];
      $from_name = $from_member_info[0]['member_name'];
      $message2 = "".$from_name." sent you interest on \nbhartiyshadi.com";
      $message = urlencode($message2);
      $send_sms = $this->Member_Model->send_sms($mobile_no,$message);

      $response["status"] = TRUE;
      $response["msg"] = 'Interest Sent Successfully';
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Interest Not Sent';
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

  // Sent Interest List...
  public function sent_interest_list(){
    $member_id = $_REQUEST['member_id'];
    $sent_interest_list = $this->Member_Model->get_interest_member_list($member_id,'');

    $response["status"] = TRUE;
    $response["sent_interest_list"] = $sent_interest_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

  // Received Interest List...
  public function received_interest_list(){
    $member_id = $_REQUEST['member_id'];
    $received_interest_list = $this->Member_Model->get_interest_member_list('',$member_id);

    $response["status"] = TRUE;
    $response["received_interest_list"] = $received_interest_list;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

  // Accept / Reject Interest...
  public function accept_regect_interest(){
    $from_member_id = $_REQUEST['from_member_id'];
    $to_member_id = $_REQUEST['to_member_id'];
    $interest = $_REQUEST['interest_status'];

    $to_member_info = $this->User_Model->get_info_array('member_id', $to_member_id, 'member');
    $from_member_info = $this->User_Model->get_info_array('member_id', $from_member_id, 'member');
    $mobile_no = $to_member_info[0]['member_mobile'];
    $from_name = $from_member_info[0]['member_name'];
    if($interest == 1){ $int = 'accepted'; }
    else{ $int = 'rejected'; }
    $message2 = "".$from_name." ".$int." your interest request on \nbhartiyshadi.com";
    $message = urlencode($message2);
    $send_sms = $this->Member_Model->send_sms($mobile_no,$message);

    $this->Member_Model->accept_interest($from_member_id,$to_member_id,$interest);

    $response["status"] = TRUE;
    $response["msg"] = $message2;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

/****************************       Message      *****************************/

// Send Message...
  public function send_message(){
    $data['from_member_id'] = $_REQUEST['from_member_id'];
    $data['to_member_id'] = $_REQUEST['to_member_id'];
    $data['message_text'] = $_REQUEST['message_text'];
    $data['message_date'] = date('d-m-Y');
    $data['message_time'] = date('h:m:s A');

    $message_id = $this->User_Model->save_data('message', $data);
    if($message_id){
      $response["status"] = TRUE;
      $response["msg"] = 'Message Sent Successfully';
    } else{
      $response["status"] = FALSE;
      $response["msg"] = 'Message Not Sent';
    }

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Message Members List...
  public function messages_member_list(){
    $member_id = $_REQUEST['member_id'];
    $messages_member_list = $this->Member_Model->masseges_member_list2($member_id);

    foreach ($messages_member_list as $list) {
      $msg_member_id = $list->msg_member_id;
      $member_info = $this->Member_Model->get_member_info($msg_member_id);
      foreach ($member_info as $member_info) {  }
      $data[] = $member_info;
    }

    $response["status"] = TRUE;
    $response["messages_member_list"] = $data;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Message Details List...
  public function message_details(){
    $from_member_id = $_REQUEST['member_id'];
    $to_member_id = $_REQUEST['to_member_id'];

    $message_details = $this->Member_Model->masseges_list($from_member_id,$to_member_id);

    $response["status"] = TRUE;
    $response["message_details"] = $message_details;
    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Search Member / Filter...
  public function filter_member(){
    $member_id = $_REQUEST['member_id'];
    $min_age = $_REQUEST['min_age'];
    $max_age = $_REQUEST['max_age'];
    $min_height = $_REQUEST['min_height'];
    $max_height = $_REQUEST['max_height'];
    $marital_status_id = $_REQUEST['marital_status_id'];
    $occupation_id = $_REQUEST['occupation_id'];
    $city_id = $_REQUEST['city_id'];
    $language_id = $_REQUEST['language_id'];
    $religion_id = $_REQUEST['religion_id'];
    $cast_id = $_REQUEST['cast_id'];
    $state_id = $_REQUEST['state_id'];
    $district_id = $_REQUEST['district_id'];
    $education_id = $_REQUEST['education_id'];
    $diet_id = $_REQUEST['diet_id'];
    $marriage_type_id = $_REQUEST['marriage_type_id'];

    $member_info = $this->User_Model->get_info_array('member_id', $member_id, 'member');
    $gender = $member_info[0]['member_gender'];

    $active_members_list = $this->Member_Model->search_member_list($gender,$min_age,$max_age,$min_height,$max_height,$marital_status_id,$occupation_id,$city_id,$language_id,$religion_id,$cast_id,$state_id,$district_id,$education_id,$diet_id,$marriage_type_id);

    $response["status"] = TRUE;
    $response["members_list"] = $active_members_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// Get Advertisement...
  public function get_advertisement(){
    $member_id = $_REQUEST['member_id'];
    $member_info = $this->User_Model->get_info_array('member_id', $member_id, 'member');
    $advertisement_data = $this->API_Model->get_advertisement();
    $response["status"] = TRUE;
    $response["advertisement_data"] = $advertisement_data;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

/**************************************************************************************************/
/*                                            Master Data                                         */
/**************************************************************************************************/


// Country list
  public function country_list(){
    $country_list = $this->User_Model->get_list1('country_id','ASC','country');
    $response["status"] = TRUE;
    $response["country_list"] = $country_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// State list
  public function state_list(){
    $state_list = $this->User_Model->get_list1('state_id','ASC','state');
    $response["status"] = TRUE;
    $response["state_list"] = $state_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

// District list
  public function district_list(){
    $district_list = $this->User_Model->get_list1('district_id','ASC','district');
    $response["status"] = TRUE;
    $response["district_list"] = $district_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }


  public function tahasil_list(){
    $tahasil_list = $this->User_Model->get_list1('tahasil_id','ASC','tahasil');
    $response["status"] = TRUE;
    $response["tahasil_list"] = $tahasil_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }


  public function city_list(){
    $city_list = $this->User_Model->get_list1('city_id','ASC','city');
    $response["status"] = TRUE;
    $response["city_list"] = $city_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }


  public function language_list(){
    $language_list = $this->User_Model->get_list1('language_id','ASC','language');
    $response["status"] = TRUE;
    $response["language_list"] = $language_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }


  public function onbehalf_list(){
    $onbehalf_list = $this->User_Model->get_list1('onbehalf_id','ASC','onbehalf');
    $response["status"] = TRUE;
    $response["onbehalf_list"] = $onbehalf_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }


  public function cast_list(){
    $cast_list = $this->User_Model->get_list1('cast_id','ASC','cast');
    $response["status"] = TRUE;
    $response["cast_list"] = $cast_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

  public function marital_status_list(){
    $marital_status_list = $this->User_Model->get_list1('marital_status_id','ASC','marital_status');
    $response["status"] = TRUE;
    $response["marital_status_list"] = $marital_status_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function sub_cast_list(){
    $sub_cast_list = $this->User_Model->get_list1('sub_cast_id','ASC','sub_cast');
    $response["status"] = TRUE;
    $response["sub_cast_list"] = $sub_cast_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function blood_group_list(){
    $blood_group_list = $this->User_Model->get_list1('blood_group_id','ASC','blood_group');
    $response["status"] = TRUE;
    $response["blood_group_list"] = $blood_group_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function body_type_list(){
    $body_type_list = $this->User_Model->get_list1('body_type_id','ASC','body_type');
    $response["status"] = TRUE;
    $response["body_type_list"] = $body_type_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function complexion_list(){
    $complexion_list = $this->User_Model->get_list1('complexion_id','ASC','complexion');
    $response["status"] = TRUE;
    $response["complexion_list"] = $complexion_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function diet_list(){
    $diet_list = $this->User_Model->get_list1('diet_id','ASC','diet');
    $response["status"] = TRUE;
    $response["diet_list"] = $diet_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function education_list(){
    $education_list = $this->User_Model->get_list1('education_id','ASC','education');
    $response["status"] = TRUE;
    $response["education_list"] = $education_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function family_status_list(){
    $family_status_list = $this->User_Model->get_list1('family_status_id','ASC','family_status');
    $response["status"] = TRUE;
    $response["family_status_list"] = $family_status_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function family_type_list(){
    $family_type_list = $this->User_Model->get_list1('family_type_id','ASC','family_type');
    $response["status"] = TRUE;
    $response["family_type_list"] = $family_type_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function family_value_list(){
    $family_value_list = $this->User_Model->get_list1('family_value_id','ASC','family_value');
    $response["status"] = TRUE;
    $response["family_value_list"] = $family_value_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function gothram_list(){
    $gothram_list = $this->User_Model->get_list1('gothram_id','ASC','gothram');
    $response["status"] = TRUE;
    $response["gothram_list"] = $gothram_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function height_list(){
    $height_list = $this->User_Model->get_list1('height_id','ASC','height');
    $response["status"] = TRUE;
    $response["height_list"] = $height_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function income_list(){
    $income_list = $this->User_Model->get_list1('income_id','ASC','income');
    $response["status"] = TRUE;
    $response["income_list"] = $income_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function moonsign_list(){
    $moonsign_list = $this->User_Model->get_list1('moonsign_id','ASC','moonsign');
    $response["status"] = TRUE;
    $response["moonsign_list"] = $moonsign_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function occupation_list(){
    $occupation_list = $this->User_Model->get_list1('occupation_id','ASC','occupation');
    $response["status"] = TRUE;
    $response["occupation_list"] = $occupation_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function resident_status_list(){
    $resident_status_list = $this->User_Model->get_list1('resident_status_id','ASC','resident_status');
    $response["status"] = TRUE;
    $response["resident_status_list"] = $resident_status_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

  public function marriage_type_list(){
    $marriage_type_list = $this->User_Model->get_list1('marriage_type_id','ASC','marriage_type');
    $response["status"] = TRUE;
    $response["marriage_type_list"] = $marriage_type_list;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    echo str_replace('\\/','/',$json_response);
  }

}

?>
