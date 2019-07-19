<div class="content">
	<div class="row">
   <div class="col-md-12">
      <div class="grid simple form-grid">
         <div class="grid-title no-border">
            <h4><b>Genrate Sales Order</b><spaclass="semi-bold"> ( <b style="color: green;"><?php echo $product_data[0]['vendor_id']; ?></b> ) ( <b style="color: orange;"><?php echo $product_data[0]['purchase_order_id']; ?></b> )</span></h4>

            <div class="tools">
               <a href="javascript:;" class="collapse"></a>
               
               <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
               <a href="javascript:;" class="remove"></a>
            </div>
             <hr>
         </div>
         
         <?php
          /*echo "<pre>";
          print_r($product_data);
           echo "</pre>";*/
           ?>
         <div class="grid-body no-border">
            <form action="<?php echo base_url(); ?>Genrate_Sales_Order" method="POST"  id="form_traditional_validation" name="form_traditional_validation" role="form" autocomplete="off" class="validate" novalidate="novalidate">
             <div class="row">
               <div class="form-group col-md-3" >
                 <input type="hidden" value="<?php echo $product_data[0]['po_id']; ?>" name="po_id">
                 <input type="hidden" value="<?php echo $product_data[0]['vendor_id']; ?>" name="vendor_id"> 
                  <label class="form-label"><b>Name  :-</b></label><?php echo $product_data[0]['name']; ?>
                 
               </div>
                <div class="form-group col-md-3">
                  <label class="form-label"><b>Mobile  :-</b></label><?php echo $product_data[0]['mobile']; ?>
                 
               </div>
               <div class="form-group col-md-3">
                  <label class="form-label"><b>Email  :-</b></label><?php echo $product_data[0]['email']; ?>
                 
               </div>
               <div class="form-group col-md-3">
                  <label class="form-label"><b>PO Date  :-</b></label><?php echo date("d/M/Y",strtotime($product_data[0]['po_date'])); ?>
                 
               </div>

            </div>
           
                      <div class="grid-body table-responsive">
               <table class="table table-striped" id="example2">
                  <thead>
                     <tr>
                        <th>S No.</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                       
                     </tr>
                  </thead>
                  <tbody>
                     <?php
                      $sumtot=0;
                     $x=1;
                      foreach($product_data as $lis){
						 $segment = $lis['segment'];
                          if($segment == 'government'){
							$pri=$lis['govt_price'];  
						  }else{
							$pri=$lis['retailer_price'];  
						  }					 
						  ?>
                     <tr class="odd gradeX">
                        <td><?php echo $x++; ?></td>
                        <td><?php echo $lis['category_name']; ?></td>
                        <td><?php echo $qty = $lis['quantity']; ?></td>
                        <td>Rs. <?php echo $pri; ?></td>
                        <td><span><b style="color:green;"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo $sum = $qty*$pri; ?></b></span></td>
                          <?php
                          
                           $sumtot += $qty*$pri; ?>
                     </tr>
                 <?php } ?>

                  </tbody>
               </table>

            </div>
            <div>
             <div class="col-md-offset-8  grid-body">
                <label style="margin-left: -25px;margin-top: -16px;"><b>Over All Total :-  <span style="color:green;font-size:14px; ">&nbsp;Rs. <?php echo $sumtot; ?></span></b></label>
             </div>
             
             <div class="col-md-offset-4 col-md-12">
                <label><h3><b>OverAll Total SO Amount :- <span style="color:green; ">&nbsp;Rs. <?php echo $sumtot; ?></span></b></h3> </label>
              <div class="col-md-4">
                 <input type="hidden" value="<?php echo $sumtot; ?>" name="mrp_tot" id="mrp_tot" >
                <label>MRP Discount (in %)</label>
                <input type="number" class="form-control" required="" aria-required="true" id="firstdis"  oninput="discountcheck(this.value)" placeholder="Enter MRP Discount in %" name="mrp_discount"/>
                

              </div>
              <div class="col-md-4">
                 <label><h5><b>After Discount :- <i class="fa fa-inr" aria-hidden="true"></i> <strike style="color:red;" id="mrptotamt"></strike> <span style="color:green;" id="after_dis"></span></b></h5></label>
                 <input type="hidden" id="after_dis_hidd" value="" name="after_discount_amount">
                 
             </div>

             </div>
             <br><br>
              <div class="col-md-offset-4 col-md-12" style="margin-top: 20px;">
                 <div class="col-md-4"> 
                  <label>After Discount Amount (in %)</label>
                   <input type="number"  class="form-control" required="" aria-required="true" oninput="after_discount_get_dis(this.value)" placeholder="Enter After Discount Amount in %" name="after_dis_amou_aply_dis"/>
                </div>
                 <div class="col-md-4">
                 <label><h5><b>Final After :- <i class="fa fa-inr" aria-hidden="true"></i> <strike style="color:red;" id="mrptotamt1"></strike> <span style="color:green;" class="after_dis1"></span></b></h5></label>
                 <input type="hidden" id="after_dis_hidd1" value="" name="after_discount_amount">
             </div>
              </div>
              <hr>
              <br><br>
              <div class="col-md-12">
               <div class="col-md-4 input-append">
                  <label>SO Expire Date</label>
                  <div class="input-append success date col-md-10 col-lg-6 no-padding">
                     <input type="text" name="so_expire_date" class="form-control datepicker">
                      <span class="add-on datepicker"><span class="arrow"></span><i class="fa fa-th "></i></span>
                  </div>
               </div><!-- col-md-4 -->
               <div class="col-md-5" style="margin-top: 40px !important;">
                 <h3> <b><label  style="font-size: 20px;font-weight: 700">Final SO Amount :- <i class="fa fa-inr" aria-hidden="true"></i> <span style="color:green;" class="after_dis1"></span></label></b></h3>
               </div><!-- col-md-6 -->
               <div class="col-md-3" style="margin-top: 30px !important;">
                  <label ><b class="text-warning">Total Discount :- </b><span class="totDiscount"></span> %</label>
                  <label><b class="text-warning">Total Dis. Amt :-</b> <i class="fa fa-inr" aria-hidden="true"></i> <span class="discountAmt"></span></label>
                  <input type="hidden" class="discountAmt1" name="totalamt">
               </div>
               
                  
              </div>
            </div>
              <br><br><br><br><br><br><br><br>
<br><br>

               <div class="form-actions show-bhai" >
                  <div class="pull-right">
                     <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> Genrate Sales Order</button>
                     <button class="btn btn-white btn-cons" type="button">Cancel</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>