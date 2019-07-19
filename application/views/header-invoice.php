<?php 
$supply_details=json_decode($invoice[0]['supply_details'],true);
$transporter_detail = json_decode($invoice[0]['transporter_details'],true);
$billing_address = json_decode($invoice[0]['billing_address'],true);
//echo "<pre>";

$vendor_id = $invoice[0]['vendor_id']; 
$company_state = "Madhya Pradesh";
$vender_info= $this->User_model->state($vendor_id);
$state_code  =  $vender_info[0]['state'];
$segment  =  $vender_info[0]['segment'];


$state_name= $this->User_model->stateName($state_code );
$state_name= $this->User_model->stateName($state_code );
$state = $state_name[0]['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Plastiwood</title>
  <!--favicon-->
  <link rel="icon" href="img/2.png" type="image/x-icon">
  <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">-->
  <link href="<?php echo base_url(); ?>assets/invoice/bootstrap.min.css" rel="stylesheet" type="text/css" />
  
  <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
  <script src="<?php echo base_url(); ?>assets/invoice/jquery-1.11.3.min.js" type="text/javascript"></script>
 
  <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>-->
   <script src="<?php echo base_url(); ?>assets/invoice/js/popper.min.js" type="text/javascript"></script>

  <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>-->
  <script src="<?php echo base_url(); ?>assets/invoice/bootstrap.min.js" type="text/javascript"></script>
  
  <!--<link href="https://fonts.googleapis.com/css?family=Cabin:700" rel="stylesheet">-->
<style type="text/css">
/* vietnamese */
@font-face {
  font-family: 'Cabin';
  font-style: normal;
  font-weight: 700;
  src: local('Cabin Bold'), local('Cabin-Bold'), url(https://fonts.gstatic.com/s/cabin/v13/u-480qWljRw-PdeL2uhquylWeg.woff2) format('woff2');
  unicode-range: U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;
}
/* latin-ext */
@font-face {
  font-family: 'Cabin';
  font-style: normal;
  font-weight: 700;
  src: local('Cabin Bold'), local('Cabin-Bold'), url(https://fonts.gstatic.com/s/cabin/v13/u-480qWljRw-PdeL2uhruylWeg.woff2) format('woff2');
  unicode-range: U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Cabin';
  font-style: normal;
  font-weight: 700;
  src: local('Cabin Bold'), local('Cabin-Bold'), url(https://fonts.gstatic.com/s/cabin/v13/u-480qWljRw-PdeL2uhluyk.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}
body{
	font-family: "Georgia Bold",serif;
	font-size:16px !important;
}
*{box-sizing: border-box;}
#wrapper {
    width: 100%;
    position: relative;margin:
}
h3{ outline: 1px solid black; } 

.card{width: 1000px; margin: auto; border: 1px solid black;} 

.card.main-container {
    border: none!important;
}
h1.invoice-heading {
    font-family: "Georgia Bold",serif;
    font-size: 26.1px;
    color: rgb(255,0,0);
    font-weight: bold;
    font-style: normal;
    text-decoration: none;

}
.font-weight{
	    font-weight: bold;
    font-family: "Calibri Bold",serif;
}
p {
    font-size: 16px;
    font-family: Roboto, 'Segoe UI', Tahoma, sans-serif;
}
.border-class {
    border: 1px solid black;
	outline: none;

}
table.table-width {
    width: 100%;
}
td.first {
    width: 16%;
}
td.second {
    width: 35%;
}

td.third {
    width: 17%;
}
th.width-th {
    width: 50%;
}
.row.border-top {
    border-top: 1px solid black!important;
	border-bottom: 1px solid black;
}
.font-size {
    font-size: 20px;
}
td.first1 {
    width: 17%;
}
table.table-amount {
    font-weight: 600;
}
.total-wrap{
    float: right;
}
.col-md-4.text-align-right {
    text-align: right;
    font-weight: 700;
}
.row.border-bottom {
    border-bottom: 1px solid black!important;
}
p.text-font {
    font-size: 12px;
}
.div-width {
    width: 100%;
}
table.table.table-bordered {
    margin-left: -13px;
    margin-bottom: 1px;
    margin-top: 1px;
}
.table-bordered {
    border: 2px solid #dee2e6!important;
}
.table-bordered td, .table-bordered th {
    border: 1px solid #0c0c0c!important;
}
</style>
</head>
<body>
<div class="container">
  <div class="row">
<div id="wrapper">
 <div class="card main-container">
 
 <div class="row">
 <div class="col-sm-9">
<h1 class="invoice-heading">Rajshri Plastiwood</h1>
<p>
<b>(Division of Rajshri Productions (P) Ltd.)</b><br>
<b>Office & Works :</b> Plot No. 100, Sector No. - 2, Pithampur - 454775, District - Dhar (M.P.)<br>
<b>Tel.:</b> 07292-418801, 09302429108 <b>Sales Dept :</b> rajshriplastiwood@gmail.com<br>
<b>Website :</b> www.rajshriplast.co.in <b>Mktg. Dept :</b> rajplastmarketing@gmail.com <b>Tel.:</b> 07292-418821
</p>
<!--(Division of Rajshri Productions (P) Ltd.)
Plot No. 100, Sector No. 2, Pithampur, Dist Dhar, Pin - 454775, Madhya Pradesh
Tel. 07292-418800-801-->
</div>
<div class="col-sm-3">
<p class="text-right">
<b>GSTIN # 23AAACR4139G1ZP</b></br>
<b>Madhya Pradesh - 23</b>
<br><br>
<br>

<b></b></p>
</div>
</div>

<h3 class="text-center border-class font-weight">Proforma Invoice
</h3>
<!-- <span style="border-left: 1px solid black; border-right: 1px solid black;"> -->
<div class="container border-class " >
<div class="row">
  <div class="col-sm-12 col-lg-12 text-left" style="float: left;">
  <table class="table-width">
    <tbody>
      <tr>
        <td class="first">Proforma Invoice No.<br>Proforma Invoice Date</br>Valid Upto</td>
        <td class="second"><b>:  <?php echo $invoice[0]['invoice_number']; ?></b><br><b>:  <?php echo date("d/M/Y",strtotime($invoice[0]['invoice_date'])); ?></b></br><b>:  05-05-2018</b></td>
        <td class="third">                              <br>Your Outstanding</br>Marketing Field Staff</td>
        <td class="fourth"><b>  </b><br><b>:  216.85</b></br><b>:  ASHOK KUMAR</b></td>
      </tr>
    </tbody>
  </table>
  </div>  
</div>

    
      <div class="row border-top">
	  
        <div class="col-sm-6 text-center font-size"><b>Details of Receiver (Billed to)</b></div>
        <div class="col-sm-6 text-center font-size"><b>Details of Consignee (Shipped to)</b></div>

	  </div>
	  <div class="row">
	  <div class="col-sm-6">
	  <p>Code: A130<br>
	 <!--<b> B.S.ENTERPRISES</b><br>
LOKENNATH NAGAR B.P.ROAD,<br>
P.O.BAGHDOGRA DISTT.DARJELLING--><?php echo $billing_address['Details_of_Receiver']['company_name']; ?></p>

<br>
<b><?php echo $billing_address['Details_of_Receiver']['address']; ?></b>
<table class="table-width">
    <tbody>
      <tr>
        <td class="first1">State Code<br>GSTIN</br>E-Mail</td>
        <td class="second1">: <?php echo $billing_address['Details_of_Receiver']['state']; ?><br>: <?php echo $product_details[0]['gstn']; ?></br>: <?php echo $vender_info[0]['email'];?></td>
        
      </tr>
    </tbody>
  </table>
	  </div>
	  <div class="col-sm-6">
 <p>Code: A130<br>
	 <!--<b> B.S.ENTERPRISES</b><br>
LOKENNATH NAGAR B.P.ROAD,<br>
P.O.BAGHDOGRA DISTT.DARJELLING--><?php echo $billing_address['Details_of_Receiver']['company_name']; ?></p>

<br>
<b><?php echo $billing_address['Details_of_Receiver']['address']; ?></b>
<table class="table-width">
    <tbody>
      <tr>
        <td class="first1">State Code<br>GSTIN</br>E-Mail</td>
        <td class="second1">:  <?php echo $billing_address['Details_of_Receiver']['state']; ?><br>:  <?php echo $product_details[0]['gstn']; ?></br>:  <?php echo $vender_info[0]['email'];?></td>
        
      </tr>
    </tbody>
  </table>
	  </div>
      </div>
	  
	  <!---product table --->  
<div class="row border-top margin-table">    
 <div class="col-md-12">
 <table class="table table-bordered" style="font-size: 12px;">
    <thead>
      <tr>
        <th rowspan="2">Sr.No.</th>
        <th rowspan="2">Prod.<br> Desc.</th>
        <th rowspan="2">HSN<br>/SAC</th>
        <th rowspan="2">Thick in MM</th>
        <th rowspan="2">Sec.<br>Qty.</th>
        <th rowspan="2">Stock UOM</th>
        <th rowspan="2">Qty.</th>
        <th rowspan="2">Sale UOM</th>
        <th rowspan="2">Rate</th>
        <th rowspan="2">Amount</th>
        <th colspan="2">CGST</th>
        <th colspan="2">SGST/UGST</th>
        <th colspan="2">IGST</th>
        <th rowspan="2">Total <br>GST</th>
      </tr>
       <tr>
         <th>Rate</th>
          <th>Amt</th>
          <th>Rate</th>
          <th>Amt</th>
		  <th>Rate</th>
          <th>Amt</th>
        
      </tr>
    </thead>