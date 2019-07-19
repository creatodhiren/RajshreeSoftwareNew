<div class="content">
	<div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h4>Edit <span class="semi-bold"> Dealer Data</span></h4>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>Upadte_Vendor_Save" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
			<?php 
			$login_data = $this->session->userdata('login_data'); 
			//print_r($login_data);
			$login_id = $login_data[0]['id'];
			$login_role = $login_data[0]['role']; ?>

               <input type="hidden" name="up_id" value="<?php echo $editDataList[0]['id']; ?>">
             <div class="row">
               <?php 
				// echo "<pre>";
				//print_r($editDataList); ?>
				<div class="form-group col-md-6">
                  <label class="form-label">Firm Name <span style="color:red;">*</span></label>
                  <input class="form-control" value="<?php echo $editDataList[0]['company_name']; ?>" placeholder="Enter Company Name..." id="form1Amount" autocomplete="off" name="company_name" type="text" required="" aria-required="true">
               </div>
               <div class="form-group col-md-6">
                  <label class="form-label">Contact Person<span style="color:red;">*</span></label>
                  <input class="form-control" id="form1Amount" value="<?php echo $editDataList[0]['name']; ?>" autocomplete="off" name="name" type="text" required="" aria-required="true">
               </div>
                
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                  <label class="form-label">Mobile <span style="color:red;">*</span></label>
                  <input class="form-control" value="<?php echo $editDataList[0]['mobile']; ?>" id="form1Amount" minlength="10" autocomplete="off" name="mobile" type="number" required="" aria-required="true">
               </div>
               <div class="form-group col-md-6">
                  <label class="form-label">Email <span style="color:red;">*</span></label>
                  <input class="form-control" id="form1Amount" value="<?php echo $editDataList[0]['email']; ?>" autocomplete="off" name="email" type="email" required="" aria-required="true">
               </div>
                
            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">Password <span style="color:red;">*</span></label>
                  <input class="form-control" value="<?php echo $editDataList[0]['password']; ?>" id="form1Amount" autocomplete="off" name="password" type="text" required="" aria-required="true">
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">GSTIN Number</label>
                  <input class="form-control" value="<?php echo $editDataList[0]['gstn']; ?>"  autocomplete="off" name="gstn" type="text"  placeholder="Enter Company GSTN Number" >
               </div>

            </div>
            <div class="row">
               <div class="form-group col-md-6">
                  <label class="form-label">State <span style="color:red;">*</span></label>
                  <select class="form-control" onchange="getcity(this.value)" autocomplete="off" name="state"  required="" aria-required="true" >
                     <option value="">Select State</option>
                     <?php foreach ($stateList as  $value) {
                     ?>
                     <option <?php if($editDataList[0]['state']==$value['id']){echo "Selected";} ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                     
                  </select>

               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">City <span style="color:red;">*</span></label>
                  <select class="form-control" id="city"  autocomplete="off" name="city"  required="" aria-required="true">
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
                  <textarea class="form-control" autocomplete="off" name="address"   placeholder="Enter Address"><?php echo $editDataList[0]['address']; ?></textarea>
               </div>
                <div class="form-group col-md-6">
                  <label class="form-label">Cridit Limit</label>
                  <input class="form-control"  autocomplete="off" name="cridit" type="text"  value="<?php echo $editDataList[0]['credit_limit']; ?>" placeholder="Enter Cridit Limit amount" >
               </div>
            </div>
          
         
			<div class="row">
			    <?php if($login_role == 'admin'){?>
               <!--select Zonal head-->
				  <div class="form-group col-md-3">
				  <label class="form-label">Zonal Head <span style="color:red;">*</span></label>
				 
                  <select class="form-control zonal_role" onchange="getSalesExe(this.value)"  autocomplete="off" name="zonalhead"  required="" aria-required="true" id="zonal_head_id" >
                  	<option value="">Select Zonal Head</option>
					<?php
					//echo "<pre>";
					//print_r($zonalHeadList);
					?>
					
					    <?php 
					    ///salse executive
					    $parent_id = $editDataList[0]['parent_id']; 
					    $data_name = $this->User_model->select_dealer_parent_name($parent_id,'tbl_manage_user');
					 
					   
					   //zonal head
					   
					   $p_id = $data_name['parent_id']; 
	                   $data_name1 = $this->User_model->select_dealer_parent_name($p_id,'tbl_manage_user');
	  
	                    $p_id = $data_name1['id']; 
                         
					    foreach ($zonalHeadList as  $value) {
					   if($value['id']==$p_id){
                             $selected = "selected";
                          }else{
                             $selected= "";
                         }
                     ?>
                     <option value="<?php echo $value['id']; ?>" <?php echo  $selected; ?>><?php echo $value['name']; ?></option>
                     <?php  } ?>
                  </select>
                 </div>
				<!--select Zonal head-->
				  <div class="form-group col-md-3">
				  <label class="form-label">Sales Exicutive<span style="color:red;">*</span></label>
                  <select class="form-control zonal_role"  id="sales" autocomplete="off" name="salesExec"  required="" aria-required="true" >
                  	<option value="<?php echo $p_id = $data_name['id']; ?>"><?php echo $p_id = $data_name['name']; ?></option>
				
                  </select>
                 </div> 
                 <?php } ?>
                <!-- <div class="form-group col-md-6">
                  <label class="form-label">Segment</label>
                  <select class="form-control"  autocomplete="off" name="segment"  required="" aria-required="true" >
                  	
                  	<option value="retailer" <?php //if($editDataList[0]['segment']=='retailer'){
                  //	echo "selected";}?>>retailer</option>
                  	<option value="government" <?php //if($editDataList[0]['segment']=='government'){
                  	//echo "selected";}?>>government</option>
				
                  </select>
                 </div>--> 
            </div>
			
			
			
			     <div class="row">
			     <?php if($login_role == 'Zonal Head'){?>
				  <div class="form-group col-md-3">
				  <label class="form-label">Sales Exicutive<span style="color:red;">*</span></label>
                  <select class="form-control zonal_role"  id="sales" autocomplete="off" name="salesExec"  required="" aria-required="true" >
                       <?php 
					    ///salse executive
					    $parent_id = $editDataList[0]['parent_id']; 
					    $data_name = $this->User_model->select_dealer_parent_name($parent_id,'tbl_manage_user');?>
                  
                  <option value="<?php echo $p_id = $data_name['id']; ?>"><?php echo $p_id = $data_name['name']; ?></option>
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
<script>


$(document).ready(function(){
  var parent_id = "<?php echo $parent_id; ?>";
  //alert(zonal_head_id);
  //alert(parent_id);
  var base_url =document.getElementById("base_url").value;
//alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Vendor/salesExicutiveGet",
  data: {parent_id : parent_id},
   success: function(html){
   // $('#sales').html(html);
  }
});
});
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