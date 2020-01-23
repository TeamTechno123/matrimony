<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct(){
  parent::__construct();
  $this->load->model('User_Model');
}

  public function index(){
    $this->form_validation->set_rules('mobile', 'Mobile No.', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required');
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('User/login');
    }
    else{
      $mobile = $this->input->post('mobile');
      $password = $this->input->post('password');

      $login = $this->User_Model->check_login($mobile, $password);
      if($login == null){
        $this->session->set_flashdata('msg','login_error');
        header('location:'.base_url().'User');
      }
      else{
        foreach ($login as $login){
          $this->session->set_userdata('user_id', $login['user_id']);
          $this->session->set_userdata('company_id', $login['company_id']);
          $this->session->set_userdata('role_id', $login['role_id']);
        }
        header('location:'.base_url().'User/dashboard');
      }
    }
  }

  public function logout(){
    $this->session->unset_userdata('user_id');
    $this->session->unset_userdata('company_id');
    $this->session->unset_userdata('role_id');
    // $this->session->sess_destroy();
    header('location:'.base_url().'User');
  }

  public function dashboard(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['all_member_cnt'] = $this->User_Model->get_count('member_id',$company_id,'','','member_status','active','member');
    $data['member_cnt'] = $this->User_Model->get_count('member_id',$company_id,'member_addedby',$mat_user_id,'member_status','active','member');
    $data['dealer_cnt'] = $this->User_Model->get_count('franchise_id',$company_id,'franchise_addedby',$mat_user_id,'franchise_status','active','franchise');
    $data['adv_cnt'] = $this->User_Model->get_count('adv_id',$company_id,'adv_addedby',$mat_user_id,'adv_status','active','advertisement');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/dashboard',$data);
    $this->load->view('Include/footer',$data);
  }

  public function company_information(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/company_information');
    $this->load->view('Include/footer');
 }
 public function company_information_list(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $data['company_list'] = $this->User_Model->get_list($company_id,'company_id','ASC','company');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/company_information_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function edit_company($company_id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
      $company_info = $this->User_Model->get_info('company_id', $company_id, 'company');
      if($company_info){
        foreach($company_info as $info){
          $data['update'] = 'update';
          $data['company_id'] = $info->company_id;
          $data['company_name'] = $info->company_name;
          $data['company_address'] = $info->company_address;
          $data['company_city'] = $info->company_city;
          $data['company_state'] = $info->company_state;
          $data['company_district'] = $info->company_district;
          $data['company_pincode'] = $info->company_pincode;
          $data['company_mob1'] = $info->company_mob1;
          $data['company_mob2'] = $info->company_mob2;
          $data['company_email'] = $info->company_email;
          $data['company_website'] = $info->company_website;
          $data['company_pan_no'] = $info->company_pan_no;
          $data['company_gst_no'] = $info->company_gst_no;
          $data['company_lic1'] = $info->company_lic1;
          $data['company_lic2'] = $info->company_lic2;
          $data['company_start_date'] = $info->company_start_date;
          $data['company_end_date'] = $info->company_end_date;
        }
        $this->load->view('Include/head',$data);
        $this->load->view('Include/navbar',$data);
        $this->load->view('User/company_information',$data);
        $this->load->view('Include/footer',$data);
      }
    }

  // Update Company...
  public function update_company(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

      $company_id = $this->input->post('company_id');
      $data = array(
        'company_name' => $this->input->post('company_name'),
        'company_address' => $this->input->post('company_address'),
        'company_city' => $this->input->post('company_city'),
        'company_state' => $this->input->post('company_state'),
        'company_district' => $this->input->post('company_district'),
        'company_pincode' => $this->input->post('company_pincode'),
        'company_mob1' => $this->input->post('company_mob1'),
        'company_mob2' => $this->input->post('company_mob2'),
        'company_email' => $this->input->post('company_email'),
        'company_website' => $this->input->post('company_website'),
        'company_pan_no' => $this->input->post('company_pan_no'),
        'company_gst_no' => $this->input->post('company_gst_no'),
        'company_lic1' => $this->input->post('company_lic1'),
        'company_lic2' => $this->input->post('company_lic2'),
        'company_start_date' => $this->input->post('company_start_date'),
        'company_end_date' => $this->input->post('company_end_date'),
      );
      $this->User_Model->update_info('company_id', $company_id, 'company', $data);
      header('location:'.base_url().'User/company_information_list');

  }

// public function user_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/user_information');
//       $this->load->view('Include/footer');
// }
// public function user_information_list(){
//   $this->load->view('Include/head');
//   $this->load->view('Include/navbar');
//  $this->load->view('User/user_information_list');
//  $this->load->view('Include/footer');
// }

public function blood_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/blood_information');
      $this->load->view('Include/footer');
    }
}

public function blood_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['blood_group_list'] = $this->User_Model->get_list($company_id,'blood_group_id','ASC','blood_group');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/blood_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save Capacity...
public function save_blood_group(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'blood_group_name' => $this->input->post('blood_group_name'),
    );

    $this->User_Model->save_data('blood_group', $data);
    header('location:blood_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit Capacity...
public function edit_blood_group($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('blood_group_id', $id, 'blood_group');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['blood_group_id'] = $info->blood_group_id;
        $data['blood_group_name'] = $info->blood_group_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/blood_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update Capacity... DB...
public function update_blood_group(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $blood_group_id = $this->input->post('blood_group_id');
    $data = array(
      'blood_group_name' => $this->input->post('blood_group_name'),
    );
    $this->User_Model->update_info('blood_group_id', $blood_group_id, 'blood_group', $data);
    header('location:blood_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete Capacity
public function delete_blood_group($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('blood_group_id', $id, 'blood_group');
    header('location:../blood_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}



public function country(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/country_information');
      $this->load->view('Include/footer');
    }
}

public function body_type_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/body_type_information');
      $this->load->view('Include/footer');
    }
}

public function body_type_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['body_type_list'] = $this->User_Model->get_list($company_id,'body_type_id','ASC','body_type');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/body_type_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_body_type(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'body_type_name' => $this->input->post('body_type_name'),
    );

    $this->User_Model->save_data('body_type', $data);
    header('location:body_type_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_body_type($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('body_type_id', $id, 'body_type');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['body_type_id'] = $info->body_type_id;
        $data['body_type_name'] = $info->body_type_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/country',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_body_type(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $body_type_id = $this->input->post('body_type_id');
    $data = array(
      'body_type_name' => $this->input->post('body_type_name'),
    );
    $this->User_Model->update_info('body_type_id', $body_type_id, 'body_type', $data);
    header('location:body_type_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_body_type($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('body_type_id', $id, 'body_type');
    header('location:../body_type_list');
  } else{
    header('location:'.base_url().'Login');
  }
}



// public function cast_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/cast_information_list');
//       $this->load->view('Include/footer');
// }
//
// public function cast_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/cast_information');
//       $this->load->view('Include/footer');
// }


public function cast_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
  if($company_id){
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/cast_information', $data);
      $this->load->view('Include/footer', $data);
    }
}

public function cast_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
  $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
  $data['cast_list'] = $this->User_Model->get_cast_list($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/cast_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_cast(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'religion_id'=>$this->input->post('religion_id'),
      'cast_name' => $this->input->post('cast_name'),
    );

    $this->User_Model->save_data('cast', $data);
    header('location:cast_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_cast($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  // $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('cast_id', $id, 'cast');
    $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['cast_id'] = $info->cast_id;
        $data['religion_id'] = $info->religion_id;
        // $data['religion_name'] = $info->religion_name;
        $data['cast_name'] = $info->cast_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/cast_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_cast(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $cast_id = $this->input->post('cast_id');
    $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
    $data = array(
      'religion_id' => $this->input->post('religion_id'),
      'cast_name' => $this->input->post('cast_name'),
    );
    $this->User_Model->update_info('cast_id', $cast_id, 'cast', $data);
    header('location:cast_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_cast($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('cast_id', $id, 'cast');
    header('location:../cast_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}


// public function city_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/city_information_list');
//       $this->load->view('Include/footer');
// }
//
// public function city_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/city_information');
//       $this->load->view('Include/footer');
// }

public function city_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
  $data['state_list'] = $this->User_Model->get_state_list($company_id);
  $data['district_list'] = $this->User_Model->get_district_list($company_id);
  $data['tahasil_list'] = $this->User_Model->get_tahasil_list($company_id);
  if($company_id){
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/city_information', $data);
      $this->load->view('Include/footer', $data);
    }
}

public function city_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['city_list'] = $this->User_Model->get_city_list($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/city_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_city(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $this->input->post('district_id'),
      'tahasil_id' => $this->input->post('tahasil_id'),
      'city_name' => $this->input->post('city_name'),
    );

    $this->User_Model->save_data('city', $data);
    header('location:city_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_city($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_city_info($company_id,$id);
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $data['state_list'] = $this->User_Model->get_list($company_id,'state_id','ASC','state');
    $data['district_list'] = $this->User_Model->get_district_list($company_id);
    $data['tahasil_list'] = $this->User_Model->get_tahasil_list($company_id);
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['city_id'] = $info->city_id;
        $data['city_name'] = $info->city_name;
        $data['country_id'] = $info->country_id;
        $data['country_name'] = $info->country_name;
        $data['state_id'] = $info->state_id;
        $data['state_name'] = $info->state_name;
        $data['district_id'] = $info->district_id;
        $data['district_name'] = $info->district_name;
        $data['tahasil_id'] = $info->tahasil_id;
        $data['tahasil_name'] = $info->tahasil_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/city_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_city(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $city_id = $this->input->post('city_id');
    $data = array(
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $this->input->post('district_id'),
      'tahasil_id' => $this->input->post('tahasil_id'),
      'city_name' => $this->input->post('city_name'),
    );
    $this->User_Model->update_info('city_id', $city_id, 'city', $data);
    header('location:city_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_city($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('city_id', $id, 'city');
    header('location:../city_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}


public function district_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
  $data['state_list'] = $this->User_Model->get_state_list($company_id);
  if($company_id){
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/district_information', $data);
      $this->load->view('Include/footer', $data);
    }
}

public function district_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['district_list'] = $this->User_Model->get_district_list($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/district_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_district(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_name' => $this->input->post('district_name'),
    );

    $this->User_Model->save_data('district', $data);
    header('location:district_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_district($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_district_info($company_id,$id);
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $data['state_list'] = $this->User_Model->get_list($company_id,'state_id','ASC','state');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['district_id'] = $info->district_id;
        $data['district_name'] = $info->district_name;
        $data['country_id'] = $info->country_id;
        $data['country_name'] = $info->country_name;
        $data['state_id'] = $info->state_id;
        $data['state_name'] = $info->state_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/district_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_district(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $district_id = $this->input->post('district_id');
    $data = array(
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_name' => $this->input->post('district_name'),
    );
    $this->User_Model->update_info('district_id', $district_id, 'district', $data);
    header('location:district_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_district($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('district_id', $id, 'district');
    header('location:../district_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

public function tahasil_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
  $data['state_list'] = $this->User_Model->get_state_list($company_id);
  $data['district_list'] = $this->User_Model->get_district_list($company_id);
  if($company_id){
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/tahasil_information', $data);
      $this->load->view('Include/footer', $data);
    }
}

public function tahasil_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['tahasil_list'] = $this->User_Model->get_tahasil_list($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/tahasil_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_tahasil(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $this->input->post('district_id'),
      'tahasil_name' => $this->input->post('tahasil_name'),
    );

    $this->User_Model->save_data('tahasil', $data);
    header('location:tahasil_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_tahasil($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_tahasil_info($company_id,$id);
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $data['state_list'] = $this->User_Model->get_list($company_id,'state_id','ASC','state');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['tahasil_id'] = $info->tahasil_id;
        $data['tahasil_name'] = $info->tahasil_name;
        $data['country_id'] = $info->country_id;
        $data['country_name'] = $info->country_name;
        $data['state_id'] = $info->state_id;
        $data['state_name'] = $info->state_name;
        $data['district_id'] = $info->district_id;
        $data['district_name'] = $info->district_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/tahasil_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_tahasil(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $tahasil_id = $this->input->post('tahasil_id');
    $data = array(
      'country_id' => $this->input->post('country_id'),
      'state_id' => $this->input->post('state_id'),
      'district_id' => $this->input->post('district_id'),
      'tahasil_name' => $this->input->post('tahasil_name'),
    );
    $this->User_Model->update_info('tahasil_id', $tahasil_id, 'tahasil', $data);
    header('location:tahasil_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_tahasil($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('tahasil_id', $id, 'tahasil');
    header('location:../tahasil_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function country_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/country_list');
//       $this->load->view('Include/footer');
// }
//
// public function country(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/country_information');
//       $this->load->view('Include/footer');
// }

public function country_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/country_information');
      $this->load->view('Include/footer');
    }
}

public function country_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/country_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_country(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'country_name' => $this->input->post('country_name'),
    );

    $this->User_Model->save_data('country', $data);
    header('location:country_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_country($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('country_id', $id, 'country');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['country_id'] = $info->country_id;
        $data['country_name'] = $info->country_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/country_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_country(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $country_id = $this->input->post('country_id');
    $data = array(
      'country_name' => $this->input->post('country_name'),
    );
    $this->User_Model->update_info('country_id', $country_id, 'country', $data);
    header('location:country_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_country($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('country_id', $id, 'country');
    header('location:../country_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}


// public function complexion_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/complexion_list');
//       $this->load->view('Include/footer');
// }
//
// public function complexion_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/complexion_information');
//       $this->load->view('Include/footer');
// }

public function complexion_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/complexion_information');
      $this->load->view('Include/footer');
    }
}

public function complexion_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['complexion_list'] = $this->User_Model->get_list($company_id,'complexion_id','ASC','complexion');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/complexion_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_complexion(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'complexion_name' => $this->input->post('complexion_name'),
    );

    $this->User_Model->save_data('complexion', $data);
    header('location:complexion_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_complexion($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('complexion_id', $id, 'complexion');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['complexion_id'] = $info->complexion_id;
        $data['complexion_name'] = $info->complexion_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/complexion_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_complexion(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $complexion_id = $this->input->post('complexion_id');
    $data = array(
      'complexion_name' => $this->input->post('complexion_name'),
    );
    $this->User_Model->update_info('complexion_id', $complexion_id, 'complexion', $data);
    header('location:complexion_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_complexion($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('complexion_id', $id, 'complexion');
    header('location:../complexion_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}




public function diet_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/diet_information');
      $this->load->view('Include/footer');
    }
}

public function diet_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['diet_list'] = $this->User_Model->get_list($company_id,'diet_id','ASC','diet');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/diet_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_diet(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'diet_name' => $this->input->post('diet_name'),
    );

    $this->User_Model->save_data('diet', $data);
    header('location:diet_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_diet($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('diet_id', $id, 'diet');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['diet_id'] = $info->diet_id;
        $data['diet_name'] = $info->diet_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/diet_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_diet(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $diet_id = $this->input->post('diet_id');
    $data = array(
      'diet_name' => $this->input->post('diet_name'),
    );
    $this->User_Model->update_info('diet_id', $diet_id, 'diet', $data);
    header('location:diet_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_diet($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('diet_id', $id, 'diet');
    header('location:../diet_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}


public function education_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/education_information');
      $this->load->view('Include/footer');
    }
}

public function education_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['education_list'] = $this->User_Model->get_list($company_id,'education_id','ASC','education');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/education_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_education(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'education_name' => $this->input->post('education_name'),
    );

    $this->User_Model->save_data('education', $data);
    header('location:education_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_education($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('education_id', $id, 'education');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['education_id'] = $info->education_id;
        $data['education_name'] = $info->education_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/education_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_education(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $education_id = $this->input->post('education_id');
    $data = array(
      'education_name' => $this->input->post('education_name'),
    );
    $this->User_Model->update_info('education_id', $education_id, 'education', $data);
    header('location:education_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_education($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('education_id', $id, 'education');
    header('location:../education_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function family_status_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/family_status_list');
//       $this->load->view('Include/footer');
// }
//
// public function family_status(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/family_status');
//       $this->load->view('Include/footer');
// }

public function family_status(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/family_status');
      $this->load->view('Include/footer');
    }
}

public function family_status_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['family_status'] = $this->User_Model->get_list($company_id,'family_status_id','ASC','family_status');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/family_status_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_family_status(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'family_status_name' => $this->input->post('family_status_name'),
    );

    $this->User_Model->save_data('family_status', $data);
    header('location:family_status_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_family_status($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('family_status_id', $id, 'family_status');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['family_status_id'] = $info->family_status_id;
        $data['family_status_name'] = $info->family_status_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/family_status',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_family_status(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $family_status_id = $this->input->post('family_status_id');
    $data = array(
      'family_status_name' => $this->input->post('family_status_name'),
    );
    $this->User_Model->update_info('family_status_id', $family_status_id, 'family_status', $data);
    header('location:family_status_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_family_status($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('family_status_id', $id, 'family_status');
    header('location:../family_status_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function family_value_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/family_value_list');
//       $this->load->view('Include/footer');
// }
// public function family_value(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/family_value');
//       $this->load->view('Include/footer');
// }

public function family_value(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/family_value');
      $this->load->view('Include/footer');
    }
}

public function family_value_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['family_value'] = $this->User_Model->get_list($company_id,'family_value_id','ASC','family_value');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/family_value_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_family_value(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'family_value_name' => $this->input->post('family_value_name'),
    );

    $this->User_Model->save_data('family_value', $data);
    header('location:family_value_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_family_value($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('family_value_id', $id, 'family_value');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['family_value_id'] = $info->family_value_id;
        $data['family_value_name'] = $info->family_value_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/family_value',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_family_value(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $family_value_id = $this->input->post('family_value_id');
    $data = array(
      'family_value_name' => $this->input->post('family_value_name'),
    );
    $this->User_Model->update_info('family_value_id', $family_value_id, 'family_value', $data);
    header('location:family_value_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_family_value($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('family_value_id', $id, 'family_value');
    header('location:../family_value_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//
// public function family_type_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/family_type_list');
//       $this->load->view('Include/footer');
// }
// public function family_type(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/family_type');
//       $this->load->view('Include/footer');
// }

public function family_type(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/family_type');
      $this->load->view('Include/footer');
    }
}

public function family_type_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['family_type'] = $this->User_Model->get_list($company_id,'family_type_id','ASC','family_type');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/family_type_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_family_type(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'family_type_name' => $this->input->post('family_type_name'),
    );

    $this->User_Model->save_data('family_type', $data);
    header('location:family_type_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_family_type($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('family_type_id', $id, 'family_type');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['family_type_id'] = $info->family_type_id;
        $data['family_type_name'] = $info->family_type_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/family_type',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_family_type(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $family_type_id = $this->input->post('family_type_id');
    $data = array(
      'family_type_name' => $this->input->post('family_type_name'),
    );
    $this->User_Model->update_info('family_type_id', $family_type_id, 'family_type', $data);
    header('location:family_type_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_family_type($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('family_type_id', $id, 'family_type');
    header('location:../family_type_list');
  } else{
    header('location:'.base_url().'Login');
  }
}



public function gothram_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/gothram_information');
      $this->load->view('Include/footer');
    }
}

public function gothram_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['gothram_list'] = $this->User_Model->get_list($company_id,'gothram_id','ASC','gothram');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/gothram_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_gothram(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'gothram_name' => $this->input->post('gothram_name'),
    );

    $this->User_Model->save_data('gothram', $data);
    header('location:gothram_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_gothram($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('gothram_id', $id, 'gothram');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['gothram_id'] = $info->gothram_id;
        $data['gothram_name'] = $info->gothram_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/gothram_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_gothram(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $gothram_id = $this->input->post('gothram_id');
    $data = array(
      'gothram_name' => $this->input->post('gothram_name'),
    );
    $this->User_Model->update_info('gothram_id', $gothram_id, 'gothram', $data);
    header('location:gothram_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_gothram($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('gothram_id', $id, 'gothram');
    header('location:../gothram_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function height_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/height_information_list');
//       $this->load->view('Include/footer');
// }
// public function height_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/height_information');
//       $this->load->view('Include/footer');
// }

public function height_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/height_information');
      $this->load->view('Include/footer');
    }
}

public function height_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['height_list'] = $this->User_Model->get_list($company_id,'height_id','ASC','height');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/height_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_height(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'height_name' => $this->input->post('height_name'),
    );

    $this->User_Model->save_data('height', $data);
    header('location:height_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_height($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('height_id', $id, 'height');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['height_id'] = $info->height_id;
        $data['height_name'] = $info->height_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/height_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_height(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $height_id = $this->input->post('height_id');
    $data = array(
      'height_name' => $this->input->post('height_name'),
    );
    $this->User_Model->update_info('height_id', $height_id, 'height', $data);
    header('location:height_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_height($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('height_id', $id, 'height');
    header('location:../height_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function income_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/income_information_list');
//       $this->load->view('Include/footer');
// }
// public function income_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/income_information');
//       $this->load->view('Include/footer');
// }

public function income_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/income_information');
      $this->load->view('Include/footer');
    }
}

public function income_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['income_list'] = $this->User_Model->get_list($company_id,'income_id','ASC','income');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/income_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_income(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'min_income' => $this->input->post('min_income'),
      'max_income' => $this->input->post('max_income'),
    );

    $this->User_Model->save_data('income', $data);
    header('location:income_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_income($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('income_id', $id, 'income');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['income_id'] = $info->income_id;
        $data['min_income'] = $info->min_income;
        $data['max_income'] = $info->max_income;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/income_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_income(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $income_id = $this->input->post('income_id');
    $data = array(
      'min_income' => $this->input->post('min_income'),
      'max_income' => $this->input->post('max_income'),
    );
    $this->User_Model->update_info('income_id', $income_id, 'income', $data);
    header('location:income_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_income($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('income_id', $id, 'income');
    header('location:../income_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function language_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/language_list');
//       $this->load->view('Include/footer');
// }
// public function language_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/language_information');
//       $this->load->view('Include/footer');
// }

public function language_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/language_information');
      $this->load->view('Include/footer');
    }
}

public function language_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['language_list'] = $this->User_Model->get_list($company_id,'language_id','ASC','language');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/language_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_language(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'language_name' => $this->input->post('language_name'),
    );

    $this->User_Model->save_data('language', $data);
    header('location:language_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_language($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('language_id', $id, 'language');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['language_id'] = $info->language_id;
        $data['language_name'] = $info->language_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/language_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_language(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $language_id = $this->input->post('language_id');
    $data = array(
      'language_name' => $this->input->post('language_name'),
    );
    $this->User_Model->update_info('language_id', $language_id, 'language', $data);
    header('location:language_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_language($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('language_id', $id, 'language');
    header('location:../language_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function moonsign_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/moonsign_information_list');
//       $this->load->view('Include/footer');
// }
// public function moonsign_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/moonsign_information');
//       $this->load->view('Include/footer');
// }

public function moonsign_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/moonsign_information');
      $this->load->view('Include/footer');
    }
}

public function moonsign_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['moonsign_list'] = $this->User_Model->get_list($company_id,'moonsign_id','ASC','moonsign');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/moonsign_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_moonsign(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'moonsign_name' => $this->input->post('moonsign_name'),
    );

    $this->User_Model->save_data('moonsign', $data);
    header('location:moonsign_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_moonsign($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('moonsign_id', $id, 'moonsign');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['moonsign_id'] = $info->moonsign_id;
        $data['moonsign_name'] = $info->moonsign_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/moonsign_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_moonsign(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $moonsign_id = $this->input->post('moonsign_id');
    $data = array(
      'moonsign_name' => $this->input->post('moonsign_name'),
    );
    $this->User_Model->update_info('moonsign_id', $moonsign_id, 'moonsign', $data);
    header('location:moonsign_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_moonsign($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('moonsign_id', $id, 'moonsign');
    header('location:../moonsign_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function occupation_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/occupation_information_list');
//       $this->load->view('Include/footer');
// }
// public function occupation_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/occupation_information');
//       $this->load->view('Include/footer');
// }

public function occupation_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/occupation_information');
      $this->load->view('Include/footer');
    }
}

public function occupation_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['occupation_list'] = $this->User_Model->get_list($company_id,'occupation_id','ASC','occupation');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/occupation_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_occupation(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'occupation_name' => $this->input->post('occupation_name'),
    );

    $this->User_Model->save_data('occupation', $data);
    header('location:occupation_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_occupation($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('occupation_id', $id, 'occupation');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['occupation_id'] = $info->occupation_id;
        $data['occupation_name'] = $info->occupation_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/occupation_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_occupation(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $occupation_id = $this->input->post('occupation_id');
    $data = array(
      'occupation_name' => $this->input->post('occupation_name'),
    );
    $this->User_Model->update_info('occupation_id', $occupation_id, 'occupation', $data);
    header('location:occupation_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_occupation($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('occupation_id', $id, 'occupation');
    header('location:../occupation_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function onbehalf_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/onbehalf_information_list');
//       $this->load->view('Include/footer');
// }
// public function onbehalf_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/onbehalf_information');
//       $this->load->view('Include/footer');
// }

public function onbehalf_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/onbehalf_information');
      $this->load->view('Include/footer');
    }
}

public function onbehalf_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['onbehalf_list'] = $this->User_Model->get_list($company_id,'onbehalf_id','ASC','onbehalf');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/onbehalf_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_onbehalf(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'onbehalf_name' => $this->input->post('onbehalf_name'),
    );

    $this->User_Model->save_data('onbehalf', $data);
    header('location:onbehalf_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_onbehalf($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('onbehalf_id', $id, 'onbehalf');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['onbehalf_id'] = $info->onbehalf_id;
        $data['onbehalf_name'] = $info->onbehalf_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/onbehalf_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_onbehalf(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $onbehalf_id = $this->input->post('onbehalf_id');
    $data = array(
      'onbehalf_name' => $this->input->post('onbehalf_name'),
    );
    $this->User_Model->update_info('onbehalf_id', $onbehalf_id, 'onbehalf', $data);
    header('location:onbehalf_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_onbehalf($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('onbehalf_id', $id, 'onbehalf');
    header('location:../onbehalf_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function referenceby_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/referenceby_information_list');
//       $this->load->view('Include/footer');
// }
// public function referenceby_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/referenceby_information');
//       $this->load->view('Include/footer');
// }

public function referenceby_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/referenceby_information');
      $this->load->view('Include/footer');
    }
}

public function referenceby_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['referenceby_list'] = $this->User_Model->get_list($company_id,'reference_by_id','ASC','reference_by');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/referenceby_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_referenceby(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'reference_by_name' => $this->input->post('reference_by_name'),
    );

    $this->User_Model->save_data('reference_by', $data);
    header('location:referenceby_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_referenceby($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('reference_by_id', $id, 'reference_by');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['reference_by_id'] = $info->reference_by_id;
        $data['reference_by_name'] = $info->reference_by_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/referenceby_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_referenceby(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $reference_by_id = $this->input->post('reference_by_id');
    $data = array(
      'reference_by_name' => $this->input->post('reference_by_name'),
    );
    $this->User_Model->update_info('reference_by_id', $reference_by_id, 'reference_by', $data);
    header('location:referenceby_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_referenceby($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('reference_by_id', $id, 'reference_by');
    header('location:../referenceby_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// public function religion_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/religion_information_list');
//       $this->load->view('Include/footer');
// }
// public function religion_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/religion_information');
//       $this->load->view('Include/footer');
// }

public function religion_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/religion_information');
      $this->load->view('Include/footer');
    }
}

public function religion_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/religion_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_religion(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'religion_name' => $this->input->post('religion_name'),
    );

    $this->User_Model->save_data('religion', $data);
    header('location:religion_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_religion($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('religion_id', $id, 'religion');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['religion_id'] = $info->religion_id;
        $data['religion_name'] = $info->religion_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/religion_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_religion(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $religion_id = $this->input->post('religion_id');
    $data = array(
      'religion_name' => $this->input->post('religion_name'),
    );
    $this->User_Model->update_info('religion_id', $religion_id, 'religion', $data);
    header('location:religion_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_religion($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('religion_id', $id, 'religion');
    header('location:../religion_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}


// public function resident_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/resident_information_list');
//       $this->load->view('Include/footer');
// }
// public function resident_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/resident_information');
//       $this->load->view('Include/footer');
// }

public function resident_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/resident_information');
      $this->load->view('Include/footer');
    }
}

public function resident_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['resident_list'] = $this->User_Model->get_list($company_id,'resident_status_id','ASC','resident_status');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/resident_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_resident(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'resident_status_name' => $this->input->post('resident_status_name'),
    );

    $this->User_Model->save_data('resident_status', $data);
    header('location:resident_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_resident($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('resident_status_id', $id, 'resident_status');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['resident_status_id'] = $info->resident_status_id;
        $data['resident_status_name'] = $info->resident_status_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/resident_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_resident(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $resident_status_id = $this->input->post('resident_status_id');
    $data = array(
      'resident_status_name' => $this->input->post('resident_status_name'),
    );
    $this->User_Model->update_info('resident_status_id', $resident_status_id, 'resident_status', $data);
    header('location:resident_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_resident($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('resident_status_id', $id, 'resident_status');
    header('location:../resident_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public function role_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/role_information_list');
//       $this->load->view('Include/footer');
// }
// public function role_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/role_information');
//       $this->load->view('Include/footer');
// }

public function role_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
      $this->load->view('Include/head');
      $this->load->view('Include/navbar');
      $this->load->view('User/role_information');
      $this->load->view('Include/footer');
    }
}

public function role_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['role_list'] = $this->User_Model->get_list($company_id,'role_id','ASC','role');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/role_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_role(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'role_name' => $this->input->post('role_name'),
    );

    $this->User_Model->save_data('role', $data);
    header('location:role_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_role($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('role_id', $id, 'role');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['role_id'] = $info->role_id;
        $data['role_name'] = $info->role_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/role_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_role(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $role_id = $this->input->post('role_id');
    $data = array(
      'role_name' => $this->input->post('role_name'),
    );
    $this->User_Model->update_info('role_id', $role_id, 'role', $data);
    header('location:role_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_role($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('role_id', $id, 'role');
    header('location:../role_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

// public functionstate_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/state_information_list');
//       $this->load->view('Include/footer');
// }
// public functionstate_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/state_information');
//       $this->load->view('Include/footer');
// }

public function state_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
  if($company_id){
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/state_information', $data);
      $this->load->view('Include/footer', $data);
    }
}

public function state_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
  $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
  $data['state_list'] = $this->User_Model->get_state_list($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/state_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_state(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'country_id'=>$this->input->post('country_id'),
      'state_name' => $this->input->post('state_name'),
    );

    $this->User_Model->save_data('state', $data);
    header('location:state_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_state($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  // $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_info('state_id', $id, 'state');
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['state_id'] = $info->state_id;
        $data['country_id'] = $info->country_id;
        // $data['country_name'] = $info->country_name;
        $data['state_name'] = $info->state_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/state_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_state(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $state_id = $this->input->post('state_id');
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $data = array(
      'country_id' => $this->input->post('country_id'),
      'state_name' => $this->input->post('state_name'),
    );
    $this->User_Model->update_info('state_id', $state_id, 'state', $data);
    header('location:state_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_state($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('state_id', $id, 'state');
    header('location:../state_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

//
// public function subcast_information_list(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/subcast_information_list');
//       $this->load->view('Include/footer');
// }
// public function subcast_information(){
//       $this->load->view('Include/head');
//       $this->load->view('Include/navbar');
//       $this->load->view('User/subcast_information');
//       $this->load->view('Include/footer');
// }

public function subcast_information(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
  $data['cast_list'] = $this->User_Model->get_cast_list($company_id);
  if($company_id){
      $this->load->view('Include/head', $data);
      $this->load->view('Include/navbar', $data);
      $this->load->view('User/subcast_information', $data);
      $this->load->view('Include/footer', $data);
    }
}

public function subcast_information_list(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data['subcast_list'] = $this->User_Model->get_subcast_list($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/subcast_information_list',$data);
    $this->load->view('Include/footer',$data);
  } else{
    header('location:'.base_url().'Login');
  }
}
//Save
public function save_subcast(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $data = array(
      'company_id' => $company_id,
      'user_id'=>$user_id,
      'religion_id' => $this->input->post('religion_id'),
      'cast_id' => $this->input->post('cast_id'),
      'sub_cast_name' => $this->input->post('sub_cast_name'),
    );

    $this->User_Model->save_data('sub_cast', $data);
    header('location:subcast_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
//edit
public function edit_subcast($id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $make_info = $this->User_Model->get_subcast_info($company_id,$id);
    $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
    $data['cast_list'] = $this->User_Model->get_list($company_id,'cast_id','ASC','cast');
    if($make_info){
      foreach($make_info as $info){
        $data['update'] = 'update';
        $data['sub_cast_id'] = $info->sub_cast_id;
        $data['sub_cast_name'] = $info->sub_cast_name;
        $data['religion_id'] = $info->religion_id;
        $data['religion_name'] = $info->religion_name;
        $data['cast_id'] = $info->cast_id;
        $data['cast_name'] = $info->cast_name;
      }
      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/subcast_information',$data);
      $this->load->view('Include/footer',$data);
    }
  } else{
    header('location:'.base_url().'Login');
  }
}
// Update
public function update_subcast(){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($company_id){
    $sub_cast_id = $this->input->post('sub_cast_id');
    $data = array(
      'religion_id' => $this->input->post('religion_id'),
      'cast_id' => $this->input->post('cast_id'),
      'sub_cast_name' => $this->input->post('sub_cast_name'),
    );
    $this->User_Model->update_info('sub_cast_id', $sub_cast_id, 'sub_cast', $data);
    header('location:subcast_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}
// Delete
public function delete_subcast($id){
  $company_id = $this->session->userdata('company_id');
  if($company_id){
    $this->User_Model->delete_info('sub_cast_id', $id, 'sub_cast');
    header('location:../subcast_information_list');
  } else{
    header('location:'.base_url().'Login');
  }
}

/***************************** Advertise Information *************************/

  public function advertise_information(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    $data['select_reach_list'] = $this->User_Model->get_list($company_id,'reach_id','ASC','advertisement_reach');

    if($company_id){
        $this->load->view('Include/head', $data);
        $this->load->view('Include/navbar', $data);
        $this->load->view('User/advertise_information', $data);
        $this->load->view('Include/footer', $data);
      }
  }

  public function advertise_information_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($company_id){

      if($mat_role_id == 1 || $mat_role_id == 2 || $mat_role_id == 3 ){
        $data['advertise_list'] = $this->User_Model->get_list($company_id,'adv_id','ASC','advertisement');
      } else{
        $data['advertise_list'] = $this->User_Model->get_adv_list_by_user($company_id,$mat_user_id);
      }


      $this->load->view('Include/head',$data);
      $this->load->view('Include/navbar',$data);
      $this->load->view('User/advertise_information_list',$data);
      $this->load->view('Include/footer',$data);
    } else{
      header('location:'.base_url().'Login');
    }
  }
  //Save
  public function save_advertisement(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    $data['select_reach_list'] = $this->User_Model->get_list($company_id,'reach_id','ASC','advertisement_reach');
    if($company_id){
      $adv_status = $this->input->post('adv_status');
      if(!isset($adv_status)){ $adv_status = 'active'; }
      $data = array(
        'company_id' => $company_id,
        'reach_id'=>$this->input->post('reach_id'),
        'adv_name' => $this->input->post('adv_name'),
        'adv_amount' => $this->input->post('adv_amount'),
        'adv_status' => $adv_status,
        'adv_addedby' => $user_id,
      );
      $adv_id = $this->User_Model->save_data('advertisement', $data);
      // Image Upliad...
      if(isset($_FILES['adv_image']['name'])){
        $time = time();
        $image_name = 'adv_'.$adv_id.'_'.$time;

        $config['upload_path'] = 'assets/images/adv/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $image_name;
        $filename = $_FILES['adv_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $this->load->library('upload', $config);

        $this->upload->initialize($config);
        if ($this->upload->do_upload('adv_image')){
          $tour_up_image = array(
            'adv_image' => $image_name.'.'.$ext,
          );
          $this->User_Model->update_info('adv_id', $adv_id, 'advertisement', $tour_up_image);
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
          header('location:advertise_information_list');
        }
      }

      header('location:'.base_url().'User/advertise_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }
  //edit
  public function edit_advertisement($id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    $data['select_reach_list'] = $this->User_Model->get_list($company_id,'reach_id','ASC','advertisement_reach');
    if($company_id){
      $make_info = $this->User_Model->get_info('adv_id', $id, 'advertisement');
      if($make_info){
        foreach($make_info as $info){
          $data['update'] = 'update';
          $data['adv_id'] = $info->adv_id;
          $data['reach_id'] = $info->reach_id;
          $data['adv_name'] = $info->adv_name;
          $data['adv_amount'] = $info->adv_amount;
          $data['adv_image'] = $info->adv_image;
          $data['adv_status'] = $info->adv_status;
        }
        $this->load->view('Include/head',$data);
        $this->load->view('Include/navbar',$data);
        $this->load->view('User/advertise_information',$data);
        $this->load->view('Include/footer',$data);
      }
    } else{
      header('location:'.base_url().'Login');
    }
  }
  // Update
  public function update_advertisement(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($company_id){
      $adv_status = $this->input->post('adv_status');
      if(!isset($adv_status)){ $adv_status = 'active'; }
      $adv_id = $this->input->post('adv_id');
      $data = array(
        'adv_name' => $this->input->post('adv_name'),
        'reach_id' => $this->input->post('reach_id'),
        'adv_amount' => $this->input->post('adv_amount'),
        'adv_status' => $adv_status,
        'adv_addedby' => $user_id,
      );
      $this->User_Model->update_info('adv_id', $adv_id, 'advertisement', $data);
      $img_old = $this->input->post('img_old');
      // Image Upliad...
      if(isset($_FILES['adv_image']['name'])){
        $time = time();
        $image_name = 'adv_'.$adv_id.'_'.$time;
        $config['upload_path'] = 'assets/images/adv/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $image_name;
        $filename = $_FILES['adv_image']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('adv_image')){
          $tour_up_image = array(
            'adv_image' => $image_name.'.'.$ext,
          );
          $this->User_Model->update_info('adv_id', $adv_id, 'advertisement', $tour_up_image);
          unlink("assets/images/adv/".$img_old);
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
          header('location:advertise_information_list');
        }
      }
      header('location:advertise_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }
  // Delete
  public function delete_advertisement($id){
    $company_id = $this->session->userdata('company_id');
    if($company_id){
      $this->User_Model->delete_info('adv_id', $id, 'advertisement');
      header('location:../advertise_information_list');
    } else{
      header('location:'.base_url().'Login');
    }
  }

/****************************** Membership Package Information *************************/
  // Membership List...
  public function package_list(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $data['package_list'] = $this->User_Model->get_list($company_id,'package_id','ASC','package');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/package_list', $data);
    $this->load->view('Include/footer', $data);
  }
  // Add Membership
  public function package_information(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('package_name','Package Name','trim|required');
    if($this->form_validation->run() != FALSE){
      $package_status = $this->input->post('package_status');
      if(!isset($package_status)){ $package_status = 'active'; }
      $save_data = array(
        'company_id' => $company_id,
        'package_name' => $this->input->post('package_name'),
        'package_amount' => $this->input->post('package_amount'),
        'package_int_cnt' => $this->input->post('package_int_cnt'),
        'package_photo_cnt' => $this->input->post('package_photo_cnt'),
        'package_status' => $package_status,
        'package_addedby' => $user_id,
      );
      $package_id = $this->User_Model->save_data('package', $save_data);
      // Image Upliad...
      if(isset($_FILES['package_img']['name'])){
        $time = time();
        $image_name = 'package_'.$package_id.'_'.$time;

        $config['upload_path'] = 'assets/images/package/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $image_name;
        $filename = $_FILES['package_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $this->load->library('upload', $config);

        $this->upload->initialize($config);
        if ($this->upload->do_upload('package_img')){
          $up_image = array(
            'package_img' => $image_name.'.'.$ext,
          );
          $this->User_Model->update_info('package_id', $package_id, 'package', $up_image);
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
          header('location:package_list');
        }
      }
      header('location:'.base_url().'User/package_list');
    }
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/package_information');
    $this->load->view('Include/footer');
  }

  public function edit_package($package_id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('package_name','Package Name','trim|required');
    if($this->form_validation->run() != FALSE){
      $package_status = $this->input->post('package_status');
      if(!isset($package_status)){ $package_status = 'active'; }
      $update_data = array(
        'package_name' => $this->input->post('package_name'),
        'package_amount' => $this->input->post('package_amount'),
        'package_int_cnt' => $this->input->post('package_int_cnt'),
        'package_photo_cnt' => $this->input->post('package_photo_cnt'),
        'package_status' => $package_status,
        'package_addedby' => $user_id,
      );
      $this->User_Model->update_info('package_id', $package_id, 'package', $update_data);
      $img_old = $this->input->post('img_old');
      // Image Upliad...
      if(isset($_FILES['package_img']['name'])){
        $time = time();
        $image_name = 'package_'.$package_id.'_'.$time;

        $config['upload_path'] = 'assets/images/package/';
        $config['allowed_types'] = 'jpg';
        $config['file_name'] = $image_name;
        $filename = $_FILES['package_img']['name'];
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        // $this->load->library('upload', $config);

        $this->upload->initialize($config);
        if ($this->upload->do_upload('package_img')){
          $up_image = array(
            'package_img' => $image_name.'.'.$ext,
          );
          $this->User_Model->update_info('package_id', $package_id, 'package', $up_image);
          unlink("assets/images/package/".$img_old);
        }
        else{
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('status',$this->upload->display_errors());
          header('location:package_list');
        }
      }
      header('location:'.base_url().'User/package_list');
    }
    $package_info = $this->User_Model->get_info_array('package_id', $package_id, 'package');
    if(!$package_info){ header('location:'.base_url().'User/package_list'); }
    $data['update'] = 'update';
    $data['package_name'] = $package_info[0]['package_name'];
    $data['package_amount'] = $package_info[0]['package_amount'];
    $data['package_int_cnt'] = $package_info[0]['package_int_cnt'];
    $data['package_photo_cnt'] = $package_info[0]['package_photo_cnt'];
    $data['package_img'] = $package_info[0]['package_img'];
    $data['package_status'] = $package_info[0]['package_status'];

    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/package_information', $data);
    $this->load->view('Include/footer', $data);
  }

  public function delete_package($package_id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('package_id', $package_id, 'package');
    header('location:'.base_url().'User/package_list');
  }

/************************************ Staff **********************************/
  // Staff List...
  public function staff_information_list(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['staff_list'] = $this->User_Model->get_list($company_id,'staff_id','ASC','staff');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/staff_information_list',$data);
    $this->load->view('Include/footer',$data);
  }
  // Add Staff...
  public function staff_information(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $data['role_list'] = $this->User_Model->get_staff_roll();

    $this->form_validation->set_rules('staff_name','Staff Name','trim|required');
    if($this->form_validation->run() != FALSE){
      $staff_status = $this->input->post('staff_status');
      if(!isset($staff_status)){ $staff_status = 'active'; }
      $save_data = array(
        'company_id' => $company_id,
        'role_id' => $this->input->post('role_id'),
        'staff_name' => $this->input->post('staff_name'),
        'staff_city' => $this->input->post('staff_city'),
        'staff_gender' => $this->input->post('staff_gender'),
        'staff_email' => $this->input->post('staff_email'),
        'staff_mobile' => $this->input->post('staff_mobile'),
        'staff_password' => $this->input->post('staff_password'),
        'staff_status' => $staff_status,
        'staff_addedby' => $user_id,
      );
      $staff_id = $this->User_Model->save_data('staff', $save_data);

      // Save in User...
      $save_user_data = array(
        'company_id' => $company_id,
        'role_id' => $this->input->post('role_id'),
        'user_name' => $this->input->post('staff_name'),
        'user_city' => $this->input->post('staff_city'),
        'user_email' => $this->input->post('staff_email'),
        'user_mobile' => $this->input->post('staff_mobile'),
        'user_password' => $this->input->post('staff_password'),
        'user_status' => $staff_status,
        'user_addedby' => $user_id,
      );
      $staff_user_id = $this->User_Model->save_data('user', $save_user_data);
      // Add User Id To staff table...
      $staff_user['user_id'] = $staff_user_id;
      $this->User_Model->update_info('staff_id', $staff_id, 'staff', $staff_user);

      header('location:'.base_url().'User/staff_information_list');
    }
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/staff_information',$data);
    $this->load->view('Include/footer',$data);
  }
  // Update Staff...
  public function edit_staff($staff_id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    // Update...
    $this->form_validation->set_rules('staff_name','Staff Name','trim|required');
    if($this->form_validation->run() != FALSE){
      $staff_status = $this->input->post('staff_status');
      if(!isset($staff_status)){ $staff_status = 'active'; }
      $update_data = array(
        'role_id' => $this->input->post('role_id'),
        'staff_name' => $this->input->post('staff_name'),
        'staff_city' => $this->input->post('staff_city'),
        'staff_gender' => $this->input->post('staff_gender'),
        'staff_email' => $this->input->post('staff_email'),
        'staff_mobile' => $this->input->post('staff_mobile'),
        'staff_password' => $this->input->post('staff_password'),
        'staff_status' => $staff_status,
        'staff_addedby' => $user_id,
      );
      $this->User_Model->update_info('staff_id', $staff_id, 'staff', $update_data);

      // Update In User...
      $staff_info = $this->User_Model->get_info_array('staff_id', $staff_id, 'staff');
      if(!$staff_info){ header('location:'.base_url().'User/staff_information_list'); }
      $staff_user_id = $staff_info[0]['user_id'];
      $update_user_data = array(
        'role_id' => $this->input->post('role_id'),
        'user_name' => $this->input->post('staff_name'),
        'user_city' => $this->input->post('staff_city'),
        'user_email' => $this->input->post('staff_email'),
        'user_mobile' => $this->input->post('staff_mobile'),
        'user_password' => $this->input->post('staff_password'),
        'user_status' => $staff_status,
        'user_addedby' => $user_id,
      );
      $this->User_Model->update_info('user_id', $staff_user_id, 'user', $update_user_data);

      header('location:'.base_url().'User/staff_information_list');
    }

    $staff_info = $this->User_Model->get_info_array('staff_id', $staff_id, 'staff');
    if(!$staff_info){ header('location:'.base_url().'User/staff_information_list'); }
    $data['update'] = 'update';
    $data['role_id'] = $staff_info[0]['role_id'];
    $data['staff_name'] = $staff_info[0]['staff_name'];
    $data['staff_city'] = $staff_info[0]['staff_city'];
    $data['staff_gender'] = $staff_info[0]['staff_gender'];
    $data['staff_email'] = $staff_info[0]['staff_email'];
    $data['staff_mobile'] = $staff_info[0]['staff_mobile'];
    $data['staff_password'] = $staff_info[0]['staff_password'];
    $data['staff_status'] = $staff_info[0]['staff_status'];
    $data['role_list'] = $this->User_Model->get_list1('role_id','ASC','role');

    // print_r($data);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/staff_information',$data);
    $this->load->view('Include/footer',$data);
  }

  public function delete_staff($staff_id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('staff_id', $staff_id, 'staff');
    header('location:'.base_url().'User/staff_information_list');
  }

/*****************************************************************************/
  public function members_profile(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('User/members_profile');
    $this->load->view('Include/footer');
  }

/****************************** Franchise Information ***************************/
  // Franchise List...
  public function franchise_list(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    if($mat_role_id == 4){
      $data['franchise_list'] = $this->User_Model->get_subdealer_list($company_id,$user_id);
    } else{
      $data['franchise_list'] = $this->User_Model->get_list($company_id,'franchise_id','DESC','franchise');
    }


    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/franchise_list',$data);
    $this->load->view('Include/footer',$data);
  }
  // Add Franchise...
  public function franchise_information(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('franchise_name','Name','trim|required');
    if($this->form_validation->run() != FALSE){
      $franchise_status = $this->input->post('franchise_status');
      if(!isset($franchise_status)){ $franchise_status = 'active'; }
      $save_data = array(
        'company_id' => $company_id,
        'franchise_type_id' => $this->input->post('franchise_type_id'),
        'country_id' => $this->input->post('country_id'),
        'state_id' => $this->input->post('state_id'),
        'district_id' => $this->input->post('district_id'),
        'tahasil_id' => $this->input->post('tahasil_id'),
        'franchise_name' => $this->input->post('franchise_name'),
        'franchise_address' => $this->input->post('franchise_address'),
        'franchise_gender' => $this->input->post('franchise_gender'),
        'franchise_email' => $this->input->post('franchise_email'),
        'franchise_mobile' => $this->input->post('franchise_mobile'),
        'franchise_password' => $this->input->post('franchise_password'),
        'franchise_status' => $franchise_status,
        'franchise_addedby' => $user_id,
      );
      $franchise_id = $this->User_Model->save_data('franchise', $save_data);
      // Save in User...
      if($mat_role_id == 4){
        $set_role_id = 5;
      } else{
        $set_role_id = 4;
      }
      $save_user_data = array(
        'company_id' => $company_id,
        'role_id' => $set_role_id,
        'user_name' => $this->input->post('franchise_name'),
        'user_email' => $this->input->post('franchise_email'),
        'user_mobile' => $this->input->post('franchise_mobile'),
        'user_password' => $this->input->post('franchise_password'),
        'user_status' => $franchise_status,
        'user_addedby' => $user_id,
      );
      $franchise_user_id = $this->User_Model->save_data('user', $save_user_data);
      // Add User Id To franchise table...
      $franchise_user['user_id'] = $franchise_user_id;
      $this->User_Model->update_info('franchise_id', $franchise_id, 'franchise', $franchise_user);
      header('location:'.base_url().'User/franchise_list');
    }

    $data['franchise_type_list'] = $this->User_Model->get_list1('franchise_type_id','ASC','franchise_type');
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $data['state_list'] = $this->User_Model->get_state_list($company_id);
    $data['district_list'] = $this->User_Model->get_district_list($company_id);
    $data['tahasil_list'] = $this->User_Model->get_tahasil_list($company_id);
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/franchise_information', $data);
    $this->load->view('Include/footer', $data);
  }

  // Edit Franchise...
  public function edit_franchise($franchise_id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('franchise_name','Name','trim|required');
    if($this->form_validation->run() != FALSE){
      $franchise_status = $this->input->post('franchise_status');
      if(!isset($franchise_status)){ $franchise_status = 'active'; }
      $update_data = array(
        'franchise_type_id' => $this->input->post('franchise_type_id'),
        'country_id' => $this->input->post('country_id'),
        'state_id' => $this->input->post('state_id'),
        'district_id' => $this->input->post('district_id'),
        'tahasil_id' => $this->input->post('tahasil_id'),
        'franchise_name' => $this->input->post('franchise_name'),
        'franchise_address' => $this->input->post('franchise_address'),
        'franchise_gender' => $this->input->post('franchise_gender'),
        'franchise_email' => $this->input->post('franchise_email'),
        'franchise_mobile' => $this->input->post('franchise_mobile'),
        'franchise_password' => $this->input->post('franchise_password'),
        'franchise_status' => $franchise_status,
        'franchise_addedby' => $user_id,
      );
      $this->User_Model->update_info('franchise_id', $franchise_id, 'franchise', $update_data);
      $franchise_info = $this->User_Model->get_info_array('franchise_id', $franchise_id, 'franchise');
      $franchise_user_id = $franchise_info[0]['user_id'];
      if($mat_role_id == 4){
        $set_role_id = 5;
      } else{
        $set_role_id = 4;
      }
      $update_user_data = array(
        'company_id' => $company_id,
        'role_id' => $set_role_id,
        'user_name' => $this->input->post('franchise_name'),
        'user_email' => $this->input->post('franchise_email'),
        'user_mobile' => $this->input->post('franchise_mobile'),
        'user_password' => $this->input->post('franchise_password'),
        'user_status' => $franchise_status,
        'user_addedby' => $user_id,
      );
      $this->User_Model->update_info('user_id', $franchise_user_id, 'user', $update_user_data);

      header('location:'.base_url().'User/franchise_list');
    }

    $franchise_info = $this->User_Model->get_info_array('franchise_id', $franchise_id, 'franchise');
    if(!$franchise_info){ header('location:'.base_url().'User/franchise_list'); }
    $data['update'] = 'update';
    $data['franchise_type_id'] = $franchise_info[0]['franchise_type_id'];
    $data['country_id'] = $franchise_info[0]['country_id'];
    $data['state_id'] = $franchise_info[0]['state_id'];
    $data['district_id'] = $franchise_info[0]['district_id'];
    $data['tahasil_id'] = $franchise_info[0]['tahasil_id'];
    $data['franchise_name'] = $franchise_info[0]['franchise_name'];
    $data['franchise_address'] = $franchise_info[0]['franchise_address'];
    $data['franchise_gender'] = $franchise_info[0]['franchise_gender'];
    $data['franchise_email'] = $franchise_info[0]['franchise_email'];
    $data['franchise_mobile'] = $franchise_info[0]['franchise_mobile'];
    $data['franchise_password'] = $franchise_info[0]['franchise_password'];
    $data['franchise_status'] = $franchise_info[0]['franchise_status'];


    $data['franchise_type_list'] = $this->User_Model->get_list1('franchise_type_id','ASC','franchise_type');
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $data['state_list'] = $this->User_Model->get_state_list($company_id);
    $data['district_list'] = $this->User_Model->get_district_list($company_id);
    $data['tahasil_list'] = $this->User_Model->get_tahasil_list($company_id);
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('User/franchise_information', $data);
    $this->load->view('Include/footer', $data);
  }

  public function delete_franchise($franchise_id){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
    $franchise_info = $this->User_Model->get_info_array('franchise_id', $franchise_id, 'franchise');
    $franchise_user_id = $franchise_info[0]['user_id'];
    $this->User_Model->delete_info('franchise_id', $franchise_id, 'franchise');
    $this->User_Model->delete_info('user_id', $franchise_user_id, 'user');
    header('location:'.base_url().'User/franchise_list');
  }
/********************************* Member Information ***************************/
  public function members_list(){
    $mat_user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $mat_role_id = $this->session->userdata('role_id');
    if($mat_user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    if($mat_role_id == 1 || $mat_role_id == 2 || $mat_role_id == 3){
      $data['members_list'] = $this->User_Model->get_list($company_id,'member_id','ASC','member');
    } else{
      $data['members_list'] = $this->User_Model->get_member_list_by_user($company_id,$mat_user_id);
    }

    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/members_list',$data);
    $this->load->view('Include/footer',$data);
  }

  public function members(){
    $user_id = $this->session->userdata('user_id');
    $company_id = $this->session->userdata('company_id');
    $role_id = $this->session->userdata('role_id');
    if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

    $this->form_validation->set_rules('member_name','Member Name','trim|required');
    if($this->form_validation->run() != FALSE){
      $save_data = array(
        'company_id' => $company_id,
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
        'member_addedby' => $user_id,
      );
      $this->User_Model->save_data('member', $save_data);
      header('location:'.base_url().'User/members_list');
    }
    $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
    $data['state_list'] = $this->User_Model->get_state_list($company_id);
    $data['district_list'] = $this->User_Model->get_district_list($company_id);
    $data['tahasil_list'] = $this->User_Model->get_tahasil_list($company_id);
    $data['city_list'] = $this->User_Model->get_city_list($company_id);
    $data['language_list'] = $this->User_Model->get_list($company_id,'language_id','ASC','language');
    $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
    $data['onbehalf_list'] = $this->User_Model->get_list($company_id,'onbehalf_id','ASC','onbehalf');
    $data['marital_status_list'] = $this->User_Model->get_list1('marital_status_id','ASC','marital_status');
    // print_r($company_id);
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('User/members',$data);
    $this->load->view('Include/footer',$data);
  }

public function edit_members($member_id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }

  $this->form_validation->set_rules('member_name','Member Name','trim|required');
  if($this->form_validation->run() != FALSE){
    $today = date('d-m-Y');
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
      'mamber_date' => $today,
      'onbehalf_id' => $this->input->post('onbehalf_id'),
      'marital_status' => $this->input->post('marital_status'),
      'cast_id' => $this->input->post('cast_id'),
      'member_addedby' => $user_id,
    );
    $this->User_Model->update_info('member_id', $member_id, 'member', $update_data);
    header('location:'.base_url().'User/members_list');
  }

  $data['country_list'] = $this->User_Model->get_list($company_id,'country_id','ASC','country');
  $data['state_list'] = $this->User_Model->get_state_list($company_id);
  $data['district_list'] = $this->User_Model->get_district_list($company_id);
  $data['tahasil_list'] = $this->User_Model->get_tahasil_list($company_id);
  $data['city_list'] = $this->User_Model->get_city_list($company_id);
  $data['language_list'] = $this->User_Model->get_list($company_id,'language_id','ASC','language');
  $data['religion_list'] = $this->User_Model->get_list($company_id,'religion_id','ASC','religion');
  $data['marital_status_list'] = $this->User_Model->get_list1('marital_status_id','ASC','marital_status');

  $member_info = $this->User_Model->get_info_array('member_id', $member_id, 'member');
  if(!$member_info){ header('location:'.base_url().'User/members_list'); }
  $data['update'] = 'update';
  $data['member_name'] = $member_info[0]['member_name'];
  $data['member_address'] = $member_info[0]['member_address'];
  $data['country_id'] = $member_info[0]['country_id'];
  $data['state_id'] = $member_info[0]['state_id'];
  $data['district_id'] = $member_info[0]['district_id'];
  $data['tahasil_id'] = $member_info[0]['tahasil_id'];
  $data['city_id'] = $member_info[0]['city_id'];
  $data['member_area'] = $member_info[0]['member_area'];
  $data['member_gender'] = $member_info[0]['member_gender'];
  $data['member_birth_date'] = $member_info[0]['member_birth_date'];
  $data['language_id'] = $member_info[0]['language_id'];
  $data['religion_id'] = $member_info[0]['religion_id'];
  $data['member_email'] = $member_info[0]['member_email'];
  $data['member_mobile'] = $member_info[0]['member_mobile'];
  $data['member_password'] = $member_info[0]['member_password'];
  $data['onbehalf_id'] = $member_info[0]['onbehalf_id'];
  $data['marital_status'] = $member_info[0]['marital_status'];
  $data['cast_id'] = $member_info[0]['cast_id'];
  $data['member_addedby'] = $user_id;

  $this->load->view('Include/head',$data);
  $this->load->view('Include/navbar',$data);
  $this->load->view('User/members',$data);
  $this->load->view('Include/footer',$data);
}

public function delete_members($member_id){
  $user_id = $this->session->userdata('user_id');
  $company_id = $this->session->userdata('company_id');
  $role_id = $this->session->userdata('role_id');
  if($user_id==null && $company_id == null ){ header('location:'.base_url().'User'); }
  $this->User_Model->delete_info('member_id', $member_id, 'member');
  header('location:'.base_url().'User/members_list');
}

// public function members_profile(){
//   $this->load->view('Include/head');
//   $this->load->view('Include/navbar');
//   $this->load->view('User/members_profile');
//   $this->load->view('Include/footer');
// }

/****************************************************************************************************/
  // Check Duplication
  public function check_duplication(){
    $column_name = $this->input->post('column_name');
    $column_val = $this->input->post('column_val');
    $table_name = $this->input->post('table_name');
    $company_id = '';
    $cnt = $this->User_Model->check_dupli_num($company_id,$column_val,$column_name,$table_name);
    echo $cnt;
  }
}
?>
