<?php
class Production_model extends CI_Model {

function productionList(){
$this->db->select('tpp.*,tmu.name,tmu.mobile');
$this->db->from('tbl_production_process tpp');
$this->db->join('tbl_manage_user tmu','tmu.user_id=tpp.vendor_id');
$this->db->where('tpp.product_status','Quality control');
$this->db->group_by("tpp.so_id");
$query = $this->db->get(); 
return $query->result_array();
}
function productListFromProduction($so_id){
	/*$this->db->select('tpp.*,tpd.product_name,tpd.category_id,tpd.height,tpd.width,tpd.thickness,tpc.category_name');
	$this->db->from('tbl_production_process tpp');
	$this->db->join('tbl_product_details tpd','tpd.id=tpp.product_id');
	$this->db->join('tbl_product_category tpc','tpc.id=tpd.category_id');
	$this->db->where('tpp.so_id',$so_id);
	//
	$this->db->order_by('tpp.id','desc');
	//$this->db->group_by('tpp.quantity');
	$query = $this->db->get(); 
    return $query->result_array();*/
    $query = $this->db->query("SELECT c.*,tpc.category_name FROM tbl_product_category tpc RIGHT JOIN(SELECT b.*,tpd.product_name,tpd.category_id,tpd.height,tpd.width,tpd.thickness from tbl_product_details tpd RIGHT JOIN (Select * FROM tbl_production_process as tps INNER JOIN (SELECT max(id) as ids FROM `tbl_production_process` where so_id ='".$so_id."' GROUP by product_id)a on tps.id=a.ids)b ON tpd.id=b.product_id)c ON tpc.id=c.category_id")->result_array();
    return $query;
}

function getproductlist12($id){

  $this->db->select('*');
  $this->db->from('tbl_production_process');
  $this->db->where('id',$id);
  $query = $this->db->get(); 
  return $query->result_array();
}


function insertproductlist12($table,$arr){

  $insert = $this->db->insert($table,$arr); 
   if($insert){
        $messge = array('message' => 'Status Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('category', $messge);
     }else{
      $messge = array('message' => 'User Not Update successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('category', $messge);
     }  
  
}

function product_listing_for_production($id){

  $this->db->select('*');
  $this->db->from('tbl_production_process');
  $this->db->where('id',$id);
  $query = $this->db->get(); 
  $data = $query->result_array();

 $this->db->select('*');
 $this->db->from('tbl_production_process');
 $this->db->where('so_id',$data[0]['so_id']);
 $this->db->where('vendor_id',$data[0]['vendor_id']);
 $this->db->where('quantity',$data[0]['quantity']);
 $this->db->where('product_id',$data[0]['product_id']);
  $query = $this->db->get(); 
return $data1 = $query->result_array();
//print_r($data1);
}







}