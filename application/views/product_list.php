<?php 
   $login_data=current($this->session->userdata('login_data'));
?>
<div class="content">
   <ul class="breadcrumb">
      <li>
         <p>YOU ARE HERE</p>
      </li>
      <li><a href="#" class="">Manage Product</a> </li>
      <li><a href="#" class="active">Product List</a> </li>
   </ul>
   <a href="<?php echo base_url(); ?>Add_Product" class="btn btn-success" ><i class="fa fa-plus"></i>  &nbsp;Add Product</a>
   <br>
   <?php
      if($this->session->flashdata('product')) {
      $message = $this->session->flashdata('product');
      
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
               <h4>All Product <span class="semi-bold">List</span></h4>
               <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
               </div>
            </div>
            <div class="grid-body table-responsive">
               <table class="table table-striped" id="example2">
                  <thead>
                     <tr>
                     	<th>S No.</th>
                        <th>Product Name</th>
                        <th>Image</th>
                        <th>Category Name</th>
                        <th>Color</th>
                        <th>Dimension</th>
                        <th>Govt. Price</th>
                        <th>Retailer Price</th>
                       
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                  	<?php
                     //print_r($product_data);
                     $x=1;
                  	 foreach($product_data as $lis){?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                        <td><?php echo $lis['product_name']; ?></td>
                        <td>
                           <?php if(!empty($lis['image_name'])){ ?>
                           <img style="width:100px;height:80px;" src="<?php echo base_url(); ?>upload/<?php echo  $lis['image_name']; ?>">
                           <?php }else{ ?>
                             <img style="width:100px;height:80px" src="<?php echo base_url(); ?>upload/no-image.png">
 
                           <?php } ?>
                        </td>
                        <td><?php echo $lis['category_name']; ?></td>
                        <td><?php echo $lis['option_name']; ?></td>
                        <td><?php echo $lis['thickness']; ?> (<?php echo $lis['size_feet']; ?>)</td>
                        <td>Rs. <b style="color:green;"><?php echo $lis['govt_price']; ?></b></td>
                        <td>Rs. <b style="color:green;"><?php echo $lis['retailer_price']; ?></b></td>
                        <td>
                           <?php $id=base64_encode($lis['id']); ?>
                        	<a href="<?php echo base_url(); ?>Edit_Product/<?php echo $id; ?>"><span class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                        	<?php if($login_data['role']=='admin'){ ?>
                     <span class="btn btn-danger" onclick="myproductdeletefun('<?php echo $id; ?>')" ><i class="fa fa-trash" aria-hidden="true"></i></span>
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