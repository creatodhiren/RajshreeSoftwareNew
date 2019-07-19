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
               <h4>All Product<span class="semi-bold">List</span>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>Production_list"><input type="submit" class="btn btn-warning" value="Back To List" name=""></a>
</h4>
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
                        
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Action</th>

                        
                       
                     </tr>
                  </thead>
                  <tbody>
                     <?php //print_r($product_list); ?>
                  	<?php
                     $x=1;
                  	 foreach($product_list as $lis){?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>

                        <td><?php echo $lis['product_name']; ?> <?php echo $lis['thickness']; ?>mm <?php echo $lis['category_name']; ?> ( <?php echo $lis['height']; ?> x <?php echo $lis['width']; ?> )</td>
                        <td><?php echo $lis['quantity']; ?></td>
                         <td><b style="color:green;"><?php echo $lis['product_status']; ?></b></td>
                        <td><span data-toggle="modal" data-target="#myModal" onclick="productlisting12('<?php echo $lis['id']; ?>');" class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true" title="See Product Status"></i></span></td>
                        
                       
                       
                      
                     </tr>
                 <?php } ?>  
                 </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="height:307px;">
      <form method="post" id="id" action="<?php echo base_url();?>Employee_user/Production/product_listing12">
      <div class="modal-header">
        <button type="button" class="close" onclick="javascript:window.location.reload()" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Product Status</h4>
      </div>
      <div class="modal-body">
      
      <table class="table table-striped" id="tablrow">
         <thead>
            <tr>
               <th>S No.</th>
               <th>Status</th>
               <th>Date</th>
            </tr>
         </thead>
         <tbody>
            
         </tbody>
      </table>  
     
<br><br>


      <input type="hidden" name="row_id" id="id" value=""> 

      
       <select class="form-control" required="" name="product_status">
       <option value="">Select Product Status </option>
       <option value="Quality Control">Quality Control</option>
       <option value="FGS">FGS</option>
       <option value="Cutting">Cutting</option>
    
       <option value="Lamination">Lamination</option>
       <option value="Thermofarming">Thermofarming</option>
       <option value="Door">Door</option>
       <option value="Printing">Printing</option>
       <option value="Dispatch">Dispatch</option>
    </select>

     
    
        
      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-default">Save</button>
        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>



<script>
     function productlisting12(id){
      var base_url =document.getElementById("base_url").value;
     //alert(id);
      $('#id').val(id);
     $.ajax({
          
  type: "POST",
  url: base_url+"Employee_user/Production/product_listing_for_production",
  data: {id : id},
  dataType : "JSON",
   success: function(html){
    var count = Object.keys(html['recordData']).length;
     //alert(count);
       var output = [];
       var x=1;
       var subtotal=0;
      
       for(var i=0; i < count; i++){
          
          output += "<tr>";
         output += "<td>"+x+++"</td>";
          output += "<td><b style='color:green;'>"+html['recordData'][i].product_status +"</b></td>";
          var dat = html['recordData'][i].status_date.split('-')
           output += "<td>"+dat[2]+"/"+dat[1]+"/"+dat[0]+"</td>";
        output += "</tr>"; 
       }
           $('#tablrow').append(output);

      
  }
}); 
    }
</script>