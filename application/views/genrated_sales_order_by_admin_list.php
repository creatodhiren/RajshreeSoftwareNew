<style>
#search_form {
    margin-bottom: 30px;
}
input.btn.btn-default {
    margin-top: 19px;
}
</style>
<div class="content">
   <ul class="breadcrumb">
      <li>
         <p>YOU ARE HERE</p>
      </li>
      <li><a href="#" class="">Product</a> </li>
      <li><a href="#" class="active">Genrated Sales Order</a> </li>
   </ul>
  
   <br>
   <?php
      if($this->session->flashdata('sale')) {
      $message = $this->session->flashdata('sale');
      
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
               <h4>Sales Order<span class="semi-bold">List</span></h4>
               <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
               </div>
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
                <input type="submit" class="btn btn-default" name="submit" value="Search" onclick="search_so()">
                </div>
                </div>
                
               <table class="table table-striped  datatable_for" id="example2">
                  <thead>
                     <tr>
                     	<th>S No.</th>
                     	<th>Dealer Name</th>
                      <th>Mobile</th>
                      <th>Email</th>
                      <th>Purchase Date</th>
                      <th>Sub Total</th>
                      <th>SO Total</th>
                        
                        <th>Status</th>
                       
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id="example3">
                  	<?php
                  	//print_r($po_list);
                     $x=1;
                  	 foreach($product_data as $lis){
						  ?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                        <td><?php echo $lis['name']; ?></td>
                        <td><?php echo $lis['mobile']; ?></td>
                        <td><?php echo $lis['email'] ?></td>
                        <td><?php echo date("d/M/Y",strtotime($lis['so_date'])); ?></td>
                        <td><b style="color: red;"><i class="fa fa-inr"></i> <?php echo $lis['subtotal'] ?></b></td>
                        <td><b style="color:green;"><i class="fa fa-inr"></i> <?php echo $lis['total'] ?></b></td>
                       <td><b style="color:Green;">Genrate SO</b></td>
                        <td>
                         <span class="btn btn-warning" onclick="productlistingfromProductionStatus('<?php echo base64_encode($lis['id']) ?>','<?php echo $lis['segment']; ?>');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-eye"></i></span>

                          <a href="<?php echo base_url(); ?>So_Invoice/<?php echo base64_encode($lis['id']); ?>"><span class="btn btn-primary" title="Invoice"><i class="fa fa-inr"></i></span></a>
                        
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

  </div>
</div>

    
</div>
<script>
////////////auto sugggetion///////////
$(document).ready(function(){
$("#dealer_name").autocomplete({
           //var base_url =document.getElementById("base_url").value;
            
            // var strUser = state.options[state.selectedIndex].value; 
          
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
function search_so(){
	var startDate = $("#fromdate").val();
	var endDate = $("#todate").val();
	var dealer_name = $("#dealer_name").val();
// 	alert(startDate);
// 	alert(endDate);
// 	alert(salse_name);
// 	alert(dealer_name);

var base_url =document.getElementById("base_url").value;
// //alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Vendor/getUserListBySearchSo",
  data: {startDate : startDate, endDate : endDate,dealer_name : dealer_name },
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
           
           var govt_price = html['recordData'][i]['govt_price'];
		   var retailer_price = html['recordData'][i]['retailer_price'];
		    //var product_status = html['recordData'][i]['product_status'];
           //alert(govt_price);
           //alert(retailer_price);
           //alert(product_status);
		   

		   if(segment == 'retailer'){
	       var prod_price=retailer_price;
	       }else{
	       var prod_price=govt_price;
	        }
         output += "<tr>";
         output += "<td>"+x+++"</td>";
         output += "<td>"+html['recordData'][i].product_name+" "+html['recordData'][i].thickness+"mm "+html['recordData'][i].category_name+" ( "+html['recordData'][i].size_feet+")</td>";
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
