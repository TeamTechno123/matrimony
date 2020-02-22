<?php
  class Report_Model extends CI_Model{
    // Used in 1. Report/adv_invoice_list, 2. Report/advertise_payment_list
    public function advertise_payment_list($adv_id){
      $this->db->select('advertisement.*, advertisement_reach.*,country.*,state.*,district.*,user.*');
      $this->db->from('advertisement');
      if($adv_id != ''){
        $this->db->where('advertisement.adv_id',$adv_id);
      }
      $this->db->where('advertisement.is_paid',1);

      $this->db->join('user', 'advertisement.adv_addedby = user.user_id', 'LEFT');
      $this->db->join('advertisement_reach', 'advertisement.reach_id = advertisement_reach.reach_id', 'LEFT');
      $this->db->join('country', 'advertisement.country_id = country.country_id', 'LEFT');
      $this->db->join('state', 'advertisement.state_id = state.state_id', 'LEFT');
      $this->db->join('district', 'advertisement.district_id = district.district_id', 'LEFT');
      $query = $this->db->get();
      $q = $this->db->last_query();
      $result = $query->result();
      return $result;
      // return $q;
    }

/*********************************** Franchise Report ***************************************/

  public function member_commission_list($mat_user_id){
    $this->db->select('commission.*, member.*,country.*,state.*,district.*,tahasil.*,city.*');
    $this->db->from('commission');
    if($mat_user_id != ''){
      $this->db->where('commission.commission_to_user_id',$mat_user_id);
    }

    $this->db->join('member', 'commission.commission_from_member_id = member.member_id', 'LEFT');
    $this->db->join('country', 'member.country_id = country.country_id', 'LEFT');
    $this->db->join('state', 'member.state_id = state.state_id', 'LEFT');
    $this->db->join('district', 'member.district_id = district.district_id', 'LEFT');
    $this->db->join('tahasil', 'member.tahasil_id = tahasil.tahasil_id', 'LEFT');
    $this->db->join('city', 'member.city_id = city.city_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

  public function adv_commission_list($mat_user_id){
    $this->db->select('adv_commission.*, advertisement.*,country.*,state.*,district.*,advertisement_reach.*');
    $this->db->from('adv_commission');
    if($mat_user_id != ''){
      $this->db->where('adv_commission.adv_commission_to_user_id',$mat_user_id);
    }

    $this->db->join('advertisement', 'adv_commission.adv_id = advertisement.adv_id', 'LEFT');
    $this->db->join('advertisement_reach', 'advertisement.reach_id = advertisement_reach.reach_id', 'LEFT');
    $this->db->join('country', 'advertisement.country_id = country.country_id', 'LEFT');
    $this->db->join('state', 'advertisement.state_id = state.state_id', 'LEFT');
    $this->db->join('district', 'advertisement.district_id = district.district_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }


/************************************* Invoice **********************************/
  public function member_invoice_list($member_id){
    $this->db->select('member_payment.*, member.*,country.*,state.*,district.*');
    $this->db->from('member_payment');

    if($member_id != ''){
      $this->db->where('member_payment.member_id',$member_id);
    }

    $this->db->join('member', 'member_payment.member_id = member.member_id', 'LEFT');
    $this->db->join('country', 'member.country_id = country.country_id', 'LEFT');
    $this->db->join('state', 'member.state_id = state.state_id', 'LEFT');
    $this->db->join('district', 'member.district_id = district.district_id', 'LEFT');
    $query = $this->db->get();
    $q = $this->db->last_query();
    $result = $query->result();
    return $result;
    // return $q;
  }

  public function adv_invoice_list($member_id){
    $this->db->select('member_payment.*, member.*,country.*,state.*,district.*');
    $this->db->from('member_payment');

    if($member_id != ''){
      $this->db->where('member_payment.member_id',$member_id);
    }

    $this->db->join('member', 'member_payment.member_id = member.member_id', 'LEFT');
    $this->db->join('country', 'member.country_id = country.country_id', 'LEFT');
    $this->db->join('state', 'member.state_id = state.state_id', 'LEFT');
    $this->db->join('district', 'member.district_id = district.district_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

/********************************************* Franchise ******************************************/
  // Used In 1. Report/franchise_list, 2. Report/franchise_member_commission_list
  public function franchise_list($mat_user_id,$franchise_type_id){
    $this->db->select('franchise.*,franchise.user_id as fra_user_id, franchise_type.*,country.*,state.*,district.*,tahasil.*');
    $this->db->from('franchise');
    if($mat_user_id !=''){
      $this->db->where('franchise.franchise_addedby',$mat_user_id);
    }
    if($franchise_type_id !=''){
      $this->db->where('franchise.franchise_type_id',$franchise_type_id);
    }
    $this->db->join('franchise_type', 'franchise.franchise_type_id = franchise_type.franchise_type_id', 'LEFT');
    $this->db->join('country', 'franchise.country_id = country.country_id', 'LEFT');
    $this->db->join('state', 'franchise.state_id = state.state_id', 'LEFT');
    $this->db->join('district', 'franchise.district_id = district.district_id', 'LEFT');
    $this->db->join('tahasil', 'franchise.tahasil_id = tahasil.tahasil_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }

/********************************* Member *****************************************/
  // Used In 1. Report/franchise_list, 2. Report/franchise_member_commission_list
  public function member_list_report($state_id,$district_id,$tahasil_id,$city_id,$status){
    $this->db->select('member.*,country.*,state.*,district.*,tahasil.*,city.*');
    $this->db->from('member');
    if($state_id !=''){
      $this->db->where('member.state_id',$state_id);
    }
    if($district_id !=''){
      $this->db->where('member.district_id',$district_id);
    }
    if($tahasil_id !=''){
      $this->db->where('member.tahasil_id',$tahasil_id);
    }
    if($city_id !=''){
      $this->db->where('member.city_id',$city_id);
    }
    $this->db->join('country', 'member.country_id = country.country_id', 'LEFT');
    $this->db->join('state', 'member.state_id = state.state_id', 'LEFT');
    $this->db->join('district', 'member.district_id = district.district_id', 'LEFT');
    $this->db->join('tahasil', 'member.tahasil_id = tahasil.tahasil_id', 'LEFT');
    $this->db->join('city', 'member.city_id = city.city_id', 'LEFT');
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
}
?>
