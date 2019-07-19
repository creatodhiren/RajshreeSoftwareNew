<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common extends CI_Controller {

	 function __construct() { 
         parent::__construct(); 
       
         $this->load->model('Common_model');
         $this->load->model('User_model');
         $this->load->model('login_model');
              
      } 
    
	public function delete()
	{   
$id = base64_decode($this->input->post('id'));	
$table = $this->input->post('table_name');
$option_id = $this->input->post('option_id');

echo $data1= $this->Common_model->delete($id,$table,$option_id);

	}

public function productdelete(){
$id = base64_decode($this->input->post('id'));	
echo $data1= $this->Common_model->productdelete($id);
}

public function productPrice(){
$data1['type']= $this->Common_model->getproductpodata('product_type');
$data1['size']= $this->Common_model->getproductpodata('size_feet');
$data1['color']= $this->Common_model->getproductpodata('color');
$data1['grade']= $this->Common_model->getproductpodata('grade');
$data1['design']= $this->Common_model->getproductpodata('design');
$data1['id']= $this->Common_model->getproductpodataid();
echo json_encode($data1);
}
/*****************Product Listing********************************/

public function product_listing(){
	 $id = base64_decode($this->input->post('id'));
     $data['recordData'] = $this->Common_model->getproductlist($id);
   
  //print_r($data);
echo json_encode($data);
}


public function product_listing_from_sale(){
  $id = base64_decode($this->input->post('id'));
   $data['recordData'] = $this->Common_model->getproductlistFromSale($id);
   
//print_r($data);
echo json_encode($data); 
}
public function product_listing_from_po(){
 $id = base64_decode($this->input->post('id'));
   $data['recordData'] = $this->Common_model->getproductlistFromPo($id);
   
//print_r($data);
echo json_encode($data); 

}

public function purchase_order_cancel(){
   $id = base64_decode($this->input->post('id'));
 echo $data1= $this->Common_model->purchase_order_cancel($id);
   
}
public function my_account(){
  $data['title'] = 'My Account';
  $data['totalGotPO']= $this->login_model->countGotPo();
  
   $data1['stateList']= $this->User_model->stateList();
        $data1['login_data'] = $this->session->userdata('login_data');
       $state_id = $data1['login_data'][0]['state'];
        $data1['cityList']= $this->User_model->cityList($state_id); 
    $this->load->view('common/header',$data);
    $this->load->view('my_account_page',$data1);
    $this->load->view('common/footer');
}
public function account_save(){
    $data= $this->Common_model->updateSaveaccount();
    redirect('Dashboard');
 
}

public function get_invoice_list(){
  $search = $this->input->post('term');
$data =  $this->Common_model->autoSuggestionchecking($search);
echo json_encode($data); 


}

public function getpaymentList(){
 $data['recordData'] =  $this->Common_model->getpaymentList();
   //print_r($data);
echo json_encode($data); 
}
public function product_listing_from_poduction(){
   $so_id = base64_decode($this->input->post('id'));
   $data['recordData'] =  $this->Common_model->getproductListfromProduction($so_id);
//echo "<pre>";
//print_r($data['recordData']);
echo json_encode($data); 

}
public function singleProductPrice(){
 $data=  $this->Common_model->getSingleProductPrice(); 
 //print_r($data);
 echo json_encode($data); 
 /// $data[0]['retailer_price'];
}
public function getDealerSegment(){
 $data=  $this->Common_model->getDealerSegment(); 
 //print_r($data);
 echo json_encode($data); 
 /// $data[0]['retailer_price'];
}


/**********************End quate***********************************/
}

