<div class="content">
	<div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h4>Add  <span class="semi-bold">Employee</span></h4>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>SaveUsers" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
			<?php 
			$login_data = $this->session->userdata('login_data'); 
			//print_r($login_data);
			$login_id = $login_data[0]['id'];
			$login_role = $login_data[0]['role']; ?>
			
             <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Name <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1name" autocomplete="off" name="name" type="text" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">Mobile <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1mobile" minlength="10" autocomplete="off" name="mobile" type="number" required="" aria-required="true">
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Email <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1email" autocomplete="off" name="email" type="email" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">Password <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1password" autocomplete="off" name="password" type="password" required="" aria-required="true">
               </div>
            </div>
            <!--<div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Company Name <span style="color:red;">*</span></label>
                  <input class="form-control" placeholder="Enter Company Name..." id="form1Company" autocomplete="off" name="company_name" type="text" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">GSTIN Number</label>
                  <input class="form-control" autocomplete="off" name="gstn" type="text"  placeholder="Enter Company GSTN Number" >
               </div>

            </div>-->
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">State <span style="color:red;">*</span></label>
                  <select class="form-control" onchange="getcity(this.value)" autocomplete="off" name="state"  required="" aria-required="true">
                     <option value="">Select State</option>
                     <?php foreach ($stateList as  $value) {
                     ?>
                     <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                     
                  </select>

               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">City <span style="color:red;">*</span></label>
                  <select class="form-control" id="city"  autocomplete="off" name="city"  required="" aria-required="true">
                     <option value="">Select City</option>
                    
                  </select>

               </div>
            </div>
            


             <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Address</label>
                  <textarea class="form-control"  autocomplete="off" name="address"   placeholder="Enter Address" ></textarea>
               </div>
			   
				<?php if($login_role == 'admin' || $login_role == 'Sub Admin'){?>
                 <div class="form-group col-md-3">
                  <label class="form-label">Users Type <span style="color:red;">*</span></label>
                  <select class="form-control sales_drop"  autocomplete="off" name="role"  required="" aria-required="true" >
                  	<option value="">Select User Type</option>
                  	<!-- <option value="Vendor">Vendor</option>-->
					<option value="Zonal Head" class="zonal_head">Zonal Head</option>
					<?php if($login_role != 'Sub Admin'){ ?>
                    <option value="Sub Admin" >Admin</option>
					<?php } ?>
					<?php  //print_r($zonalHeadList); ?>
					<option value="Sales Executive" class="sales_exe">Sales Executive</option>
                  </select>
				  </div>
			
				 
				 <!--select Zonal head-->
				  <div class="form-group col-md-3">
				  <label class="form-label">Zonal Head <span style="color:red;">*</span></label>
                  <select class="form-control zonal_role"  autocomplete="off" name="zonalhead"  required="" aria-required="true" >
                  	<option value="">Select Zonal Head</option>
					 <?php foreach ($zonalHeadList as  $value) {
                     ?>
                     <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
					 
					 
                     <?php  } ?>
                  </select>
                 </div>
				<?php }?>
                
            </div>

             <?php if($login_role != 'admin'){
				 if($login_role != 'Sub Admin'){
				 ?>
           <div class="row">
              
               <div class="form-group col-md-6">
                  <label class="form-label">Credit Limit</label>
                  <input class="form-control" id="form1Amount" autocomplete="off" name="cridit" type="text"  placeholder="Enter Cridit Limit amount">
               </div>
              
            </div>
          <?php } }?> 

               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Add</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!--/*********sales person************/-->

<script>
$(document).ready(function(){
	$('.zonal_role').hide();
	$('.sales_drop').on('change',function(){
		var v = $(this).val();
		if(v === 'Sales Executive'){
		$('.zonal_role').show();
		}else{
		$('.zonal_role').hide();
		}
    });

});
</script>