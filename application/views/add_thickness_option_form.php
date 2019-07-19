<?php 
//echo "<pre>";
//print_r($class_option_List); die; ?>
<div class="content">
   <?php
      if($this->session->flashdata('Option_class')) {
      $message = $this->session->flashdata('Option_class');
      
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
            <h3>Add<span class="semi-bold"> Thickness Option</span></h3>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>SaveOption" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
			<input type="hidden" name="option_class" value="thickness" >
             <div class="row">
               <div class="form-group">
                  <label class="form-label">Option Name</label>
                  <input class="form-control" id="form1Amount" autocomplete="off" name="option_name" type="text" required="" aria-required="true">
               </div>
                
            </div>
             <!--<div class="row">
               <div class="form-group">
                  <label class="form-label">Option Class</label>
                  <select class="form-control"  autocomplete="off" name="option_class" >
                  	<option value="">Select Option Class</option>
                      <?php 
                       //foreach($class_option_List as $sh){
                      ?>
                      <option value="<?php //echo $sh['option_name']; ?>"><?php //echo $sh['option_name']; ?></option>
                   <?php// } ?>
                  </select>
               </div>
               
            </div>-->
               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Add Option</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>


</div>