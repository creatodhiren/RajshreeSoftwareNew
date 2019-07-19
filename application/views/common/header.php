<!DOCTYPE html>
<html>
 <head>
   <?php 
  if(empty($this->session->userdata('login_data'))){
          // $this->load->view('login');
     redirect('login');
      }
   ?>
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="utf-8" />
      <title>RajShree | <?php echo $title; ?></title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
      <meta content="" name="description" />
      <meta content="" name="author" />

<link href="<?php echo base_url(); ?>assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<!--<link rel="stylesheet" href="<?php //echo base_url(); ?>assets/css/bootstrap-multiselect.css" type="text/css"/>
<link href="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<!-- <link href="<?php echo base_url(); ?>assets/jquery-ui.css" rel="stylesheet" type="text/css"/>  --> 
<!-- <script src="../../cdn-cgi/apps/head/QJpHOqznaMvNOv9CGoAdo_yvYKU.js"></script> -->
<link href="<?php echo base_url(); ?>assets/font-awesome.css" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo base_url(); ?>assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />


<link href="<?php echo base_url(); ?>assets/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url(); ?>assets/plugins/jquery-metrojs/MetroJs.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/shape-hover/css/demo.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/shape-hover/css/component.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.carousel.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.theme.css" />
<link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen" />
<!--  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen"> -->

<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/Mapplic/mapplic/mapplic.css" type="text/css" media="screen">
<link href="<?php echo base_url(); ?>assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />

<link href="<?php echo base_url(); ?>assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />

<link href="<?php echo base_url(); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>webarch/css/webarch.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo base_url();?>assets/autocomplete/jquery-ui.css">

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript">
</script>

<script src="<?php echo base_url();?>assets/autocomplete/jquery-ui.js"></script>  
   
   <style>
       a#example2_previous {
    border: 1px solid;
    padding: 5px;
    background: #0d638f;
    color: #ffffff;
margin-right: 4px;
}
a#example2_next {
    border: 1px solid;
    padding: 5px;
    background: #0d638f;
    color: #ffffff;
}
table.table {
    clear: both;
    margin-bottom: 19px;
    max-width: none;
}
div.dataTables_info {
    padding-top: 3px;
    padding-bottom: 3px;
    font-size: 12px;
    float:left;
    display: inline-block;
    padding-right: 14px;
    border-right:none;
}

#search_form {
    margin-bottom: 30px;
}
input.btn.btn-default {
    margin-top: 19px;
}
#auto {
    position: absolute;
    background-color: #fff;
    list-style-type: none;
    max-height: 200px;
    overflow-y: scroll;  
}

select#state {
    width: 166px;
}
select#city {
    margin-left: 0px;
    width: 164px;
}
input#dealer_name {
    width: 161px;
}
   </style>
   
   
   </head>
   	<?php 
   	$login_data = $this->session->userdata('login_data'); 
    //print_r($login_data);
	$login_id = $login_data[0]['id'];
    $login_name = $login_data[0]['name'];
    $login_id1 = $login_data[0]['user_id'];
    $login_role = $login_data[0]['role'];
	?>
    <input type="hidden" value="<?php echo base_url(); ?>" id="base_url" name="">
   	<body class="" >
      <div class="header navbar navbar-inverse ">
         <div class="navbar-inner">
            <div class="header-seperation">
               <ul class="nav pull-left notifcation-center visible-xs visible-sm">
                  <li class="dropdown">
                     <a href="#main-menu" data-webarch="toggle-left-side">
                     <i class="material-icons">menu</i>
                     </a>
                  </li>
               </ul>
               <a href="<?php echo base_url(); ?>Dashboard">
               <img src="<?php echo base_url(); ?>assets/logo.png" class="logo" alt="" data-src="<?php echo base_url(); ?>assets/logo.png" data-src-retina="assets/logo.png" width="170" height="42" />
               </a>
               <ul class="nav pull-right notifcation-center">
                  <li class="dropdown hidden-xs hidden-sm">
                     <a href="<?php echo base_url(); ?>Dashboard" class="dropdown-toggle active" data-toggle="">
                     <i class="material-icons">home</i>
                     </a>
                  </li>
                   
                   
                   <li class="dropdown visible-xs visible-sm">
                     <a href="#" data-webarch="toggle-right-side">
                     <i class="material-icons">chat</i>
                     </a>
                  </li>
               </ul>
            </div>
            <div class="header-quick-nav">
               <div class="pull-left">
                  <ul class="nav quick-section">
                     <li class="quicklinks">
                        <a href="#" class="" id="layout-condensed-toggle">
                        <i class="material-icons">menu</i>
                        </a>
                     </li>
                  </ul>
                   <ul class="nav quick-section">
                   	<li class="quicklinks"> <span class="h-seperate"></span></li>

                     <li class="quicklinks  m-r-10">
                        <a href="javascript:;" class="" onclick="javascript:window.location.reload()">
                        <i class="material-icons">refresh</i>
                        </a>
                     </li>
                     <?php
                   if($login_role =='admin' || $login_role =='Sub Admin'){
                     ?>
                     <li class="dropdown hidden-xs hidden-sm quicklinks  m-r-10">
                    <!--  <a href="email.html" class="dropdown-toggle">
                     <img src="https://img.icons8.com/material/24/000000/mailing.png"/><span style="    top: 2px;
    right: -4px;" class="badge bubble-only"></span>
                     </a> -->
                  
                    <!-- ------------------------------------------------ -->
                    
                   
                  <ul class="nav quick-section " style="margin-top: 0px;">
                    <?php 
                    if(!empty($totalGotPO>0)){
                    ?>
                     <li class="quicklinks  m-r-10">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                    <img src="https://img.icons8.com/material/24/000000/mailing.png"/>
                    <span style="top: 2px;right: -4px;" class="badge bubble-only"></span>
                        </a>

                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">

                            <li>
                              <a href="<?php echo base_url(); ?>View_Purchase_Order_by_Vendor">New PO ( <?php echo $totalGotPO; ?> )</a>
                           </li>
                          
                          <!--  <li class="divider"></li> -->
                           
                        </ul>
                     </li>
                   <?php }else{ ?>
                    <li class="quicklinks  m-r-10">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                    <img src="https://img.icons8.com/material/24/000000/mailing.png"/>
                    <!-- <span style="top: 2px;right: -4px;" class="badge bubble-only"></span> -->
                        </a>
                      </li>
                   <?php } ?>
                     <!-- <li class="quicklinks"> <span class="h-seperate"></span></li> -->
                   
                     
                  </ul>
                </li>
              <?php } ?>
                    <!-- ------------------------------------------------ -->
                     
                    <!--  <li class="m-r-10 input-prepend inside search-form no-boarder">
                        <span class="add-on"> <i class="material-icons">search</i></span>
                        <input name="" type="text" class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
                     </li> -->
                  </ul>
               </div>
              
               <div class="pull-right">
              
                  <div class="chat-toggler sm">
                     <div class="profile-pic">
                        <img src="<?php echo base_url(); ?>assets/img/profiles/avatar_small.jpg" alt="" data-src="<?php echo base_url(); ?>assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="35" height="35" />
                        <div class="availability-bubble online"></div>
                     </div>
                  </div>
                  <ul class="nav quick-section ">
                     <li class="quicklinks">
                        <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                        <i class="material-icons">tune</i>
                        </a>
                        <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                            <li>
                              <a href="<?php echo base_url(); ?>My_Account"> My Account</a>
                           </li>
                           <!--<li>
                              <a href="calender.html">My Calendar</a>
                           </li> -->
                           <!-- <li>
                              <a href="email.html"> My Inbox&nbsp;&nbsp;
                              <span class="badge badge-important animated bounceIn">2</span>
                              </a>
                           </li> -->
                           <li class="divider"></li>
                           <li>
                              <a onclick="return test()" href="javascript:;" ><i class="material-icons" >power_settings_new</i>&nbsp;&nbsp;Log Out</a>
                           </li>
                        </ul>
                     </li>
                     <!-- <li class="quicklinks"> <span class="h-seperate"></span></li> -->
                     
                  </ul>
               </div>
            </div>
         </div>
      </div>
      <div class="page-container row-fluid">
         <div class="page-sidebar " id="main-menu">
            <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
               <div class="user-info-wrapper sm">
                  <div class="profile-wrapper sm">
                     <img src="<?php echo base_url(); ?>assets/img/profiles/avatar.jpg" alt="" data-src="<?php echo base_url(); ?>assets/img/profiles/avatar.jpg" data-src-retina="assets/img/profiles/avatar2x.jpg" width="69" height="69" />
                     <div class="availability-bubble online"></div>
                  </div>
                  <div class="user-info sm">
                     <div class="username">Welcome <?php echo     $login_name; ?></span></div>
                     <div class="status"><?php echo $login_role; ?> <span style="color:#0aa699;">Online</span></div>
                  </div>
               </div>
               <p class="menu-title sm">Menu <span class="pull-right"><a href="javascript:;"><i class="material-icons" onclick="javascript:window.location.reload()">refresh</i></a></span></p>
               <ul>

               

               	 <li>
                     <a href="<?php echo base_url(); ?>Dashboard"><i class="material-icons">home</i> <span class="title">Dashboard</span> </a>
                  </li>
                   <!--admin--->
				   <?php if($login_role == 'admin' || $login_role == 'Sub Admin'){?>
                   <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
                       <li> <a href="<?php echo base_url(); ?>Add_Users">Add Zonal/Sales<?php if($login_role == 'admin'){echo '/Admin'; }?> </a> </li>                 
					   <li> <a href="<?php echo base_url(); ?>Users_List">Zonal Head /Sales Executive<?php if($login_role == 'admin' ){ echo'/Admin List';} ?></a> </li>
                     </ul>
                  </li> 
				   <?php } ?>
				  
				  <!---zonal dead--->
				  <?php if($login_role == 'Zonal Head'){?>
                   <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
                       <li> <a href="<?php echo base_url(); ?>Add_Users">And Sales</a> </li>
					   <li> <a href="<?php echo base_url(); ?>Users_List">Sales Executive List</a> </li>
                     </ul>
                  </li> 
				   <?php } ?>
				  
				  <!---zonal dead--->
				  <?php if($login_role == 'admin' || $login_role == 'Sub Admin'){?>
                   <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Color Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
                       <li> <a href="<?php echo base_url(); ?>Add_Color_Option">Color Option Add</a> </li>
                       <li> <a href="<?php echo base_url(); ?>List_Color_Option">Color Option List</a> </li>
                     </ul>
                   </li> 
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Design Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_Design_Option">Design Option Add</a> </li>
						<li> <a href="<?php echo base_url(); ?>List_Design_Option">Design Option List</a> </li>
                     </ul>
                  </li> 
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Size Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_Size_Option">Size Option Add</a> </li>
						<li> <a href="<?php echo base_url(); ?>List_Size_Option">Size Option List</a> </li>
                     </ul>
                  </li> 
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Thickness Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_Thickness_Option">Thickness Option Add</a> </li>
					    <li> <a href="<?php echo base_url(); ?>List_Thickness_Option">Thickness Option List</a> </li>
                     </ul>
                  </li> 
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Grade Master</span><span class=" arrow"></span> </a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_Grade_Option">Grade Option Add</a> </li>
						<li> <a href="<?php echo base_url(); ?>List_Grade_Option">Grade Option List</a> </li>
                     </ul>
                  </li>
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Product Type Master</span> <span class=" arrow"></span></a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_Product_Type_Option">Product Type Option Add</a> </li>
						<li> <a href="<?php echo base_url(); ?>List_Product_Type_Option">Product Type Option List</a> </li>
                     </ul>
                  </li> 
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Place Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_place_of_supply_Option">Place Of Supply Option Add</a> </li>
						<li> <a href="<?php echo base_url(); ?>List_Place_Option">Place Option List</a> </li>
                     </ul>
                  </li>  
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Sale A/C Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_saleac_Option">Sale A/C Option Add</a> </li>
						<li> <a href="<?php echo base_url(); ?>List_Sale_AC_Option">Sale A/C Option List</a> </li>
                     </ul>
                  </li> 
				  <li>
                     <a href="javascript:;"> <i class="material-icons">menu</i> <span class="title">Sale Ret. A/C Master</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
						<li> <a href="<?php echo base_url(); ?>Add_sale_ret_ac_Option">Sale Ret. A/C Option Add</a> </li>
						<li> <a href="<?php echo base_url(); ?>List_Sale_Ret_AC_Option">Sale Ret. A/C Option List</a> </li>
                     </ul>
                  </li> 
				   <?php } ?>
				   
					<?php if($login_role == 'admin' || $login_role == 'Sub Admin'){?>

                   <li>
                     <a href="javascript:;"> <i class="material-icons">shopping_cart</i> <span class="title">Manage Product</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
                        <li> <a href="<?php echo base_url(); ?>Add_Category">Add Category</a> </li>
                        <li> <a href="<?php echo base_url(); ?>Category_List">Category List</a> </li>
                        <!--<li> <a href="<?php echo base_url(); ?>Add_Product_Option">Product Option Add</a> </li>
                        <li> <a href="<?php echo base_url(); ?>List_Product_Option">Product Option List</a> </li>--> 
                        <li> <a href="<?php echo base_url(); ?>Add_Product">Add Product</a> </li>
                        <li> <a href="<?php echo base_url(); ?>Product_list">Product List</a> </li>
                     </ul>
                  </li> 
					<?php } ?>
					<?php if($login_role == 'Zonal Head' || $login_role == 'Sales Executive'){?>
				   <li>
                     <a href="javascript:;"> <i class="fa fa-user"></i> <span class="title">Manage Dealer</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">					  
                         <li> <a href="<?php echo base_url(); ?>Add_Vendor">Add Dealer</a> </li>
                        <li> <a href="<?php echo base_url(); ?>View_All_Vendor">Dealer List</a> </li></ul>
                    </li>  
                     <!-manage order --->   
                        <li>
                     <a href="javascript:;"> <i class="fa fa-user"></i> <span class="title">Manage Order</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">					  
                        <li> <a href="<?php echo base_url(); ?>Vendor_Genrate_PO">Genrate PO</a> </li>
                        <li> <a href="<?php echo base_url(); ?>Vendor_PO_List">PO Send to Admin</a> </li>
                        <li> <a href="<?php echo base_url(); ?>Vendor_SO_List">Got SO to Admin</a> </li>

                     <li> <a href="<?php echo base_url(); ?>Vendor_Invoice">Invoice</a> </li></ul>
                     </li>
                       <!-manage order --->    
                        
                        <?php } ?>
                   <?php if($login_role == 'admin' || $login_role == 'Sub Admin'){ ?>
                   
				   <li>
                     <a href="javascript:;"> <i class="fa fa-user"></i> <span class="title">Dealer</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">					  
                         <li> <a href="<?php echo base_url(); ?>Add_Vendor">Add Dealer</a> </li>
                        <li> <a href="<?php echo base_url(); ?>View_All_Vendor">Dealer List</a> </li>
                    
					   
                        <li> <a href="<?php echo base_url(); ?>View_Purchase_Order_by_Vendor">Got PO by Dealer</a> </li>
                        <li> <a href="<?php echo base_url(); ?>View_Genrated_sales_order">Genrated Sales Order</a> </li>
                        <li> <a href="<?php echo base_url(); ?>View_Genrated_invoice">All Genrated Invoice</a> </li>
                        <li> <a href="<?php echo base_url(); ?>View_Vendor_Payment">Payments</a> </li>
                     </ul>
                  </li> 
				   <?php }?>

<!-- _________________Vendor section_________________________________________ -->
                 <?php if($login_role == 'Dealer'){ ?>
                  <li>
                     <a href="javascript:;"> <i class="material-icons">shopping_cart</i> <span class="title">Sale/Parchase</span> <span class=" arrow"></span> </a>
                     <ul class="sub-menu">
                        <li> <a href="<?php echo base_url(); ?>Vendor_Genrate_PO">Genrate PO</a> </li>
                        <li> <a href="<?php echo base_url(); ?>Vendor_PO_List">PO Send to Admin</a> </li>
                        <li> <a href="<?php echo base_url(); ?>Vendor_SO_List">Got SO to Admin</a> </li>

                     <li> <a href="<?php echo base_url(); ?>Vendor_Invoice">Invoice</a> </li>
                     </ul>
                  </li> 
				  <?php }?>
                 <!-- -----------------------------Employee Section--------------------------------------- -->
               
                  
                  
                 
                  
               </ul>
              
               <div class="clearfix"></div>
            </div>
         </div>
		 
		 
		 
         <a href="#" class="scrollup">Scroll</a>
         <div class="footer-widget">
            <div class="progress transparent progress-small no-radius no-margin">
               <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="79%" style="width: 79%;"></div>
            </div>
            <div class="pull-right">
               <div class="details-status"> <span class="animate-number" data-value="86" data-animation-duration="560">86</span>% </div>
               <a href="javascript:;" onclick="return test()"><i class="material-icons">power_settings_new</i></a>
            </div>
         </div>
         <div class="page-content">
            <div id="portlet-config" class="modal hide">
               <div class="modal-header">
                  <button data-dismiss="modal" class="close" type="button"></button>
                  <h3>Widget Settings</h3>
               </div>
               <div class="modal-body"> Widget settings form goes here </div>
            </div>
            <div class="clearfix"></div>
			