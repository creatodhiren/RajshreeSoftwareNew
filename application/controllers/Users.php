<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	 function __construct() { 
         parent::__construct(); 
       
         $this->load->model('User_model');
         $this->load->model('login_model');
              
      } 
    
	public function showUserList()
	{   
		$data['title'] = 'Users List';
		$data['totalGotPO']= $this->login_model->countGotPo();

        $data1['usersList']= $this->User_model->usersList();
        $data1['stateList']= $this->User_model->stateList();
		$this->load->view('common/header',$data);
		$this->load->view('users_list',$data1);
		$this->load->view('common/footer');
	}

	public function add_users(){
		$data['title'] = 'Add Users';
		$data['totalGotPO']= $this->login_model->countGotPo();

		$data1['stateList']= $this->User_model->stateList();
		$data1['zonalHeadList']= $this->User_model->zonalHeadList();
		$data1['selectRole']= $this->User_model->selectRole();
		$this->load->view('common/header',$data);
		$this->load->view('addUsersFrom',$data1);
		$this->load->view('common/footer');

	}
	public function saveUsers(){
		$data['users']= $this->User_model->saveAddUsers();
		redirect('Users_List');
    }
    public function citynameGet(){
    	 $data['city']= $this->User_model->getCity();
     foreach ($data['city'] as $key => $value){
      echo "<option value=".$value['id'].">".$value['name']."</option>";
      }
    }

   public function Edit_user_by_id(){
   	$id = base64_decode($this->uri->segment(2));

   	$data['title'] = 'Edit Users';
   	$data['totalGotPO']= $this->login_model->countGotPo();

   	
   	 $data1['stateList']= $this->User_model->stateList();

   	 
		 $data1['editDataList']= $this->User_model->editData($id);
		 $state_id = $data1['editDataList'][0]['state'];
		  $data1['cityList']= $this->User_model->cityList($state_id);
		  $data1['zonalHeadList']= $this->User_model->zonalHeadList();
/*print_r($data1['editDataList']);
die();*/
		$this->load->view('common/header',$data);
		$this->load->view('editUsersFrom',$data1);
		$this->load->view('common/footer');
    
   }
   public function user_edit_data_save(){
   	$data1['stateList']= $this->User_model->saveEditData();
   	redirect('Users_List');
   }
   
   /****update status***/
   public function update_status()
	{   $id = base64_decode($this->input->post('id'));
	    $tbl= $this->input->post('tbl');
	    $status= $this->input->post('status'); 
	    if($status==0){
	        $status=1;
	    }else{
	        $status=0;
	    }
	    
	    $data1['status_updated']= $this->User_model->update_status($id, $tbl,$status);
		
		$data['title'] = 'Users List';
		$data['totalGotPO']= $this->login_model->countGotPo();
        
        $data1['usersList']= $this->User_model->usersList();
		$this->load->view('common/header',$data);
		$this->load->view('users_list',$data1);
		$this->load->view('common/footer');
	}
	
/*****dyanamic filter for userlist************/
	public function getUserListBySearch()
	{  
	    
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
	 
	 	$state = $this->input->post('state');
	    $city = $this->input->post('city');
	    $dealer_name = $this->input->post('dealer_name');
	    
	    $usersList= $this->User_model->getUserListBySearch($state,$city,$dealer_name);
	     
	    //print_r($usersList);
        
                     $x=1;
                  	 foreach($usersList as $lis){
                  	 $d=$lis['createDateandtime'];
                  	 $d =  date('d-m-y',strtotime($d));
                     $id=base64_encode($lis['id']); 
                     $tbl_manage_user= 'tbl_manage_user';
                     
                         if($lis['status']==0){
                        $btn_text= "Enable";
                        }else{
                        $btn_text= "Disable";
                        }
                        
                        if($login_role=='admin'){ 
                            	
                          $btn='<button type="button" class="btn btn-danger btn_e_d" onclick="update_status('.$id.','.$tbl_manage_user.','.$lis['status'].')">'.$btn_text.'</button>';
                        }else{
                           $btn=''; 
                        } 
                     
                     echo'<tr class="odd gradeX">
                     	<td>'.$x++.'</td>
                        <td>'.$lis['name'].'</td>
                        <td>'.$lis['email'].'</td>
                        <td>'.$lis['password'].'</td>
                        <td class="center">'.$lis['mobile'].'</td>
                        
                        <td class="center">'.$lis['role'].'</td>
                        <td>'.$d.'</td>
                        <td>
                        <a href="'.base_url().'Edit_User_Details/'.$id.'"><span class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>'.$btn.'</td></tr>';
        }
           
	  }
	  
/*************auto suggetion*********************/
public function autosuggestionForEmp(){
    $word = $this->input->post('word');
    
    $result=$this->User_model->autosuggestionForEmp($word);
     echo json_encode($result); 
}
}