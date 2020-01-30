<?php
class Member_Model extends CI_Model{
  public function send_sms($mobile_no,$message){
    $url = "http://sms.amplusys.com/SecureApi.aspx?usr=dipak&key=236616E2-B077-4BD5-81FE-06D32AF5153A&smstype=TextSMS&to=".$mobile_no."&msg=".$message."&rout=Transactional&from=BSHADI";
    //Curl Start
    $ch  =  curl_init();
    $timeout  =  30;
    curl_setopt ($ch,CURLOPT_URL, $url) ;
    curl_setopt ($ch,CURLOPT_RETURNTRANSFER, 1);
    curl_setopt ($ch,CURLOPT_CONNECTTIMEOUT, $timeout) ;
    $response = curl_exec($ch) ;
    curl_close($ch) ;
    //Write out the response
    // die($response);
    // return $url;
  }


  function check_login($email, $password){
    $query = $this->db->select('*')
      ->where('member_mobile', $email)
      ->where('member_password', $password)
      // ->where('member_password', $password)
      ->from('member')
      ->get();
    $result = $query->result_array();
    return $result;
  }

  public function verify_otp($otp_member_id,$member_otp){
    $this->db->select('member_id');
    $this->db->from('member');
    $this->db->where('member_id',$otp_member_id);
    $this->db->where('member_otp',$member_otp);
    $query = $this->db->get();
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
      // $this->db->where('member.member_status ',$status);
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

  public function accept_interest($from_member_id,$to_member_id,$interest){
    $this->db->where('from_member_id',$from_member_id);
    $this->db->where('to_member_id',$to_member_id);
    $this->db->set('interest_status',$interest);
    // $this->db->set('interest_status',0);
    $this->db->update('interest');
  }

  public function masseges_member_list($member_id){
    $this->db->select('message.to_member_id,member.*,country.*,state.*,district.*,tahasil.*,city.*,language.*,religion.*,onbehalf.*,cast.*,marital_status.*,sub_cast.*,blood_group.*,body_type.*,complexion.*,diet.*,education.*,family_status.*,family_type.*,family_value.*,gothram.*,height.*,income.*,moonsign.*,occupation.*,resident_status.*');
    $this->db->from('message');
    // $this->db->where('from_member_id = '.$member_id.' OR to_member_id = '.$member_id);
    $this->db->where('message.from_member_id',$member_id);
    $this->db->group_by('message.to_member_id');

    $this->db->join('member','message.to_member_id = member.member_id','LEFT');
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
    // $q = $this->db->last_query();
    return $result;
    // return $q;
  }

  public function masseges_list($from_member_id,$to_member_id){
    $sql = "select * from message where (from_member_id = ".$from_member_id." AND to_member_id = ".$to_member_id.") OR (from_member_id = ".$to_member_id." AND to_member_id = ".$from_member_id.")";
    $query = $this->db->query($sql);
    $result = $query->result();
    return $result;
  }

  /***************************************** Search Member ********************************/
  public function search_member_list($gender,$min_age,$max_age,$min_height,$max_height,$marital_status_id,$occupation_id,$city_id,$language_id,$religion_id,$cast_id,$state_id,$district_id,$education_id,$diet_id){
    $this->db->select('member.*,country.*,state.*,district.*,tahasil.*,city.*,language.*,religion.*,onbehalf.*,cast.*,marital_status.*,sub_cast.*,blood_group.*,body_type.*,complexion.*,diet.*,education.*,family_status.*,family_type.*,family_value.*,gothram.*,height.*,income.*,income.*,moonsign.*,occupation.*,resident_status.*');
    $this->db->from('member');

    if($gender != ''){
      $this->db->where('member.member_gender !=',$gender);
    }
    if($marital_status_id != ''){
      $this->db->where('member.member_status','active');
    }
    if($marital_status_id != ''){
      $this->db->where('member.marital_status',$marital_status_id);
    }
    if($occupation_id != ''){
      $this->db->where('member.occupation_id',$occupation_id);
    }
    if($city_id != ''){
      $this->db->where('member.city_id',$city_id);
    }
    if($language_id != ''){
      $this->db->where('member.language_id',$language_id);
    }
    if($religion_id != ''){
      $this->db->where('member.religion_id',$religion_id);
    }
    if($cast_id != ''){
      $this->db->where('member.cast_id',$cast_id);
    }
    if($state_id != ''){
      $this->db->where('member.state_id',$state_id);
    }
    if($district_id != ''){
      $this->db->where('member.district_id',$district_id);
    }
    if($education_id != ''){
      $this->db->where('member.education_id',$education_id);
    }
    if($diet_id != ''){
      $this->db->where('member.diet_id',$diet_id);
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

  /********************************** Profile Image *********************************/
  public function member_image_list($mat_member_id){
    $this->db->select('*');
    $this->db->from('member_image');
    $this->db->where('member_id',$mat_member_id);
    $query = $this->db->get();
    $result = $query->result();
    $q = $this->db->last_query();
    // return $q;
    return $result;
  }

  /******************************** Advertisement ***************************/
  public function get_advertisement($page,$today,$type,$loc_id){
    $this->db->select('*');
    $this->db->from('advertisement');
    if($type == 'country'){
      $this->db->where('reach_id',1);
      $this->db->where('country_id',$loc_id);
    }
    if($type == 'state'){
      $this->db->where('reach_id',2);
      $this->db->where('state_id',$loc_id);
    }
    if($type == 'district'){
      $this->db->where('reach_id',3);
      $this->db->where('district_id',$loc_id);
    }
    $this->db->where("str_to_date(adv_from_date,'%d-%m-%Y') <= str_to_date('$today','%d-%m-%Y')");
    $this->db->where("str_to_date(adv_to_date,'%d-%m-%Y') >= str_to_date('$today','%d-%m-%Y')");

    // $this->db->where("str_to_date('$today','%d-%m-%Y') BETWEEN str_to_date('$from_date','%d-%m-%Y') AND str_to_date('$to_date','%d-%m-%Y')");
    $this->db->where('adv_page',$page);
    $this->db->order_by('adv_id', 'RANDOM');
    $this->db->limit(1);
    $query = $this->db->get();
    $result = $query->result_array();
    $q = $this->db->last_query();
    // return $q;
    return $result;
  }
}
?>
