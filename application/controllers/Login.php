<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 function __construct() { 
         parent::__construct(); 
       
         $this->load->model('login_model');
         $this->load->model('Vendor_model');
              
      } 
    
	public function index()
	{   if(empty($this->session->userdata('login_data'))){
			  $this->load->view('login');
		}else{
			redirect('Dashboard');
		}
		
	}
	public function loginAuth(){
       $auth= $this->login_model->auth();
	   $status = $auth['login_data'][0]['status'];
	   if($status == 0) {
       if($auth['login_num_row']=='1'){
                 
                    $this->session->set_userdata(array('login_data'=>$auth['login_data']));
                     redirect('Dashboard');
                     }else{
                       $this->session->set_flashdata("category_error", "Email and Password doesn't match");
                       redirect('Login');
                     }
	   }else{
		  $this->session->set_flashdata("category_error", "Sorry your account is temporarily deactivated by the admin.");
           redirect('Login'); 
	   }
      //print_r($auth);exit;
	}
	public function dashboard(){
		if(empty($this->session->userdata('login_data'))){
			  redirect('Login');
		}else{
			$login_data = $this->session->userdata('login_data');


			$data['title'] = 'Dashboard';


	        $data['totalGotPO']= $this->login_model->countGotPo();
	 $data1['totalGotPO']= $this->login_model->countGotPo();
	 $data1['RejectedPo']= $this->login_model->countRejectedPo();	
	 $data1['FinalInvoice']= $this->login_model->countFinalInvoice();
	 $data1['totalvendor']= $this->login_model->counttotalvendor();
	 $data1['totalemp']= $this->login_model->counttotalEmp();	
	 $data1['totalsales']= $this->login_model->counttotalsales();
	 $data1['order_list'] = $this->login_model->order_list_for_admin();
	 $data1['PendingSO'] = $this->login_model->pendingSO();

     $data1['total_PO']= $this->Vendor_model->total_vendor_PO($login_data[0]['user_id']);
     $data1['total_invoice']= $this->Vendor_model->total_vendor_invoice($login_data[0]['user_id']);
     $data1['total_pending']= $this->Vendor_model->total_vendor_pending($login_data[0]['user_id']);
     $data1['total_reject']= $this->Vendor_model->total_vendor_reject($login_data[0]['user_id']);

     

		$this->load->view('common/header',$data);
		$this->load->view('dashboard',$data1);
		$this->load->view('common/footer');
	}
	}
	public function logout(){
    $this->session->unset_userdata('login_data');
     $this->session->set_flashdata("category_error", "Logout Successfully
      ");
      redirect('Login');
  }
}

