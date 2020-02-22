<?php
class API_Model extends CI_Model{
  public function verify_otp($member_id,$member_otp){
    $this->db->select('member_id');
    $this->db->where('member_id', $member_id);
    $this->db->where('member_otp', $member_otp);
    $this->db->from('member');
    $query = $this->db->get();
    $result = $query->result_array();
    return $result;
  }

  public function get_advertisement(){
    $this->db->select('*');
    $this->db->from('advertisement');
    $this->db->where('adv_status','active');
    // $this->db->where('is_paid',1);
    $this->db->order_by('adv_id', 'RANDOM');
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result();
    return $result;
  }
}
?>
