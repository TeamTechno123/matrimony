<?php
class User_Model extends CI_Model{

  function check_login($email, $password){
    $query = $this->db->select('*')
        ->where('user_mobile', $email)
        ->where('user_password', $password)
        ->from('user')
        ->get();
      $result = $query->result_array();
      return $result;
  }

  public function save_data($tbl_name, $data){
    $this->db->insert($tbl_name, $data);
    $insert_id = $this->db->insert_id();
    return  $insert_id;
  }

  public function get_list($company_id,$id,$order,$tbl_name){
    $query = $this->db->select('*')
            ->where('company_id', $company_id)
            ->order_by($id, $order)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_list1($id,$order,$tbl_name){
    $query = $this->db->select('*')
            ->order_by($id, $order)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_info($id_type, $id, $tbl_name){
    $query = $this->db->select('*')
            ->where($id_type, $id)
            ->from($tbl_name)
            ->get();
    $result = $query->result();
    return $result;
  }

  public function get_info_array($id_type, $id, $tbl_name){
    $query = $this->db->select('*')
            ->where($id_type, $id)
            ->from($tbl_name)
            ->get();
    $result = $query->result_array();
    return $result;
  }

  public function update_info($id_type, $id, $tbl_name, $data){
    $this->db->where($id_type, $id)
    ->update($tbl_name, $data);
  }

  public function delete_info($id_type, $id, $tbl_name){
    $this->db->where($id_type, $id)
    ->delete($tbl_name);
  }

  public function check_duplication($company_id,$value,$field_name,$table_name){
    $this->db->select($field_name);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query =  $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function check_dupli_num($company_id,$value,$field_name,$table_name){
    $this->db->select($field_name);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query = $this->db->get();
    $num = $query->num_rows();
    return $num;
  }

  public function get_list_by_id($select_fields,$field_name,$value,$table_name){
    $this->db->select($select_fields);
    $this->db->where($field_name,$value);
    $this->db->from($table_name);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


  public function get_state_list($company_id){
  $query = $this->db->select('state.*, country.*')
  ->from('state')
  ->where('state.company_id', $company_id)
   ->join('country', 'state.country_id = country.country_id', 'LEFT')
   ->get();
   $result = $query->result();
   return $result;
  }

  public function get_district_list($company_id){
  $query = $this->db->select('state.*, country.*,district.*')
  ->from('district')
  ->where('district.company_id', $company_id)
    ->join('state', 'district.state_id = state.state_id', 'LEFT')
   ->join('country', 'district.country_id = country.country_id', 'LEFT')
   ->get();
   $result = $query->result();
   return $result;
  }

  public function get_district_info($company_id, $id){
  $query = $this->db->select('state.*, country.*,district.*')
  ->from('district')
  ->where('district.company_id', $company_id)
  ->where('district.district_id', $id)
    ->join('state', 'district.state_id = state.state_id', 'LEFT')
   ->join('country', 'district.country_id = country.country_id', 'LEFT')
   ->get();
   $result = $query->result();
   return $result;
  }

  public function get_tahasil_list($company_id){
  $query = $this->db->select('state.*, country.*, district.*, tahasil.*')
  ->from('tahasil')
  ->where('tahasil.company_id', $company_id)
   ->join('state', 'tahasil.state_id = state.state_id', 'LEFT')
   ->join('district', 'tahasil.district_id = district.district_id', 'LEFT')
   ->join('country', 'tahasil.country_id = country.country_id', 'LEFT')
   ->get();
   $result = $query->result();
   return $result;
  }

  public function get_tahasil_info($company_id, $id){
  $query = $this->db->select('state.*, country.*,tahasil.*')
  ->from('tahasil')
  ->where('tahasil.company_id', $company_id)
  ->where('tahasil.tahasil_id', $id)
  ->join('state', 'tahasil.state_id = state.state_id', 'LEFT')
  ->join('district', 'tahasil.district_id = district.district_id', 'LEFT')
  ->join('country', 'tahasil.country_id = country.country_id', 'LEFT')
  ->get();
   $result = $query->result();
   return $result;
  }

  public function get_city_list($company_id){
  $query = $this->db->select('state.*, country.*,district.*,tahasil.*,city.*')
  ->from('city')
  ->where('city.company_id', $company_id)
  ->join('state', 'city.state_id = state.state_id', 'LEFT')
  ->join('district', 'city.district_id = district.district_id', 'LEFT')
  ->join('tahasil', 'city.tahasil_id = tahasil.tahasil_id', 'LEFT')
   ->join('country', 'city.country_id = country.country_id', 'LEFT')
   ->get();
   $result = $query->result();
   return $result;
  }

  public function get_city_info($company_id, $id){
$query = $this->db->select('state.*, country.*,district.*,tahasil.*,city.*')
  ->from('city')
  ->where('city.company_id', $company_id)
  ->where('city.city_id', $id)
  ->join('state', 'city.state_id = state.state_id', 'LEFT')
  ->join('district', 'city.district_id = district.district_id', 'LEFT')
  ->join('tahasil', 'city.tahasil_id = tahasil.tahasil_id', 'LEFT')
   ->join('country', 'city.country_id = country.country_id', 'LEFT')
   ->get();
   $result = $query->result();
   return $result;
  }

  public function get_cast_list($company_id){
    $query = $this->db->select('cast.*, religion.*')
    ->from('cast')
    ->where('cast.company_id', $company_id)
     ->join('religion', 'cast.religion_id = religion.religion_id', 'LEFT')
     ->get();
     $result = $query->result();
     return $result;
    }


    public function get_subcast_list($company_id){
      $query = $this->db->select('cast.*, religion.*,sub_cast.*')
      ->from('sub_cast')
      ->where('sub_cast.company_id', $company_id)
      // ->where('sub_cast.sub_cast_id', $id)
       ->join('religion', 'sub_cast.religion_id = religion.religion_id', 'LEFT')
       ->join('cast', 'sub_cast.cast_id = cast.cast_id', 'LEFT')
       ->get();
       $result = $query->result();
       return $result;
      }

    public function get_subcast_info($company_id, $id){
      $query = $this->db->select('cast.*, religion.*,sub_cast.*')
      ->from('sub_cast')
      ->where('sub_cast.company_id', $company_id)
      ->where('sub_cast.sub_cast_id', $id)
       ->join('religion', 'sub_cast.religion_id = religion.religion_id', 'LEFT')
       ->join('cast', 'sub_cast.cast_id = cast.cast_id', 'LEFT')
       ->get();
       $result = $query->result();
       return $result;
    }

    public function user_list($company_id){
      $query = $this->db->select('*')
      ->from('user')
      ->where('is_admin', 0)
       ->get();
       $result = $query->result();
       return $result;
    }

    public function get_staff_roll(){
      $query = $this->db->select('*')
      ->from('role')
      ->where('role_id = 2 OR role_id = 3')
       ->get();
       $result = $query->result();
       return $result;
    }

    public function get_subdealer_list($company_id,$user_id){
      $this->db->select('*');
      $this->db->from('franchise');
      if($user_id != ''){
        $this->db->where('franchise_addedby',$user_id);
      }
      $this->db->order_by('franchise_id', 'DESC');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    // Used in 1. Admin Member List, 2. Wbsite Lead list,
    public function get_member_list_by_user($company_id,$mat_user_id){
      $this->db->select('*');
      $this->db->from('member');
      if($mat_user_id != ''){
        $this->db->where('member_addedby',$mat_user_id);
      }
      $this->db->order_by('member_id', 'DESC');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }
    // Used in 1. Admin Member List, 2. Wbsite Lead list,
    public function get_commission_by_mem_user($mat_member_user_id,$member_id){
      $this->db->select('*');
      $this->db->from('commission');
      if($mat_member_user_id != ''){
        $this->db->where('commission_to_user_id',$mat_member_user_id);
      }
      if($member_id != ''){
        $this->db->where('commission_from_member_id',$member_id);
      }
      $query = $this->db->get();
      $result = $query->result_array();
      return $result;
    }

    public function get_adv_list_by_user($company_id,$mat_user_id){
      $this->db->select('*');
      $this->db->from('advertisement');
      if($mat_user_id != ''){
        $this->db->where('adv_addedby',$mat_user_id);
      }
      $this->db->order_by('adv_id', 'DESC');
      $query = $this->db->get();
      $result = $query->result();
      return $result;
    }

    public function tot_commission($field_name,$user_id){
      $this->db->select('SUM('.$field_name.') as tot_mem_comm');
      $this->db->from('commission');
      $this->db->where('commission_to_user_id',$user_id);
      $query = $this->db->get();
      $result = $query->result_array();
      if($result[0]['tot_mem_comm'] == ''){
        $amt = 0;
      } else{
        $amt = $result[0]['tot_mem_comm'];
      }
      return $amt;
    }

    public function tot_adv_commission($field_name,$user_id){
      $this->db->select('SUM('.$field_name.') as tot_adv_comm');
      $this->db->from('adv_commission');
      $this->db->where('adv_commission_to_user_id',$user_id);
      $query = $this->db->get();
      $result = $query->result_array();
      if($result[0]['tot_adv_comm'] == ''){
        $amt = 0;
      } else{
        $amt = $result[0]['tot_adv_comm'];
      }
      return $amt;
    }

    public function tot_adv_amount($field_name,$user_id){
      $this->db->select('SUM('.$field_name.') as tot_adv_amt');
      $this->db->from('advertisement');
      $this->db->where('adv_addedby',$user_id);
      $this->db->where('is_paid',1);
      $query = $this->db->get();
      $result = $query->result_array();
      if($result[0]['tot_adv_amt'] == ''){
        $amt = 0;
      } else{
        $amt = $result[0]['tot_adv_amt'];
      }
      return $amt;
    }
/************************************** Dashboard **************************************/

  public function get_count($id_type,$company_id,$added_by,$mat_user_id,$status_col,$status_key,$tbl_name){
    $this->db->select($id_type);
    if($company_id != ''){
      $this->db->where('company_id', $company_id);
    }
    if($added_by != ''){
      $this->db->where($added_by, $mat_user_id);
    }
    if($status_col != ''){
      $this->db->where($status_col, $status_key);
    }

    $this->db->from($tbl_name);
      $query =  $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

  public function get_franchise_count_by_type($franchise_type_id){
    $this->db->select('franchise_id');
    $this->db->from('franchise');
    $this->db->where('franchise_type_id', $franchise_type_id);
    $query = $this->db->get();
    $result = $query->num_rows();
    return $result;
  }

/**************************************************************/
  public function pay_franchise_info($franchise_type_id,$location_type,$location_id,$tbl_name){
    $query = $this->db->select('*')
            ->where('franchise_type_id', $franchise_type_id)
            ->where($location_type, $location_id)
            ->from($tbl_name)
            ->get();
    $result = $query->result_array();
    return $result;
  }





}?>
