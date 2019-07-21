<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	 function __construct() { 
         parent::__construct(); 
       
         $this->load->model('Vendor/Product_model');
        // $this->load->model('login_model');
         $this->load->model('Vendor_model');
         $this->load->model('Common_model');
              
      } 
     public function genrate_po_form()
	{   
		$data['title'] = 'Vendor Genrate Form';
    //$data['totalGotPO']= $this->login_model->countGotPo();
	 $login_data = $this->session->userdata('login_data'); 
	 $user_id = $login_data[0]['user_id'];
     $login_role = $login_data[0]['role'];
       if($login_role == 'Dealer'){
				 $data1['dealer_segmet']=$this->Common_model->getDealerSegment($user_id); 
	    } 
        $data1['product_list']= $this->Product_model->getProductList();
       
        $data1['vendor_list'] =   $this->Vendor_model->getAllVendorList();
        $login_data = $this->session->userdata('login_data');
        $data1['login_id'] = $login_data[0]['user_id'];
		$this->load->view('common/header',$data);
		$this->load->view('Vendor/vendor_genrate_form',$data1);
		$this->load->view('common/footer');
	}
   public function venderGenratePOSave(){
   	$data1['po']= $this->Product_model->poSave();
    redirect('Vendor_Genrate_PO');
   }
   public function vendor_po_list(){
   	$data['title'] = 'PO Send To Admin';
    //$data['totalGotPO']= $this->login_model->countGotPo();
      
        $data1['po_list']= $this->Product_model->poListbyid();
		//echo "<pre>";
        //print_r($data1['po_list']);exit;
		$this->load->view('common/header',$data);
		$this->load->view('Vendor/vendor_po_send_list',$data1);
		$this->load->view('common/footer');
   }
   /**********************Vendor Sales Order List*********************/
   public function vendor_so_list(){
    $data['title'] = 'Got So To Admin';
    //$data['totalGotPO']= $this->login_model->countGotPo(); 

       $login_data = $this->session->userdata('login_data');
       // echo $login_data[0]['user_id']; die;
        $data1['so_list']= $this->Product_model->SOListbyid($login_data[0]['user_id']);
		//echo "<pre>";
//print_r($data1['so_list']);
    $this->load->view('common/header',$data);
    $this->load->view('Vendor/vendor_so_list',$data1);
    $this->load->view('common/footer');

   }
   /*************Vendor Invoice List*****************/
   public function vendor_see_Invoice_list(){
    $data['title'] = 'Genrated Invoice List';
    //$data['totalGotPO']= $this->login_model->countGotPo();

     $login_data = $this->session->userdata('login_data');

    $data1['invoice_list']= $this->Product_model->vendor_see_Invoice_list($login_data[0]['user_id']);

    $this->load->view('common/header',$data);
    $this->load->view('Vendor/vendor_see_Invoice_list',$data1);
    $this->load->view('common/footer');

   }

  }