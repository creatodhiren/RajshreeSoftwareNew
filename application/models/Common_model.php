 <?php
class Common_model extends CI_Model {

function delete($id,$table,$option_id){
 $this->db->where($option_id,$id);
      $del = $this->db->delete($table); 
      if($del){
      return true;
  }else{
  	return false;
  }


}

function productdelete($id){
$this->db->where('id',$id);
      $del1 = $this->db->delete('tbl_product_details');
$this->db->where('product_id',$id);
      $del = $this->db->delete('tbl_product_option_details');


      if($del){
      return true;
  }else{
  	return false;
  }

}

function getproductpodata(){
  $id = $this->input->post('id');
  $this->db->select('*');
  $this->db->from('tbl_product_details');
  $this->db->where("product_name",$id);
  //$this->db->group_by($val);
  $query = $this->db->get(); 
  return $query->result_array();
  
}
function getproductpodataid(){
  $product_name = $this->input->post('id');
  $this->db->select('*');
  $this->db->from('tbl_product_details');
  $this->db->where("product_name",$product_name);
  $query = $this->db->get(); 
  return $query->result_array();
  
}

function getproductlist($id){

  $this->db->select('tppd.rate,tppd.product_id,tppd.quantity,tppd.prod_size,tppd.prod_category,tppd.prod_thick,tpd.category_id,tpc.category_name');
  $this->db->from('tbl_po_product_details tppd');
  $this->db->join('tbl_product_details tpd','tppd.product_id=tpd.id');
  $this->db->join('tbl_product_category tpc','tpd.category_id=tpc.id');
  $this->db->where('tppd.po_id',$id);
  $query = $this->db->get(); 
  return $query->result_array();
  
  
}


  
  
function getproductlistFromSale($id){
 $this->db->select('tspo.product_id,tspo.quantity,tpd.product_name,tpd.width,tpd.height,tpd.thickness,tpd.category_id,tpc.category_name');
  $this->db->from('tbl_sales_product_order tspo');
  $this->db->join('tbl_product_details tpd','tspo.product_id=tpd.id');
  $this->db->join('tbl_product_category tpc','tpd.category_id=tpc.id');
  $this->db->where('tspo.so_id',$id);
  $query = $this->db->get(); 
  return $query->result_array();
}
function getproductlistFromPo($id){
$this->db->select('tppd.product_id,tppd.rate,tppd.quantity,tppd.prod_category,tppd.prod_size,tppd.prod_thick,tpd.category_id,tpc.category_name');
  $this->db->from('tbl_po_product_details tppd');
  $this->db->join('tbl_product_details tpd','tppd.product_id=tpd.id');
  $this->db->join('tbl_product_category tpc','tpd.category_id=tpc.id');
  $this->db->where('tppd.po_id',$id);
  $query = $this->db->get(); 
  return $query->result_array();
  //echo $this->db->last_query();
}
function purchase_order_cancel($id){
$updata=array(
         'status'=>'Reject',
         'status_date'=>date('Y-m-d')
             );
      $this->db->where('id',$id);
      $up = $this->db->update('tbl_purchase_order',$updata);
      if($up){
        return true;
      }else{
        return false;
      }
}

function updateSaveaccount(){
   $up_id = $this->input->post('up_id');
  $uparr = array(
                'name' =>  $this->input->post('name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'mobile' => $this->input->post('mobile'),
                'state'  => $this->input->post('state'),
                'city' =>$this->input->post('city'),
                'gstn' => $this->input->post('gstn'),
                'company_name' => $this->input->post('company_name'),
                'address' => $this->input->post('address')
                                       );
    
        $this->db->where('id', $up_id); 
      $update = $this->db->update('tbl_manage_user',$uparr);
    /*  echo $this->db->last_query();
      die();*/
     if($update){
        $messge = array('message' => 'User Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('users', $messge);
     }else{
      $messge = array('message' => 'User Not Update successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('users', $messge);
     }  
   
}
function autoSuggestionchecking($search){
   $this->db->select("invoice_number as value,after_tax_amount,paid_amt,vendor_id");
        $this->db->from('tbl_invoice');
        $this->db->like('invoice_number',$search,'after');
        //$this->db->limit(20,0);
        $query = $this->db->get();     
        return $query->result();

}

function getpaymentList(){
  $invoice_no = base64_decode($this->input->post('invoice_no'));
 $this->db->select('*');
  $this->db->from('tbl_payment');
  $this->db->where('invoice_no',$invoice_no);
  
   $query = $this->db->get(); 
return $query->result_array();
}
function getproductListfromProduction($so_id){
  $query = $this->db->query('SELECT tspo.id,tspo.so_id,tppd.prod_category,tppd.rate,tppd.prod_size,tppd.prod_thick,tpc.category_name ,tpp.product_status,tppd.quantity FROM `tbl_sales_product_order` as tspo JOIN tbl_product_details as tpd ON tpd.id = tspo.product_id JOIN tbl_po_product_details as tppd ON tppd.product_id=tpd.id JOIN tbl_product_category as tpc ON tpc.id=tpd.category_id JOIN tbl_production_process as tpp ON tpp.so_id=tspo.so_id WHERE tspo.so_id='.$so_id.' GROUP BY tspo.id')->result_array();

    //echo  $sql = $this->db->last_query();
  return $query;
}
function getDealerSegment($dealerid=''){
	$login_data = $this->session->userdata('login_data'); 
	$login_id = $login_data[0]['id'];
    $login_role = $login_data[0]['role'];
	$dealer_id = $this->input->post('dealer_id');
       if($login_role == 'Dealer'){
		$dealer_id=$dealerid; 
	   }elseif($login_role != 'Dealer'){
		$dealer_id=$dealer_id;  
	   } 
	$this->db->select('*');
    $this->db->from('tbl_manage_user');
    $this->db->where('user_id=', $dealer_id);
    $query = $this->db->get(); 
    return $query->result_array();
}


function getSingleProductPrice(){
 //$sizeData =  explode(",",$this->input->post('sizeData'));
 //$product_sum_id = explode(",",$this->input->post('product_sum_id'));
 
$product_sum_id = $this->input->post('product_sum_id');
 //$query = $this->db->query("SELECT a.id as product_id,tpod.retailer_price FROM tbl_product_option_details tpod RIGHT JOIN(SELECT * FROM `tbl_product_details` WHERE product_name='".$product_sum_id[0]."' AND category_id='".$product_sum_id[1]."'AND thickness='".$sizeData[0]."')a ON a.id=tpod.product_id WHERE tpod.option_id='".$product_sum_id[2]."'")->result_array();
    $this->db->select('tpd.*,tpod.*');
    $this->db->from('tbl_product_details tpd');
    $this->db->join('tbl_product_option_details tpod','tpod.product_id=tpd.id');
    $this->db->where('tpod.product_id =',$product_sum_id);
	//$this->db->where('category_id =',$product_sum_id[1]);
	//$this->db->where('option_id =',$product_sum_id[2]);
    $query = $this->db->get(); 
    return $query->result_array();
   // echo $this->db->last_query();

}




  }