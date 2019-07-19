<link href="<?php echo base_url(); ?>assets/css/custome.css" rel="stylesheet" type="text/css" />
<style>
.checkbox input[type=checkbox] {
    display:block!important;
}
</style>
<div class="content">
  <?php
      if($this->session->flashdata('product')) {
      $message = $this->session->flashdata('product');
      
      ?>
   <div class="col-md-4 col-md-offset-4 <?php echo $message['class'] ?>">
      <button class="close" data-dismiss="alert"></button>
      <center><b><?php echo $message['message']; ?></b></center>
   </div>
   <?php
      }
      
      ?>
  <div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h3>Add<span class="semi-bold"> Product</span></h3>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>SaveProduct" enctype="multipart/form-data" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
             <div class="row">
               <div class="form-group col-md-6">
                   <?php 
                  $product_code= $this->Product_model->product_code_generated();
                   ?>
                  <label class="form-label">Product Code</label>
                  <input class="form-control" id="product_code" placeholder="Enter Product Code.." autocomplete="off" name="product_code" type="text" required="" aria-required="true" value="<?php echo $product_code; ?>">
               </div>
               <div class="form-group col-md-6">
                  <label class="form-label">UOM (In Feet)</label>
                  <input class="form-control" id="stock_UOM" placeholder="Enter Stock UOM" autocomplete="off" name="stock_UOM" type="text" required="" aria-required="true" value="">
               </div>
            </div>

            <div class="row">
               <div class="form-group col-md-2">
                  <label class="form-label">Double Qty</label>
                  <select class="form-control" id="double_Qty" autocomplete="off" name="double_Qty"  required="" aria-required="true"onchange="secondQty(this.value)">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
            
               </div>
               <div class="form-group col-md-2">
                  <label class="form-label">Second Qty</label>
                  <input class="form-control" id="second_qty" placeholder="Enter Second Qty" autocomplete="off" name="second_qty" type="text" required="" aria-required="true" value="">
               </div>
               
               <div class="form-group col-md-4">
                  <label class="form-label">Sale A/C</label>
                  <select class="form-control" id="sale_ac" autocomplete="off" name="sale_ac"  required="" aria-required="true">
                    <option value="">Select Sale A/c</option>
                    
                    <?php foreach ($sale_ac as $sale_acs) {
                    ?> 
                    <option value="<?php echo $sale_acs['option_name']; ?>"><?php echo $sale_acs['option_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
                <div class="form-group col-md-4">
                  <label class="form-label">Sale Ret. A/c</label>
                  <select class="form-control" id="sale_return_ac" autocomplete="off" name="sale_return_ac"  required="" aria-required="true">
                    <option value="">Select Sale Ret. A/c</option>
                   <?php foreach ($sale_ret_ac as $sale_ret_acs) {
                    ?> 
                    <option value="<?php echo $sale_ret_acs['option_name']; ?>"><?php echo $sale_ret_acs['option_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
            </div>



            <div class="row">
               <div class="form-group col-md-4">
                  <label class="form-label">Product Category</label>
                  <select class="form-control" id="product_category" autocomplete="off" name="product_category"  required="" aria-required="true">
                    <option value="">Select Category Name</option>
                    <?php foreach ($category_list as $key => $value) {
                    ?> 
                    <option value="<?php echo $value['id']; ?>"><?php echo $value['category_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
               <div class="form-group col-md-4">
                  <label class="form-label">Product Type</label>
                  <select class="form-control" id="product_type" autocomplete="off" name="product_type"  required="" aria-required="true">
                  <option value="">Select Product Type</option>
                    <?php foreach ($product_type as $product_types) {
                    ?> 
                    <option value="<?php echo $product_types['option_name']; ?>"><?php echo $product_types['option_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
               <div class="form-group col-md-4">
                  <label class="form-label">Grade</label>
                  <select class="form-control" id="grade" autocomplete="off" name="grade"  required="" aria-required="true">
                  <option value="">Select Grade</option>
                    <?php foreach ($grade as $grades) {
                    ?> 
                    <option value="<?php echo $grades['option_name']; ?>"><?php echo $grades['option_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
               
            </div>

            <div class="row">
           
               <div class="form-group col-md-4">
                  <label class="form-label">Color</label>
                  <select class="form-control" id="selectcolor" autocomplete="off" name=""  required="" aria-required="true">
                    <option value="">Select Color</option>
                    <?php 
                    foreach ($color_list as $key => $value) {
                    ?>
                    <option value="<?php echo $value['option_name']; ?>"><?php echo $value['option_name']; ?></option>
                    <?php 
                    }
                    ?>
                  </select>
               </div>
			   <div class="form-group col-md-4">
                  <label class="form-label">Color Type</label>
                  <select class="form-control" id="color_id1" autocomplete="off" name="color_id[]"  required="" aria-required="true" multiple="multiple">
           
                  </select>
               </div>

               
			   <div class="form-group col-md-4">
                  <label class="form-label">Thickness</label>
                  <select class="form-control" id="thickness" autocomplete="off" name="thickness[]"  required="" aria-required="true" multiple="multiple">
                    <?php foreach ($thickness as $thickness) {
                    ?> 
                    <option value="<?php echo $thickness['option_name']; ?>"><?php echo $thickness['option_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
			   
               
            </div>
			<div class="row">
			<div class="form-group col-md-4">
                  <label class="form-label">Design</label>
                  <select class="form-control"  id="design" autocomplete="off" name="design[]"  required="" aria-required="true" multiple="multiple" >
                    <?php foreach ($design as $designs) {
                    ?> 
                    <option value="<?php echo $designs['option_name']; ?>"><?php echo $designs['option_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
			   
			   <!--<div class="form-group col-md-4">
                  <label class="form-label">Select Design Type</label>
                  <select class="form-control"  id="design1" autocomplete="off" name="design[]"  required="" aria-required="true" multiple="multiple">
                    <option value="">Select Design </option>
                    
                  </select>
               </div>-->
			   <div class="form-group col-md-4">
                  <label class="form-label">Size In Feet</label>
                  <select class="form-control" id="size" autocomplete="off" name="size" onchange="caculateUom(this.value)" required="" aria-required="true">
                    <option value="">Size In Feet </option>
                    <?php foreach ($SizeInFeet as $SizeInFeet) {
                    ?> 
                    <option value="<?php echo $SizeInFeet['option_name']; ?>"><?php echo $SizeInFeet['option_name']; ?></option>
                  <?php } ?>
                  </select>
               </div>
			</div>

            <div class="row">
			   <div class="form-group col-md-4">
                  <label class="form-label">Government Price</label>
                  <input class="form-control" id="govt_price" placeholder="Enter Govt. Price.." autocomplete="off" name="govt_price" type="number" onchange="govtPrice(this.value);" required="" aria-required="true">
               </div>
                <div class="form-group col-md-4">
                  <label class="form-label">Retailer Price</label>
                  <input class="form-control" id="retail_price" placeholder="Enter Retailer Price.." autocomplete="off" name="retail_price" type="number" onchange="retailerPrice(this.value);" required="" aria-required="true">
               </div>
               
               <div class="form-group col-md-4">
                  <label class="form-label">Opening Stock</label>
                  <input class="form-control"  placeholder="Enter Opening Stock.." autocomplete="off" name="opening_stock" type="number" required="" aria-required="true">
               </div>
            </div>
            
            <div class="row">
               <div class="form-group col-md-4">
                  <label class="form-label">HSN / SAC Code</label>
                  <input class="form-control" placeholder="Enter Opening Stock.." autocomplete="off" name="hsn_code" type="text" required="" aria-required="true">
               </div>
			   <div class="form-group col-md-4">
                  <label class="form-label">Product Image</label>
                  <input class="form-control"   autocomplete="off" name="product_image" type="file" >
               </div>
			     <div class="form-group col-md-4">
                  <label class="form-label">Product Description</label>
                  <textarea class="form-control"  rows="5" id="product_description" name="product_description" required="" aria-required="true"></textarea>
               </div> 
            </div>
               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Add Product</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
