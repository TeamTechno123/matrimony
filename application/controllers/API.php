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
    $member_id = $_REQUEST['member_id'];
    $member_info = $this->Member_Model->get_member_info($member_id);

    $response["status"] = TRUE;
    $response["active_members_profile"] = $member_info;

    $json_response = json_encode($response,JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
		echo str_replace('\\/','/',$json_response);
  }

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




}

?>
