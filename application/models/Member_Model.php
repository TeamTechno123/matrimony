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

  // Used In 1. Member/active_full_profile,
  public function get_interest($from_member_id,$to_member_id,$select_field){
    $this->db->select($select_field);
    $this->db->from('interest');
    if($from_member_id != ''){
      $this->db->where('from_member_id',$from_member_id);
    }
    if($to_member_id != ''){
      $this->db->where('to_member_id',$to_member_id);
    }

    $query = $this->db->get();
    if($from_member_id != '' && $to_member_id != ''){
      $result = $query->result_array();
    } else{
      $result = $query->result();
    }

    return $result;
  }

  // Used In 1. Member/active_full_profile,
  public function get_shortlist($from_member_id,$to_member_id,$select_field){
    $this->db->select($select_field);
    $this->db->from('shortlist');
    if($from_member_id != ''){
      $this->db->where('from_member_id',$from_member_id);
    }
    if($to_member_id != ''){
      $this->db->where('to_member_id',$to_member_id);
    }

    $query = $this->db->get();
    if($from_member_id != '' && $to_member_id != ''){
      $result = $query->result_array();
    } else{
      $result = $query->result();
    }
    return $result;
  }

  // Used In 1. Member/active_full_profile,
  public function get_interest_member_list($from_member_id,$to_member_id){
    $this->db->select('interest.*,member.*,country.*,state.*,district.*,tahasil.*,city.*,language.*,religion.*,onbehalf.*,cast.*,marital_status.*,sub_cast.*,blood_group.*,body_type.*,complexion.*,diet.*,education.*,family_status.*,family_type.*,family_value.*,gothram.*,height.*,income.*,income.*,moonsign.*,occupation.*,resident_status.*');
    $this->db->from('interest');

    if($from_member_id != ''){
      $this->db->where('interest.from_member_id',$from_member_id);
    }
    if($to_member_id != ''){
      $this->db->where('interest.to_member_id',$to_member_id);
    }

    if($from_member_id != ''){
      $this->db->join('member','interest.to_member_id = member.member_id','LEFT');
    }
    if($to_member_id != ''){
      $this->db->join('member','interest.from_member_id = member.member_id','LEFT');
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
    return $result;
    // return $q;
  }

  public function accept_interest($from_member_id,$to_member_id){
    $this->db->where('from_member_id',$from_member_id);
    $this->db->where('to_member_id',$to_member_id);
    $this->db->set('interest_status','1');
    $this->db->update('interest');
  }
}
?>
