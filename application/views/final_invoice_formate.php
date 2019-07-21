<?php

/*echo "<pre>" ;
print_r($invoice);
echo "</pre>";*/
 
$supply_details=json_decode($invoice[0]['supply_details'],true);
$transporter_detail = json_decode($invoice[0]['transporter_details'],true);
$billing_address = json_decode($invoice[0]['billing_address'],true);
//echo "<pre>";
$id = $invoice[0]['id'];
$vendor_id = $invoice[0]['vendor_id']; 
$company_state = "Madhya Pradesh";
$vender_info= $this->User_model->state($vendor_id);
$state_code  =  $vender_info[0]['state'];
$segment  =  $vender_info[0]['segment'];


$state_name= $this->User_model->stateName($state_code );
$state_name= $this->User_model->stateName($state_code );
$state = $state_name[0]['name'];
//echo "<pre>";
//print_r($vender_info);
//print_r($billing_address);
?>
<?php 
	$product_array = array_chunk($product_details,4);
	$count=count($product_details);
    
	//echo "<pre>";
	//print_r($product_array); 
    $final_total = 0;
    $final_cgst = 0;
    $final_sgst = 0;
    $final_igst = 0;
    $final_gst = 0;
	foreach($product_array as $product_details){
	    
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
  <script>
function update_invoice_amt(final_total,final_gst,total_sum,id){
	//alert(id);
/* alert(final_total);	
alert(final_gst);	
alert(total_sum);*/
//var base_url =document.getElementById("base_url").value;
//alert(base_url);
$.ajax({
  type: "POST",
  url: "<?php echo base_url();?>"+"Vendor/updateInvoiceAmount",
  data: {final_total : final_total,final_gst : final_gst, total_sum : total_sum,id : id},
  success: function(data){
    //alert("updated");
  }
});
}
</script>
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
<div class="container" style="page-break-after:always;">
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
        <td class="second"><b>:  <?php echo $invoice[0]['invoice_number']; ?></b><br><b>:  <?php echo date("d/M/Y",strtotime($invoice[0]['invoice_date'])); ?></b></br><b>: <?php echo date("d/M/Y",strtotime($product_details[0]['po_expire_date'])); ?></b></td>
        <td class="third">                              <!--<br>Your Outstanding</br>Marketing Field Staff--></td>
        <td class="fourth"><!--<b>  </b><br><b>:  216.85</b></br><b>:  ASHOK KUMAR</b>--></td>
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
	  <p><?php echo $product_details[0]['vendor_id'];?><br>
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
 <p><?php echo $product_details[0]['vendor_id'];?><br>
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
    <tbody >
    <?php 
   
    $total_pro_amt='0';
    $cgst_sum = '0';
    $sgst_sum = '0';
    $igst_sum = '0';
	$cgst='0';
	$sgst='0';
	$igst='0';
	$gst_sum=0;
       
	  $x=1;
    foreach($product_details as $pro){ 
	//echo "<pre>";
	//print_r($pro);
	?>
      <tr>
          <td  rowspan="2" ><?php echo $x++; ?>.</td>
          <td rowspan="2" class="pro_name" ><?php echo $pro['product_name']; ?></span>  
          </td>
          <td rowspan="2" ><?php echo $pro['hsn_code']; ?></td>
          <td rowspan="2"><?php echo $pro['prod_thick']; ?></td>
          <td  rowspan="2"><?php echo $sec_qty= $pro['quantity']; ?></td>
          <td rowspan="2"><?php echo $pro['stock_UOM']; ?></td>
		  <?php 
		    $size_feet = $pro['prod_size'];
			$size_feet = str_split($size_feet,1);
			$height = $size_feet[0];
			$width = $size_feet[2];
			
		    $height_in_feet = $height;
			$height_in_inch = $height_in_feet*12;
			$height_in_mm = $height_in_inch*25.4; 
			
			$width_in_feet = $width; 
			$width_in_inch = $width_in_feet*12;
		    $width_in_mm = $width_in_inch*25.4;
		  
		  $feet = $height_in_feet*$width_in_feet;
		  $sqr_met = ($feet/10.76);
		  $qty = $sqr_met*$sec_qty;
		  $qty = round($qty,3);
		  ?>
          <td rowspan="2"><?php echo $qty; ?></td>
          <td rowspan="2"><?php echo $pro['sale_UOM']; ?></td>
          
			  <?php $rate= $pro['rate'];  ?>
		  
           <td rowspan="2"><?php echo $rate; ?></td>
		   <?php 
		   
		    $height_in_feet = $height;
			$height_in_inch = $height_in_feet*12;
			$height_in_mm = $height_in_inch*25.4; 
			
			$width_in_feet = $width; 
			$width_in_inch = $width_in_feet*12;
		    $width_in_mm = $width_in_inch*25.4;
		  
		  $feet = $height_in_feet*$width_in_feet;
		  $sqr_met = ($feet/10.76);
		  $qty = $sqr_met*$sec_qty;
		  $qty = round($qty,3);
		  $amt1 = $qty*$rate;
		  $total_pro_amt += $amt1; 
		 
		   ?>
           <td rowspan="2"><?php echo $amt1 = round($amt1,2);?></td>
		   <!--check state---->
		   
         
		   <!---caculate cgst--->
		   <?php if($company_state == $state){ ?>
           <td>9%</td>
           <td><?php $cgst=9*($amt1/100); 
		    echo $cgst = round($cgst ,2); ?></td>
               <?php $cgst_sum += $cgst;?>
          <?php }else{ ?>
		 
            <td></td>
            <td></td> 
            <?php 
            $cgst=0;
            $cgst_sum +=0;?>
		   <?php } ?>
		  
		  <!---calculate sgst--->
		  
            <?php if($company_state == $state){ ?>
           <td>9%</td>
           <td><?php  $sgst=9*($amt1/100);  
		   echo $sgst = round($sgst ,2); ?></td>
               <?php $sgst_sum += $sgst;?>
          <?php }else{ ?>
            <td></td>
            <td></td> 
            <?php 
            $sgst=0;
            $sgst_sum +=0;?>
          <?php } ?>

		   
		   
		   <!--igst caculation--->
            <?php if($company_state != $state){ ?>
            <td>18.00</td>
            <td rowspan="2"><?php $igst =18*($amt1/100); 
			echo $igst = round($igst ,2); ?></td> 
             <?php $igst_sum += $igst ;?>
             <?php }else{ ?>
            <td></td>
            <td></td> 
            <?php 
            $igst=0;
            $igst_sum +=0;?>
            <?php } ?>

        
           <td rowspan="2"><?php $gst = $cgst+$sgst+$igst; 
           echo $gst = round($gst, 2);
           $gst_sum+=$gst;
           ?>
           </td>
          
           
       </tr>
	   <tr> 
            <td>Size:<br>Size:<br>Size:</td>
            <td><?php echo $height_in_feet; ?><br>
			    <?php echo $height_in_inch;?><br>
			    <?php echo $height_in_mm;?></td> 
           
            <td>X<br>X<br>X</td>
            <td><?php echo  $width_in_feet; ?><br>
				<?php echo $width_in_inch;?><br>
				<?php echo $width_in_mm;?></td>
               
            <td>Feet<br>Inc.<br>mm</td>
             
      </tr>
	<?php
	}
	?>
      </tr>
        <td>1</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
	  <tr>
        <td colspan="9"></td>
       <?php 
       static $i=0;
       foreach($product_details as $pro){ 
       $i++;
       }
       ?>
        <td><?php 
        
        $total_pro_amt = round($total_pro_amt,2);
        $final_total +=$total_pro_amt;   
        if($i == $count){
         echo $final_total;
        }else{
         echo $total_pro_amt = round($total_pro_amt,2);  
        }
         
         
        ?></td>
         
        <td colspan="2"><?php //echo round($cgst_sum ,2); ?>
		<?php 
		$total_sum = 0;
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
		
		if($company_state == $state)
		{
		$cgst_sum = round($cgst_sum , 2);
		$final_cgst+=$cgst_sum;
		     if($i == $count){
              echo $final_cgst;
              }else{
              echo $cgst_sum = round($cgst_sum , 2);  
              }    
	    }else{ 
	    $cgst_sum = round($cgst_sum=0 , 2);
	    $final_cgst+=$cgst_sum;
		     if($i == $count){
              echo $final_cgst;
              }else{
              echo $cgst_sum = round($cgst_sum , 2);  
              }         
	    } ?></td>
        
		
		<td colspan="2"><?php //echo round($sgst_sum ,2); ?>
		<?php 
		$total_sum = 0;
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
	
		 
		if($company_state == $state){
		$sgst_sum = round($sgst_sum , 2);
		$final_sgst += $sgst_sum;
		     if($i == $count){
              echo $final_sgst;
              }else{
              echo $sgst_sum = round($sgst_sum , 2);  
              }    
		}else{ 
		$sgst_sum = round($sgst_sum=0 , 2);
	    $final_sgst += $sgst_sum;
		     if($i == $count){
              echo $final_sgst;
              }else{
              echo $sgst_sum = round($sgst_sum , 2);  
              }   
	    } ?></td>
        <td colspan="2"><?php //echo round($igst_sum ,2); ?>
		<?php  
		$total_sum = 0;
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
		
		
		if($company_state != $state){
		$igst_sum = round($igst_sum , 2);
		$final_igst+=$igst_sum;
		if($i == $count){
              echo $final_igst;
              }else{
              echo $igst_sum = round($igst_sum , 2);  
              }   
		}else{ 
		$igst_sum = round($igst_sum=0 , 2);
		$final_igst+=$igst_sum;
		if($i == $count){
              echo $final_igst;
              }else{
              echo $igst_sum = round($igst_sum , 2);  
              }   
	    } ?></td></td>
       
        <td><?php $gst_sum = round($gst_sum , 2); 
                  $final_gst +=$gst_sum; 
          if($i == $count){
              echo $final_gst;
              }else{
              echo $gst_sum = round($gst_sum , 2);  
              }  
        ?></td>
        
      </tr>
      
    </tbody>
  </table>
  </div>
  </div>
 <!--close product table-->
 <?php
 
  if($i == $count){
 
 $total_sum = $final_gst +$final_total;
$n = explode('.', $total_sum);
   $no = $n[0];
   $point = $n[1];
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;
     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] ." " . $digits[$counter] . $plural . " " . $hundred : $words[floor($number / 10) * 10]. " " . $words[$number % 10] . " ". $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);

  $points = ($point) ? " " . $words[$point / 10] . " " . $words[$point % 10] : '';
  $res =  $result . "Rupees ";

  if(trim($points)!=''){
    $res .=  " and " . $points . " Paise only";
 }

  $word_no = $res;

		
echo'<div class="row">
  <div class="col-md-12 text-right">
    <div class="total-wrap">
<table class="table-amount">
    <tbody>
      <tr>
	  
        <td class="">Total Amount Before Tax&nbsp;:<br>Add&nbsp;:&nbsp;&nbsp;&nbsp;CGST&nbsp;:</br>Add&nbsp;:&nbsp;SGST/UGST&nbsp;:<br>Add&nbsp;:          IGST&nbsp;:<br>Total GST Amount&nbsp;: </td>
        <td class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$final_total.'</br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$final_cgst.' 
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$final_sgst.'
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$final_igst.'
		<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; '.$final_gst.'</td>
        
      </tr>
    </tbody>
  </table>

  </div>
  </div>
  </div>

   <div class="row border-top"  style="padding-top: 15px;
    padding-bottom: 15px;">
	 
   <div class="col-md-8"><b>'.$word_no.'</b>
   </div>
   <div class="col-md-4 text-align-right">Total Amt. After Tax :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$total_sum = $final_gst +$final_total.'
   </div>
   <script>update_invoice_amt('.$final_total.','.$final_gst.','.$total_sum.','.$id.');</script>
   </div>

   <div class="row"  >
  <div class="col-lg-8 text-left">
    <p class="text-font">1. All disputes are subject to INDORE jurisdiction only.</p>
  </div>
  <div class="col-lg-4">
    <p class="text-font" style="font-weight: bolder; text-align: right;">For Rajshri Plastiwood</p>
  </div>
  </div> 
  
  <div class="row border-bottom">
  <div class="col-lg-4 text-left">
    <p><i>Prepared By</i></p>
  </div>
  <div class="col-lg-4">
    <p class="text-center"><i>Checked By</i></p>
  </div>
  <div class="col-lg-4">
    <p class="text-right"><i>Authorised Signatory</i></p>
  </div>
  </div>';
  }
 ?> 

</div> 
<div class="container">
 <div class="row border-bottom border-left-right">
  
  <div class="div-width">
  <p class="text-center"><b><i>Thanks For Your Business</i></b></p>
  </div>

  <div class="col-lg-4 text-left">
    <h5><b>DURABILITY OF PLASTIC</b></h5>
  </div>
  <div class="col-lg-4">
    <h5 class="text-center" style="color:red;"><b>PVC SHEETS</b></h5>
  </div>
  <div class="col-lg-4">
    <h5 class="text-right"><b>WORKABILITY OF WOOD</b></h5>
  </div>
  </div> 

<div>
  <p class="text-center"><i><b>Regd. Office / Corr. Address :</b></i>10, Dhenu Market, S.G.S.I.T.S Road, Indore - 452 003 (M.P.), Tel : 0731-2538535, 9302429127</p>
  
</div>

</div>
</div>

</div><!-- container closing -->
</div><!-- container closing -->
</div><!-- container closing -->

</body>
</html>

<?php 
//echo $final_total;
//echo $final_cgst;
//echo $final_sgst;
//echo $final_igst;
}?>
