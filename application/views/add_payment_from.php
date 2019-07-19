<style>
/*ul#ui-id-1 {
    position: absolute;
    top: 254px;
    left: 303px;
}*/</style>
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
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h3>Add<span class="semi-bold"> Payment</span></h3>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>SavePayment" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
             <div class="row">
               <input type="hidden" id="vendor_id" value="" name="vendor_id">
               <div class="form-group  col-md-4">
                  <label class="form-label">Invoice Number</label>
            <input type="text"  class="form-control"  id="invoice_number"  autocomplete="off" name="invoice_number" >
                 
               </div>
            </div>
            <div id="showHidden" style="display:none;">
            <div class="row">
             <hr>
             <div class="form-group  col-md-4">
                  <label class="form-label">Invoice Amount</label>
                  <div>
                  <h3 style="color:orange"><span id="invoice_amount"></span></h3>
                </div>
               </div>
                <div class="form-group  col-md-4">
                  <label class="form-label">Paid Amount</label>
                  <div>
                  <h3 style="color:green"><span id="paid_amount"></span></h3>
                </div>
                  <input type="hidden" id="paid_amt" name="paid_amt">
               </div>

               <div class="form-group  col-md-4">
                  <label class="form-label">Remaining Amount</label>
                  <div>
                  <h3 style="color:red"><span id="remain_amount"></span></h3>
                  <input type="hidden" id="remain_amount_hidd" name="remain_amount">
                </div>
                  
                </div>


            </div>
            <hr>
            <div class="row">
              <div class="form-group  col-md-4">
                  <label class="form-label">Pay Amount</label>
            <input type="number"   class="form-control" oninput="checkcondition(this.value)"   autocomplete="off" name="pay_amount"  > 
            <label id="showErrormess" style="color:red;display: none;">Enter pay value Less than or equal amount</label>
               </div>
               <div class="form-group  col-md-4">
                  <label class="form-label">Pay Date</label>
            <input type="text"  class="form-control datepicker"   autocomplete="off" name="pay_date"  >
                 
               </div>
               <div class="form-group  col-md-4">
                  <label class="form-label">Recived By</label>
            <input type="text"  class="form-control"   autocomplete="off" name="recived_by"  >
                 
               </div>
            
            </div>
           <div class="row">
                <div class="form-group  col-md-4">
                  <label class="form-label">Pay Mode</label>
            <select  class="form-control"   autocomplete="off" name="pay_mode"  >
              <option value="Cash">Cash</option>
              <option value="Card">Card</option>
              <option value="NEFT">NEFT</option>

            </select>
                 
               </div>
           </div>
        </div>

            <!-- --------------------------------- -->
               <div class="form-actions" id="butthidden" style="display: none;">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons"  type="submit"><i class="icon-ok"></i> Add Payment</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>


</div>
<script>
  
</script>
<!-- <script> 
$(document).ready(function(){
var base_url =document.getElementById("base_url").value;
$("#invoice_number").autocomplete({

source: function (request, response) {
$.ajax({
type: "POST",
url: base_url+"Common/get_invoice_list",
data: {term: request.term},
dataType: "json",
success: function (output) {
  alert(output);
response(output.slice(0,25));
},
error: function (errormsg) {
//alert(errormsg.responseText);
}
});
},
});
}); 


</script> -->

