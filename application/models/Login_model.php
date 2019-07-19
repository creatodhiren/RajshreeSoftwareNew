<?php
class Login_model extends CI_Model {

    function auth(){
    
     $email = $this->input->post('email');
     $password = $this->input->post('password');
    
     $this->db->select("*");
     $this->db->from("tbl_manage_user");
     $this->db->where('email',$email);
     $this->db->where('password',$password);
     $query = $this->db->get();
          $da['login_data'] = $query->result_array();
         //$_SESSION['login_data']=$da;
     $da['login_num_row'] = $query->num_rows();
     return $da;

       
    }
    /*************Count Po For Admin Dashboard***************/
function countGotPo(){
     $this->db->select("*");
     $this->db->from("tbl_purchase_order");
     $this->db->where('status','pending');
    $query = $this->db->get();
    return $query->num_rows();
}
 function countRejectedPo(){
     $this->db->select("*");
     $this->db->from("tbl_purchase_order");
     $this->db->where('status','Reject');
    $query = $this->db->get();
    return $query->num_rows();  
 }
function countFinalInvoice(){
     $this->db->select("*");
     $this->db->from("tbl_invoice");
     //$this->db->where('status','Reject');
    $query = $this->db->get();
    return $query->num_rows();
}
function counttotalvendor(){
     $this->db->select("*");
     $this->db->from("tbl_manage_user");
     $this->db->where('role','Vendor');
    $query = $this->db->get();
    return $query->num_rows();   
}
function counttotalEmp(){
     $this->db->select("*");
     $this->db->from("tbl_manage_user");
     $this->db->where('role','Employee');
     $query = $this->db->get();
     return $query->num_rows();   
}
function counttotalsales(){
     $this->db->select("*");
     $this->db->from("tbl_manage_user");
     $this->db->where('role','Sales Executive');
     $query = $this->db->get();
     return $query->num_rows();      
}
function order_list_for_admin(){
$this->db->select('tpp.*,tmu.name,tmu.mobile');
$this->db->from('tbl_production_process tpp');
$this->db->join('tbl_manage_user tmu','tmu.user_id=tpp.vendor_id');
$this->db->where('tpp.product_status','Quality control');
$this->db->group_by("tpp.so_id");
$this->db->order_by('tpp.id','desc');
$query = $this->db->get(); 
return $query->result_array();
 
}

function pendingSO(){
     $this->db->select("*");
     $this->db->from("tbl_sales_order");
     $this->db->where('status','pending');
    $query = $this->db->get();
    return $query->num_rows();
}




}