<?php
class Member_Model extends CI_Model{
  function check_login($email, $password){
    $query = $this->db->select('*')
        ->where('member_mobile', $email)
        ->where('member_password', $password)
        ->from('member')
        ->get();
      $result = $query->result_array();
      return $result;
  }

  public function get_member_info($member_id){
    $this->db->select('member.*,country.*,state.*,district.*,tahasil.*,city.*,language.*,religion.*,onbehalf.*,cast.*,marital_status.*,sub_cast.*,blood_group.*,body_type.*,complexion.*,diet.*,education.*,family_status.*,family_type.*,family_value.*,gothram.*,height.*,income.*,income.*,moonsign.*,occupation.*,resident_status.*');
    $this->db->from('member');
    $this->db->where('member.member_id',$member_id);
    $this->db->join('country','country.country_id = member.country_id','LEFT');
    $this->db->join('state','state.state_id = member.state_id','LEFT');
    $this->db->join('district','district.district_id = member.district_id','LEFT');
    $this->db->join('tahasil','tahasil.tahasil_id = member.tahasil_id','LEFT');
    $this->db->join('city','city.city_id = member.city_id','LEFT');
    $this->db->join('language','language.language_id = member.language_id','LEFT');
    $this->db->join('religion','religion.religion_id = member.religion_id','LEFT');
    $this->db->join('onbehalf','onbehalf.onbehalf_id = member.onbehalf_id','LEFT');
    $this->db->join('cast','cast.cast_id = member.cast_id','LEFT');
    $this->db->join('marital_status','marital_status.marital_status_id = member.marital_status','LEFT');

    $this->db->join('sub_cast','sub_cast.sub_cast_id = member.sub_cast_id','LEFT');
    $this->db->join('blood_group','blood_group.blood_group_id = member.blood_group_id','LEFT');
    $this->db->join('body_type','body_type.body_type_id = member.body_type_id','LEFT');
    $this->db->join('complexion','complexion.complexion_id = member.complexion_id','LEFT');
    $this->db->join('diet','diet.diet_id = member.diet_id','LEFT');
    $this->db->join('education','education.education_id = member.education_id','LEFT');
    $this->db->join('family_status','family_status.family_status_id = member.family_status_id','LEFT');
    $this->db->join('family_type','family_type.family_type_id = member.family_type_id','LEFT');
    $this->db->join('family_value','family_value.family_value_id = member.family_value_id','LEFT');
    $this->db->join('gothram','gothram.gothram_id = member.gothram_id','LEFT');
    $this->db->join('height','height.height_id = member.height_id','LEFT');
    $this->db->join('income','income.income_id = member.income_id','LEFT');
    $this->db->join('moonsign','moonsign.moonsign_id = member.moonsign_id','LEFT');
    $this->db->join('occupation','occupation.occupation_id = member.occupation_id','LEFT');
    $this->db->join('resident_status','resident_status.resident_status_id = member.resident_status_id','LEFT');

    $query = $this->db->get();
    $result = $query->result_array();
    $q = $this->db->last_query();
    // return $q;
    return $result;
  }

  public function active_members_list($gender,$status){
    $this->db->select('member.*,country.*,state.*,district.*,tahasil.*,city.*,language.*,religion.*,onbehalf.*,cast.*,marital_status.*,sub_cast.*,blood_group.*,body_type.*,complexion.*,diet.*,education.*,family_status.*,family_type.*,family_value.*,gothram.*,height.*,income.*,income.*,moonsign.*,occupation.*,resident_status.*');
    $this->db->from('member');

    if($gender != ''){
      $this->db->where('member.member_gender !=',$gender);
    }
    if($status != ''){
      $this->db->where('member.marital_status !=',$status);
    }

    $this->db->join('country','country.country_id = member.country_id','LEFT');
    $this->db->join('state','state.state_id = member.state_id','LEFT');
    $this->db->join('district','district.district_id = member.district_id','LEFT');
    $this->db->join('tahasil','tahasil.tahasil_id = member.tahasil_id','LEFT');
    $this->db->join('city','city.city_id = member.city_id','LEFT');
    $this->db->join('language','language.language_id = member.language_id','LEFT');
    $this->db->join('religion','religion.religion_id = member.religion_id','LEFT');
    $this->db->join('onbehalf','onbehalf.onbehalf_id = member.onbehalf_id','LEFT');
    $this->db->join('cast','cast.cast_id = member.cast_id','LEFT');
    $this->db->join('marital_status','marital_status.marital_status_id = member.marital_status','LEFT');

    $this->db->join('sub_cast','sub_cast.sub_cast_id = member.sub_cast_id','LEFT');
    $this->db->join('blood_group','blood_group.blood_group_id = member.blood_group_id','LEFT');
    $this->db->join('body_type','body_type.body_type_id = member.body_type_id','LEFT');
    $this->db->join('complexion','complexion.complexion_id = member.complexion_id','LEFT');
    $this->db->join('diet','diet.diet_id = member.diet_id','LEFT');
    $this->db->join('education','education.education_id = member.education_id','LEFT');
    $this->db->join('family_status','family_status.family_status_id = member.family_status_id','LEFT');
    $this->db->join('family_type','family_type.family_type_id = member.family_type_id','LEFT');
    $this->db->join('family_value','family_value.family_value_id = member.family_value_id','LEFT');
    $this->db->join('gothram','gothram.gothram_id = member.gothram_id','LEFT');
    $this->db->join('height','height.height_id = member.height_id','LEFT');
    $this->db->join('income','income.income_id = member.income_id','LEFT');
    $this->db->join('moonsign','moonsign.moonsign_id = member.moonsign_id','LEFT');
    $this->db->join('occupation','occupation.occupation_id = member.occupation_id','LEFT');
    $this->db->join('resident_status','resident_status.resident_status_id = member.resident_status_id','LEFT');

    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    // return $q;
    return $result;
  }
}
?>
