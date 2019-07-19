   <div class="content sm-gutter">
         <br>
   <?php
      if($this->session->flashdata('users')) {
      $message = $this->session->flashdata('users');
      
      ?>
   <div class="col-md-4 col-md-offset-4 <?php echo $message['class'] ?>">
      <button class="close" data-dismiss="alert"></button>
      <center><b><?php echo $message['message']; ?></b></center>
   </div>
   <?php
      }
      
      ?>

               <div class="page-title"><h3><b>Dashboard</b></h3></div>
                <div class="row">
         <?php 
        $login_data = $this->session->userdata('login_data');
         if($login_data[0]['role']=='admin'){

          ?>

                  <div class="col-md-4 col-vlg-3 col-sm-6">
                     <div class="tiles green m-b-10">
                        <div class="tiles-body">
                           <div class="controller">
                              <a href="javascript:;" class="reload"></a>
                              <a href="javascript:;" class="remove"></a>
                           </div>
                           <div class="tiles-title text-black">Overall Dealer Pending Order</div>
                           <div class="widget-stats">
                              <div class="wrapper transparent">
                                 <span class="item-title">Got New PO</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $totalGotPO; ?>" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="widget-stats">
                              <div class="wrapper transparent">
                                 <span class="item-title">Rejected PO</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $RejectedPo; ?>" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="widget-stats ">
                              <div class="wrapper last">
                                 <span class="item-title">Pending So</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $PendingSO; ?>" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="64.8%"></div>
                           </div>
                           <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
                        </div>
                     </div>
                  </div>




                  <div class="col-md-4 col-vlg-3 col-sm-6">
                     <div class="tiles blue m-b-10">
                        <div class="tiles-body">
                           <div class="controller">
                              <a href="javascript:;" class="reload"></a>
                              <a href="javascript:;" class="remove"></a>
                           </div>
                           <div class="tiles-title text-black">OVERALL Users</div>
                           <div class="widget-stats">
                              <div class="wrapper transparent">
                                 <span class="item-title">Total Dealer</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $totalvendor; ?>" data- animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="widget-stats">
                              <div class="wrapper transparent">
                                 <span class="item-title">Total Emp</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $totalemp; ?>" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="widget-stats ">
                              <div class="wrapper last">
                                 <span class="item-title">Sales Executive</span> <span class="item-count animate-number semi-bold" data-value="<?php echo $totalsales; ?>" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="54%"></div>
                           </div>
                           <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
                        </div>
                     </div>
                  </div>


                  <div class="col-md-4 col-vlg-3 col-sm-6">
                     <div class="tiles red m-b-10">
                        <div class="tiles-body">
                           <div class="controller">
                              <a href="javascript:;" class="reload"></a>
                              <a href="javascript:;" class="remove"></a>
                           </div>
                           <div class="tiles-title text-black">SERVER LOAD </div>
                           <div class="widget-stats">
                              <div class="wrapper transparent">
                                 <span class="item-title">Overall Load</span> <span class="item-count animate-number semi-bold" data-value="5695" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="widget-stats">
                              <div class="wrapper transparent">
                                 <span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="568" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="widget-stats ">
                              <div class="wrapper last">
                                 <span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="12459" data-animation-duration="700">0</span>
                              </div>
                           </div>
                           <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="90%"></div>
                           </div>
                           <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
                        </div>
                     </div>
                  </div>
             <!-- -----------------------------------Table Form----------------------------------- -->             
    <div class="row">
<div class="col-md-8 col-vlg-3 col-sm-6">
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
                        <th>Dealer Name</th>
                        <th>Mobile</th>
                        <th>Production Start Date</th>
                        <th>Status</th>
                        <th>Action</th>
                       
                        
                     </tr>
                  </thead>
                  <tbody>
                    <?php 
                    //print_r($order_list);
                     $x=1;
                     foreach ($order_list as $value) {
                      ?>

                     <tr>
                        <td><?php echo $x++; ?></td>
                        <td><a href="javascript:;"><?php echo $value['name']; ?> ( <b style="color:green;"><?php echo $value['vendor_id']; ?> </b>)</a></td>
                        <td><?php echo $value['mobile']; ?></td>
                        <td><?php echo date("d/m/Y",strtotime($value['status_date'])); ?></td>
                        <td><b style="color:red;">Running</b></td>
                        <?php $id=base64_encode($value['so_id']); ?>
                        <td><span class="btn btn-warning" onclick="productlistingfromProductionStatus('<?php echo $id; ?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true" title="See Product Status"></i></span></td>
                     </tr>
                     <?php } ?> 
                  </tbody>
               </table>
            </div>
<div class="clearfix"></div>
</div>
</div>
<!-- -------------------------------Table End And Right Blue box div start for Admin----------------------- -->

<div class="col-md-4 col-sm-6">
<div class="tiles blue    m-b-10">
<div class="tiles-body">
<div class="controller">
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
</div>
<h4 class="text-black no-margin semi-bold">Total Dealer Invoice</h4>
<h2 class="text-white bold "><span data-animation-duration="900" data-value="<?php echo $FinalInvoice; ?>" class="animate-number">0</span></h2>
<h4 class="text-black semi-bold  ">Total Dispatch Order</h4>
<div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% higher <span class="blend">than last month</span></span>
</div>
</div>
</div>
</div>




</div>






          <!-- ----------------------------Vendor Section------------------------------------- -->        
               <?php }elseif($login_data[0]['role']=='Vendor'){ ?>

            <div class="col-md-3 col-vlg-3 col-sm-6" style="padding-right: 10px;">
               <div class="tiles green added-margin">
                  <div class="tiles-body">
                      <div class="controller">
                          <a href="javascript:;" class="reload"></a>
                          <a href="javascript:;" class="remove"></a>
                      </div>
                      <div class="tiles-title">Total  Order</div>
                       <div class="heading"> <span class="animate-number" data-value="<?php echo $total_PO; ?>" data-animation-duration="1200">0</span></div>
                             <div class="progress transparent progress-small no-radius">
                                 <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
                              </div>
                             <div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% higher <span class="blend">than last month</span></span>
                             </div>
                  </div>
               </div>
            </div>


<div class="col-md-3 col-vlg-3 col-sm-6" style="padding-right: 10px;">
<div class="tiles red added-margin">
<div class="tiles-body">
<div class="controller">
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
</div>
<div class="tiles-title">Total PO Rejected</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_reject; ?>" data-animation-duration="1200">0</span></div>
<div class="progress transparent progress-small no-radius">
<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
</div>
<div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% higher <span class="blend">than last month</span></span>
</div>
</div>
</div>
</div>


<div class="col-md-3 col-vlg-3 col-sm-6" style="padding-right: 10px;">
<div class="tiles purple  added-margin">
<div class="tiles-body">
<div class="controller">
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
</div>
<div class="tiles-title">Total Pending Purchase Order</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_pending; ?>" data-animation-duration="1200">0</span></div>
<div class="progress transparent progress-small no-radius">
<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
</div>
<div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% higher <span class="blend">than last month</span></span>
</div>
</div>
</div>
</div>


<div class="col-md-3 col-vlg-3 col-sm-6" style="padding-right: 10px;">
<div class="tiles blue added-margin">
<div class="tiles-body">
<div class="controller">
<a href="javascript:;" class="reload"></a>
<a href="javascript:;" class="remove"></a>
</div>
<div class="tiles-title">Total Invoice</div>
<div class="heading"> <span class="animate-number" data-value="<?php echo $total_invoice; ?>" data-animation-duration="1200">0</span></div>
<div class="progress transparent progress-small no-radius">
<div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="26.8%"></div>
</div>
<div class="description"><i class="icon-custom-up"></i><span class="text-white mini-description ">&nbsp; 4% higher <span class="blend">than last month</span></span>
</div>
</div>
</div>
</div>
               <?php } ?>







<!-- Modal -->
<div id="myModal"  class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

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
                <th>Product Name</th> 
                <th>Quantity</th>
                <th>Price</th>
                <th>Status</th>

                
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














               </div>





               
            </div>
         </div>
		 
		 