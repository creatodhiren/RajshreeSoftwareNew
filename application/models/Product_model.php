<?php
class Product_model extends CI_Model {

   function optionClassList($option=''){
     $this->db->select('*');
     $this->db->from('tbl_product_option');
     $this->db->where('option_class',$option);
    $query = $this->db->get(); 
	//echo $this->db->last_query();
    return $query->result_array();   
    }
	
	
/*******************Option Save*******************************/
    function saveOption() {
    
     
     $option_name = $this->input->post('option_name');
     $option_class = $this->input->post('option_class');
	 
	 if($option_class==''){
		$option_class='Color';
	 }else{
	    $option_class = $this->input->post('option_class'); 
	 }

    if(empty($option_class)){
    $this->db->select('*');
    $this->db->from('tbl_product_option');
    $this->db->where('option_name',$option_name);
    $this->db->where('option_class','');
    $query = $this->db->get(); 
    $num = $query->num_rows();
    /**********Condition****************/
    if($num=='0'){
     $insertarr = array(
                'option_name' =>  $this->input->post('option_name')
                
                    );
     $insert = $this->db->insert('tbl_product_option',$insertarr);
       $messge = array('message' => 'Option Class Add successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('Option_class', $messge);

    }else{
        $messge = array('message' => 'Class Already Exist ','class' => 'alert alert-danger');
              $this->session->set_flashdata('Option_class', $messge);
  
    }


/****************condition end***********************/

        }else{

    $this->db->select('*');
    $this->db->from('tbl_product_option');
    $this->db->where('option_name',$option_name);
    $this->db->where('option_class',$option_class);
    $query = $this->db->get(); 
    $num = $query->num_rows();

 if($num=='0'){
     $insertarr = array(
                'option_name' =>  $this->input->post('option_name'),
                'option_class' => $option_class
                
                    );
     $insert = $this->db->insert('tbl_product_option',$insertarr);
       $messge = array('message' => 'Option Add successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('Option_class', $messge);

    }else{
        $messge = array('message' => 'Option Already Exist ','class' => 'alert alert-danger');
              $this->session->set_flashdata('Option_class', $messge);
  
    }
}
        
}


/*****************Product option list****************************/
function coloroptionList(){
    $this->db->select('*');
    $this->db->from('tbl_product_option');
    $this->db->where('option_class=','PLAIN COLORS');
    $this->db->or_where('option_class=','PRELAM COLORS');
    $this->db->order_by("option_id", "desc");
    $query = $this->db->get(); 
    return $query->result_array();

}
function optionList($option){
    $this->db->select('*');
    $this->db->from('tbl_product_option');
    $this->db->where('option_class=',$option);
    $this->db->order_by("option_id", "desc");
    $query = $this->db->get(); 
    return $query->result_array();
    
}

/******************Edit Product Option by id******************************/
function editDataFatch($option_id){
$this->db->select('*');
    $this->db->from('tbl_product_option');
    $this->db->where('option_id',$option_id);
    $query = $this->db->get(); 
    return $query->result_array();

}
/************Update save*******************/
function updateSave(){
   $option_id = $this->input->post('upid');  
  $option_name = $this->input->post('option_name');
  $option_class = $this->input->post('option_class'); 
  if($option_class==''){
		$option_class='Color';
	 }else{
	    $option_class = $this->input->post('option_class');
	 }

  $updatearr = array(
                'option_name' =>  $option_name,
                'option_class' => $option_class
                
                  );
$this->db->where('option_id', $option_id); 
$update = $this->db->update('tbl_product_option',$updatearr);
if($update){
 $messge = array('message' => 'Option Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('Option_class', $messge);
}else{
$messge = array('message' => 'Option Update Not successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('Option_class', $messge);
}

}


/*********update product all option**********/
function update_product_option_save(){
   $option_id = $this->input->post('upid');  
   $option_name = $this->input->post('option_name');

  $updatearr = array(
                'option_name' =>  $option_name,
                  );
$this->db->where('option_id', $option_id); 
$update = $this->db->update('tbl_product_option',$updatearr);
if($update){
 $messge = array('message' => 'Option Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('Option_class', $messge);
}else{
$messge = array('message' => 'Option Update Not successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('Option_class', $messge);
}

}
/***************Cetegory Section Start*********************/
function categoryList(){
$this->db->select('*');
    $this->db->from('tbl_product_category');
    $this->db->where('parent_name','');
    $this->db->order_by("id", "desc");
    $query = $this->db->get(); 
    return $query->result_array();

}
function saveCategory(){
 $category_name = $this->input->post('category_name');
    $parent_name = $this->input->post('parent_name');

    if(empty($parent_name)){
    $this->db->select('*');
    $this->db->from('tbl_product_category');
    $this->db->where('category_name',$category_name);
    $this->db->where('parent_name','');
    $query = $this->db->get(); 
    $num = $query->num_rows();
    /**********Condition****************/
    if($num=='0'){
     $insertarr = array(
                'category_name' =>  $this->input->post('category_name')
                
                    );
     $insert = $this->db->insert('tbl_product_category',$insertarr);
       $messge = array('message' => 'Parent Add successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('category', $messge);

    }else{
        $messge = array('message' => 'Parent Already Exist ','class' => 'alert alert-danger');
              $this->session->set_flashdata('category', $messge);
  
    }


/****************condition end***********************/

        }else{
    //echo "sanjay";exit;
    $this->db->select('*');
    $this->db->from('tbl_product_category');
    $this->db->where('category_name',$category_name);
    $this->db->where('parent_name',$parent_name);
    $query = $this->db->get(); 
   $num = $query->num_rows();

 if($num=='0'){
     $insertarr = array(
                'category_name' =>  $this->input->post('category_name'),
                'parent_name' => $parent_name
                
                    );
     $insert = $this->db->insert('tbl_product_category',$insertarr);
       $messge = array('message' => 'Category Add successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('category', $messge);

    }else{
        $messge = array('message' => 'Option Already Exist ','class' => 'alert alert-danger');
              $this->session->set_flashdata('category', $messge);
  
    }



    }  
}

function categoryAllList(){
  $this->db->select('*');
    $this->db->from('tbl_product_category');
   // $this->db->where('parent_name!=','');
    $this->db->order_by("id", "desc");
    $query = $this->db->get(); 
    return $query->result_array();
}

function editCategoryDataFatch($id){
  $this->db->select('*');
    $this->db->from('tbl_product_category');
    $this->db->where('id',$id);
    $query = $this->db->get(); 
    return $query->result_array();

}
function updateProductSave(){
  $id = base64_decode($this->input->post('upid'));  
  $category_name = $this->input->post('category_name');
  $parent_name = $this->input->post('parent_name');

  $updatearr = array(
                'category_name' =>  $category_name,
                'parent_name' => $parent_name
                
                  );
  //print_r($updatearr);exit;
$this->db->where('id', $id); 
$update = $this->db->update('tbl_product_category',$updatearr);
if($update){
 $messge = array('message' => 'Category Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('category', $messge);
}else{
$messge = array('message' => 'Category Update Not successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('category', $messge);
}
}

/******************Product Section**************************/
function get_category_list(){
 $this->db->select('id,category_name');
    $this->db->from('tbl_product_category');
    $this->db->where('parent_name','');
    $this->db->order_by("id", "asc");
    $query = $this->db->get(); 
    return $query->result_array(); 
}
function get_color_list(){
  $this->db->select('option_id,option_name');
    $this->db->from('tbl_product_option');
    $this->db->where('option_class','Color');
    $this->db->order_by("option_id", "desc");
    $query = $this->db->get(); 
    return $query->result_array(); 
}
 /******product code genarated********/
function product_code_generated(){
  $this->db->select('*');
  $this->db->from('tbl_product_details');
  $this->db->order_by('id','desc');
  $this->db->limit(1);
  $query = $this->db->get(); 
  $last_record=$query->result_array();
if(empty($last_record)){
  $product_code ='PROD/1001';
}else{
  $start = '1001';
  $in_no =  $last_record[0]['id'] + $start;
  $product_code ='PROD/'.$in_no;
}
return $product_code;
}
/***********************/


function productSave(){
    /************************************/
  $product_code = $this->input->post('product_code');
  $product_image = $_FILES['product_image']['name'];
//print_r($picture);exit;
  
  $category_id = $this->input->post('product_category');
  
  $productType = $this->input->post('product_type');
  $grade = $this->input->post('grade');
  $parent_color = $this->input->post('parent_color');
  $color_id = $this->input->post('color_id');
  $thickness = $this->input->post('thickness');
  $design = $this->input->post('design');
  $sizeFeet = $this->input->post('size');
  
  /* echo "<pre>";
  print_r($productType);
  print_r($grade);
  print_r($color_id);
  print_r($thickness);
  print_r($design);
  print_r($sizeFeet);
  die(); */
  
  $govt_price = $this->input->post('govt_price');
  $retail_price = $this->input->post('retail_price');
  $opening_stock = $this->input->post('opening_stock');
  $hsn_code = $this->input->post('hsn_code');
  
 $product_qty = $this->input->post('double_Qty');
 if($product_qty == 'No'){
     $product_qty=1;
 }else{
   $product_qty =  $this->input->post('second_qty');
 }

  $result = $this->Product_model->check_product($product_code,$category_id);
  
  if ($result=='0') {

if(!empty($_FILES['product_image']['name'])){
       $config['upload_path'] = 'upload/';
       $config['allowed_types'] = 'gif|jpg|png';
      
        $this->load->library('upload',$config);
        $this->upload->initialize($config); 
                if ($this->upload->do_upload('product_image')) {
                $uploadData=$this->upload->data();
         //print_r($uploadData);exit;
         $picture= $uploadData['file_name'];
      }
      else{}
    }
  else{
    $picture="";
  }


							 $insertarr = array(
										   'product_name' => $product_code,
										   'category_id'  => $category_id,
										   'image_name'   => $picture,
										   'thickness'    => json_encode($thickness),
										   'status'       => 'Active',
										   'hsn_code'     => $hsn_code,
										   'stock_UOM'    => $this->input->post('stock_UOM'),
										   'double_Qty'   => $product_qty,
										   'sale_ac'      => $this->input->post('sale_ac'),
										   'sale_return_ac'=> $this->input->post('sale_return_ac'),
										   'product_type' =>$productType,
                       'grade' => $grade,
                       'parent_color' => $parent_color,
										   'color' => json_encode($color_id),
										   'design' => json_encode($design) ,
                       'size_feet' =>$sizeFeet,
                       'govt_price' => $govt_price,
										   'retailer_price'   => $retail_price,
										   'opening_stock'    => $opening_stock,
										   'product_description' => $this->input->post('product_description')
											); 


							 $insert = $this->db->insert('tbl_product_details',$insertarr);
						 //}
                
  $messge = array('message' => 'Product Add Successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('product', $messge);

}else{
   $messge = array('message' => 'Product Already Exist','class' => 'alert alert-danger');
              $this->session->set_flashdata('product', $messge);
}

}


function check_product($product_name,$category_id) {

   $condition = "product_name ='".$product_name."' and category_id ='". $category_id ."'"; 

  $this->db->select('*');
  $this->db->from('tbl_product_details');
  $this->db->where($condition);
 
  $query = $this->db->get();
  return $query->num_rows();
}
/*function getproductList(){
   $this->db->select('tpd.*,tpo.option_name,tpod.product_id,tpc.category_name,tpod.option_id,tpod.govt_price,tpod.retailer_price,tpod.opening_stock');
    $this->db->from('tbl_product_details tpd');
    $this->db->join('tbl_product_option_details tpod','tpod.product_id=tpd.id');
    $this->db->join('tbl_product_category tpc','tpc.id=tpd.category_id');
    $this->db->join('tbl_product_option tpo','tpo.option_id=tpod.option_id');
    $this->db->where('option_class!=','');
    $this->db->group_by("tpd.id");
    $query = $this->db->get(); 
    return $query->result_array();
}*/
function getproductList(){
   $query=  $this->db->query("SELECT tpd.color,tpd.thickness , tpd.image_name,tpd.product_name,tpd.size_feet, tpc.category_name ,tpd.govt_price,tpd.retailer_price,tpd.id FROM `tbl_product_details` as tpd join tbl_product_category as tpc on tpd.category_id=tpc.id");
  $query=  $query->result_array(); 
   return $query;
}

function getDatabyProductid($id){
    $this->db->select('*');
    $this->db->from('tbl_product_details');
    $this->db->where('id',$id);
    $query = $this->db->get(); 
    return $query->result_array();

}
function product_design($design_id){
    $this->db->select('*');
    $this->db->from('tbl_product_option');
    $this->db->where('option_id',$design_id);
    $query = $this->db->get(); 
    return $query->result_array();

}
function updateProductDetailsSave(){
  $id = base64_decode($this->input->post('upid'));
  $product_name = $this->input->post('product_code');
  $product_image = $_FILES['product_image']['name'];
  $old_image = $this->input->post('old_image');
  $category_id = $this->input->post('product_category');
  $product_type = $this->input->post('product_type');
  $parent_color = $this->input->post('parent_color');
  $color_id = $this->input->post('color_id');
  $thickness = $this->input->post('thickness');
  $grade = $this->input->post('grade');
  $design = $this->input->post('design');
  $govt_price = $this->input->post('govt_price');
  $retail_price = $this->input->post('retail_price');
  $opening_stock = $this->input->post('opening_stock'); 
  $hsn_code = $this->input->post('hsn_code');
  
   $product_qty = $this->input->post('double_Qty');
 if($product_qty == 'No'){
     $product_qty=1;
 }else{
   $product_qty =  $this->input->post('second_qty');
 }

/*************With Image*************/
if(!empty($product_image)){
  
$config['upload_path'] = 'upload/';
       $config['allowed_types'] = 'gif|jpg|png';
       
       $config['file_name'] = $_FILES['product_image']['name'];
         
          $this->load->library('upload',$config);
          $this->upload->initialize($config);
  
              if ($this->upload->do_upload('product_image')) {
                $uploadData=$this->upload->data();
         //print_r($uploadData);exit;
         $picture= $uploadData['file_name'];
       }
   
}else{
 $picture= $old_image;
}


							$insertarr = array(
               'product_name' => $product_name,
               'category_id'  => $category_id,
               'image_name'   => $picture,
               'thickness'    => json_encode($thickness),
               'hsn_code'     => $hsn_code,
               'stock_UOM'    => $this->input->post('stock_UOM'),
               'double_Qty'   => $product_qty,
               'sale_ac'      => $this->input->post('sale_ac'),
               'sale_return_ac'=> $this->input->post('sale_return_ac'),
               'product_type' => $product_type,
               'grade' =>$grade ,
               'parent_color' =>$parent_color ,
               'color' =>json_encode($color_id),
               'design' =>json_encode($design) ,
               'size_feet' => $this->input->post('size'),
               'product_description' => $this->input->post('product_description')
               
                 ); 
              
$this->db->where('id', $id); 
$update = $this->db->update('tbl_product_details',$insertarr);

							

if($update){
 $messge = array('message' => 'Product Update successfully','class' => 'alert alert-success');
              $this->session->set_flashdata('product', $messge);
}else{
$messge = array('message' => 'Product Update Not successfully','class' => 'alert alert-danger');
              $this->session->set_flashdata('product', $messge);
}



}
/**********************************************/

function get_data($tblname,$condition=array(), $orderBy='',$limit=0,$offset=0,$fetch_field='*')
        {
            $this->db->select($fetch_field);
            $this->db->from($tblname);
            if (!empty($condition) || $condition!='') {
                $this->db->where($condition);
            }
            if ($orderBy!='') {
                $this->db->order_by($orderBy);
            }
            if ($limit!=0) {
               $this->db->limit($limit,$offset);
            }
            $query = $this->db->get();
            return $query->result_array();
        }
}