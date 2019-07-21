<style type="text/css">
   table ,tr,th ,td{
      border:1px solid gray;
      text-align: center;
      padding: 15px;
   }
   
   select.select_width {
    width: 100px !important;
}
input.qty_w {
    width: 70px;
}
select.s_width {
    width: 64px;
}
input#tot_amount {
    margin-left: 14px;
}
</style>

<?php 
   	$login_data = $this->session->userdata('login_data'); 
    //print_r($login_data);
	$login_id = $login_data[0]['id'];
    $login_name = $login_data[0]['name'];
    $login_id1 = $login_data[0]['user_id'];
    $login_role = $login_data[0]['role'];
?>

<div class="content">
   <?php
      if($this->session->flashdata('po')) {
      $message = $this->session->flashdata('po');
      
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
            <h4>Genrate<span class="semi-bold">  Purchase   Order</span></h4>
                     <span class="btn btn-warning" onclick="add_row1()" ><i class="fa fa-plus"></i> Add More Row</span>
        
            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
        <!---->
           
         </div>
        
         
 <div class="grid-body no-border table-responsive">
           
            
            <form action="<?php echo base_url(); ?>Genrate_po_save" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
			  <?php if($login_role == 'Zonal Head'){ ?>
              <div class="row">
                 	<!--select salse executive head-->
				  <div class="form-group col-md-3">
				  <label class="form-label">Sales Exicutive<span style="color:red;">*</span></label>
                  <select class="form-control salse_executi_class"  autocomplete="off" name="salesExec" onchange="getDealerExe(this.value)"  aria-required="true" required>
                      <option value="">Select SalseExecutive</option>
                  	<?php 
						$salesExecu= $this->Vendor_model->getSalesExecutive($login_id);
						foreach ($salesExecu as $key => $value){
						echo "<option value=".$value['id'].">".$value['name']."</option>";
							}
						?>
                  </select>
                 </div> 
               <!--select Dealer head-->
              
				  <div class="form-group col-md-3">
				  <label class="form-label">Dealer<span style="color:red;">*</span></label>
                  <select class="form-control zonal_role dealer_class" name="dealer" autocomplete="off" onchange="dealer_id_hidden(this.value)"  aria-required="true" id="delear_list" required>
                  	<option value="">Select Dealer</option>
                  	
                  </select>
                 </div>
        </div>
        <?php } ?> 
        <!----->
        
        
           <?php if($login_role == 'Sales Executive'){ ?>
              <div class="row">
               <!--select Dealer head-->
              
				  <div class="form-group col-md-3">
				  <label class="form-label">Dealer<span style="color:red;">*</span></label>
                  <select class="form-control zonal_role"  onchange="dealer_id_hidden(this.value)" autocomplete="off"   required="required" aria-required="true" id="delear_list" required>
                  	<option value="">Select Dealer</option>
                  	<?php 
						$getDealerList= $this->Vendor_model->getDealerList($login_id);
						foreach ($getDealerList as $key => $value){
						echo "<option value=".$value['user_id'].">".$value['name']."</option>";
							}
						?>
                  </select>
                 </div>
        </div>
        <?php } 
       if($login_role == 'Dealer'){
		$dealer_id=$dealer_segmet[0]['segment'];	
	    }else{
	     $dealer_id='';   
	    }
       ?> 
        <!----->
		 
               <?php //print_r($login_id); ?>
               <input type="hidden" value="" name="salseexe_id" id="salse_id"/>
               <input type="hidden" value="" name="dealer_id" id="dealer_id"/>
			    <input type="hidden" value="<?php echo $dealer_id; ?>" name="dealer_segment" id="dealer_seg"/>
               <?php 
               //echo "<pre>";
               //print_r($product_list);  die;?>
               <table  class="table table-striped " id="rowappend25">
                  <thead>
                     <tr>
                   <th>S No.</th>
                   <th>Name</th>
                   <th>type</th>
                   <th>Size</th>
                   <th>Color</th>
                   <th>Grade</th>
                   <th>Design</th>
                   <th>Unit Price</th> 
                   <th>Quantity</th>
                   <th>Total Price</th>
                   </tr> 
                  </thead>
                  <tbody>


                    <tr id="row_1">
						<td>1.</td>
						<td><select name="product_name[]" onchange="getproductprice(this.value,'1')" class="select_width" >
                              <option value="" >Select Product Name</option>
                              <?php foreach($product_list as $sh){ ?>
                              <option value="<?php echo $sh['product_name'];?>">
							  <?php echo $sh['category_name']; ?>
							  
							  </option>
                           <?php } ?>
                           </select>
                           <input type="hidden" name="" id="hidd_prod_1" value="">
                           <input type="hidden" name="product_id[]" id="product_id_1" value=""></td>
						<td><select name="product_type[]" id="ptype_1"  class="select_width">
                            <option value="">Prodoct Type</option>
                           </select></td>
						<td> <select name="product_size[]" id="size_1" class="s_width"  required>
                              <option value="">Select Size</option>
                           </select></td>
						 <td><select name="product_color[]" id="pcolor_1" class="select_width">
                             <option value="">Color</option>
                           </select></td>
						<td><select name="product_grade[]" id="pgrade_1" class="select_width">
                              <option value="">Grade</option>
                           </select></td>
						<td><select name="product_design[]" id="pdesign_1" class="select_width">
                              <option value="" >Design</option>
                           </select></td>
						<td><input type="hidden" id="price_hid_1"  value="" name="price[]"><span id="price_1"></span></td>
						<td><input type="number" onchange="getfinalprice(this.value,'1')" name="quantity[]" class="qty_w" required></td>
						<td><input type="hidden" id="tot_hid_1" value="" name="total_price[]"><span id="tot_1"></span></td>
						
					</tr>


<!--second row-->
                     <tr id="row_2">
						<td>2.</td>
						<td><select name="product_name[]" onchange="getproductprice(this.value,'2')" class="select_width" >
                              <option value="" >Select Product Name</option>
                              <?php foreach($product_list as $sh){ ?>
                              <option value="<?php echo $sh['product_name'];?>">
							  <?php echo $sh['category_name']; ?>
							  
							  </option>
                           <?php } ?>
                           </select>
                           <input type="hidden" name="" id="hidd_prod_2" value="">
                           <input type="hidden" name="product_id[]" id="product_id_2" value=""></td>
						<td><select name="product_type[]" id="ptype_2" class="select_width">
                            <option value="">Prodoct Type</option>
                           </select></td>
						<td> <select name="product_size[]" id="size_2" class="s_width"  required>
                              <option value="">Select Size</option>
                           </select></td>
						 <td><select name="product_color[]" id="pcolor_2" class="select_width">
                             <option value="">Color</option>
                           </select></td>
						<td><select name="product_grade[]" id="pgrade_2" class="select_width">
                              <option value="">Grade</option>
                           </select></td>
						<td><select name="product_design[]" id="pdesign_2" class="select_width">
                              <option value="" >Design</option>
                           </select></td>
						<td><input type="hidden" id="price_hid_2"  value="" name="price[]"><span id="price_2"></span></td>
						<td><input type="number" onchange="getfinalprice(this.value,'2')" name="quantity[]" class="qty_w" required></td>
						<td><input type="hidden" id="tot_hid_2" value="" name="total_price[]"><span id="tot_2"></span></td>
						
					</tr>
					 
					 
<!--third row--->					 
                     <tr id="row_3">
						<td>3.</td>
						<td><select name="product_name[]" onchange="getproductprice(this.value,'3')" class="select_width" >
                              <option value="" >Select Product Name</option>
                              <?php foreach($product_list as $sh){ ?>
                              <option value="<?php echo $sh['product_name'];?>">
							  <?php echo $sh['category_name']; ?>
							  
							  </option>
                           <?php } ?>
                           </select>
                           <input type="hidden" name="" id="hidd_prod_3" value="">
                           <input type="hidden" name="product_id[]" id="product_id_3" value=""></td>
						<td><select name="product_type[]" id="ptype_3" class="select_width">
                            <option value="">Prodoct Type</option>
                           </select></td>
						<td> <select name="product_size[]" id="size_3" class="s_width"  required>
                              <option value="">Select Size</option>
                           </select></td>
						 <td><select name="product_color[]" id="pcolor_3" class="select_width">
                             <option value="">Color</option>
                           </select></td>
						<td><select name="product_grade[]" id="pgrade_3" class="select_width">
                              <option value="">Grade</option>
                           </select></td>
						<td><select name="product_design[]" id="pdesign_3" class="select_width">
                              <option value="" >Design</option>
                           </select></td>
						<td><input type="hidden" id="price_hid_3"  value="" name="price[]"><span id="price_3"></span></td>
						<td><input type="number" onchange="getfinalprice(this.value,'3')" name="quantity[]" class="qty_w" required></td>
						<td><input type="hidden" id="tot_hid_3" value="" name="total_price[]"><span id="tot_3"></span></td>
						
					</tr>
                     
                  </tbody>
               </table>

               <input type="text" class="pull-right" name="po_total" id="tot_amount" value="" >
               <span class="pull-right">Total Amount</span><br><br>
          
               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i>Generate</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">

 
/**************Product Final Price********************/
function getfinalprice(qty,row){
  var price = $('#price_hid_'+row).val();
  //var price =document.getElementById("price_hid_"+row).value;
  var tot = price * qty;

  $('#tot_'+row).html(tot);
  
   $('#tot_hid_'+row).val(tot);

  var total_amount = 0;
  if(row==1){
    total_amount = tot;
  }else{

    var row1 = parseInt(row) + 1;
for(var x=1;x<row1;x++){
  //alert(x);
  var row_price =document.getElementById("tot_hid_"+x).value;
   total_amount += parseInt(row_price);
  // alert(total_amount);
}
//alert(total_amount);
}
//alert(total_amount);
$('#tot_amount').val(total_amount);




} 
  /********************Add row at the time of PO Genrate time***************************/
function add_row1(){
   var id = $('table tr:last').attr('id');
   
   var res = id.split("_");
   var temp_id = res[1];
  

  var x= parseInt(temp_id)+1;
  $('#rowappend25').append('<tr id="row_'+x+'"><td>'+x+'</td><td><select name="product_name[]" onchange="getproductprice(this.value,'+x+')" class="select_width" ><option value="" >Select Product Name</option><?php foreach($product_list as $sh){ ?><option value="<?php echo $sh['product_name'];?>"><?php echo $sh['category_name']; ?></option><?php } ?></select><input type="hidden" name="" id="hidd_prod_'+x+'" value=""><input type="hidden" name="product_id[]" id="product_id_'+x+'" value=""></td><td><select name="product_type[]" id="ptype_'+x+'" class="select_width"><option value="">Prodoct Type</option></select></td><td> <select name="product_size[]" id="size_'+x+'" class="s_width"  required><option value="">Select Size</option></select></td><td><select name="product_color[]" id="pcolor_'+x+'" class="select_width"><option value="">Color</option></select></td><td><select name="product_grade[]" id="pgrade_'+x+'" class="select_width"><option value="">Grade</option></select></td><td><select name="product_design[]" id="pdesign_'+x+'" class="select_width"><option value="" >Design</option></select></td><td><input type="hidden" id="price_hid_'+x+'"  value="" name="price[]"><span id="price_'+x+'"></span></td><td><input type="number" onchange="getfinalprice(this.value,'+x+')" name="quantity[]" class="qty_w" required></td><td><input type="hidden" id="tot_hid_'+x+'" value="" name="total_price[]"><span id="tot_'+x+'"></span></td></tr>');
}


</script>
