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
               <h4>Rejected Purchase Order<span class="semi-bold">List</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?php echo base_url(); ?>Vendor_Profile/<?php echo base64_encode($vendor_reject_list[0]['vendor_id']); ?>"><input type="submit" class="btn btn-warning" value="Back To Profile" name=""></a></h4>
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
                     	<th>Purchase Order Date</th>
                      <th>Status</th>
                      
                        <th>Rejected Date</th>
                        
                                              
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  <?php
//print_r($vendor_reject_list);
                     $x=1;
                  	 foreach($vendor_reject_list as $lis){?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                        <td><?php echo date("d/M/Y",strtotime($lis['po_date'])); ?></td>
                        <td><b style="color:red;">Reject PO</b></td>
                    
                        <td><?php echo date("d/M/Y",strtotime($lis['status_date'])); ?></td>
                       
                        <td>
                          <span class="btn btn-warning" onclick="productlisting('<?php echo base64_encode($lis['id']); ?>');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-plus"></i></span>
                                                </td>
                     </tr>

                 <?php } ?> 
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div id="myModal"  class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onclick="javascript:window.location.reload()" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product List</h4>
      </div>
      <div class="modal-body table-responsive">
       <table class="table table-striped">
           
        <thead>
           
             <tr>
                <th>Sr.no</th>  
                <th>Product name</th>
                <th>Quantity</th>

                
            </tr>   
        </thead>
        
        <tbody id="tablrow">
            
         </tbody>
            </table>
      </div>
      <div class="modal-footer">
          
        <!--<a href="<?php echo base_url(); ?>Franchise/Inventory/CreatePO" ><input type="submit" class="btn btn-warning" value="Genrate Purchase Order" /></a>
        --><button type="button" class="btn btn-default" onclick="javascript:window.location.reload()" data-dismiss="modal">Close</button>
      </div>
    </div>
