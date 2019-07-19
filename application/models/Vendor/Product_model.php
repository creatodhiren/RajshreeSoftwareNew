<?php
class Product_model extends CI_Model {

    function getProductList(){
     $this->db->select('tpd.id,tpd.product_name,tpd.product_type,tpd.grade,tpd.design,tpd.thickness,tpd.width,tpd.height,tpd.category_id,tpod.option_id,tpc.category_name,tpo.option_name');
    $this->db->from('tbl_product_details tpd');
    $this->db->join('tbl_product_option_details tpod','tpd.id=tpod.product_id');
    $this->db->join('tbl_product_category tpc','tpd.category_id=tpc.id');
    $this->db->join('tbl_product_option tpo','tpod.option_id=tpo.option_id');
    $this->db->where('tpd.status','Active');
	$this->db->group_by('tpd.product_name');
    $query = $this->db->get(); 
    return $query->result_array();   
    }
	/*******select product design name************/
	function getProductDesignNameById($id){
     $this->db->select('*');
    $this->db->from('tbl_product_option');
	$this->db->where('option_id=',$id);
   // $this->db->where('option_class','Color');
    $query = $this->db->get(); 
    return $query->result_array();   
    }
	/******end product design name************/

 function poSave(){
     
	$login_data = $this->session->userdata('login_data'); 
    //print_r($login_data);
	$login_id = $login_data[0]['id'];
	$user_id = $login_data[0]['user_id'];
    $login_role = $login_data[0]['role'];

$salseexe_id = $this->input->post('salseexe_id');
$dealer_id = $this->input->post('dealer_id');

$po_total = $this->input->post('po_total');

if($login_role == 'Zonal Head'){
    $zonal_id=$login_id;
    $vendor_id = $dealer_id;
    $salseexe_id = $salseexe_id;
}elseif($login_role == 'Sales Executive'){
    $zonal_id=0;
    $vendor_id = $dealer_id;
    $salseexe_id = $login_id;
}elseif($login_role == 'Dealer'){
    $zonal_id=0;
    $vendor_id = $user_id;
    $salseexe_id=0;
}


/**********Fetch po in database and genrate new id***********/
  $this->db->select('*');
  $this->db->from('tbl_purchase_order');
  $this->db->order_by('id','desc');
  $this->db->limit(1);
   $query = $this->db->get(); 
$last_record=$query->result_array();
if(empty($last_record)){
  $purchase_order_id ='PO/'.$login_id.'/'.date('Y-m-d').'/01';
}else{
  $start = '01';
 $in_no =  $last_record[0]['id'] + $start;
 $purchase_order_id ='PO/'.$login_id.'/'.date('Y-m-d').'/'.$in_no;
}
 	$product_id = $this->input->post('product_id');
 	$quantity = $this->input->post('quantity');
	$product_name = $this->input->post('product_name');
	$product_type = $this->input->post('product_type');
	$product_size = $this->input->post('product_size');
	$product_color = $this->input->post('product_color');
	$product_grade = $this->input->post('product_grade');
	$product_design = $this->input->post('product_design');
	$price = $this->input->post('price');
	$total_price = $this->input->post('total_price');
   

   $date=date("Y-m-d");
 	$insarr = array(
     'purchase_order_id'=>$purchase_order_id,
 		 'vendor_id'=>$vendor_id,
 		 'salseexecutive_id'=>$salseexe_id,
 		 'zonal_id'=>$zonal_id,
         'sub_total'=>$po_total,
 		 'po_date'=>$date,
 		 'status' =>'pending',
 		 'status_date'=>$date
 	             );
 	$insert = $this->db->insert('tbl_purchase_order',$insarr);
 	$insert_id = $this->db->insert_id();
   $count = count($this->input->post('product_id'));

   for($x=0;$x<$count;$x++){
   	if(!empty($product_id[$x])){
      $ins = array(
                'po_id' => $insert_id,
                'product_id' => $product_id[$x],
                'quantity' => $quantity[$x],
                'prod_category' => $product_name[$x],
                'prod_type' => $product_type[$x],
                'prod_size' => $product_size[$x],
                'prod_color' => $product_color[$x],
                'prod_grade' => $product_grade[$x],
                'prod_design' => $product_design[$x],
                'rate' => $price[$x],
                'total_price' => $total_price[$x]
                  );
      $insert = $this->db->insert('tbl_po_product_details',$ins);
     }
   }
if($insert){
$messge = array('message' => 'Purchase Order Genrate successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('po', $messge);
}else{
$messge = array('message' => 'Purchase Order Not Genrate successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('po', $messge);
}


}

function poListbyid(){
 
$login_data = $this->session->userdata('login_data'); 
    //print_r($login_data);
	$login_id = $login_data[0]['id'];
    $login_name = $login_data[0]['name'];
    $user_id = $login_data[0]['user_id'];
    $login_role = $login_data[0]['role'];   
    
if($login_role == 'Dealer'){
   $condition = "tpo.vendor_id='$user_id' AND (tpo.status='pending' || tpo.status='Reject')";
}elseif($login_role == 'Sales Executive'){
    $condition = "tpo.salseexecutive_id='$login_id' AND (tpo.status='pending' || tpo.status='Reject')";
}elseif($login_role == 'Zonal Head'){
    $condition = "tpo.zonal_id='$login_id' AND (tpo.status='pending' || tpo.status='Reject')";
}     

  //echo $id;exit;
$this->db->select('tpo.*,tmu.name,tmu.segment');
$this->db->from('tbl_purchase_order tpo');

$this->db->join('tbl_manage_user tmu','tmu.user_id=tpo.vendor_id');
//$this->db->where('tpo.vendor_id',$id);

$this->db->where($condition);
//$this->db->where('tpo.status','Reject');
$this->db->order_by("tpo.id", "desc");
$query = $this->db->get(); 
return $query->result_array();
}
function SOListbyid($id){
    $login_data = $this->session->userdata('login_data');
    $id = $login_data[0]['user_id'];
    $login_role = $login_data[0]['role'];
if($login_role == 'Dealer'){
$this->db->select('tpp.*,tmu.name,tmu.mobile,tmu.segment,tso.sales_order_id,tso.total');
$this->db->from('tbl_production_process tpp');
$this->db->join('tbl_manage_user tmu','tmu.user_id=tpp.vendor_id');
$this->db->join('tbl_sales_order tso','tpp.so_id=tso.id');
$this->db->where('tso.status','pending');
$this->db->where('tpp.vendor_id',$id);
$this->db->group_by("tpp.so_id");
$this->db->order_by("tso.id", "desc");

$query = $this->db->get(); 
return $query->result_array();
}elseif($login_role == 'Zonal Head' || $login_role == 'Sales Executive'){
 $this->db->select('tpp.*,tmu.name,tmu.mobile,tmu.segment,tso.sales_order_id,tso.total');
$this->db->from('tbl_production_process tpp');
$this->db->join('tbl_manage_user tmu','tmu.user_id=tpp.vendor_id');
$this->db->join('tbl_sales_order tso','tpp.so_id=tso.id');
$this->db->where('tso.status','pending');
$this->db->group_by("tpp.so_id");
$this->db->order_by("tso.id", "desc");

$query = $this->db->get(); 
return $query->result_array();   
}

}
function vendor_see_Invoice_list($id){
    $login_data = $this->session->userdata('login_data');
    $id = $login_data[0]['user_id'];
    $login_role = $login_data[0]['role'];
  if($login_role == 'Dealer'){
  $this->db->select('*');
  $this->db->from('tbl_invoice');
  $this->db->where('vendor_id',$id);
  $this->db->order_by('id','desc');
  $query = $this->db->get(); 
  return $query->result_array();
   }elseif($login_role == 'Zonal Head' || $login_role == 'Sales Executive'){
  $this->db->select('*');
  $this->db->from('tbl_invoice');
  //$this->db->where('vendor_id',$id);
  $this->db->order_by('id','desc');
  $query = $this->db->get(); 
  return $query->result_array();
   }
}



























}