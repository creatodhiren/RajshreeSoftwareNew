
<div class="content">
   <?php
      if($this->session->flashdata('category')) {
      $message = $this->session->flashdata('category');
      
      ?>
   <div class="col-md-4 col-md-offset-4 <?php echo $message['class'] ?>">
      <button class="close" data-dismiss="alert"></button>
      <center><b><?php echo $message['message']; ?></b></center>
   </div>
   <?php
      }
      
      ?>
	<div class="row">
   <div class="col-md-6">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h3>Update<span class="semi-bold"> Category</span></h3>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>UpdateCategory" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
              <input type="hidden" value="<?php echo base64_encode($category_data[0]['id']); ?>" name="upid">
             <div class="row">
               <div class="form-group">
                  <label class="form-label">Category Name</label>
                  <input class="form-control" value="<?php echo $category_data[0]['category_name']; ?>" id="form1Amount" autocomplete="off" name="category_name" type="text" required="" aria-required="true">
               </div>
                
            </div>
             <div class="row">
               <div class="form-group">
                  <label class="form-label">Parent Name</label>
                  <select class="form-control"  autocomplete="off" name="parent_name" >
                  	<option value="">Select Parent Name</option>
                      <?php 
                      //print_r($parentList);
                       foreach($category_List as $sh){
                      ?>
                      <option <?php if($category_data[0]['parent_name']== $sh['category_name']){echo "Selected";} ?> value="<?php echo $sh['category_name']; ?>"><?php echo $sh['category_name']; ?></option>
                   <?php } ?>
                  </select>
               </div>
               
            </div>
               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Update Category</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>


</div>