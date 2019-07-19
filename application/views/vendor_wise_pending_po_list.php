<div class="content">
  
   <br>
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
   <br>
   <div class="row-fluid">
      <div class="span12">
         <div class="grid simple ">
            <div class="grid-title">
               <h4>Rejected Purchase Order<span class="semi-bold">List</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="<?php echo base_url(); ?>Vendor_Profile/<?php echo base64_encode($vendor_pending_list[0]['vendor_id']); ?>"><input type="submit" class="btn btn-warning" value="Back To Profile" name=""></a></h4>
                             <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
               </div>
            </div>
            <div class="grid-body table-responsive">
               <table class="table table-striped  datatable_for" id="example2">
                  <thead>
                     <tr>
                     	<th>S No.</th>
                     	<th>Po Date</th>
                      <th>PO Total Amount</th>
                      <th>Status</th>
                       
                   </tr>
                  </thead>
                  <tbody>
                  <?php
                     //print_r($vendor_pending_list);
                     $x=1;
                  	 foreach($vendor_pending_list as $lis){?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                       
                        <td><?php echo date("d/M/Y",strtotime($lis['po_date'])); ?></td>
                    
                       
                        <td><b style="color:red;"><?php echo $lis['total']; ?></b></td>
                        <td><?php if($lis['total']=='0'){echo "<b style='color:green;'>New Purchase Order</b>";}else{echo "<b style='color:red;'>Invoice Not Created</b>";} ?></td>
                        <!-- <td>
                          <span class="btn btn-warning" onclick="productlisting('<?php echo base64_encode($lis['id']); ?>');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-plus"></i></span>
                                                </td> -->
                     </tr>

                 <?php } ?> 
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

