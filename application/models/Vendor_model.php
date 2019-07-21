<?php
class Vendor_model extends CI_Model {

function poListbyid(){
	
	$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
if($login_role == 'admin' || $login_role == 'Sub Admin'){
	$this->db->select('tpo.*,tmu.name,tmu.mobile,tmu.email,tmu.segment');
	$this->db->from('tbl_purchase_order tpo');

	$this->db->join('tbl_manage_user tmu','tmu.user_id=tpo.vendor_id');

	$this->db->where('tpo.status','pending');
	$this->db->order_by("tpo.id", "desc");
	$query = $this->db->get(); 
    return $query->result_array();
}elseif($login_role == 'Zonal Head'){
	$this->db->select('tpo.*,tmu.name,tmu.mobile,tmu.email,tmu.segment');
	$this->db->from('tbl_purchase_order tpo');

	$this->db->join('tbl_manage_user tmu','tmu.user_id=tpo.vendor_id');

	$this->db->where('tpo.status','pending');
	$this->db->where('tmu.added_id',$login_id);
	$this->db->order_by("tpo.id", "desc");
	$query = $this->db->get(); 
	return $query->result_array();	
}elseif($login_role == 'Sales Executive'){
	$this->db->select('tpo.*,tmu.name,tmu.mobile,tmu.email,tmu.segment');
	$this->db->from('tbl_purchase_order tpo');

	$this->db->join('tbl_manage_user tmu','tmu.user_id=tpo.vendor_id');

	$this->db->where('tpo.status','pending');
	$this->db->where('tmu.parent_id',$login_id);
	$this->db->order_by("tpo.id", "desc");
	$query = $this->db->get(); 
	return $query->result_array();	
}
}

function editProductDataFatch($id){
$this->db->select('tppd.product_id,tppd.po_id,tppd.quantity,tppd.prod_category,tppd.prod_size,tppd.prod_thick,tpd.category_id,tpc.category_name,tpo.vendor_id,tpo.purchase_order_id,tmu.name,tmu.email,tmu.segment,tmu.mobile,tppd.rate,tpo.po_date');
$this->db->from('tbl_po_product_details tppd');
$this->db->join('tbl_product_details tpd','tppd.product_id=tpd.id');
$this->db->join('tbl_product_category tpc','tpd.category_id=tpc.id');
$this->db->join('tbl_purchase_order tpo','tpo.id=tppd.po_id');
$this->db->join('tbl_manage_user tmu','tmu.user_id=tpo.vendor_id');
$this->db->where('tppd.po_id',$id);
$query = $this->db->get(); 
return $query->result_array();
}
/*************Genrate So By Admin*****************/
function genrateSOByadmin(){


//sales_order_id
  $vendor_id = $this->input->post('vendor_id');
/**********Fetch po in database and genrate new id***********/
  $this->db->select('*');
  $this->db->from('tbl_sales_order');
  $this->db->order_by('id','desc');
  $this->db->limit(1);
   $query = $this->db->get(); 
$last_record=$query->result_array();
if(empty($last_record)){
  $sales_order_id ='SO/'.$vendor_id.'/'.date('Y-m-d').'/01';
}else{
  $start = '01';
 $in_no =  $last_record[0]['id'] + $start;
 $sales_order_id ='SO/'.$vendor_id.'/'.date('Y-m-d').'/'.$in_no;
}

	$today_date = date('Y-m-d');
	$po_id = $this->input->post('po_id');

	$total_mrp_amount = $this->input->post('mrp_tot');
    $totalamt = $this->input->post('totalamt');
    $mrp_discount_val = $this->input->post('mrp_discount');
	 $after_dis_amou_aply_dis = $this->input->post('after_dis_amou_aply_dis');
	$so_expire_date = $this->input->post('so_expire_date');
   $ins_sale = array(
              'po_id' => $po_id,
              'so_date' => $today_date,
              'sales_order_id'=>$sales_order_id,
              'vendor_id' =>$vendor_id,
              'so_expire_date' => date('Y-m-d',strtotime($so_expire_date)),
              'mrp_discount' =>$mrp_discount_val,
              'after_mrp_discount_aply'=>$after_dis_amou_aply_dis,
              'subtotal' =>$total_mrp_amount,
              'edjustment' =>$total_mrp_amount-$totalamt,
              'total' =>$totalamt,
              'status'=>'pending',
              'status_date'=>$today_date
                  );

   /********************Condition Check PO_id exit or not***********************/
  $this->db->select('*');
  $this->db->from('tbl_sales_order');
  $this->db->where('po_id',$po_id);
 
   $query = $this->db->get(); 
$count=$query->num_rows();
if($count=='0'){

          $insert = $this->db->insert('tbl_sales_order',$ins_sale);
          $insert_id = $this->db->insert_id();  
    /************Fatch product from po product table*****************/        
     $this->db->select('*');
     $this->db->from('tbl_po_product_details');
     $this->db->where('po_id',$po_id);
     $query = $this->db->get(); 
     $da = $query->result_array();
     foreach ($da as $value) {
     	$pro_ins = array(
                    'so_id'=>$insert_id,
                    'product_id'=>$value['product_id'],
                    'quantity' =>$value['quantity']
     	                );
     	 $insert = $this->db->insert('tbl_sales_product_order',$pro_ins);

      $production_ins=array(
                      'product_id'=>$value['product_id'],
                      'product_status'=>'Quality control',
                      'vendor_id'=>$vendor_id,
                      'so_id'=>$insert_id,
                      'status_date'=>$today_date,
                      'status_update_userid'=>'Admin01',
                      'quantity' =>$value['quantity']

                           );
    $this->db->insert('tbl_production_process',$production_ins);



     }
     $updata = array(
               'status'=>'Genrate SO',
               'status_date'=>'today_date'
                );
     $this->db->where('id', $po_id); 
     $update = $this->db->update('tbl_purchase_order',$updata);
     if($update){
 $messge = array('message' => 'Sale Order Genrate successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('sale', $messge);
}else{
$messge = array('message' => 'Sale Order Not successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('sale', $messge);
}




}else{
$messge = array('message' => 'Sale Order already genrated','class' => 'alert alert-danger');
              $this->session->set_flashdata('sale', $messge);
}
}
function getGenratedSoList(){
	$this->db->select('tso.*,tmu.name,tmu.mobile,tmu.email,tmu.segment');
	$this->db->from('tbl_sales_order tso');
	$this->db->join('tbl_manage_user tmu','tmu.user_id=tso.vendor_id');
	$this->db->where('tso.status','pending');
	$this->db->order_by("tso.id", "desc");
  $query = $this->db->get(); 
  //echo  $this->db->last_query();
  return $query->result_array();

}


/*************************genrateInvoice data*****************************/
function genrateInvoice($id){
  $this->db->select('tspo.*,tso.vendor_id,tso.so_date');
  $this->db->from('tbl_sales_product_order tspo');
  $this->db->join('tbl_sales_order tso','tso.id=tspo.so_id');
  $this->db->where('tspo.so_id',$id);
  $this->db->order_by("tspo.id", "desc");
    $query = $this->db->get(); 
    return $query->result_array();
}
/****************************genrateInvoice data end******************************/
function getplaceOfsuppy(){
  $this->db->select('option_name');
  $this->db->from('tbl_product_option tpo');
  $this->db->where('tpo.option_class','Place Of Supply');
  $this->db->order_by("tpo.option_id", "desc");
  $query = $this->db->get(); 
  return $query->result_array();

}
function getvendorDetails($vendor_id){
  $this->db->select('*');
  $this->db->from('tbl_manage_user');
  $this->db->where('user_id',$vendor_id);
   $query = $this->db->get(); 
  return $query->result_array();

}
function invoiceSave(){
 $so_id=$this->input->post('so_id'); 
 $vendor_id = $this->input->post('vendor_id');
 $transporter_detail = array(
                      'transporter_name'=>$this->input->post('transporter_name'),
                      'vehicle_no' =>$this->input->post('vehicle_no'),
                      'transporter_mobile_number'=>$this->input->post('transporter_mobile_number')
                            );

$supply_details=array(
                    'place_of_supply'=>$this->input->post('place_of_supply'),
                    'date_of_supply' =>$this->input->post('date_of_supply')
                     );
$billing_address = array(
                     "Details_of_Receiver"=>array(
                        'company_name'=>$this->input->post('company_name1'),
                        'mobile' =>$this->input->post('mobile1'),
                        'address'=>$this->input->post('address1'),
                        'state'=>$this->input->post('state1')
                                                ),
                    "Details_of_Consignee"=>array(
                        'company_name'=>$this->input->post('company_name2'),
                        'mobile' =>$this->input->post('mobile2'),
                        'address'=>$this->input->post('address2'),
                        'state'=>$this->input->post('state2')

                                                 ) 
                       );

$invoice_date=date('Y-m-d');
$year=date('y')-1;

/**********Total Invoice***********/
  $this->db->select('*');
  $this->db->from('tbl_invoice');
  $this->db->order_by('id','desc');
  $this->db->limit(1);
   $query = $this->db->get(); 
$last_record=$query->result_array();
if(empty($last_record)){
  $invoice_number ='RP/P/'.$year.'-'.date('y').'/1001';
}else{
  $start = '1001';
 $in_no =  $last_record[0]['id'] + $start;
 $invoice_number ='RP/P/'.$year.'-'.date('y').'/'.$in_no;
}
/**************GST Calculation*********************/
  /* $this->db->select('*');
  $this->db->from('tbl_sales_order');
  $this->db->where('id',$so_id);
  $query = $this->db->get(); 
$invoice_date=$query->result_array();
//print_r($invoce_data);
$so_total=$invoice_date[0]['total'];*/
  $admin_data =$this->session->userdata('login_data');
$cgst='';
$sgst='';
$igst='';
if($admin_data[0]['state']==$this->input->post('state1')){

//$cgst_val = 9*($so_total/100);      
$cgst=9;
$sgst=9;


  }else{

//$igst_val = 18*($so_total/100);
//$igst_val = 18*($so_total/100);

$igst=18;
  }
 




/*************Insert array*****************/
$insert_array=array(
           'so_id'=>$so_id,
           'vendor_id'=>$vendor_id,
           'invoice_date'=>date('Y-m-d'),
           'invoice_number'=>$invoice_number,
           'transporter_details'=>json_encode($transporter_detail),
           'supply_details' =>json_encode($supply_details),
           'billing_address'=>json_encode($billing_address),
           'cgst'=>$cgst,
           'sgst'=>$sgst,
           'igst'=>$igst,
                   );
//print_r($insert_array);exit;
         $insert = $this->db->insert('tbl_invoice',$insert_array);
         $update=array(
                  'status'=>'Invoice Genrated',
                  'status_date'=>date('Y-m-d')
                      );
        $this->db->where('id', $so_id); 
      $update = $this->db->update('tbl_sales_order',$update);
      return $invoice_number;
}

function getFinalInvoiceData($id){
  $this->db->select('ti.*');
  $this->db->from('tbl_invoice ti');
  $this->db->where('ti.invoice_number',$id);
  $query = $this->db->get(); 
return $query->result_array();
}
function getProductDetailsForInvoice($id){
$this->db->select('tspo.*,tpd.*,tppd.*,tso.total as taxable_amount,tso.vendor_id,tso.sales_order_id,tso.	so_date,tmu.gstn,tmu.mobile,tmu.state,tmu.city,tpo.po_expire_date,s.name as State,c.name as city');
  $this->db->from('tbl_sales_product_order tspo');
  $this->db->join('tbl_sales_order tso','tso.id=tspo.so_id');
  $this->db->join('tbl_product_details tpd','tpd.id=tspo.product_id');
  $this->db->join('tbl_po_product_details tppd','tppd.product_id=tpd.id');
  $this->db->join('tbl_manage_user tmu','tmu.user_id=tso.vendor_id');
  $this->db->join('tbl_purchase_order tpo','tpo.vendor_id=tso.vendor_id');
  $this->db->join('states s','tmu.state=s.id');
  $this->db->join('cities c','tmu.city=c.id');
  $this->db->where('tspo.so_id',$id);
  $this->db->group_by('tspo.id');
  $query = $this->db->get(); 
  return $query->result_array();
  //echo $this->db->last_query();
}
function getInvoiceList(){
  $this->db->select('ti.*,tmu.name');
  $this->db->from('tbl_invoice ti');
 $this->db->join('tbl_manage_user tmu','tmu.user_id=ti.vendor_id');
  $this->db->order_by('ti.id','desc');
  $query = $this->db->get(); 
return $query->result_array();

}
function getAllVendorList(){
	
			$login_data = $this->session->userdata('login_data'); 
			//print_r($login_data);
			$login_id = $login_data[0]['id'];
			$login_role = $login_data[0]['role']; 
		 
        if($login_role == 'admin' || $login_role == 'Sub Admin'){
		  $this->db->select('*');
		  $this->db->from('tbl_manage_user');
		  $this->db->where('role','dealer');
		  $this->db->order_by('id','desc');
		  $query = $this->db->get(); 
		return $query->result_array();
		  }elseif($login_role == 'Zonal Head'){
		  $this->db->select('*');
		  $this->db->from('tbl_manage_user');
		  $this->db->where('added_id =',$login_id);
		  $this->db->where('role=','dealer');
		  $this->db->order_by('id','desc');
		  $query = $this->db->get(); 
		return $query->result_array();
		  }elseif($login_role == 'Sales Executive'){
			  $this->db->select('*');
		  $this->db->from('tbl_manage_user');
		  $this->db->where('parent_id =',$login_id);
		  $this->db->where('role=','dealer');
		  $this->db->order_by('id','desc');
		  $query = $this->db->get(); 
		return $query->result_array();
		  }

}
/*******get dealer parent name********/
function getAllVendorParent($parent_id){
	
			$login_data = $this->session->userdata('login_data'); 
			//print_r($login_data);
			$login_id = $login_data[0]['id'];
			$login_role = $login_data[0]['role']; 
		 
		  $this->db->select('name');
		  $this->db->from('tbl_manage_user');
		  $this->db->where('id=',$parent_id);
		  $query = $this->db->get(); 
		return $query->row();


}

/***update vender data**/
function saveVendorEditData(){
	
	/***secssion data***/
    $login_data = $this->session->userdata('login_data'); 
   	$added_id = $login_data[0]['id'];
    $added_role = $login_data[0]['role'];
  
  $up_id = $this->input->post('up_id');
  
  $parent_id = $this->input->post('salesExec');
  $parent_role = 'Sales Executive';
  
  if($added_role == 'Sales Executive' ){
  $parent_id = $login_data[0]['id'];
  $parent_role = $login_data[0]['role'];  
  }
  
  $uparr = array(
                'name' =>  $this->input->post('name'),
				'parent_id' =>$parent_id,
				'parent_role' =>$parent_role,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
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
        $messge = array('message' => 'Vendor Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('users', $messge);
     }else{
      $messge = array('message' => 'Vendor Not Update successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('users', $messge);
     }  
   
}

function saveAddVendor(){
 
  $email = $this->input->post('email');
  
/***secssion data***/
    $login_data = $this->session->userdata('login_data'); 
   	$added_id = $login_data[0]['id'];
    $added_role = $login_data[0]['role'];
	
  $parent_id = $this->input->post('salesExec');
  $parent_role = 'Sales Executive';
  
  $role = $this->input->post('role');
  /**********Total Invoice***********/
  $this->db->select('*');
  $this->db->from('tbl_manage_user');
  $this->db->order_by('id','desc');
  $this->db->limit(1);
   $query = $this->db->get(); 
$last_record=$query->result_array();
if(!empty($last_record)){
  $start = '1000';
 $in_no =  $last_record[0]['id'] + $start;
 $user_id ='DEAL'.$in_no;
}

/***zonal head login**/
if($added_role == 'Sales Executive'){
   $parent_id = $login_data[0]['id'];
   $parent_role = $login_data[0]['role'];
   $role='Dealer';

	$start = '1000';
	$in_no =  $last_record[0]['id'] + $start;
	$user_id ='DEAL'.$in_no;  
}

  
 
     $insertarr = array(
                'name' =>  $this->input->post('name'),
                'user_id' => $user_id,
				'added_id' =>$added_id,
				'added_role' => $added_role,
				'parent_id' =>$parent_id,
				'parent_role' =>$parent_role,
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role' => 'Dealer',
                'segment' => $this->input->post('segment'),
                'mobile' => $this->input->post('mobile'),
                'state'  => $this->input->post('state'),
                'city' =>$this->input->post('city'),
                'gstn' => $this->input->post('gstn'),
                'company_name' => $this->input->post('company_name'),
                'address' => $this->input->post('address'),
                'credit_limit'=>$this->input->post('cridit')
                       );

     /********************Check Vendor exisit or not***********************************/
  $this->db->select('*');
  $this->db->from('tbl_manage_user');
  $this->db->where('email',$email);
   $query = $this->db->get(); 
 $cont=$query->num_rows();
   if($cont=='0'){

     $insert = $this->db->insert('tbl_manage_user',$insertarr);
     if($insert){
        $messge = array('message' => 'Dealer Add successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('users', $messge);
     }else{
      $messge = array('message' => 'Dealer Not Add successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('users', $messge);
     }  

}else{
         $messge = array('message' => 'Dealer Email Id Already Exisit','class' => 'alert alert-success');
              $this->session->set_flashdata('users', $messge);
 
}



}
function vendor_data($id){
  $this->db->select('tmu.*,s.name as stateName,c.name as cityName');
  $this->db->from('tbl_manage_user tmu');
  $this->db->join('states s','tmu.state=s.id');
  $this->db->join('cities c','c.id=tmu.city');
  $this->db->where('tmu.id',$id);
  
  $query = $this->db->get(); 
return $query->result_array();
}

function total_vendor_invoice($id){

     $this->db->select("*");
     $this->db->from("tbl_invoice");
     $this->db->where('vendor_id',$id);
     $query = $this->db->get();
    return $in = $query->num_rows();

    /* $this->db->select("*");
     $this->db->from("tbl_purchase_order");
     $this->db->where('vendor_id',$id);
     $this->db->where('status','pending');
     $query = $this->db->get();
     $tpo = $query->num_rows();*/
   
   /*return $tot_in = $in + $tpo; */
}
function total_vendor_PO($id){
     
     $this->db->select("*");
     $this->db->from("tbl_invoice");
     $this->db->where('vendor_id',$id);
     $query = $this->db->get();
    $in = $query->num_rows();
 
     $this->db->select("*");
     $this->db->from("tbl_purchase_order");
     //$this->db->where('vendor_id',$id);
     $condition = "vendor_id='$id' AND (status='pending' OR status='Reject')";
     $this->db->where($condition);
     //$this->db->where('status','Reject');
     $query = $this->db->get();
    
    $tpo = $query->num_rows();
    
     $this->db->select("*");
     $this->db->from("tbl_sales_order");
     $this->db->where('vendor_id',$id);
     $this->db->where('status','pending');
     
     $query = $this->db->get();
     $tso = $query->num_rows();
      return $tot_in = $in + $tpo + $tso; 
}
function total_vendor_pending($id){
  $this->db->select("*");
     $this->db->from("tbl_purchase_order");
     $this->db->where('vendor_id',$id);
     $this->db->where('status','pending');
     $query = $this->db->get();
     $tpo = $query->num_rows();

      $this->db->select("*");
     $this->db->from("tbl_sales_order");
     $this->db->where('vendor_id',$id);
     $this->db->where('status','pending');
     $query = $this->db->get();
     $tso = $query->num_rows();

     return $tot_in =  $tpo + $tso; 
}
function total_vendor_reject($id){
     $this->db->select("*");
     $this->db->from("tbl_purchase_order");
     $this->db->where('vendor_id',$id);
    // $this->db->where('status','pending');
     $this->db->where('status','Reject');
     $query = $this->db->get();
    return $query->num_rows();
}

function vendor_total_pay($id){
     $this->db->select("sum(after_tax_amount) as total_pay");
     $this->db->from("tbl_invoice");
     $this->db->where('vendor_id',$id);
         $query = $this->db->get();
    return $query->result_array();
}
function vendor_total_paid($id){
     $this->db->select("sum(amount) as total_paid");
     $this->db->from("tbl_payment");
     $this->db->where('vendor_id',$id);
     //$this->db->where('status','Paid');
//$this->db->group_by('vendor_id');
     $query = $this->db->get();
    return $query->result_array();
}
function invoice_listing($id){
     $this->db->select("*");
     $this->db->from("tbl_invoice");
     $this->db->where('vendor_id',$id);
     $this->db->order_by('id','desc');
     $query = $this->db->get();
    return $query->result_array();

}
function paymentList(){
     $this->db->select("tp.*,SUM(tp.amount) as totsum,tmu.name,ti.after_tax_amount");
     $this->db->from("tbl_payment tp");
     $this->db->join("tbl_invoice ti","ti.invoice_number=tp.invoice_no");
     $this->db->join("tbl_manage_user tmu","tmu.user_id=tp.vendor_id");
     $this->db->group_by('tp.invoice_no');
    // $this->db->order_by('id','desc');
     $query = $this->db->get();
     
    return $query->result_array();
}
function vendor_name_list(){
     $this->db->select("id,name,credit_limit");
     $this->db->from("tbl_manage_user");
     $this->db->where('role','Vendor');
    // $this->db->order_by('id','desc');
     $query = $this->db->get();
    return $query->result_array();
}

function savePayment(){

      $insert=array(
             'invoice_no'=>$this->input->post('invoice_number'),
             'payment_date'=>date("Y-m-d",strtotime($this->input->post('pay_date'))),
             'payment_mode'=>$this->input->post('pay_mode'),
             'amount'=>$this->input->post('pay_amount'),
             'receved_by'=>$this->input->post('recived_by'),
             'vendor_id'=>$this->input->post('vendor_id'),
             'status' =>'Paid'
               );

$insert = $this->db->insert('tbl_payment',$insert);
$paid_amount = $this->input->post('pay_amount') + $this->input->post('paid_amt');
$update = array('paid_amt'=>$paid_amount);
$this->db->where('invoice_number',$this->input->post('invoice_number')); 
      $update = $this->db->update('tbl_invoice',$update);

     if($insert){
        $messge = array('message' => 'Payment Add successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('payment', $messge);
     }else{
      $messge = array('message' => 'Payment Not Add successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('payment', $messge);
     } 

}

function vendor_reject_list($id){
     $this->db->select("tpo.*");
     $this->db->from("tbl_purchase_order tpo");
     $this->db->where('tpo.vendor_id',$id);
     $this->db->where('tpo.status','Reject');
  
     $query = $this->db->get();
     return $query->result_array();
}

function vendor_invoice_list($id){
  //echo $id;exit;
   $this->db->select("ti.*");
     $this->db->from("tbl_invoice ti");
   //  $this->db->join('tbl_manage_user tmu','tmu.id=tpo.vendor_id');
     $this->db->where('ti.vendor_id',$id);

    // $this->db->order_by('id','desc');
     $query = $this->db->get();
     return $query->result_array();
}
function vendor_pending_po_list($id){
  $sql = $this->db->query("SELECT tpo.id,tpo.po_date,tpo.total,tpo.vendor_id FROM tbl_purchase_order tpo WHERE tpo.vendor_id='2' AND tpo.status='pending' UNION ALL SELECT tso.id,tso.so_date,tso.total,tso.vendor_id FROM tbl_sales_order tso WHERE tso.vendor_id='2' AND tso.status='pending'")->result_array();
  return $sql;

}
/*****select zonal head******/
function zonalHeadList(){
        $this->db->select('*');
        $this->db->from('tbl_manage_user');
        $this->db->where('role =','Zonal Head');
        $query = $this->db->get();
     return $query->result_array();
    }
/******seles exicutive list by zonal head id******/
        
 function getSalesExecutive($zonal_head_id){
     $this->db->select("*");
     $this->db->from("tbl_manage_user");
     $this->db->where("parent_id",$zonal_head_id);
      $query = $this->db->get();
     return $query->result_array();  
    }

/******dealer  list by salse executive id******/
        
 function getDealerList($salse_exe_id){
     $this->db->select("*");
     $this->db->from("tbl_manage_user");
     $this->db->where("parent_id",$salse_exe_id);
      $query = $this->db->get();
     return $query->result_array();  
    }
    
/*******dealer list by search**********/
function getDealerListBySearch($state,$city,$dealer_name){
       
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
		
		if($login_role == 'admin'){
		  $this->db->select('*');
		  $this->db->from('tbl_manage_user');
		  $this->db->where('role','dealer');
    		 if(!empty($state)){
                $this->db->where('state=',$state);
             }
             if(!empty($city)){
              $this->db->where('city=',$city);
             }
             if(!empty($dealer_name)){
              $this->db->where('name=',$dealer_name);
             }
		  $this->db->order_by('id','desc');
		  $query = $this->db->get(); 
		  return $query->result_array();
		  }
		  
		  
		  elseif($login_role == 'Zonal Head'){
		  $this->db->select('*');
		  $this->db->from('tbl_manage_user');
		  $this->db->where('added_id =',$login_id);
		  $this->db->where('role=','dealer');
    		  if(!empty($state)){
                $this->db->where('state=',$state);
             }
             if(!empty($city)){
              $this->db->where('city=',$city);
             }
             if(!empty($dealer_name)){
              $this->db->where('name=',$dealer_name);
             }
		  $this->db->order_by('id','desc');
		  $query = $this->db->get(); 
		  return $query->result_array();
		  }
		  
		  elseif($login_role == 'Sales Executive'){
			  $this->db->select('*');
		  $this->db->from('tbl_manage_user');
		  $this->db->where('parent_id =',$login_id);
		  $this->db->where('role=','dealer');
    		  if(!empty($state)){
                $this->db->where('state=',$state);
             }
             if(!empty($city)){
              $this->db->where('city=',$city);
             }
             if(!empty($dealer_name)){
              $this->db->where('name=',$dealer_name);
             }
		  $this->db->order_by('id','desc');
		  $query = $this->db->get(); 
		  return $query->result_array();
		  }

}
/*********************
manage product
*************************/

/*********select  Search for po**********/
function getPoUserListBySearch($startdate,$enddate,$dealer_name){
       
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];

        $this->db->select('tpo.*,tmu.name,tmu.mobile,tmu.email');
        $this->db->from('tbl_purchase_order tpo');
        
        $this->db->join('tbl_manage_user tmu','tmu.user_id=tpo.vendor_id');
      
        $this->db->where('tpo.status','pending');
         if(!empty($startdate)){
         $this->db->where('tpo.po_date>=',$startdate);
         }
         if(!empty($enddate)){
         $this->db->where('tpo.po_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('tmu.name=',$dealer_name);
         }
        
        $this->db->order_by("tpo.id", "desc");
        $query = $this->db->get(); 
        return $query->result_array();
		//echo $sql = $this->db->last_query();
}


// /*********select  Search for so**********/
function getUserListBySearchSo($startdate,$enddate,$dealer_name){
       
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
		
        	$this->db->select('tso.*,tmu.name,tmu.mobile,tmu.email');
	        $this->db->from('tbl_sales_order tso');
	        $this->db->join('tbl_manage_user tmu','tmu.user_id=tso.vendor_id');
         if(!empty($startdate)){
          $this->db->where('tso.so_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('tso.so_date<=',$enddate);
         }
         
         if(!empty($dealer_name)){
          $this->db->where('tmu.name=',$dealer_name);
         }
            $this->db->where('tso.status','pending');
        	$this->db->order_by("tso.id", "desc");
            $query = $this->db->get(); 
            return $query->result_array();
		// echo $sql = $this->db->last_query();
}


// /*********select  Search for invoice**********/
function getUserListBySearchInvoice($startdate ,$enddate ,$dealer_name){
       
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
		
         $this->db->select('ti.*,tmu.name');
         $this->db->from('tbl_invoice ti');
         $this->db->join('tbl_manage_user tmu','tmu.user_id=ti.vendor_id');
        
         if(!empty($startdate)){
          $this->db->where('ti.invoice_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('ti.invoice_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('tmu.name=',$dealer_name);
         }
            $this->db->order_by('ti.id','desc');
            $query = $this->db->get(); 
            return $query->result_array();
		// echo $sql = $this->db->last_query();
}

// /*********select  Search for payment list**********/
function getUserListBySearchPaymentList($startdate ,$enddate ,$dealer_name){
       
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
		
         $this->db->select("tp.*,SUM(tp.amount) as totsum,tmu.name,ti.after_tax_amount");
         $this->db->from("tbl_payment tp");
         $this->db->join("tbl_invoice ti","ti.invoice_number=tp.invoice_no");
         $this->db->join("tbl_manage_user tmu","tmu.user_id=tp.vendor_id");
        
         if(!empty($startdate)){
          $this->db->where('tp.payment_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('tp.payment_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('tmu.name=',$dealer_name);
         }
         $this->db->group_by('tp.invoice_no');
         //$this->db->order_by('ti.id','desc');
         $query = $this->db->get(); 
         return $query->result_array();
	   	 // echo $sql = $this->db->last_query();
}
/*********************
manage product closed
*************************/


/*********************
order product
*************************/
// /*********select  Search for dealer po  list**********/
function dealerPoSendList($startdate ,$enddate ,$dealer_name){
	   	$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
    
if($login_role == 'Dealer'){
   $condition = "tpo.vendor_id='$user_id' AND (tpo.status='pending' || tpo.status='Reject')";
}elseif($login_role == 'Sales Executive'){
    $condition = "tpo.salseexecutive_id='$login_id' AND (tpo.status='pending' || tpo.status='Reject')";
}elseif($login_role == 'Zonal Head'){
    $condition = "tpo.zonal_id='$login_id' AND (tpo.status='pending' || tpo.status='Reject')";
}     
//echo $id;exit;
$this->db->select('tpo.*,tmu.name');
$this->db->from('tbl_purchase_order tpo');

$this->db->join('tbl_manage_user tmu','tmu.user_id=tpo.vendor_id');
        
$this->db->where($condition);
         if(!empty($startdate)){
          $this->db->where('tpo.po_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('tpo.po_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('tmu.name=',$dealer_name);
         }
//$this->db->order_by("tpo.id", "desc");
$query = $this->db->get(); 
return $query->result_array();
//echo $this->db->last_query();
}

// /*********select  Search for dealer so list**********/
function dealerSoList($startdate ,$enddate ,$dealer_name){
	   	$login_data = $this->session->userdata('login_data'); 
		$id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
    
if($login_role == 'Dealer'){
$this->db->select('tpp.*,tmu.name,tmu.mobile,tso.sales_order_id,tso.total');
$this->db->from('tbl_production_process tpp');
$this->db->join('tbl_manage_user tmu','tmu.user_id=tpp.vendor_id');
$this->db->join('tbl_sales_order tso','tpp.so_id=tso.id');
         if(!empty($startdate)){
          $this->db->where('tso.so_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('tso.so_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('tmu.name=',$dealer_name);
         }
$this->db->where('tpp.product_status','Quality control');
$this->db->where('tpp.vendor_id',$id);
$this->db->group_by("tpp.so_id");
$this->db->order_by("tso.id", "desc");

$query = $this->db->get(); 
return $query->result_array();
//echo $this->db->last_query();
}elseif($login_role == 'Zonal Head' || $login_role == 'Sales Executive'){
 $this->db->select('tpp.*,tmu.name,tmu.mobile,tso.sales_order_id,tso.total');
$this->db->from('tbl_production_process tpp');
$this->db->join('tbl_manage_user tmu','tmu.user_id=tpp.vendor_id');
$this->db->join('tbl_sales_order tso','tpp.so_id=tso.id');
       if(!empty($startdate)){
          $this->db->where('tso.so_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('tso.so_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('tmu.name=',$dealer_name);
         }
$this->db->where('tpp.product_status','Quality control');
$this->db->group_by("tpp.so_id");
$this->db->order_by("tso.id", "desc");

$query = $this->db->get(); 
return $query->result_array(); 
//echo $this->db->last_query();  
}

}

// /*********select  Search for dealer Invoice list**********/
function dealerInvoiceList($startdate ,$enddate ,$dealer_name){
	   	$login_data = $this->session->userdata('login_data'); 
		$id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
  
  if($login_role == 'Dealer'){
  $this->db->select('*');
  $this->db->from('tbl_invoice');
      if(!empty($startdate)){
          $this->db->where('invoice_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('invoice_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('name=',$dealer_name);
         }
  $this->db->where('vendor_id',$id);
  $this->db->order_by('id','desc');
  $query = $this->db->get(); 
  return $query->result_array();
   }elseif($login_role == 'Zonal Head' || $login_role == 'Sales Executive'){
  $this->db->select('*');
  $this->db->from('tbl_invoice');
  if(!empty($startdate)){
          $this->db->where('invoice_date>=',$startdate);
         }
         if(!empty($enddate)){
            $this->db->where('invoice_date<=',$enddate);
         }
         if(!empty($dealer_name)){
          $this->db->where('name=',$dealer_name);
         } 
  //$this->db->where('vendor_id',$id);
  $this->db->order_by('id','desc');
  $query = $this->db->get(); 
  return $query->result_array();
   }

}
/*********************
order product closed
*************************/



/*************
auto suggetion for admin section

****************/
function autosuggestion($word){
    $login_data = $this->session->userdata('login_data'); 
	$login_id = $login_data[0]['id'];
	$login_role = $login_data[0]['role'];
	
	if($login_role == 'admin'){
     $this->db->select("name");
     $this->db->from("tbl_manage_user");
     
     $this->db->where("name LIKE '$word%'");
     $this->db->where("role=","Dealer");
    
     $query = $this->db->get();
     return $data =  $query->result_array();  
   //  echo $str = $this->db->last_query();
	}elseif($login_role == 'Zonal Head'){
	  $this->db->select("name");
     $this->db->from("tbl_manage_user");
     
     $this->db->where("name LIKE '$word%'");
     $this->db->where("role=","Dealer");
     $this->db->where('added_id =',$login_id);
    
     $query = $this->db->get();
     return $data =  $query->result_array();    
	}
	elseif($login_role == 'Sales Executive'){
	  $this->db->select("name");
     $this->db->from("tbl_manage_user");
     
     $this->db->where("name LIKE '$word%'");
     $this->db->where("role=","Dealer");
    $this->db->where('parent_id =',$login_id);
    
     $query = $this->db->get();
     return $data =  $query->result_array();    
	}
    }

/******
auto suggetion for product order

*******/

function autosuggestionProductOrder($word){
	 $this->db->select("name");
     $this->db->from("tbl_manage_user");
     $this->db->where("name LIKE '$word%'");
     $this->db->where("role=","Dealer");
     $query = $this->db->get();
     return $data =  $query->result_array();    
}

/************update invoice amount************/
function updateInvoiceAmount(){
	$final_total = $this->input->post('final_total');
    $final_gst = $this->input->post('final_gst');
    $total_sum = $this->input->post('total_sum');
    $id = $this->input->post('id');
    $updateData = array(
    'before_tax_amount' => $final_total,
    'after_tax_amount' => $total_sum,
    'total_gst' => $final_gst
     );

    $this->db->where('id',$id);
    $this->db->update('tbl_invoice', $updateData);
}

}