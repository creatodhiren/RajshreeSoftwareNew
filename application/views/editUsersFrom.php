<div class="content">
   
	<div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h4>Edit <span class="semi-bold"> Users Data</span></h4>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>Upadte_Users_Save" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
               <input type="hidden" name="up_id" value="<?php echo $editDataList[0]['id']; ?>">
			   
			   
			   <?php 
				$login_data = $this->session->userdata('login_data'); 
				//print_r($login_data);
				$login_id = $login_data[0]['id'];
				$login_role = $login_data[0]['role']; ?>
            
			<div class="row">
               <?php
			  // print_r($editDataList); ?>
               <div class="form-group col-md-6">
                  <label class="form-label">Name</label>
                  <input class="form-control" id="form1Amount" value="<?php echo $editDataList[0]['name']; ?>" autocomplete="off" name="name" type="text" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">Mobile</label>
                  <input class="form-control" value="<?php echo $editDataList[0]['mobile']; ?>" id="form1Amount" minlength="10" autocomplete="off" name="mobile" type="number" required="" aria-required="true">
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Email</label>
                  <input class="form-control" id="form1Amount" value="<?php echo $editDataList[0]['email']; ?>" autocomplete="off" name="email" type="email" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">Password</label>
                  <input class="form-control" value="<?php echo $editDataList[0]['password']; ?>" id="form1Amount" autocomplete="off" name="password" type="text" required="" aria-required="true">
               </div>
            </div>
            <!--<div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Company Name</label>
                  <input class="form-control" value="<?php echo $editDataList[0]['company_name']; ?>" placeholder="Enter Company Name..." id="form1Amount" autocomplete="off" name="company_name" type="text" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">GSTN Number</label>
                  <input class="form-control" value="<?php echo $editDataList[0]['gstn']; ?>"  id="form1Amount" autocomplete="off" name="gstn" type="text"  placeholder="Enter Company GSTN Number" >
               </div>

            </div>-->
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">State</label>
                  <select class="form-control" onchange="getcity(this.value)" autocomplete="off" name="state"  required="" >
                     <option value="">Select State</option>
                     <?php foreach ($stateList as  $value) {
                     ?>
                     <option <?php if($editDataList[0]['state']==$value['id']){echo "Selected";} ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                     
                  </select>

               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">City</label>
                  <select class="form-control" id="city"  autocomplete="off" name="city"  required="" >
                     <option value="">Select City</option>
                    <?php foreach ($cityList as  $value) { ?>
                     <option <?php if($editDataList[0]['city']==$value['id']){echo "Selected";} ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?> 
                  </select>

               </div>
            </div>
            


             <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" id="form1Amount" autocomplete="off" name="address" placeholder="Enter Address"><?php echo $editDataList[0]['address']; ?></textarea>
               </div>

				<?php if($login_role == 'admin'){?>
			   <div class="form-group col-md-3">
                  <label class="form-label">Users Type</label>
                  <select class="form-control sales_drop"  autocomplete="off" name="role"  required="" >
                  	<option value="">Select User Type</option>
                  	<option <?php if($editDataList[0]['role']=='Zonal Head'){echo "Selected";} ?> value="Zonal Head" class="zonal_head">Zonal Head</option>
                  	<!--<option <?php //if($editDataList[0]['role']=='dealer'){echo "Selected";} ?> value="dealer">dealer</option>-->
                  	 <option <?php if($editDataList[0]['role']=='Sub Admin'){echo "Selected";} ?>  value="Sub Admin">Admin</option>
					<option <?php if($editDataList[0]['role']=='Sales Executive'){echo "Selected";} ?> value="Sales Executive"class="sales_exe" >Sales Executive</option>
                  </select>
               </div>
			   
			   <!--select Zonal head-->
				  <div class="form-group col-md-3">
				  <label class="form-label">Zonal Head <span style="color:red;">*</span></label>
                  <select class="form-control zonal_role"  autocomplete="off" name="zonalhead"  required="" aria-required="true" >
                  	<option value="">Select Zonal Head</option>
					<?php 
					foreach ($zonalHeadList as  $value) {
					?>
                     <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                  </select>
                 </div>
				<?php }?>
            </div>
          <!-- <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Cridit Limit</label>
                  <input class="form-control" id="form1Amount" autocomplete="off" name="cridit" type="text" value="<?php echo $editDataList[0]['credit_limit']; ?>" placeholder="Enter Cridit Limit amount" >
               </div>
            </div>-->
               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Update</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
/*********sales person************/
///////////////////////
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