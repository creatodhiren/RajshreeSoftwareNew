<div class="content">
  <div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h4>Addtional<span class="semi-bold"> Invoice Data</span></h4>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>Invoice_Genrated" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
              <input type="hidden" name="so_id" value="<?php echo $id; ?>" >
              <input type="hidden" name="vendor_id" value="<?php echo $vendor_id; ?>">
             <center><h4><b><u>Transporter Details</u></b></h4></center>
         
              <br>
             <div class="row">
               <div class="form-group col-md-4">
                  <label class="form-label">Transporter Name</label>
                  <input class="form-control" id="form1Amount" autocomplete="off" name="transporter_name" type="text" placeholder="Enter Transporter Name" required="" aria-required="true">
               </div>
                <div class="form-group col-md-4">
                  <label class="form-label">Vehicle Number </label>
                  <input class="form-control" placeholder="Enter Vehicle Number" id="form1Amount"  autocomplete="off" name="vehicle_no" type="text" required="" aria-required="true">
               </div>
               <div class="form-group col-md-4">
                  <label class="form-label">Transporter Mobile Number</label>
                  <input class="form-control" placeholder="Enter Transporter Mobile Number" id="form1Amount" autocomplete="off" name="transporter_mobile_number" type="number" required="" aria-required="true">
               </div>
            </div>
            <br>
          <hr>
          <br>
          <center><h4><b><u>Address Confirmation Details</u></b></h4></center>
         <br><br>
         <?php// print_r($vendor_detail); ?>
            <div class="row">
             <div class="col-md-6">
              <center><h4><b><u>Details of Receiver (Billed to)</u></b></h4></center>
              <br><br><br>
               <div class="form-group col-md-12">
                  <label class="form-label">Company Name</label>
                  <input class="form-control" id="company_name1" autocomplete="off" name="company_name1" type="text" value="<?php echo $vendor_detail[0]['company_name']; ?>" placeholder="Enter Company Name" required="" aria-required="true">
               </div>
               <div class="form-group col-md-12">
                  <label class="form-label">Mobile</label>
                  <input class="form-control" id="mobile1" autocomplete="off" name="mobile1" type="text" placeholder="Enter Mobile Number" required="" value="<?php echo $vendor_detail[0]['mobile']; ?>" aria-required="true">
               </div>
               
               <div class="form-group col-md-12">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" id="address1" autocomplete="off" name="address1"  required="" aria-required="true"><?php echo $vendor_detail[0]['address']; ?></textarea>
               </div>
               <div class="form-group col-md-12">
                  <label class="form-label">State</label>
                  <select class="form-control" id="state1" autocomplete="off" name="state1"  required="" aria-required="true">
                    <option>Select State</option>
                    <?php foreach ($stateList as $value) {
                      ?>
                      <option <?php if($value['id']==$vendor_detail[0]['state']){echo "Selected";} ?> value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>
                  </select>
               </div>
             </div>

             <div class="col-md-6" style="border-left:2px solid black;">
              <center><h4><b><u>Details of Consignee (Shipped to)</u></b></h4></center>
              <br>
              <input onclick="myFunction()" id="myCheck" type="checkbox" name=""> Same As Details of Receiver
              <br><br>
               <div class="form-group col-md-12">
                  <label class="form-label">Company Name</label>
                  <input class="form-control" id="company_name2" autocomplete="off" name="company_name2" type="text" placeholder="Enter Company Name" required="" aria-required="true">
               </div>
               <div class="form-group col-md-12">
                  <label class="form-label">Mobile</label>
                  <input class="form-control" id="mobile2" autocomplete="off" name="mobile2" type="text" placeholder="Enter Mobile Number" required="" aria-required="true">
               </div>
               
               <div class="form-group col-md-12">
                  <label class="form-label">Address</label>
                  <textarea class="form-control" id="address2" autocomplete="off" name="address2"  required="" aria-required="true"></textarea>
               </div>
               <div class="form-group col-md-12">
                  <label class="form-label">State</label>
                  <select class="form-control" id="state2" autocomplete="off" name="state2"  required="" aria-required="true">
                    <option value="">Select State</option>
                    <?php foreach ($stateList as $value) {
                      ?>
                      <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                    <?php } ?>

                  </select>
               </div>
             </div>

             </div>
               <br>
            <hr>
            <br>
            <div class="col-md-12">
              <center><h4><b><u>Supply Details</u></b></h4></center>
              <br>
               <div class="form-group col-md-6">
                  <label class="form-label">Place Of Supply</label>
                  <select class="form-control" id="form1Amount" autocomplete="off" name="place_of_supply" required="" aria-required="true">
                    <option>Select Place Of Suppy</option>
                    <?php foreach ($placeOfsuppy as  $value) {
                    ?>
                      <option><?php echo $value['option_name']; ?></option>
                  <?php  } ?>
                  
                  </select>
               </div>
               <div class="form-group col-md-6">
                  <label class="form-label">Date Of Supply</label>
                  <input class="form-control datepicker" id="form1Amount" autocomplete="off" name="date_of_supply" type="text" placeholder="Enter Date of supply Name" required="" aria-required="true">
               </div>
               <br>
</div>


            </div>




               <div class="form-actions">
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i>Genrate Invoice</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div>

</div>