<div class="content">
<div class="row">
<div class="col-md-6">
<div class=" tiles white col-md-12 no-padding">
<div class="tiles green cover-pic-wrapper">
<div class="overlayer bottom-right">
<div class="overlayer-wrapper">
<div class="padding-10 hidden-xs">
	<?php 
    $vendor_data = $vendor_data[0];
    //print_r($vendor_data);
	?>
<!-- <button type="button" class="btn btn-primary btn-small"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</button> -->
<a href="<?php echo base_url(); ?>Edit_Vendor_Details/<?php echo base64_encode($vendor_data['id']); ?>"> <button type="button" class="btn btn-primary btn-small"><i class="fa fa-pencil"></i>&nbsp;&nbsp;Edit</button></a>
</div>
</div>
</div>
<img src="<?php echo base_url(); ?>assets/img/cover_pic.png" alt="">
</div>
<div class="tiles white">
<div class="row">


<div class="col-md-3 col-sm-3">
<div class="user-profile-pic">
<img width="69" height="69" data-src-retina="<?php echo base_url(); ?>assets/img/profiles/avatar2x.jpg" data-src="<?php echo base_url(); ?>assets/img/profiles/avatar.jpg" src="<?php echo base_url(); ?>assets/img/profiles/avatar.jpg" alt="">
</div>
<!-- <div class="user-mini-description">
<h3 class="text-success semi-bold">
2548
</h3>
<h5>Followers</h5>
<h3 class="text-success semi-bold">
457
 </h3>
<h5>Following</h5>
</div> -->
</div>



<div class="col-md-5 user-description-box  col-sm-5">
<h4 class="semi-bold no-margin"><?php echo $vendor_data['name']; ?></h4>
<h6 class="no-margin"><?php echo $vendor_data['company_name']; ?></h6>
<br>
<p><i class="fa fa-phone"></i><?php echo $vendor_data['mobile']; ?></p>
<p><i class="fa fa-envelope"></i><?php echo $vendor_data['email']; ?></p>
<p><i class="fa fa-location-arrow"></i><?php echo $vendor_data['cityName']; ?> (<?php echo $vendor_data['stateName']; ?>)</p>
<p><i class="fa fa-map-marker"></i><span style="text-align: justify;"><?php echo $vendor_data['address']; ?></span></p>
</div>

<div class="col-md-3 col-sm-3">

<div class="user-mini-description">
	<br>
	<center><b>Payments</b></center>
<h3 class="text-warning semi-bold">
<?php if(!empty($total_pay[0]['total_pay'])){ echo $total_pay[0]['total_pay'];}else{echo '0';} ?>
</h3>
<h5>Total Pay</h5>
<h3 class="text-success semi-bold">
<?php if(!empty($total_paid[0]['total_paid'])){ echo $total_paid[0]['total_paid'];}else{echo '0';} ?>  

 </h3>
<h5>Paid Amount</h5>
<h3 class="text-danger semi-bold">
<?php echo $total_pay[0]['total_pay']- $total_paid[0]['total_paid'];?>
 </h3>
<h5>Remaining Amount</h5>
</div>
</div>

</div>
<div class="tiles-body">
<div class="row">
<div class="post col-md-12">
<div class="user-profile-pic-wrapper">
<div class="user-profile-pic-normal">
<img width="35" height="35" data-src-retina="<?php echo base_url(); ?>assets/img/profiles/c2x.jpg" data-src="assets/img/profiles/c.jpg" src="assets/img/profiles/c.jpg" alt="">
</div>
 </div>



<div class="clearfix"></div>

</div>
</div>
</div>
</div>
</div>
</div>

<!-- ------------Right side section pie chart---------------- -->








<div class="col-md-6">




<div class="row">
<div class="tiles white col-md-12  no-padding">
<div class="tiles-body">

<div class="row">




<div class="col-md-4  spacing-bottom-sm spacing-bottom">
<div class="tiles green added-margin" style="border-radius: 8%">
<div class="tiles-body">
<div class="controller">
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
</div>
<div class="tiles-title"><b>Total<br> Order <br></b> </div>

<div class="heading"> <span class="animate-number" data-value="<?php echo $total_PO; ?>" data-animation-duration="1200">0</span></div>

</div>
</div>
</div>



<div class="col-md-4  spacing-bottom-sm spacing-bottom">
  <?php if($total_reject=='0'){ ?>
    <div class="tiles red added-margin" style="border-radius: 8%">
<div class="tiles-body">
<div class="controller">
<!-- <a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a> -->
</div>
<div class="tiles-title">Total Rejected Purchase Order</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_reject; ?>" data-animation-duration="1200">0</span></div>

</div>
</div>
  <?php }else{ ?>

<a href="<?php echo base_url(); ?>Vendor_Reject_list/<?php echo base64_encode($vendor_data['user_id']); ?>">
<div class="tiles red added-margin" style="border-radius: 8%">
<div class="tiles-body">
<div class="controller">
<!-- <a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a> -->
</div>
<div class="tiles-title">Total Rejected Purchase Order</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_reject; ?>" data-animation-duration="1200">0</span></div>

</div>
</div>
</a>
<?php } ?>
</div>


<div class="col-md-4  spacing-bottom-sm spacing-bottom">
   <?php if($total_invoice=='0'){ ?>
    <div class="tiles blue added-margin" style="border-radius: 8%">
<div class="tiles-body">
<div class="controller">
<!-- <a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a> -->
</div>
<div class="tiles-title">Total Invoice Genrated</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_invoice; ?>" data-animation-duration="1200">0</span></div>

</div>
</div>
     <?php }else{ ?>
  <a href="<?php echo base_url(); ?>Vendor_Total_Invoice_list/<?php echo base64_encode($vendor_data['user_id']); ?>">
<div class="tiles blue added-margin" style="border-radius: 8%">
<div class="tiles-body">
<div class="controller">
<!-- <a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a> -->
</div>
<div class="tiles-title">Total Invoice Genrated</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_invoice; ?>" data-animation-duration="1200">0</span></div>

</div>
</div>
</a>
<?php } ?>
</div>
<div class="col-md-4  spacing-bottom-sm spacing-bottom">
  <?php if($total_pending=='0'){ ?>
    <div class="tiles purple  added-margin" style="border-radius: 8%">
<div class="tiles-body">
<div class="controller">
<!-- <a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
 -->
   
 </div>
<div class="tiles-title">Total Pending Purchase Order</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_pending; ?>" data-animation-duration="1200">0</span></div>

</div>
</div>

    <?php }else{ ?>
<a href="<?php echo base_url(); ?>Vendor_Total_Pending_list/<?php echo base64_encode($vendor_data['user_id']); ?>">

<div class="tiles purple  added-margin" style="border-radius: 8%">
<div class="tiles-body">
<div class="controller">
<!-- <a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
 -->
   
 </div>
<div class="tiles-title">Total Pending Purchase Order</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_pending; ?>" data-animation-duration="1200">0</span></div>

</div>
</div>
</a>
<?php } ?>
</div>



<div class="clearfix"></div>
</div>
</div>







</div>
</div>








<br>
<div class="row">
<div class="col-md-12 no-padding">
<div class="tiles white">

</div>
<div class="tiles white padding-10">
	<center><h4><b>Order Progress History</b></h4></center>
<br>
<div class="grid-body table-responsive">
               <table class="table table-striped  datatable_for" id="example2">
                  <thead>
                     <tr>
                     	<th>S No.</th>
                        <th>Invoice No.</th>
                        <th>Progress</th>
                       
                        
                     </tr>
                  </thead>
                  <tbody>
                  	<?php 
                  	$x=1;
                  	foreach ($invoice_listing as $value) {
                  	 ?>

                  	<tr>
                  		<td><?php echo $x++; ?></td>
                        <td><a href="<?php base_url(); ?>Final_invoice/<?php echo base64_encode($value['invoice_number']); ?>"><?php echo $value['invoice_number']; ?></a></td>
                        <td><div class="progress" style="height:20px;">
    <div class="progress-bar progress-bar-striped active" title="Progress In %" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%;">
      40%
    </div>
  </div></td>
                        
                  	</tr>
                     <?php } ?> 
                  </tbody>
               </table>
            </div>
<div class="clearfix"></div>
</div>
</div>
</div>
<br>
<br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br><br>
<br>

</div>
</div>
</div>
</div>
