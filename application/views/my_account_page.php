<div class="content">
	<div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h4>Account<span class="semi-bold"> Update</span></h4>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <?php //print_r($login_data); ?>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>Update_Account" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
               <input type="hidden" value="<?php echo $login_data[0]['id']; ?>" name="up_id">
             <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Name</label>
                  <input class="form-control" value="<?php echo $login_data[0]['name']; ?>" id="form1Amount" autocomplete="off" name="name" type="text" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">Mobile</label>
                  <input class="form-control" value="<?php echo $login_data[0]['mobile']; ?>" id="form1Amount" minlength="10" autocomplete="off" name="mobile" type="number" required="" aria-required="true">
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Email</label>
                  <input class="form-control" value="<?php echo $login_data[0]['email']; ?>" id="form1Amount" autocomplete="off" name="email" type="email" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">Password</label>
                  <input class="form-control" value="<?php echo $login_data[0]['password']; ?>" id="form1Amount" autocomplete="off" name="password" type="text" required="" aria-required="true">
               </div>
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Company Name</label>
                  <input class="form-control" value="<?php echo $login_data[0]['company_name']; ?>" placeholder="Enter Company Name..." id="form1Amount" autocomplete="off" name="company_name" type="text" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">GSTN Number</label>
                  <input class="form-control" value="<?php echo $login_data[0]['gstn']; ?>"  id="form1Amount" autocomplete="off" name="gstn" type="text" required="" placeholder="Enter Company GSTN Number" aria-required="true">
               </div>

            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">State</label>
                  <select class="form-control" onchange="getcity(this.value)" autocomplete="off" name="state"  required="" >
                     <option value="">Select State</option>
                     <?php foreach ($stateList as  $value) {
                     ?>
                     <option <?php if($login_data[0]['state']==$value['id']){echo "Selected";} ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                     
                  </select>

               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">City</label>
                  <select class="form-control" id="city"  autocomplete="off" name="city"  required="" >
                     <option value="">Select City</option>
                     <?php foreach ($cityList as  $value) { ?>
                     <option <?php if($login_data[0]['city']==$value['id']){echo "Selected";} ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?> 
                  </select>

               </div>
            </div>
            


             <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" id="form1Amount" autocomplete="off" name="address"  required="" placeholder="Enter Address" aria-required="true"><?php echo $login_data[0]['address']; ?></textarea>
               </div>
 
            </div>
         
         










               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Update Account Data</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>