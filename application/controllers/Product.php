<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	 function __construct() { 
         parent::__construct(); 
       
         $this->load->model('Product_model');
         $this->load->model('login_model');
              
      } 
/*************Category Section*********************/
	public function add_category_form()
	{   
		$data['title'] = 'Add Category';
    $data['totalGotPO']= $this->login_model->countGotPo();

       $data1['parentList']= $this->Product_model->categoryList();
		$this->load->view('common/header',$data);
		$this->load->view('add_category_form',$data1);
		$this->load->view('common/footer');
	}
  public function save_category(){
$data1['option']= $this->Product_model->saveCategory();
     redirect('Add_Category');

  }
  public function category_list(){
  $data['title'] = 'List Category';
  $data['totalGotPO']= $this->login_model->countGotPo();


        $data1['category_List']= $this->Product_model->categoryAllList();
      $this->load->view('common/header',$data);
    $this->load->view('category_list',$data1);
    $this->load->view('common/footer');  
  }

 public function edit_category(){
    $id = base64_decode($this->uri->segment(2));

  $data['title'] = 'Edit Product Option';
  $data['totalGotPO']= $this->login_model->countGotPo();

     $data1['category_data']= $this->Product_model->editCategoryDataFatch($id);
       $data1['category_List']= $this->Product_model->categoryList();
        //print_r($data1);exit;
      $this->load->view('common/header',$data);
    $this->load->view('edit_category_form',$data1);
    $this->load->view('common/footer');
 }
public function update_category(){
  $data1= $this->Product_model->updateProductSave();
  redirect('Category_List');

}





  /********Option Section***********/
    public function add_product_option(){
    	$data['title'] = 'Add Product Option';
      $data['totalGotPO']= $this->login_model->countGotPo();

    	 $data1['class_option_List']= $this->Product_model->optionClassList();
 		$this->load->view('common/header',$data);
		$this->load->view('add_product_option_form',$data1);
		$this->load->view('common/footer');
    }
    /****color option*****/
	 public function add_Color_Option(){
       $data['title'] = 'Add Color Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
        $data['option_data']=array();
    	$data1['class_option_List']= $this->Product_model->optionClassList('Color');
 		$this->load->view('common/header',$data);
		$this->load->view('add_color_option_form',$data1);
		$this->load->view('common/footer');
    }
	/****design option*****/
	 public function add_Design_Option(){
    	$data['title'] = 'Add Design Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
 		$this->load->view('common/header',$data);
		$this->load->view('add_design_option_form');
		$this->load->view('common/footer');
    }
	/****size option*****/
	 public function add_size_Option(){
    	$data['title'] = 'Add Size Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
 		$this->load->view('common/header',$data);
		$this->load->view('add_size_option_form');
		$this->load->view('common/footer');
    }
	/****thickness option*****/
	 public function add_thickness_Option(){
    	$data['title'] = 'Add thickness Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
 		$this->load->view('common/header',$data);
		$this->load->view('add_thickness_option_form');
		$this->load->view('common/footer');
    }
	/****grade option*****/
	 public function add_grade_Option(){
    	$data['title'] = 'Add Grade Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
 		$this->load->view('common/header',$data);
		$this->load->view('add_grade_option_form');
		$this->load->view('common/footer');
    }
	/****product type option*****/
	 public function add_product_type_Option(){
    	$data['title'] = 'Add Product Type Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
		$data1['class_option_List']= $this->Product_model->optionClassList('produtype');
 		$this->load->view('common/header',$data);
		$this->load->view('add_product_type_option_form');
		$this->load->view('common/footer');
    }
	/****place of supply option*****/
	 public function add_place_of_supply_Option(){
    	$data['title'] = 'Add Place Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
 		$this->load->view('common/header',$data);
		$this->load->view('add_place_of_supply_option_form');
		$this->load->view('common/footer');
    }
	/****sale a/c option*****/
	 public function add_saleac_Option(){
    	$data['title'] = 'Add Sale A/C Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
 		$this->load->view('common/header',$data);
		$this->load->view('add_saleac_option_form');
		$this->load->view('common/footer');
    }
	/****sale  ret a/c option*****/
	 public function add_sale_ret_ac_Option_Option(){
    	$data['title'] = 'Add sale Ret. A/C Option';
        $data['totalGotPO']= $this->login_model->countGotPo();
 		$this->load->view('common/header',$data);
		$this->load->view('add_saleretac_option_form');
		$this->load->view('common/footer');
    }
    public function save_option(){
     $data1['option']= $this->Product_model->saveOption();
     redirect($_SERVER['HTTP_REFERER']);
     //redirect('Add_Product_Option');
    }

 /*  public function list_product_option(){
        $option =  $this->uri->segment(2); 
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList($option);
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }*/
   public function list_color_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->coloroptionList();
     	$this->load->view('common/header',$data);
		$this->load->view('color_option_list',$data1);
		$this->load->view('common/footer');
   }
   public function list_design_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('Design');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
   public function list_size_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('Size In Feet');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
   public function list_thickness_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('thickness');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
    public function list_grade_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('Grade');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
   public function list_product_type_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('Product Type');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
    public function List_Place_Option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('Place Of Supply');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
   public function list_sale_ac_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('Sale A/c');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
   public function list_sale_ret_ac_option(){
   	    $data['title'] = 'List Product Option';
        $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_List']= $this->Product_model->optionList('Sale Ret. A/c');
     	$this->load->view('common/header',$data);
		$this->load->view('product_option_list',$data1);
		$this->load->view('common/footer');
   }
    
   public function edit_option_list(){
   $id = base64_decode($this->uri->segment(2));
   $data['title'] = 'Edit Product Option';
   $data['totalGotPO']= $this->login_model->countGotPo();


        $data1['option_data']= $this->Product_model->editDataFatch($id);
        $data1['option_List']= $this->Product_model->optionClassList();
        //print_r($data1);exit;
     	$this->load->view('common/header',$data);
		$this->load->view('edit_product_option',$data1);
		$this->load->view('common/footer');
   }
   
   public function edit_color_list(){
   $id = base64_decode($this->uri->segment(2));
   $data['title'] = 'Edit Product Option';
   $data['totalGotPO']= $this->login_model->countGotPo();

        $data1['option_data']= $this->Product_model->editDataFatch($id);
        $data1['class_option_List']= $this->Product_model->optionClassList('Color');
        //print_r($data1);exit;
     	$this->load->view('common/header',$data);
		$this->load->view('add_color_option_form',$data1);
		$this->load->view('common/footer');
   }

/****************Update Option Value Save***********************/
public function update_option_save(){
 $data1['option_data']= $this->Product_model->updateSave();
 redirect($_SERVER['HTTP_REFERER']);
//redirect('List_Product_Option');
}
public function update_product_option_save(){
 $data1['option_data']= $this->Product_model->update_product_option_save();
 redirect($_SERVER['HTTP_REFERER']);
//redirect('List_Product_Option');
}
/*************Product Section***************/
public function add_product_form(){
  $data['title'] = 'Add Product';
  $data['totalGotPO']= $this->login_model->countGotPo();

   $data1['category_list']= $this->Product_model->get_category_list();
  $data1['color_list']= $this->Product_model->get_color_list();

  $data1['product_type']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Product Type'),'','','','option_id,option_name');
  $data1['sale_ac']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Sale A/c'),'','','','option_id,option_name');
  $data1['sale_ret_ac']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Sale Ret. A/c'),'','','','option_id,option_name');
  $data1['grade']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Grade'),'','','','option_id,option_name');
  $data1['design']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Design'),'','','','option_id,option_name');
  $data1['thickness']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'thickness'),'','','','option_id,option_name');
  $data1['SizeInFeet']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Size In Feet'),'','','','option_id,option_name');

    $this->load->view('common/header',$data);
    $this->load->view('add_product_form',$data1);
    $this->load->view('common/footer');

}
public function select_child(){
	 $option = $this->input->post('option');
	 $data1=$this->Product_model->get_data('tbl_product_option',array('option_class'=>$option),'','','','option_id,option_name');
	 
	 foreach($data1 as $data){
	 echo '<option value="'.$data['option_name'].'">'.$data['option_name'].'</option>';
	 //echo '<input type="checkbox" value="'.$data['option_id'].'" name="chk_color">'.$data['option_name'].'<br>';
	 }
	 //print_r($data1['design']);
}

public function getColorList(){
  $option = $this->input->post('option');
  $data1=$this->Product_model->get_data('tbl_product_option',array('option_class'=>$option),'','','','option_id,option_name');

  foreach($data1 as $data){
  echo '<option value="'.$data['option_name'].'">'.$data['option_name'].'</option>';
  }
}

public function SaveProduct(){
 $data1['product_data']= $this->Product_model->productSave();
 redirect('Product_list');
 
}
public function product_list(){
  $data['title'] = 'Product Listing';
  $data['totalGotPO']= $this->login_model->countGotPo();

   $data1['product_data']= $this->Product_model->getproductList();
   //echo "<pre>";
   //print_r($data1['product_data']);
   //echo "</pre>";exit;
     
    $this->load->view('common/header',$data);
    $this->load->view('product_list',$data1);
    $this->load->view('common/footer');
}
public function edit_product_form(){
  $id = base64_decode($this->uri->segment(2));
  $data['title'] = 'Add Product';
  $data['totalGotPO']= $this->login_model->countGotPo();
  
  $data1['product_data'] = $this->Product_model->getDatabyProductid($id);
  $data1['category_list']= $this->Product_model->get_category_list();
  $data1['color_list']= $this->Product_model->get_color_list();
  $data1['product_type']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Product Type'),'','','','option_id,option_name');
  $data1['sale_ac']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Sale A/c'),'','','','option_id,option_name');
  $data1['sale_ret_ac']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Sale Ret. A/c'),'','','','option_id,option_name');
  $data1['grade']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Grade'),'','','','option_id,option_name');
  $data1['design']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Design'),'','','','option_id,option_name');
  $data1['thickness']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'thickness'),'','','','option_id,option_name');
  $data1['SizeInFeet']=$this->Product_model->get_data('tbl_product_option',array('option_class'=>'Size In Feet'),'','','','option_id,option_name');
  
    $this->load->view('common/header',$data);
    $this->load->view('edit_product_form',$data1);
    $this->load->view('common/footer');

}
public function UpdateSaveProduct(){
  
$data1['product_data']= $this->Product_model->updateProductDetailsSave();
 redirect('Product_list');
}
/**********************End quate***********************************/
}