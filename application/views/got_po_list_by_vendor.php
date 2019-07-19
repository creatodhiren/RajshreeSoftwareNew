
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>

<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<div class="content">
   <ul class="breadcrumb">
      <li>
         <p>YOU ARE HERE</p>
      </li>
      <li><a href="#" class="">Product</a> </li>
      <li><a href="#" class="active">Got PO by Dealer</a> </li>
   </ul>
  
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
	  
	  <?php 
		$login_data = $this->session->userdata('login_data'); 
		$login_id = $login_data[0]['id'];
		$login_role = $login_data[0]['role'];
	  ?>
   <br>
   <div class="row-fluid">
      <div class="span12">
         <div class="grid simple ">
            <div class="grid-title">
               <h4>Got Purchase Order By Dealer <span class="semi-bold">List</span></h4>
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
                <input type="submit" class="btn btn-default" name="submit" value="Search" onclick="search_form()">
                </div>
                </div>
                
               <table class="table table-striped  datatable_for" id="example2">
                  <thead>
                     <tr>
                     	<th>S No.</th>
                     	<th>Dealer Name</th>
                        <th>Mobile</th>
                        <th>Email</th>
                        <th>Purchase Order Date</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id="example3">
                  	<?php
                  	//print_r($po_list);
                     $x=1;
                  	 foreach($po_list as $lis){
						$id = base64_encode($lis['id']); 
						$segment =  $lis['segment'];
						 ?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                        <td><?php echo $lis['name']; ?></td>
                        <td><?php echo $lis['mobile']; ?></td>
                        <td><?php echo $lis['email']; ?></td>
                        <td><?php echo date("d/M/Y",strtotime($lis['po_date'])); ?></td>
                        <td><b style="color:Green;">Rs.<?php echo $lis['sub_total']; ?></b></td>
                       <td><b style="color:Green;">New PO</b></td>
                        <td>
                        <span class="btn btn-warning" onclick="productlisting('<?php echo $id; ?>','<?php echo $segment; ?>');" data-toggle="modal" data-target="#myModal" title="View Product List"><i class="fa fa-eye"></i></span>
                        	<a href="<?php base_url(); ?>PO_Process/<?php echo base64_encode($lis['id']); ?>"><span class="btn btn-success" title="Genrate Sales Order"><i class="fa fa-share" aria-hidden="true"></i></span></a>
                          
                          <span class="btn btn-danger" onclick="cancelpo('<?php echo base64_encode($lis['id']); ?>')" title="Cancel Purchase Order"><i class="fa fa-times" aria-hidden="true"></i></span>
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
                <th>Amount</th>
                
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

/***********filter search for po***************/
function search_form(){
	var startDate = $("#fromdate").val();
	var endDate = $("#todate").val();
	var dealer_name = $("#auto").val();
// 	alert(startDate);
// 	alert(endDate);
// 	alert(state);
//  alert(city);
//  alert(dealer_name);

var base_url =document.getElementById("base_url").value;
// //alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Vendor/getPoUserListBySearch",
  data: {startDate : startDate, endDate : endDate, dealer_name : dealer_name},
  success: function(html){
     //alert(html);
     $('#example3').html(html);
  }
});
}

</script>

