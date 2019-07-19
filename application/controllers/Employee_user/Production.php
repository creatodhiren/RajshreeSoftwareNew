<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Production extends CI_Controller {

	 function __construct() { 
         parent::__construct(); 
       
       $this->load->model('Employee_model/Production_model');
       $this->load->model('login_model');
              
      }

   
public function view_production_list(){
        
        $data['title'] = 'Production List';
        $data['totalGotPO']= $this->login_model->countGotPo();

    $data1['production_list']= $this->Production_model->productionList();
		$this->load->view('common/header',$data);
		$this->load->view('Employee/got_production_list',$data1);
		$this->load->view('common/footer');

}
public function see_product_status_listing(){
  $data['title'] = 'Product List';
  $data['totalGotPO']= $this->login_model->countGotPo();
  
      $id = base64_decode($this->uri->segment(2));  

    $data1['product_list']= $this->Production_model->productListFromProduction($id);
    $this->load->view('common/header',$data);
    $this->load->view('Employee/product_list',$data1);
    $this->load->view('common/footer');
}


public function product_listing12(){

     $login_data = $this->session->userdata('login_data');
     $id = $this->input->post('row_id');
     $data = $this->Production_model->getproductlist12($id);
   
    //print_r($data);

    $product_id  = $data[0]['product_id'];
    $quantity  = $data[0]['quantity'];
    $vendor_id  = $data[0]['vendor_id'];
    $so_id  = $data[0]['so_id'];
//$status_update_userid  = $login_data[0]['id'];
    $product_status  = $this->input->post('product_status');
  // print_r($product_status);die;

    $arr = array('product_id' => $product_id,
                 'quantity' => $data[0]['quantity'],
                 'vendor_id' => $data[0]['vendor_id'],
                 'so_id' => $data[0]['so_id'],
                 'status_update_userid' =>$login_data[0]['user_id'],
                 'product_status' => $product_status,
                 'status_date' => date('Y-m-d')
               );
    $table = "tbl_production_process";
   
 $data = $this->Production_model->insertproductlist12($table,$arr);
    //print_r($arr);die;
   //echo json_encode($data);
 $so_id = base64_encode($so_id);
 redirect('See_Product_Status/'.$so_id);

}
public function product_listing_for_production(){
  $id=$this->input->post('id');
$data['recordData'] = $this->Production_model->product_listing_for_production($id);  
echo json_encode($data);
}








  }