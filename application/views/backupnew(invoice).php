<?php
/*echo "<pre>" ;
print_r($invoice);
echo "</pre>";*/
 
$supply_details=json_decode($invoice[0]['supply_details'],true);
$transporter_detail = json_decode($invoice[0]['transporter_details'],true);
$billing_address = json_decode($invoice[0]['billing_address'],true);
$vendor_id = $invoice[0]['vendor_id']; 
$company_state = "Madhya Pradesh";
$vender_info= $this->User_model->state($vendor_id);
$state_code  =  $vender_info[0]['state'];
$segment  =  $vender_info[0]['segment'];


$state_name= $this->User_model->stateName($state_code );
$state = $state_name[0]['name'];
//echo "<pre>";
//print_r($vender_info);
//print_r($billing_address);
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Cabin:700" rel="stylesheet">
<style type="text/css">
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

<b>Page # 1/1</b></p>
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
    <tbody>
    <?php 
    $x=1;
    $total_pro_amt='0';
    $cgst_sum = '0';
    $sgst_sum = '0';
    $igst_sum = '0';
	$cgst='0';
	$sgst='0';
	$igst='0';
	$gst_sum=0;
    foreach($product_details as $pro){ 
	?>
      <tr>
          <td  rowspan="2" ><?php echo $x++ ?>.</td>
          <td rowspan="2" class="pro_name" ><?php echo $pro['product_name']; ?></span>  
          </td>
          <td rowspan="2" ><?php echo $pro['hsn_code']; ?></td>
          <td rowspan="2"><?php echo $pro['thickness']; ?></td>
          <td  rowspan="2"><?php echo $sec_qty= $pro['quantity']; ?></td>
          <td rowspan="2"><?php echo $pro['stock_UOM']; ?></td>
		  <?php 
		    $size_feet = $pro['size_feet'];
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
           <?php if($segment == 'retailer'){
			  $rate= $pro['retailer_price'];  
		   }else{
			  $rate= $pro['govt_price'];   
		   }?>
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
	   <?php } ?>
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
        
        <td><?php echo round($total_pro_amt,2);?></td>
        <td colspan="2"><?php //echo round($cgst_sum ,2); ?>
		<?php 
		$total_sum = 0;
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
		
		      
		if($company_state == $state)
		{echo round($cgst_sum , 2);
	    }else{ echo round($cgst_sum=0 , 2);
	    } ?></td>
        
		
		<td colspan="2"><?php //echo round($sgst_sum ,2); ?>
		<?php 
		$total_sum = 0;
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
	
		 
		 if($company_state == $state){
		echo round($sgst_sum , 2);
		}else{ echo round($sgst_sum=0 , 2);
	    } ?></td>
        <td colspan="2"><?php //echo round($igst_sum ,2); ?>
		<?php  
		$total_sum = 0;
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
		
		
		if($company_state != $state){
		echo round($igst_sum , 2);
		}else{ echo round($igst_sum=0 , 2);
	    } ?></td></td>
       
        <td><?php echo round($gst_sum , 2); ?></td>
        
      </tr>
    </tbody>
  </table>
  </div>
  </div>
  
  <div class="row">
  <div class="col-md-12 text-right">
    <div class="total-wrap">
<table class="table-amount">
    <tbody>
      <tr>
	  
        <td class="">Total Amount Before Tax&nbsp;:<br>Add&nbsp;:&nbsp;&nbsp;&nbsp;CGST&nbsp;:</br>Add&nbsp;:&nbsp;SGST/UGST&nbsp;:<br>Add&nbsp;:          IGST&nbsp;:<br>Total GST Amount&nbsp;: </td>
        <td class="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo round($total_pro_amt,2);?></br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<?php //echo round($cgst_sum ,2); 
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt;    
		if($company_state == $state)
		{echo round($cgst_sum , 2);
	   }else{ echo round($cgst_sum=0 , 2);
	    } 
		?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php //echo round($sgst_sum ,2); 
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
		if($company_state == $state){
		echo round($sgst_sum , 2);
		}else{ echo round($sgst_sum=0 , 2);
	    } 
		?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<?php //echo round($igst_sum ,2); 
		$total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; 
		if($company_state != $state){
		echo round($igst_sum , 2);
		}else{ echo round($igst_sum=0 , 2);
	    } 
		?><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   <?php echo round($gst_sum , 2); ?></td>
        
      </tr>
    </tbody>
  </table>

  </div>
  </div>
  </div>

   <div class="row border-top"  style="padding-top: 15px;
    padding-bottom: 15px;">
	<?php  $total_sum = (round($gst_sum , 2)+round($total_pro_amt,2)); ?>
	<?php 
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
  // echo $point;
  // return $result;


    
?>


   <div class="col-md-8"><b><?php echo $word_no; ?></b>
   </div>
   <div class="col-md-4 text-align-right">Total Amt. After Tax :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $total_sum = (round($gst_sum , 2)+round($total_pro_amt,2)); ?>
   </div>
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
  </div>  <!-- Card closing -->
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