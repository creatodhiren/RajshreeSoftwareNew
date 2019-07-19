<?php 
   $login_data=current($this->session->userdata('login_data'));
?>
<div class="content">
   <ul class="breadcrumb">
      <li>
         <p>YOU ARE HERE</p>
      </li>
      <li><a href="#" class="">Manage Product</a> </li>
      <li><a href="#" class="active">Product Option List</a> </li>
   </ul>
   <!--<a href="<?php echo base_url(); ?>Add_Product_Option" class="btn btn-success" ><i class="fa fa-plus"></i>  &nbsp;Add Option</a>-->
   <br>
   <?php
      if($this->session->flashdata('Option_class')) {
      $message = $this->session->flashdata('Option_class');
      
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
               <h4>All Option <span class="semi-bold">List</span></h4>
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
                        <th>Option Name</th>
                        <th>Option Class</th>
                       
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  	<?php
                     $x=1;
                  	 foreach($option_List as $lis){?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                        <td><?php echo $lis['option_name']; ?></td>
                        <td><?php echo $lis['option_class']; ?></td>
                       
                        <td>
                           <?php $id=base64_encode($lis['option_id']); ?>
                        	<a href="<?php echo base_url(); ?>Edit_Option/<?php echo $id; ?>"><span class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                        	 <?php if($login_data['role']=='admin'){ ?>
                            <span class="btn btn-danger"><i class="fa fa-trash" onclick="mydeletefun('<?php echo $id; ?>','tbl_product_option','option_id')" aria-hidden="true"></i></span>
                            <?php } ?>
                        	
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