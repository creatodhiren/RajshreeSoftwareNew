<?php 
   $login_data=current($this->session->userdata('login_data'));
?>

<div class="content">
   <ul class="breadcrumb">
      <li>
         <p>YOU ARE HERE</p>
      </li>
      <li><a href="#" class="">Master</a> </li>
      <li><a href="#" class="active">Employee/Sales Executive</a> </li>
   </ul>
   <a href="<?php echo base_url(); ?>Add_Users" class="btn btn-success" ><i class="fa fa-plus"></i>  &nbsp;Add&nbsp;&nbsp; Employee</a>
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
   <br>
   <div class="row-fluid">
      <div class="span12">
         <div class="grid simple ">
            <div class="grid-title">
              <h4><span class="semi-bold"></span></h4>
               <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" onclick="javascript:window.location.reload()" class="reload"></a>
                  <a href="javascript:;" class="remove"></a>
               </div>
            </div>
           
            <div class="grid-body table-responsive">
                
                <div class="form-inline row" role="form" id="search_form" autocomplete="off">
                <div class="form-group col-md-2">
                <label for="date">State :</label>
                  <select class="form-control" onchange="getcity(this.value)" autocomplete="off" name="state" id="state" required="" aria-required="true">
                     <option value="">Select State</option>
                     <?php foreach ($stateList as  $value) {
                     ?>
                <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
                     <?php  } ?>
                     
                   </select>
                </div>
                <div class="form-group col-md-2">
                <label for="date">City :</label>
                  <select class="form-control" id="city"  autocomplete="off" name="city"  required="" aria-required="true">
                     <option value="">Select City</option>
                  </select>
                </div>
    
                <div class="form-group col-md-3">
                <label for="dealer">Name</label>
            <input id="empl_name" type="text" class="form-control" placeholder="Enter Dealer Name" value="" name="empl_name" autocomplete="off" >
                <input type="hidden" value="" id="auto">
                </div>
                
                <div class="form-group col-md-2">
                <label for="dealer"></label>
                <input type="submit" class="btn btn-default" name="submit" value="Search" onclick="search_user_list()">
                </div>
                </div>
                
                    
               <table class="table table-striped  datatable_for" id="example2">
                   
                  <thead>
                     <tr>
                     	<th>S No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Mobile</th>
                        <th>Role</th>
                        <th>Date</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id="example3">
                  	<?php
                     $x=1;
                  	 foreach($usersList as $lis){
                  	 $d=$lis['createDateandtime'];
                  	 $d =  date('d-m-y',strtotime($d));
                  	 ?>
                     <tr class="odd gradeX">
                     	<td><?php echo $x++; ?></td>
                        <td><?php echo $lis['name']; ?></td>
                        <td><?php echo $lis['email']; ?></td>
                        <td><?php echo $lis['password']; ?></td>
                        <td class="center"><?php echo $lis['mobile']; ?></td>
                        
                        <td class="center"><?php echo $lis['role']; ?></td>
                        <td><?php echo $d; ?></td>
                        <td>
                           <?php $id=base64_encode($lis['id']); ?>
                        	<a href="<?php echo base_url(); ?>Edit_User_Details/<?php echo $id; ?>"><span class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i></span></a>
                        	<?php if($login_data['role']=='admin'){ ?>
                        	
                        <button type="button" class="btn btn-danger btn_e_d" onclick="update_status('<?php echo $id; ?>','tbl_manage_user','<?php echo $lis['status']; ?>')">
                            
                            <?php if($lis['status']==0){
                            echo "Enable";
                             }else{
                            echo "Disable";
                            }?>
                            </button>
                        	
                            <!--<span class="btn btn-danger"><i onclick="mydeletefun('<?php //echo $id; ?>','tbl_manage_user','id')" class="fa fa-trash" aria-hidden="true"></i></span>-->
                            <?php }?>
                        	
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
<script>
////////////auto sugggetion///////////
$(document).ready(function(){
$("#empl_name").autocomplete({
         
          
            source: function (request, response) {
                
                $.ajax({                
                    url:"<?php echo base_url(); ?>/Users/autosuggestionForEmp",
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

                    },
                    error: function (errormsg) {
                        alert(errormsg.responseText);
                    }
                });
            },
            
            select: function (request, response) {
            var v = response.item.value;
            $('#auto').val(v);
           // console.log(response);
            this.value = v; 
            return false;
        }
        });
});

/***********filter search for user_list***************/
function search_user_list(){
	var state = $("#state").val();
	var city = $("#city").val();
	var dealer_name = $("#auto").val();
//  alert(state);
//  alert(city);
//  alert(dealer_name);

var base_url =document.getElementById("base_url").value;
// //alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Users/getUserListBySearch",
  data: {action: "ajaxConversion", state : state, city : city, dealer_name : dealer_name},
  success: function(html){
     //alert(html);
     $('#example3').html(html);
  }
});

}
</script>
