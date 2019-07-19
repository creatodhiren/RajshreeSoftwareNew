<div class="content">
	<div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h4>Add<span class="semi-bold">  Dealer</span></h4>

            
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>SaveVendor" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
			
			<?php 
			$login_data = $this->session->userdata('login_data'); 
			//print_r($login_data);
			$login_id = $login_data[0]['id'];
			$login_role = $login_data[0]['role']; ?>

			<div class="row">
			    <div class="form-group col-md-6">
                  <label class="form-label">Firm Name <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1Company" autocomplete="off" name="company_name" type="text" required="" aria-required="true">
               </div>
               <div class="form-group col-md-6">
                   
                  <label class="form-label">Contact Person <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1name" autocomplete="off" name="name" type="text" required="" aria-required="true">
               </div>
                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label">Mobile <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1mobile" minlength="10" autocomplete="off" name="mobile" type="number" required="" aria-required="true" aria-required="true">
               </div>
               <div class="form-group col-md-6">
                  <label class="form-label">Email <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1email" autocomplete="off" name="email" type="email" required="" aria-required="true">
               </div>
                
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Password <span style="color:red;">*</span></label>
                  <input class="form-control" required="" aria-required="true" id="form1password" autocomplete="off" name="password" type="password" >
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">GSTIN Number</label>
                  <input class="form-control"  autocomplete="off" name="gstn" type="text"  placeholder="Enter Company GSTN Number" >
               </div>

            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">State <span style="color:red;">*</span></label>
                  <select class="form-control" onchange="getcity(this.value)" autocomplete="off" name="state"  required="" >
                     <option value="">Select State</option>
                     <?php foreach ($stateList as  $value) {
                     ?>
                     <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                     
                  </select>

               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">City <span style="color:red;">*</span></label>
                  <select class="form-control" id="city"  autocomplete="off" name="city"  required="" >
                     <option value="">Select City</option>
                    
					
                  </select>

               </div>
            </div>

             <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" autocomplete="off" name="address"   placeholder="Enter Address"></textarea>
               </div>
             <div class="form-group col-md-6">
                  <label class="form-label">Credit Limit</label>
                  <input class="form-control" autocomplete="off" name="cridit" type="text"  placeholder="Enter Cridit Limit amount" >
               </div>   
            </div>


            
			<div class="row">
			    <?php if($login_role == 'admin' || $login_role == 'Sub Admin'){?>
               <!--select Zonal head-->
				  <div class="form-group col-md-3">
				  <label class="form-label">Zonal Head <span style="color:red;">*</span></label>
                  <select class="form-control zonal_role" onchange="getSalesExe(this.value)"  autocomplete="off" name="zonalhead"  required="" aria-required="true" >
                  	<option value="">Select Zonal Head</option>
					    <?php foreach ($zonalHeadList as  $value) {
                     ?>
                     <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                  </select>
                 </div>
				<!--select Zonal head-->
				  <div class="form-group col-md-3">
				  <label class="form-label">Sales Executive<span style="color:red;">*</span></label>
                  <select class="form-control zonal_role"  id="sales" autocomplete="off" name="salesExec"  required="" aria-required="true" >
                  	<option value="">Select Sales Executive</option>
				
                  </select>
                 </div> 
                 
                 <?php } ?>
                 <div class="form-group col-md-6">
                  <label class="form-label">Segment</label>
                  <select class="form-control"  autocomplete="off" name="segment"  required="" aria-required="true" >
                  	<option value="Select Segment" selected>Select Segment</option>
                  	<option value="retailer">retailer</option>
                  	<option value="government">government</option>
				
                  </select>
                 </div> 
            </div>
			
			
			
			     <div class="row">
			     <?php if($login_role == 'Zonal Head'){?>
				  <div class="form-group col-md-3">
				  <label class="form-label">Sales Executive<span style="color:red;">*</span></label>
                  <select class="form-control zonal_role"  id="sales" autocomplete="off" name="salesExec"  required="" aria-required="true" >
                  	<option value="">Select Sales Executive</option>
						<?php 
						$data['salesExecu']= $this->Vendor_model->getSalesExecutive($login_id);
						foreach ($data['salesExecu'] as $key => $value){
						echo "<option value=".$value['id'].">".$value['name']."</option>";
							}
						?>
                  </select>
                 </div> 
                 
                 <?php } ?>
				 </div>

			
			
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
<script>
/*************get sales executive ********************/
function getSalesExe(zonal_head_id){
	//alert(zonal_head_id);

var base_url =document.getElementById("base_url").value;
//alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Vendor/salesExicutiveGet",
  data: {zonal_head_id : zonal_head_id},
   success: function(html){
    $('#sales').html(html);
  }
});
}
</script>