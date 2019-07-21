<div class="content">
   <ul class="breadcrumb">
      <li>
         <p>YOU ARE HERE</p>
      </li>
      <li><a href="#" class="">Manage Product</a> </li>
      <li><a href="#" class="active">Got Production</a> </li>
   </ul>
   <!-- <a href="<?php echo base_url(); ?>Add_Category" class="btn btn-success" ><i class="fa fa-plus"></i>  &nbsp;Add Category</a>
 -->   <br>
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
               <h4>All Sales Order<span class="semi-bold">List</span></h4>
              
            </div>
            <div class="grid-body table-responsive">
                <div class="form-inline row" role="form" id="search_form" autocomplete="off">
                <div class="form-group col-md-2">    
                <label for="date">From Date :</label>
                <input type="date" class="form-control"  id="fromdate" name="fromdate" placeholder="Enter date" value="">
                </div>
                
                <div class="form-group col-md-2">
                <label for="date">To Date :</label>
                <input type="date" class="form-control" id="todate" placeholder="Enter date"  name="todate"  value="">
                </div>
                
                <div class="form-group col-md-2">
                <label for="dealer">Name</label>
                <input id="dealer_name" type="text" class="form-control" placeholder="Enter Dealer Name" value="" name="dealer_name" autocomplete="off" >
                <input type="hidden" value="" id="auto">
                </div>
                
                <div class="form-group col-md-2">
                <label for="dealer"></label>
                <input type="submit" class="btn btn-default" name="submit" value="Search" onclick="search_so_send_to_admin_list()">
                </div>
                </div>
               
               <table class="table table-striped  datatable_for" id="example2">
                  <thead>
                     <tr>
                     	<th>S No.</th>
                        <th>Sales Order Id</th>
                        <th>Dealer Name</th>
                        <th>Mobile</th>
                        <th>Prduction Enter Date</th>
                        <th>Total Price</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id="example3">
                  	<?php
                  	
                     $x=1;
            
                  	 foreach($so_list as $lis){
						 ?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                      <td><b style="color:green;"><?php echo $lis['sales_order_id']; ?></b></td>
                        <td><?php echo $lis['name']; ?></td>
                        <td><?php echo $lis['mobile']; ?></td>
                        <td><b style="color:orange;"><?php echo date("d/M/Y",strtotime($lis['status_date'])); ?></b></td>
                        <td><b style="color:green;">Rs.<?php echo $lis['total']; ?></b></td>
                      
                        
                        <td>
                           <?php $id=base64_encode($lis['so_id']); ?>
                        <span class="btn btn-warning" onclick="productlistingfromProductionStatus('<?php echo base64_encode($lis['so_id']); ?>','<?php echo $lis['segment']; ?>');" data-toggle="modal" data-target="#myModal"><i class="fa fa-eye" aria-hidden="true" title="See Product Status"></i></span>
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
<script>
////////////auto sugggetion///////////
$(document).ready(function(){
$("#dealer_name").autocomplete({
           
            source: function (request, response) {
                // var dealer_name = $("#dealer_name").val();
               
                $.ajax({                
                    url:"<?php echo base_url(); ?>/Vendor/autosuggestionProductOrder",
                  //url: base_url+"Vendor/autosuggestion",
                    type: 'post',
                   data: {word:request.term},
                   dataType: "json",
                    success: function (output) {
                         response( $.map( output.slice(0,15), function( item )
                        {
                            return{
                                    label: item.name,
                                    value: item.name,
                                    
                                   }
                        }));
                      //  alert(output);
                        //response(output.slice(0,15));
                    },
                    error: function (errormsg) {
                        alert(errormsg.responseText);
                    }
                });
            },
            // select: function(request, response){
            //   $('#auto').val(response.item.name);
            //  console.log(response);
            // }
            select: function (request, response) {
            var v = response.item.value;
            $('#auto').val(v);
          // console.log(response);
            this.value = v; 
            return false;
        }
        });
});

/***********filter search for so***************/
function search_so_send_to_admin_list(){
	var startDate = $("#fromdate").val();
	var endDate = $("#todate").val();
	var dealer_name = $("#auto").val();
 	//alert(startDate); 	
	//alert(endDate);  
	//alert(dealer_name);

 var base_url =document.getElementById("base_url").value;
alert(base_url);
$.ajax({
type: "POST",
url: base_url+"Vendor/dealerSoList",
data: {startDate : startDate, endDate : endDate, dealer_name : dealer_name},
success: function(html){
//alert(html);
$('#example3').html(html);
}
 });
}

function productlistingfromProductionStatus(so_id,segment){
  var base_url =document.getElementById("base_url").value;
     //alert(segment);
      $.ajax({
          
  type: "POST",
  url: base_url+"Common/product_listing_from_poduction",
  data: {id : so_id},
  dataType : "JSON",
  success: function(html){
     //alert(html);

        var count = Object.keys(html['recordData']).length;
    // alert(count);
    
       var output = [];
       var x=1;
       var price=0;
      
       for(var i=0; i < count; i++){
         var prod_price = html['recordData'][i].rate;
         output += "<tr>";
         output += "<td>"+x+++"</td>";
         output += "<td>"+html['recordData'][i].prod_category+" ("+html['recordData'][i].prod_thick+") "+html['recordData'][i].category_name+" ( "+html['recordData'][i].prod_size+")</td>";
         output += "<td>"+html['recordData'][i].quantity+"</td>";
         price = html['recordData'][i].quantity*prod_price;
         output += "<td>"+price+"</td>";
         output += "<td><b style='color:green;'>"+html['recordData'][i].product_status+"</b></td>";
        output += "</tr>"; 
       }
           $('#tablrow').append(output); 

  }
}); 
 
}

</script>