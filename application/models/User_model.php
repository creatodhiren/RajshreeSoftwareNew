<?php
class User_model extends CI_Model {

function autosuggestionForEmp($word){
    	$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
	if($login_role == 'admin'){
	    $this->db->select("name");
     $this->db->from("tbl_manage_user");
     
      $this->db->where("name LIKE '$word%'");
      $this->db->group_start();
      $this->db->where("role=","Zonal Head");
      $this->db->or_where("role=","Sales Executive");
      $this->db->group_end();
      $query = $this->db->get();
      return $data =  $query->result_array();  
      //echo $str = $this->db->last_query();
	}elseif($login_role == 'Zonal Head'){
      $this->db->select("name");
     $this->db->from("tbl_manage_user");
     
      $this->db->where("name LIKE '$word%'");
      $this->db->where("role=","Sales Executive");
      $query = $this->db->get();
      return $data =  $query->result_array();  
      //echo $str = $this->db->last_query();
	    
	}	
     
  }
 
    function stateList(){
        $this->db->select('*');
        $this->db->from('states');
        $this->db->where('country_id','101');
        $query = $this->db->get();
     return $query->result_array();   
    }
    function getCity(){
      $state_id = $this->input->post('state_id');
    
     $this->db->select("*");
     $this->db->from("cities");
     $this->db->where("state_id",$state_id);
      $query = $this->db->get();
     return $query->result_array();  
    }
    function usersList(){
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
		
		if($login_role == 'admin'){
        $this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role !=','admin');
        $this->db->where('role !=','dealer');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
		return $query->result_array();
    }if($login_role == 'Sub Admin'){
        $this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role !=','admin');
		$this->db->where('role !=','Sub Admin');
        $this->db->where('role !=','dealer');
        $this->db->order_by("id", "desc");
        $query = $this->db->get();
		return $query->result_array();
    }elseif($login_role == 'Zonal Head'){
		$this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role !=','admin');
        $this->db->where('role !=','Zonal Head');
		$this->db->where('role !=','dealer');
		$this->db->where('parent_id=',$login_id);
		$this->db->order_by("id", "desc");
        $query = $this->db->get();
		return $query->result_array();	
		}
    }
	/******select sales executive******/
	function zonalHeadList(){
        $this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role =','Zonal Head');
        $query = $this->db->get();
     return $query->result_array();
    }
	
	function selectRole(){
        $this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role =','zonalHead');
        $query = $this->db->get();
       return $query->row_array();
    }

    function saveAddUsers() { 
     $email = $this->input->post('email'); 
     /**********Total Invoice***********/
  $this->db->select('*');
  $this->db->from('tbl_manage_user');
  $this->db->order_by('id','desc');
  $this->db->limit(1);
  $query = $this->db->get(); 
  $last_record=$query->result_array();
   /***secssion data***/
    $login_data = $this->session->userdata('login_data'); 
   	$added_id = $login_data[0]['id'];
    $added_role = $login_data[0]['role'];
   /******/
$role = $this->input->post('role');
if(!empty($last_record)){
   if($this->input->post('role')=='Zonal Head'){ 
   
   $parent_id = $login_data[0]['id'];
   $parent_role = $login_data[0]['role'];
	
	$start = '1001';
	$in_no =  $last_record[0]['id'] + $start;
	$user_id ='ZONAH'.$in_no;
}elseif($this->input->post('role')=='Sales Executive'){
	$parent_id = $this->input->post('zonalhead');
	$parent_role ="Zonal Head";
 $start = '1001';
 $in_no =  $last_record[0]['id'] + $start;
 $user_id ='SAEX'.$in_no;   
}elseif($this->input->post('role')=='Sub Admin'){
	$parent_id = $added_id;
	$parent_role = $added_role   ;
 $start = '1001';
 $in_no =  $last_record[0]['id'] + $start;
 $user_id ='SUBADMIN'.$in_no;   
}
}
if($this->input->post('role')=='Zonal Head' || $this->input->post('role')=='Sales Executive' || $this->input->post('role')=='Sub Admin'){ 
    $gstn ='';
    $company_name='';
    $credit_limit='';
}else{
    $gstn = $this->input->post('gstn');
    $company_name = $this->input->post('company_name'); 
    $credit_limit = $this->input->post('cridit');
}

/***zonal head login**/
if($added_role == 'Zonal Head'){
   $parent_id = $login_data[0]['id'];
   $parent_role = $login_data[0]['role'];
   $role='Sales Executive';

	$start = '1000';
	$in_no =  $last_record[0]['id'] + $start;
	$user_id ='SAEX'.$in_no;  
}
/*****/
	



     $insertarr = array(
                'name' =>  $this->input->post('name'),
                'user_id'=>$user_id,
				'added_id' =>$added_id,
				'added_role' => $added_role,
				'parent_id' =>$parent_id,
				'parent_role' =>$parent_role,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' =>$role,
                'mobile' => $this->input->post('mobile'),
                'state'  => $this->input->post('state'),
                'city' =>$this->input->post('city'),
                'gstn' =>$gstn, 
                'company_name' =>$company_name ,
                'address' => $this->input->post('address'),
                'credit_limit'=>$credit_limit
                       );

     /********************Check Vendor exisit or not***********************************/
  $this->db->select('*');
  $this->db->from('tbl_manage_user');
  $this->db->where('email',$email);
  $this->db->where('role',$this->input->post('role'));
   $query = $this->db->get(); 
 $cont=$query->num_rows();
   if($cont=='0'){


     $insert = $this->db->insert('tbl_manage_user',$insertarr);
     if($insert){
        $messge = array('message' => 'User Add successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('users', $messge);
     }else{
      $messge = array('message' => 'User Not Add successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('users', $messge);
     } 
}else{
    $messge = array('message' => 'User Email Id Already Exist','class' => 'alert alert-danger');
              $this->session->set_flashdata('users', $messge);
}





     }

function editData($id){
  
        $this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('id',$id);
        $query = $this->db->get();
       // echo $this->db->last_query();
     return $query->result_array();
}
function cityList($state_id){
        $this->db->select('*');
        $this->db->from('cities');
        $this->db->where('state_id',$state_id);
        $query = $this->db->get();
        return $query->result_array();
}
function saveEditData(){
    $login_data = $this->session->userdata('login_data'); 
	//print_r($login_data);
	$login_id = $login_data[0]['id'];
	$login_role = $login_data[0]['role'];
    $up_id = $this->input->post('up_id');
    if($login_role == 'Zonal Head'){
      $role='Sales Executive';  
    }elseif($login_role == 'admin'){
      $role= $this->input->post('role');   
    }
  $uparr = array(
                'name' =>  $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' =>$role ,
                'mobile' => $this->input->post('mobile'),
                'state'  => $this->input->post('state'),
                'city' =>$this->input->post('city'),
                'gstn' => $this->input->post('gstn'),
                'company_name' => $this->input->post('company_name'),
                'address' => $this->input->post('address'),
                'credit_limit'=>$this->input->post('cridit')
                       );
                       
        $this->db->where('id', $up_id); 
      $update = $this->db->update('tbl_manage_user',$uparr);
     if($update){
        $messge = array('message' => 'User Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('users', $messge);
     }else{
      $messge = array('message' => 'User Not Update successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('users', $messge);
     }  
       
}

/******select state code******/
        
 function state($vendor_id){
     $this->db->select("*");
     $this->db->from("tbl_manage_user");
     $this->db->where("user_id",$vendor_id);
      $query = $this->db->get();
     return $query->result_array();  
    }



/******select state name******/
        
 function stateName($state_code){
     $this->db->select("*");
     $this->db->from("states");
     $this->db->where("id",$state_code);
      $query = $this->db->get();
     return $query->result_array();  
    }

function update_status($id, $tbl,$status){
      $data = array(  
      'status' => $status
      ); 
      $this->db->where('id',$id); 
      $this->db->update($tbl,$data);
}


function select_dealer_parent_name($parent_id,$tbl){
        $this->db->select('*');
        $this->db->from($tbl);
        $this->db->where('id=',$parent_id);
        $query = $this->db->get();
       return $query->row_array();
    }
 /*********select  Search for userlist**********/
function getUserListBySearch($state,$city,$dealer_name){
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
		
		if($login_role == 'admin'){
        $this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role !=','admin');
        $this->db->where('role !=','dealer');
        if(!empty($state)){
            $this->db->where('state=',$state);
         }
         if(!empty($city)){
          $this->db->where('city=',$city);
         }
         if(!empty($dealer_name)){
          $this->db->where('name=',$dealer_name);
         }
        //$this->db->order_by("id", "desc");
        $query = $this->db->get();
		return $query->result_array();
		//echo $str = $this->db->last_query();
}elseif($login_role == 'Zonal Head'){
		$this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role !=','admin');
        $this->db->where('role !=','Zonal Head');
		$this->db->where('role !=','dealer');
		$this->db->where('parent_id=',$login_id);
		if(!empty($state)){
            $this->db->where('state=',$state);
         }
         if(!empty($city)){
          $this->db->where('city=',$city);
         }
         if(!empty($dealer_name)){
          $this->db->where('name=',$dealer_name);
         }
		
        $query = $this->db->get();
		return $query->result_array();	
		 //echo $str = $this->db->last_query();
		} 
   
}


}