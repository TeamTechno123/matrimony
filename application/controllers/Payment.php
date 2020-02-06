<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment extends CI_Controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Member_Model');
  }

  public function adv_payment(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $adv_id = $this->input->post('adv_id');
    $this->session->set_userdata('adv_id',$adv_id);

    $this->load->view('Website/member_make_payment');
  }

  // Responce of Member Payment...
  public function adv_pay_responce(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $date = date('d-m-Y');

    error_reporting(0);
  	$workingKey='3FA55491155F7B12E48173D0CC0C130D';		//Working Key should be provided here.
  	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
  	$rcvdString = $this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
  	$order_status="";
  	$decryptValues=explode('&', $rcvdString);
  	$dataSize=sizeof($decryptValues);
  	echo "<center>";

  	for($i = 0; $i < $dataSize; $i++){
  		$information=explode('=',$decryptValues[$i]);
  		if($i==3)	$order_status=$information[1];
  	}

  	if($order_status==="Success"){
      $adv_id = $this->session->userdata('adv_id');
      $adv_info = $this->User_Model->get_info_array('adv_id', $adv_id, 'advertisement');
      $adv_amount = $adv_info['adv_amount'];
      $paid_gst = ($adv_amount * 18) / 118;
      $paid_gst = round($paid_gst,2);

      $paid_final_amt = $adv_amount - $paid_gst;
      $paid_final_amt = round($paid_final_amt,2);
      $adv_up_data = array(
        'is_paid' => 1,
        'paid_amt' => $adv_info['adv_amount'],
        'paid_gst' => $paid_gst,
        'paid_final_amt' => $paid_final_amt,
        'paid_date' => $date,
      );
      $this->User_Model->update_info('adv_id', $adv_id, 'advertisement', $adv_up_data);

      if($role_id == 4 || $role_id == 5){
        $adv_commossion = (70/100) * $paid_final_amt;
        $adv_tds_amt = (5/100) * $adv_commossion;
        $adv_final_amt = $adv_commossion - $adv_tds_amt;

        $adv_comm_data['adv_id'] = $adv_id;
        $adv_comm_data['adv_commission_to_user_id'] = $user_id;
        $adv_comm_data['adv_commission_amt'] = $adv_commossion;
        $adv_comm_data['adv_tds_amt'] = $adv_tds_amt;
        $adv_comm_data['adv_final_amt'] = $adv_final_amt;
        $adv_comm_data['adv_commission_date'] = $date;

        $this->User_Model->save_data('advertisement', $data);
      }

      $this->session->set_flashdata('adv_payment_success','adv_payment_success');

  		header('location:'.base_url().'User/advertise_information_list');
  	}
  	else if($order_status==="Aborted"){
  		echo "<br>Thank you for shopping with us. We will keep you posted regarding the status of your order through e-mail";
  	}
  	else if($order_status==="Failure"){
  		echo "<br>Thank you for shopping with us. However,the transaction has been declined.";
  	}
  	else{
  		echo "<br>Security Error. Illegal access detected";
  	}

  	echo "<br><br>";

  	echo "<table cellspacing=4 cellpadding=4>";
    // echo $decryptValues[0];
  	for($i = 0; $i < $dataSize; $i++)
  	{
  		$information=explode('=',$decryptValues[$i]);
  	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
  	}

  	echo "</table><br>";
  	echo "</center>";
  }

/***************************************** Member Payment **************************************/
  public function member_payment(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    $mat_member_status = $this->session->userdata('mat_member_status');

    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    if($mat_member_status != 'free'){ header('location:'.base_url().'Member/active_members'); }

    $page = 'Active Members';
    $today = date('d-m-Y');

    $adv_member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $country_id = $adv_member_info[0]['country_id'];
    $state_id = $adv_member_info[0]['state_id'];
    $district_id = $adv_member_info[0]['district_id'];

    if($country_id == '' || $state_id == '' || $district_id == ''){
      $this->session->set_flashdata('update_profile','update_profile');
      header('location:'.base_url().'Member/profile');
    }

    $advertisement = $this->Member_Model->get_advertisement($page,$today,'country',$country_id);
    if($advertisement){ $data['adv_image1'] = $advertisement[0]['adv_image']; }
    else{ $data['adv_image1'] = 'demo_adv.jpg'; }

    $advertisement2 = $this->Member_Model->get_advertisement($page,$today,'state',$state_id);
    if($advertisement2){ $data['adv_image2'] = $advertisement2[0]['adv_image']; }
    else{ $data['adv_image2'] = 'demo_adv.jpg'; }

    $advertisement3 = $this->Member_Model->get_advertisement($page,$today,'district',$district_id);
    if($advertisement3){ $data['adv_image3'] = $advertisement3[0]['adv_image']; }
    else{ $data['adv_image3'] = 'demo_adv.jpg'; }

    $this->load->view('Website/member_payment',$data);
  }

  public function member_make_payment(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $member_is_login = $this->session->userdata('member_is_login');
    $mat_member_status = $this->session->userdata('mat_member_status');

    if($mat_member_id==null && $member_is_login == null ){ header('location:'.base_url().'Website'); }
    if($mat_member_status != 'free'){ header('location:'.base_url().'Member/active_members'); }

    $this->load->view('Website/member_make_payment');
  }

  // Responce of Member Payment...
  public function member_pay_responce(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $mat_member_status = $this->session->userdata('mat_member_status');
    if($mat_member_status != 'free'){ header('location:'.base_url().'Member/active_members'); }

    error_reporting(0);
  	$workingKey='3FA55491155F7B12E48173D0CC0C130D';		//Working Key should be provided here.
  	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
  	$rcvdString = $this->decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
  	$order_status="";
  	$decryptValues=explode('&', $rcvdString);
  	$dataSize=sizeof($decryptValues);
  	echo "<center>";

  	for($i = 0; $i < $dataSize; $i++){
  		$information=explode('=',$decryptValues[$i]);
  		if($i==3)	$order_status=$information[1];
  	}

  	if($order_status==="Success"){
      $payment_data = array(
        'member_id' => $mat_member_id,
        'member_payment_date' => date('d-m-Y'),
        'member_payment_time' => date('h:i:s a'),
      );
      $this->User_Model->save_data('member_payment', $payment_data);
      $member_up_data['member_status'] = 'active';
      $this->User_Model->update_info('member_id', $mat_member_id, 'member', $member_up_data);
      $this->session->set_userdata('mat_member_status', 'active');

  		header('location:'.base_url().'Payment/commission');
  	}
  	else if($order_status==="Aborted"){
  		echo "<br>Thank you for shopping with us. We will keep you posted regarding the status of your order through e-mail";
  	}
  	else if($order_status==="Failure"){
  		echo "<br>Thank you for shopping with us. However,the transaction has been declined.";
  	}
  	else{
  		echo "<br>Security Error. Illegal access detected";
  	}

  	echo "<br><br>";

  	echo "<table cellspacing=4 cellpadding=4>";
    // echo $decryptValues[0];
  	for($i = 0; $i < $dataSize; $i++)
  	{
  		$information=explode('=',$decryptValues[$i]);
  	    	echo '<tr><td>'.$information[0].'</td><td>'.$information[1].'</td></tr>';
  	}

  	echo "</table><br>";
  	echo "</center>";
  }
  public function commission(){
    $mat_member_id = $this->session->userdata('mat_member_id');
    $mat_member_status = $this->session->userdata('mat_member_status');
    // if($mat_member_status != 'free'){ header('location:'.base_url().'Member/active_members'); }
    $date = date('d-m-Y');
    $member_info = $this->User_Model->get_info_array('member_id', $mat_member_id, 'member');
    $member_addedby = $member_info[0]['member_addedby'];

    if($member_addedby != 0){
      $user_info = $this->User_Model->get_info_array('user_id', $member_addedby, 'user');
      $roll_id = $user_info[0]['role_id'];
      $user_id = $member_addedby;

      // echo 'Added By : '.$member_addedby.'<br><br>';
      // echo 'Roll Id : '.$roll_id.'<br><br>';

      if($roll_id == 4 || $roll_id == 5){
        $franchise_info = $this->User_Model->get_info_array('user_id', $member_addedby, 'franchise');
        $franchise_type_id = $franchise_info[0]['franchise_type_id'];
        if($franchise_type_id == 1 || $franchise_type_id == 2 || $franchise_type_id == 3  || $franchise_type_id == 4 ){
          $data['commission_to_user_id'] = $member_addedby;
          $data['commission_from_member_id'] = $mat_member_id;
          $data['commission_to_user_role'] = $roll_id;
          $data['franchise_type_id'] = $franchise_type_id;
          $data['franchise_id'] = $franchise_info[0]['franchise_id'];
          $data['commission_amount'] = 900;
          $data['commission_date'] = $date;
          $tds_amount = (5/100) * 900;
          $final_commission_amount = 900 - $tds_amount;
          $data['tds_amount'] = $tds_amount;
          $data['final_commission_amount'] = $final_commission_amount;


          $this->User_Model->save_data('commission', $data);
          // echo 'franchise commission added, franchise_type_id : '.$franchise_type_id.'<br><br>';
        } elseif ($franchise_type_id == 5) {
          $data['commission_to_user_id'] = $member_addedby;
          $data['commission_from_member_id'] = $mat_member_id;
          $data['commission_to_user_role'] = $roll_id;
          $data['franchise_type_id'] = $franchise_type_id;
          $data['franchise_id'] = $franchise_info[0]['franchise_id'];
          $data['commission_amount'] = 700;
          $data['commission_date'] = $date;
          $tds_amount = (5/100) * 700;
          $final_commission_amount = 700 - $tds_amount;
          $data['tds_amount'] = $tds_amount;
          $data['final_commission_amount'] = $final_commission_amount;

          $this->User_Model->save_data('commission', $data);
          // echo 'franchise_type_id : '.$franchise_type_id.'<br><br>';
        }
        // If Added by District Level Fr...
        if($franchise_type_id == 2){
          $state_id = $franchise_info[0]['state_id'];
          $pay_franchise_info = $this->User_Model->pay_franchise_info('1','state_id',$state_id,'franchise');
          if($state_id && $pay_franchise_info){
            $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
            $data['commission_from_member_id'] = $mat_member_id;
            $data['commission_to_user_role'] = 4;
            $data['franchise_type_id'] = 1;
            $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
            $data['commission_amount'] = 100;
            $data['commission_date'] = $date;
            $tds_amount = (5/100) * 100;
            $final_commission_amount = 100 - $tds_amount;
            $data['tds_amount'] = $tds_amount;
            $data['final_commission_amount'] = $final_commission_amount;

            $this->User_Model->save_data('commission', $data);
            // echo 'State, franchise_type_id : '.$franchise_type_id.'<br><br>';
          }
        }

        // If Added by Tahsil Level Fr...
        if($franchise_type_id == 3){
          // State Level...
          $state_id = $franchise_info[0]['state_id'];
          $pay_franchise_info = $this->User_Model->pay_franchise_info('1','state_id',$state_id,'franchise');
          if($state_id && $pay_franchise_info){
            $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
            $data['commission_from_member_id'] = $mat_member_id;
            $data['commission_to_user_role'] = 4;
            $data['franchise_type_id'] = 1;
            $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
            $data['commission_amount'] = 100;
            $data['commission_date'] = $date;
            $tds_amount = (5/100) * 100;
            $final_commission_amount = 100 - $tds_amount;
            $data['tds_amount'] = $tds_amount;
            $data['final_commission_amount'] = $final_commission_amount;

            $this->User_Model->save_data('commission', $data);
            // echo 'State, franchise_type_id : '.$franchise_type_id.'<br><br>';
          }
          // District Level...
          $district_id = $franchise_info[0]['district_id'];
          $pay_franchise_info = $this->User_Model->pay_franchise_info('2','district_id',$district_id,'franchise');
          if($district_id && $pay_franchise_info){
            $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
            $data['commission_from_member_id'] = $mat_member_id;
            $data['commission_to_user_role'] = 4;
            $data['franchise_type_id'] = 2;
            $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
            $data['commission_amount'] = 100;
            $data['commission_date'] = $date;
            $tds_amount = (5/100) * 100;
            $final_commission_amount = 100 - $tds_amount;
            $data['tds_amount'] = $tds_amount;
            $data['final_commission_amount'] = $final_commission_amount;

            $this->User_Model->save_data('commission', $data);
            echo 'District, franchise_type_id : '.$franchise_type_id.'<br><br>';
          }

        }

        // If Added by BPL Level Fr...
        if($franchise_type_id == 4){
          // Tahsil Level...
          $tahasil_id = $franchise_info[0]['tahasil_id'];
          $pay_franchise_info = $this->User_Model->pay_franchise_info('3','tahasil_id',$tahasil_id,'franchise');
          if($tahasil_id && $pay_franchise_info){
            $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
            $data['commission_from_member_id'] = $mat_member_id;
            $data['commission_to_user_role'] = 4;
            $data['franchise_type_id'] = 3;
            $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
            $data['commission_amount'] = 100;
            $data['commission_date'] = $date;
            $tds_amount = (5/100) * 100;
            $final_commission_amount = 100 - $tds_amount;
            $data['tds_amount'] = $tds_amount;
            $data['final_commission_amount'] = $final_commission_amount;

            $this->User_Model->save_data('commission', $data);
            echo 'Tahsil, franchise_type_id : '.$franchise_type_id.'<br><br>';
          }
        }

        // If Added by Local Level Fr...
        if($franchise_type_id == 5){
          // State Level...
          $state_id = $franchise_info[0]['state_id'];
          $pay_franchise_info = $this->User_Model->pay_franchise_info('1','state_id',$state_id,'franchise');
          if($state_id && $pay_franchise_info){
            $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
            $data['commission_from_member_id'] = $mat_member_id;
            $data['commission_to_user_role'] = 4;
            $data['franchise_type_id'] = 1;
            $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
            $data['commission_amount'] = 100;
            $data['commission_date'] = $date;
            $tds_amount = (5/100) * 100;
            $final_commission_amount = 100 - $tds_amount;
            $data['tds_amount'] = $tds_amount;
            $data['final_commission_amount'] = $final_commission_amount;

            $this->User_Model->save_data('commission', $data);
            echo 'state, franchise_type_id : '.$franchise_type_id.'<br><br>';
          }
          // District Level...
          $district_id = $franchise_info[0]['district_id'];
          $pay_franchise_info = $this->User_Model->pay_franchise_info('2','district_id',$district_id,'franchise');
          if($district_id && $pay_franchise_info){
            $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
            $data['commission_from_member_id'] = $mat_member_id;
            $data['commission_to_user_role'] = 4;
            $data['franchise_type_id'] = 2;
            $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
            $data['commission_amount'] = 100;
            $data['commission_date'] = $date;
            $tds_amount = (5/100) * 100;
            $final_commission_amount = 100 - $tds_amount;
            $data['tds_amount'] = $tds_amount;
            $data['final_commission_amount'] = $final_commission_amount;

            $this->User_Model->save_data('commission', $data);
            echo 'district, franchise_type_id : '.$franchise_type_id.'<br><br>';
          }
          // Tahsil Level...
          $tahasil_id = $franchise_info[0]['tahasil_id'];
          $pay_franchise_info = $this->User_Model->pay_franchise_info('3','tahasil_id',$tahasil_id,'franchise');
          if($tahasil_id && $pay_franchise_info){
            $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
            $data['commission_from_member_id'] = $mat_member_id;
            $data['commission_to_user_role'] = 4;
            $data['franchise_type_id'] = 3;
            $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
            $data['commission_amount'] = 100;
            $data['commission_date'] = $date;
            $tds_amount = (5/100) * 100;
            $final_commission_amount = 100 - $tds_amount;
            $data['tds_amount'] = $tds_amount;
            $data['final_commission_amount'] = $final_commission_amount;

            $this->User_Model->save_data('commission', $data);
            echo 'tahsil franchise_type_id : '.$franchise_type_id.'<br><br>';
          }
        }
      }
      elseif ($roll_id == 6) { // If Added by User...
        $member_user_info = $this->User_Model->get_info_array('user_id', $member_addedby, 'user');
        $state_id = $member_info[0]['state_id'];
        $district_id = $member_info[0]['district_id'];
        $tahasil_id = $member_info[0]['tahasil_id'];

        // Commission To User...
        $data['commission_to_user_id'] = $member_addedby;
        $data['commission_from_member_id'] = $mat_member_id;
        $data['commission_to_user_role'] = $roll_id;
        $data['franchise_type_id'] = 0;
        $data['franchise_id'] = 0;
        $data['commission_amount'] = 500;
        $data['commission_date'] = $date;
        $tds_amount = (5/100) * 500;
        $final_commission_amount = 500 - $tds_amount;
        $data['tds_amount'] = $tds_amount;
        $data['final_commission_amount'] = $final_commission_amount;

        $this->User_Model->save_data('commission', $data);

        // Commission To State Level...
        $pay_franchise_info = $this->User_Model->pay_franchise_info('1','state_id',$state_id,'franchise');
        if($state_id && $pay_franchise_info){
          $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
          $data['commission_from_member_id'] = $mat_member_id;
          $data['commission_to_user_role'] = 4;
          $data['franchise_type_id'] = 1;
          $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
          $data['commission_amount'] = 100;
          $data['commission_date'] = $date;
          $tds_amount = (5/100) * 100;
          $final_commission_amount = 100 - $tds_amount;
          $data['tds_amount'] = $tds_amount;
          $data['final_commission_amount'] = $final_commission_amount;

          $this->User_Model->save_data('commission', $data);
        }

        // Commission To District Level...
        $pay_franchise_info = $this->User_Model->pay_franchise_info('2','district_id',$district_id,'franchise');
        if($district_id && $pay_franchise_info){
          $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
          $data['commission_from_member_id'] = $mat_member_id;
          $data['commission_to_user_role'] = 4;
          $data['franchise_type_id'] = 2;
          $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
          $data['commission_amount'] = 100;
          $data['commission_date'] = $date;
          $tds_amount = (5/100) * 100;
          $final_commission_amount = 100 - $tds_amount;
          $data['tds_amount'] = $tds_amount;
          $data['final_commission_amount'] = $final_commission_amount;

          $this->User_Model->save_data('commission', $data);
        }

        // Commission To Tahsil Level...
        $pay_franchise_info = $this->User_Model->pay_franchise_info('3','tahasil_id',$tahasil_id,'franchise');
        if($tahasil_id && $pay_franchise_info){
          $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
          $data['commission_from_member_id'] = $mat_member_id;
          $data['commission_to_user_role'] = 4;
          $data['franchise_type_id'] = 3;
          $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
          $data['commission_amount'] = 100;
          $data['commission_date'] = $date;
          $tds_amount = (5/100) * 100;
          $final_commission_amount = 100 - $tds_amount;
          $data['tds_amount'] = $tds_amount;
          $data['final_commission_amount'] = $final_commission_amount;

          $this->User_Model->save_data('commission', $data);
        }
      }
    } else{ // If User Registered Online...
      $state_id = $member_info[0]['state_id'];
      $district_id = $member_info[0]['district_id'];
      $tahasil_id = $member_info[0]['tahasil_id'];
      // Commission To State Level...
      $pay_franchise_info = $this->User_Model->pay_franchise_info('1','state_id',$state_id,'franchise');
      if($state_id && $pay_franchise_info){
        $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
        $data['commission_from_member_id'] = $mat_member_id;
        $data['commission_to_user_role'] = 4;
        $data['franchise_type_id'] = 1;
        $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
        $data['commission_amount'] = 100;
        $data['commission_date'] = $date;
        $tds_amount = (5/100) * 100;
        $final_commission_amount = 100 - $tds_amount;
        $data['tds_amount'] = $tds_amount;
        $data['final_commission_amount'] = $final_commission_amount;

        $this->User_Model->save_data('commission', $data);
      }

      // Commission To District Level...
      $pay_franchise_info = $this->User_Model->pay_franchise_info('2','district_id',$district_id,'franchise');
      if($district_id && $pay_franchise_info){
        $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
        $data['commission_from_member_id'] = $mat_member_id;
        $data['commission_to_user_role'] = 4;
        $data['franchise_type_id'] = 2;
        $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
        $data['commission_amount'] = 100;
        $data['commission_date'] = $date;
        $tds_amount = (5/100) * 100;
        $final_commission_amount = 100 - $tds_amount;
        $data['tds_amount'] = $tds_amount;
        $data['final_commission_amount'] = $final_commission_amount;

        $this->User_Model->save_data('commission', $data);
      }

      // Commission To Tahsil Level...
      $pay_franchise_info = $this->User_Model->pay_franchise_info('3','tahasil_id',$tahasil_id,'franchise');
      if($tahasil_id && $pay_franchise_info){
        $data['commission_to_user_id'] = $pay_franchise_info[0]['user_id'];
        $data['commission_from_member_id'] = $mat_member_id;
        $data['commission_to_user_role'] = 4;
        $data['franchise_type_id'] = 3;
        $data['franchise_id'] = $pay_franchise_info[0]['franchise_id'];
        $data['commission_amount'] = 100;
        $data['commission_date'] = $date;
        $tds_amount = (5/100) * 100;
        $final_commission_amount = 100 - $tds_amount;
        $data['tds_amount'] = $tds_amount;
        $data['final_commission_amount'] = $final_commission_amount;

        $this->User_Model->save_data('commission', $data);
      }
    }

    header('location:'.base_url().'Member/payment_success');
  }

/********************************** Crypto *******************************/
  // Encryption...
  function encrypt($plainText,$key){
  	$key = $this->hextobin(md5($key));
  	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
  	$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
  	$encryptedText = bin2hex($openMode);
  	return $encryptedText;
  }

  /*
  * @param1 : Encrypted String
  * @param2 : Working key provided by CCAvenue
  * @return : Plain String
  */
  // Decryption
  function decrypt($encryptedText,$key){
  	$key = $this->hextobin(md5($key));
  	$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
  	$encryptedText = $this->hextobin($encryptedText);
  	$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
  	return $decryptedText;
  }

  function hextobin($hexString){
  	$length = strlen($hexString);
  	$binString="";
  	$count=0;
  	while($count<$length)
  	{
  	    $subString =substr($hexString,$count,2);
  	    $packedString = pack("H*",$subString);
  	    if ($count==0)
  	    {
  			$binString=$packedString;
  	    }

  	    else
  	    {
  			$binString.=$packedString;
  	    }

  	    $count+=2;
  	}
          return $binString;
    }
}
?>
