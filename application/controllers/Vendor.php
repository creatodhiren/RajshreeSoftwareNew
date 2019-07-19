<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vendor extends CI_Controller {

	 function __construct() { 
         parent::__construct(); 
       
         $this->load->model('Vendor_model');
         $this->load->model('User_model');
         $this->load->model('login_model');
              
      } 

public function gotPurchaseOrderbyvendor(){
        
        $data['title'] = 'New PO List';
        $data['totalGotPO']= $this->login_model->countGotPo();
        $data1['stateList']= $this->User_model->stateList();
        $data1['po_list']= $this->Vendor_model->poListbyid();
		//echo "<pre>";
        //print_r($data1['po_list']);exit;
		$this->load->view('common/header',$data);
		$this->load->view('got_po_list_by_vendor',$data1);
		$this->load->view('common/footer');

}
public function new_po_process_by_admin_view(){
 $id = base64_decode($this->uri->segment(2));
 //$segment = $this->uri->segment(3);
 $data['title'] = 'PO Process By Admin';
 $data['totalGotPO']= $this->login_model->countGotPo();

    $data1['product_data']= $this->Vendor_model->editProductDataFatch($id);
	//echo "<pre>";
	//print_r($data1['product_data']);
    $this->load->view('common/header',$data);
    $this->load->view('po_process_form',$data1);
    $this->load->view('common/footer');

}
public function genrate_so_by_admin(){
	$data1['product_data']= $this->Vendor_model->genrateSOByadmin();
    redirect('View_Genrated_sales_order');
}
public function genrated_sales_order_list(){
$data['title'] = 'Sales Order List By Admin';
$data['totalGotPO']= $this->login_model->countGotPo();


     $data1['product_data']= $this->Vendor_model->getGenratedSoList();
       
    $this->load->view('common/header',$data);
    $this->load->view('genrated_sales_order_by_admin_list',$data1);
    $this->load->view('common/footer');

}
public function so_invoice(){
    $id = base64_decode($this->uri->segment(2));
     $data1['id'] = base64_decode($this->uri->segment(2));
    $data['title'] = 'Genrate Invoice';
    $data['totalGotPO']= $this->login_model->countGotPo();


    $data1['invoive_data']= $this->Vendor_model->genrateInvoice($id);
    /********Fatch Vendor Details**********/
    $Vendor_id = $data1['invoive_data'][0]['vendor_id'];
    $data1['vendor_id'] = $data1['invoive_data'][0]['vendor_id'];

    $data1['vendor_detail'] = $this->Vendor_model->getvendorDetails($Vendor_id);
    /*********Supply Placess***********/
    $data1['placeOfsuppy']= $this->Vendor_model->getplaceOfsuppy();
    /**********************State List**************************************/
    $data1['stateList']= $this->User_model->stateList();
  $this->load->view('common/header',$data);
  $this->load->view('so_invoice',$data1); 
   $this->load->view('common/footer'); 
}
public function invoice_save(){
  $invoice_number= $this->Vendor_model->invoiceSave();
  $s=base64_encode($invoice_number);
   redirect('Final_invoice/'.$s);  
}
public function final_invoice_data(){
  if(!empty($this->uri->segment(3))){
  $id = base64_decode($this->uri->segment(3));
  }else{
  $id = base64_decode($this->uri->segment(2));
}
  $data['invoice'] =   $this->Vendor_model->getFinalInvoiceData($id);
  $so_id=$data['invoice'][0]['so_id']; 
  $data['product_details'] = $this->Vendor_model->getProductDetailsForInvoice($so_id); 
  //echo "<pre>";
  //print_r($data['product_details']);
  $this->load->view('final_invoice_formate',$data); 
 

}


public function view_all_invoice_list(){
   $data1['invoice_list'] =   $this->Vendor_model->getInvoiceList();
   $data['title'] = 'All Genrated Invoice List';
   $data['totalGotPO']= $this->login_model->countGotPo();

   $this->load->view('common/header',$data);
   $this->load->view('invoice_list',$data1); 
   $this->load->view('common/footer');     
}
public function view_all_vendor(){
$data1['vendor_list'] =   $this->Vendor_model->getAllVendorList();
$data1['stateList']= $this->User_model->stateList();
   $data['title'] = 'All Vendor List';
   $data['totalGotPO']= $this->login_model->countGotPo();


   $this->load->view('common/header',$data);
   $this->load->view('vendor_list',$data1); 
   $this->load->view('common/footer');     
}
public function edit_id_data(){

    $id = base64_decode($this->uri->segment(2));

    $data['title'] = 'Edit Users';
    $data['totalGotPO']= $this->login_model->countGotPo();


     $data1['stateList']= $this->User_model->stateList();

     
     $data1['editDataList']= $this->User_model->editData($id);
     $state_id = $data1['editDataList'][0]['state'];
     $data1['cityList']= $this->User_model->cityList($state_id);
	 $data1['zonalHeadList']= $this->User_model->zonalHeadList();

    $this->load->view('common/header',$data);
    $this->load->view('editVendorFrom',$data1);
    $this->load->view('common/footer');
}

public function vendor_edit_data_save(){
 $this->Vendor_model->saveVendorEditData();
    redirect('View_All_Vendor');

}

public function vendor_add_form(){
    $data['title'] = 'Add Vendor';
    $data['totalGotPO']= $this->login_model->countGotPo();
    $data1['stateList']= $this->User_model->stateList();
	$data1['zonalHeadList']= $this->User_model->zonalHeadList();
    $this->load->view('common/header',$data);
    $this->load->view('addVendorFrom',$data1);
    $this->load->view('common/footer');
}

public function SaveVendor(){
      $data['Vendor']= $this->Vendor_model->saveAddVendor();
     redirect('View_All_Vendor');
}

public function show_vendor_profile(){
     $data['title'] = 'Vendor Profile';
     $data['totalGotPO']= $this->login_model->countGotPo();


      $id = base64_decode($this->uri->segment(2));
     $data1['vendor_data']= $this->Vendor_model->vendor_data($id);
     $data1['total_invoice']= $this->Vendor_model->total_vendor_invoice($id);
     $data1['total_PO']= $this->Vendor_model->total_vendor_PO($id);
     $data1['total_pay']= $this->Vendor_model->vendor_total_pay($id);
     $data1['total_paid']= $this->Vendor_model->vendor_total_paid($id);
     
     $data1['total_pending']= $this->Vendor_model->total_vendor_pending($id);
     $data1['total_reject']= $this->Vendor_model->total_vendor_reject($id);
      $data1['invoice_listing']= $this->Vendor_model->invoice_listing($id);




    $this->load->view('common/header',$data);
    $this->load->view('vendor_profile',$data1);
    $this->load->view('common/footer');

}
public function view_vendor_payment(){
  $data['title'] = 'Payment Listing';
  $data['totalGotPO']= $this->login_model->countGotPo();

    $data1['paymentList']= $this->Vendor_model->paymentList();
    $this->load->view('common/header',$data);
    $this->load->view('payment_listing',$data1);
    $this->load->view('common/footer');
}
public function add_payment_form(){
  $data['title'] = 'Add Payment';
  $data['totalGotPO']= $this->login_model->countGotPo();


    $data1['vendor_name']= $this->Vendor_model->vendor_name_list();
    $this->load->view('common/header',$data);
    $this->load->view('add_payment_from',$data1);
    $this->load->view('common/footer'); 
}

public function savePayment(){
  $data['pay']= $this->Vendor_model->savePayment();
     redirect('View_Vendor_Payment');
}
public function show_vendor_wise_reject_list(){
  $data['title'] = 'Vendor PO Rejected List';
  $data['totalGotPO']= $this->login_model->countGotPo();


  $id = base64_decode($this->uri->segment(2));
    $data1['vendor_reject_list']= $this->Vendor_model->vendor_reject_list($id);

    $this->load->view('common/header',$data);
    $this->load->view('vendor_wise_reject_list',$data1);
    $this->load->view('common/footer');
}
public function show_vender_wise_invoice_list(){
  $data['title'] = 'Vendor Invoice List';
  $data['totalGotPO']= $this->login_model->countGotPo();

  $id = base64_decode($this->uri->segment(2));
    $data1['vendor_invoice_list']= $this->Vendor_model->vendor_invoice_list($id);
    $this->load->view('common/header',$data);
    $this->load->view('vendor_wise_invoice_list',$data1);
    $this->load->view('common/footer');
}
public function show_vender_wise_pending_list(){
  $data['title'] = 'Vendor Pending PO List';
  $data['totalGotPO']= $this->login_model->countGotPo();

  $id = base64_decode($this->uri->segment(2));
    $data1['vendor_pending_list']= $this->Vendor_model->vendor_pending_po_list($id);
    //print_r($data1['vendor_pending_list']);exit;
    $this->load->view('common/header',$data);
    $this->load->view('vendor_wise_pending_po_list',$data1);
    $this->load->view('common/footer');
}

/********get sales exicutive*******/
public function salesExicutiveGet(){
	 $zonal_head_id = $this->input->post('zonal_head_id');
	 $parent_id = $this->input->post('parent_id'); 
     $data['salesExecutive']= $this->Vendor_model->getSalesExecutive($zonal_head_id);
     
	 $data_name = $this->User_model->select_dealer_parent_name($parent_id,'tbl_manage_user');
	 $dealer_parent_id=$data_name['id'];
     $dealer_parent_name=$data_name['name'];
	 

	  //$p_id = $data_name['parent_id']; 
	  //$data_name1 = $this->User_model->select_dealer_parent_name($p_id,'tbl_manage_user');
	  
	 // $p_id = $data_name1['parent_id']; 
	  
     
     foreach ($data['salesExecutive'] as $key => $value){
         if($value['id'] == $dealer_parent_id){
                            
                             $selected = "selected";
                          }else{
                           
                             $selected= "";
                         }
        echo "<option value=".$value['id']."  ".$selected.">".$value['name']."</option>";
      }
    }

/**************/


/********dealer list by salse executive id*******/
public function getDealerListBySalseExeId(){
	 $salse_exe_id = $this->input->post('salse_exe_id');
     $salesExecutive= $this->Vendor_model->getDealerList($salse_exe_id);
     echo  $data = json_encode($salesExecutive);
     
    //  foreach ($data['salesExecutive'] as $key => $value){
         
    //     echo "<option value=".$value['user_id'].">".$value['name']."</option>";
    //   }
    }

/**************/
	/*******search for dealer list*********/
	public function getDealerListBySearch()
	{  
	    $login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
	 	
	 	$state = $this->input->post('state');
	    $city = $this->input->post('city');
	    $dealer_name = $this->input->post('dealer_name');
	    
	    $vendor_list = $this->Vendor_model->getDealerListBySearch($state,$city,$dealer_name);
        
                     $x=1;
                  	 foreach($vendor_list as $lis){ 
					 $parent_id = $lis['parent_id'];
					 $vendor_parent = $this->Vendor_model->getAllVendorParent($parent_id);
					 $tbl_manage_user = 'tbl_manage_user';
					  $id=base64_encode($lis['id']);
					   if($lis['status'] == 0){
                            $btn_text ="Enable";
                             }else{
                            $btn_text ="Disable";
                            }
                        if($login_role =='admin'){ 
                        	
                        	$btn ='<button type="button" class="btn btn-danger btn_e_d" onclick="update_status('.$id.','.$tbl_manage_user.','.$lis['status'].')">'.$btn_text.'</button>';
                            }else{
                              $btn = '';  
                            }
                     echo '<tr class="odd gradeX">
					      
                     	<td>'.$x++.'</td>
                        <td class="center">'.$lis['user_id'].'</td>
                        <td>'.$lis['name'].'</td>
                        <td>'.$lis['email'].'</td>
                        
                        <td class="center">'.$lis['mobile'].'</td>
                        <td>'.$lis['credit_limit'].'</td>
                        <td>'.$vendor_parent->name.'</td>
                        <td>
                          
                        	<a href="'.base_url().'Edit_Vendor_Details/'.$id.'"><span class="btn btn-warning" title="Edit Vendor Data"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                        
                        	<a href="'.base_url().'Vendor_Profile/'.$id.'"><span class="btn btn-success" title="View Vendor Profile"><i class="fa fa-eye" aria-hidden="true"></i></span></a>'.$btn.'</td></tr>';
               }
             
} 

/*******************
manage product
*******************/
	/*******search for po*********/
	public function getPoUserListBySearch()
	{  
	    
	  $startdate = $this->input->post('startDate');
	  	if(empty($startdate)){
	  	   $startdate=''; 
	  	}else{
	  	  $startdate = date('Y-m-d' ,strtotime($startdate));  
	  	}
	  
	 	$enddate = $this->input->post('endDate');
	 	if(empty($enddate)){
	  	   $enddate=''; 
	  	}else{
	  	  $enddate = date('Y-m-d' ,strtotime($enddate));  
	  	}
	    $dealer_name = $this->input->post('dealer_name');
	    
	    $usersList= $this->Vendor_model->getPoUserListBySearch($startdate,$enddate,$dealer_name);
        
       
                    
                     $x=1;
                  	 foreach($usersList as $lis){
                  	 $d = date("d/M/Y",strtotime($lis['po_date']));
                  	 $id = base64_encode($lis['id']);
                     echo '<tr class="odd gradeX">
                     	<td>'.$x++.'</td>
                        <td>'.$lis['name'].'</td>
                        <td>'.$lis['mobile'].'</td>
                        <td>'.$lis['email'].'</td>
                        <td>'.$d.'</td>
                        <td><b style="color:Green;">Rs.'.$lis['sub_total'].'</b></td>
                      <td><b style="color:Green;">New PO</b></td>
                        <td>
                        <span class="btn btn-warning" onclick="productlisting('. $id.');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-eye"></i></span>
                        	<a href="'.base_url().'PO_Process/'.$id.'"><span class="btn btn-success" title="Genrate Sales Order"><i class="fa fa-share" aria-hidden="true"></i></span></a>
                    <span class="btn btn-danger" onclick="cancelpo('.$id.')" title="Cancel Purchase Order"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </td>
                     </tr>';

                 }
        } 

/*******search for so*********/
	public function getUserListBySearchSo()
	{  
	    //echo "hello";
	  	$startdate = $this->input->post('startDate');
	  	if(empty($startdate)){
	  	   $startdate=''; 
	  	}else{
	  	  $startdate = date('Y-m-d' ,strtotime($startdate));  
	  	}
	  
	 	$enddate = $this->input->post('endDate');
	 	if(empty($enddate)){
	  	   $enddate=''; 
	  	}else{
	  	  $enddate = date('Y-m-d' ,strtotime($enddate));  
	  	}
	 
	 	
	    $dealer_name = $this->input->post('dealer_name');
	    
	    
        $product_data= $this->Vendor_model->getUserListBySearchSo($startdate,$enddate,$dealer_name);
        
       
                     $x=1;
                     foreach($product_data as $lis){
                         $d = date("d/M/Y",strtotime($lis['so_date']));
                         $id = base64_encode($lis['id']);
                     echo '<tr class="odd gradeX">
                     	<td>'.$x++.'</td>
                        <td>'.$lis['name'].'</td>
                        <td>'.$lis['mobile'].'</td>
                        <td>'.$lis['email'].'</td>
                        <td>'.$d.'</td>
        <td><b style="color: red;"><i class="fa fa-inr"></i>'.$lis['subtotal'].'</b></td>
                        <td><b style="color:green;"><i class="fa fa-inr"></i> '. $lis['total'].'</b></td>
                       <td><b style="color:Green;">Genrate SO</b></td>
                        <td>
                         <span class="btn btn-warning" onclick="productlistingfromProductionStatus('.$id.');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-eye"></i></span>

                          <a href="'.base_url().'So_Invoice/'.$id.'"><span class="btn btn-primary" title="Invoice"><i class="fa fa-inr"></i></span></a>
                        
                        </td>
                     </tr>';

                  } 
        } 

/*******search for invoice*********/
	public function getUserListBySearchInvoice()
	{  
	    //echo "hello";
	  	$startdate = $this->input->post('startDate');
	  	if(empty($startdate)){
	  	   $startdate=''; 
	  	}else{
	  	  $startdate = date('Y-m-d' ,strtotime($startdate));  
	  	}
	  
	 	$enddate = $this->input->post('endDate');
	 	if(empty($enddate)){
	  	   $enddate=''; 
	  	}else{
	  	  $enddate = date('Y-m-d' ,strtotime($enddate));  
	  	}
	 
	    $dealer_name = $this->input->post('dealer_name');
	    
        $invoice_list= $this->Vendor_model->getUserListBySearchInvoice($startdate,$enddate,$dealer_name);
        
               
                     $x=1;
                  	 foreach($invoice_list as $lis){
                  	     $d = date("d/M/Y",strtotime($lis['invoice_date'])); 
                     echo '<tr class="odd gradeX">
                     	<td>'.$x++.'</td>
                        <td>'.$lis['invoice_number'].'</td>
                        <td>'.$d.'</td>
                        <td>'.$lis['name'].'</td>
                        
                       <td><b style="color:green;">Rs.'. $lis['after_tax_amount'].'</b></td>
                        <td>
                        <a href="'.base_url().'Final_invoice/'.base64_encode($lis['invoice_number']).'"><span class="btn btn-warning"  title="View Invoice"><i class="fa fa-money"></i></span>
                        </a>
                        </td>
                     </tr>';

                } 
        }
        
  /*******search for payment list*********/
	public function getUserListBySearchPaymentList()
	{  
	  	$startdate = $this->input->post('startDate');
	  	if(empty($startdate)){
	  	  $startdate =''; 
	  	}else{
	  	  $startdate = date('Y-m-d' ,strtotime($startdate));  
	  	}
	  
	 	$enddate = $this->input->post('endDate');
	 	if(empty($enddate)){
	  	  $enddate =''; 
	  	}else{
	  	  $enddate = date('Y-m-d' ,strtotime($enddate));  
	  	}
	 
	    $dealer_name = $this->input->post('dealer_name');
	    
        $paymentList = $this->Vendor_model->getUserListBySearchPaymentList($startdate,$enddate,$dealer_name);
                     
                     $x=1;                     
                     foreach ($paymentList as  $value) {
                     $final=$value['after_tax_amount'];
                     $paid=$value['totsum'];
                    echo '<tr>
                        <td>'.$x++.'</td>
                        <td>'.$value['name'].'</td>
                        <td>'.$value['invoice_no'].'</td>
                        <td><b style="color:orange;">
                        <i class="fa fa-inr" aria-hidden="true"></i>'.$final.'</b></td>
                        <td><b style="color:green;"><i class="fa fa-inr" aria-hidden="true"></i>'.$paid.'</b></td>
                        <td><b style="color:red;"><i class="fa fa-inr" aria-hidden="true"></i>'.$final.'-'.$paid.'</b></td>
                        <td>
                           <span class="btn btn-warning" onclick="paymentlisting('.base64_encode($value['invoice_no']).');" data-toggle="modal" data-target="#myModal" title="Payment History"><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </td>
                     </tr>';
                     }
 } 
/*******************
manage product closed
*******************/    


/*******************
Order product
*******************/
/******* Dealer po sent list*********/
	public function dealerPoSendList()
	{  
	  	$startdate = $this->input->post('startDate');
	  	if(empty($startdate)){
	  	  $startdate =''; 
	  	}else{
	  	  $startdate = date('Y-m-d' ,strtotime($startdate));  
	  	}
	  
	 	$enddate = $this->input->post('endDate');
	 	if(empty($enddate)){
	  	  $enddate =''; 
	  	}else{
	  	  $enddate = date('Y-m-d' ,strtotime($enddate));  
	  	}
	 
	    $dealer_name = $this->input->post('dealer_name');
	    
        $po_list = $this->Vendor_model->dealerPoSendList($startdate,$enddate,$dealer_name);
                  
                     $x=1;
                  	 foreach($po_list as $lis){
                  	 $d = date("d/M/Y",strtotime($lis['po_date'])); 
                  	 
                  	 if($lis['status']=='pending'){ 
                      $status = '<b style="color:orange;">Pending</b>';
                     }elseif($lis['status']=='Reject'){
                      $status = '<b style="color:red;">PO Reject By Admin</b>';
                     }elseif($lis['status']=='Genrate SO'){ 
                       $status = '<b style="color:green;">Sales Order Genrated</b>';
                     }
                     
                      if($lis['status']=='pending'||$lis['status']=='Reject'){ 
                      $view_produt = '<span class="btn btn-warning" onclick="productlistingfromPo('.base64_encode($lis['id']).');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-plus"></i></span>';
                      }else{ 
                       $view_produt = '<span class="btn btn-warning" onclick="productlistingfromsales('.base64_encode($lis['id']).');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-plus"></i></span>';
                          } 
                     
                     
                   echo '<tr class="odd gradeX">
                     	<td>'.$x++.'</td>
                        <td>'.$lis['name'].'</td>
                        <td>'.$lis['purchase_order_id'].'</td>
                        <td>'.$d.'</td>
                    <td><b style="color:green;">'.$lis['sub_total'].'</b></td>
                       <td>'.$status.'</td>
                        <td>'.$view_produt.'</td>
                     </tr>';
                  } 
            }

/******* Dealer so list*********/
	public function dealerSoList()
	{  
	  	$startdate = $this->input->post('startDate');
	  	if(empty($startdate)){
	  	  $startdate =''; 
	  	}else{
	  	  $startdate = date('Y-m-d' ,strtotime($startdate));  
	  	}
	  
	 	$enddate = $this->input->post('endDate');
	 	if(empty($enddate)){
	  	  $enddate =''; 
	  	}else{
	  	  $enddate = date('Y-m-d' ,strtotime($enddate));  
	  	}
	 
	    $dealer_name = $this->input->post('dealer_name');
	    
        $so_list = $this->Vendor_model->dealerSoList($startdate,$enddate,$dealer_name);
                  
                     $x=1;
            
                  	 foreach($so_list as $lis){
						$d = date("d/M/Y",strtotime($lis['status_date'])); 
						$id=base64_encode($lis['so_id']);
                 echo '<tr class="odd gradeX">
                     	<td>'.$x++.'</td>
                        <td><b style="color:green;">'.$lis['sales_order_id'].'</b></td>
                        <td>'.$lis['name'].'</td>
                        <td>'.$lis['mobile'].'</td>
                        <td><b style="color:orange;">'.$d.'</b></td>
                        <td><b style="color:green;">Rs.'.$lis['total'].'</b></td>
                        <td>  
                        <span class="btn btn-warning" onclick="productlistingfromProductionStatus('.$id.');" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true" title="See Product Status"></i></span>
                        </td>
                       </tr>';
                  } 
 } 
      
/******* Dealer Invoice list*********/
	public function dealerInvoiceList()
	{  
	  	$startdate = $this->input->post('startDate');
	  	if(empty($startdate)){
	  	  $startdate =''; 
	  	}else{
	  	  $startdate = date('Y-m-d' ,strtotime($startdate));  
	  	}
	  
	 	$enddate = $this->input->post('endDate');
	 	if(empty($enddate)){
	  	  $enddate =''; 
	  	}else{
	  	  $enddate = date('Y-m-d' ,strtotime($enddate));  
	  	}
	 
	    $dealer_name = $this->input->post('dealer_name');
	    
        $invoice_list = $this->Vendor_model->dealerInvoiceList($startdate,$enddate,$dealer_name);
                  
                     $x=1;
                     foreach($invoice_list as $lis){
					 $d = date("d/M/Y",strtotime($lis['invoice_date'])); 
                   echo '<tr class="odd gradeX">
                      <td>'.$x++.'</td>
                        <td>'.$lis['invoice_number'].'</td>
                        <td>'.$d.'</td>
                        <td><b style="color:green;">Rs.'.$lis['after_tax_amount'].'</b></td>
                        <td>
                        <a href="'.base_url().'Final_invoice/'.base64_encode($lis['invoice_number']).'" target="_blank"><span class="btn btn-warning"  title="View Invoice"><i class="fa fa-money"></i></span></a>
                        </td>
                     </tr>';

                  } 
 } 
      

/*******************
Order product closed
*******************/

/*************auto suggetion for employee and dealer list*********************/
public function autosuggestion(){
    $word = $this->input->post('word');
    $result=$this->Vendor_model->autosuggestion($word);
    echo json_encode($result); 
}

/******
auto suggetion product order 
*******/
public function autosuggestionProductOrder(){
    $word = $this->input->post('word');
    $result=$this->Vendor_model->autosuggestionProductOrder($word);
    echo json_encode($result); 
    
}

/*******update invoice amut**************/
function updateInvoiceAmount(){
    $result=$this->Vendor_model->updateInvoiceAmount();
}

}