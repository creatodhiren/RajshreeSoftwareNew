<?php
/*echo "<pre>" ;
print_r($invoice);
echo "</pre>";*/
 
$supply_details=json_decode($invoice[0]['supply_details'],true);
$transporter_detail = json_decode($invoice[0]['transporter_details'],true);
$billing_address = json_decode($invoice[0]['billing_address'],true);
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
<style type="text/css">
*{box-sizing: border-box;}
@import url('https://fonts.googleapis.com/css?family=Bree+Serif|Patua+One|Roboto|Source+Serif+Pro');
#wrapper {
    width: 100%;
    position: relative;margin:
}
h3{ outline: 1px solid black; } 

.card{width: 1000px; margin: auto; border: 1px solid black;} 



</style>
</head>
<body>
<div class="container text-center">
  <div class="row">
<div id="wrapper">
 <div class="card">
<h1>Rajshri Plastiwood</h1>
<pre><p style="font-family: roboto;" >(Division of Rajshri Productions (P) Ltd.)
Plot No. 100, Sector No. 2, Pithampur, Dist Dhar, Pin - 454775, Madhya Pradesh
Tel. 07292-418800-801
<b>GSTIN # 23AAACR4139G1ZP</b>
State Code and Name : 23 - Madhya Pradesh</p></pre>
<h3>TAX INVOICE</h3>
<!-- <span style="border-left: 1px solid black; border-right: 1px solid black;"> -->
<div class="row">
  <div class="col-sm-6 col-lg-6 text-left" style="float: left;">
    <p>Invoice No. : <span style="color: red; font-weight: bolder;"><?php echo $invoice[0]['invoice_number']; ?></span>
    <br>Invoice Date : <span style="color: red; font-weight: bolder;"><?php echo date("d/M/Y",strtotime($invoice[0]['invoice_date'])); ?></span>
    <br>Reverse Charge: <span>No</span></p>

  </div>
  <div class="col-sm-6 col-lg-6 text-left" style="float: left;">
    <p>Date of Supply: <span style="color: red; font-weight: bolder;"><?php echo date("d/M/Y",strtotime($supply_details['date_of_supply'])); ?></span>
    <br>Place of Supply: <span style="color: red; font-weight: bolder;"><?php echo $supply_details['place_of_supply']; ?></span>
    <br>Transporter Name: <span><?php echo $transporter_detail['transporter_name']; ?></span>
     <br>Vehicle Number: <span style="color: red; font-weight: bolder;"><?php echo $transporter_detail['vehicle_no']; ?></span>
     <br>Mobile: <span style="color: red; font-weight: bolder;"><?php echo $transporter_detail['transporter_mobile_number']; ?></span></p>

</div>
</div>
<table class="table" style="line-height: 7px;">
    <thead>
      <tr style="font-family: Source Serif Pro;">
        <th style="border: 1px solid black;">Details of Receiver (Billed to)</th>
        <th style="border: 1px solid black;">Details of Consignee (Shipped to)</th>
      </tr>
    </thead>
    <tbody class="text-left">
      <tr >
        <td style="color: red; border-right: 1px solid black">96345</td>
        <td>9634</td>
      </tr>
      <tr>
        <td style="color: red; border-right: 1px solid black"><b><?php echo $billing_address['Details_of_Receiver']['company_name']; ?></b></td>
        <td><b><?php echo $billing_address['Details_of_Consignee']['company_name']; ?></b></td>
      </tr>
      <tr>
        <td style="color: red; border-right: 1px solid black"><?php echo $billing_address['Details_of_Receiver']['address']; ?></td>
        <td><?php echo $billing_address['Details_of_Consignee']['address']; ?></td>
      </tr>
      <tr>
        <td style="color: red; border-right: 1px solid black"><?php echo $product_details[0]['city']; ?></td>
        <td></td>
      </tr>
      <tr>
        <td style="color: red;border-right: 1px solid black"><?php echo $product_details[0]['State']; ?></td>
        <td></td>
      </tr>
      <tr>
        <td style="color: red;border-right: 1px solid black"><?php echo $product_details[0]['mobile']; ?></td>
        <td><?php echo $billing_address['Details_of_Consignee']['mobile']; ?></td>
      </tr>
      <tr>
        <td style="border-right: 1px solid black">State Code:&nbsp&nbsp<span style="color: red; font-weight: bolder;"><?php echo $billing_address['Details_of_Receiver']['state']; ?></span>
          <br><br>
          GSTN:&nbsp&nbsp<span style="color: red; font-weight: bolder;"><?php echo $product_details[0]['gstn']; ?></span></td>
            <td>State Code:&nbsp&nbsp<span style="font-weight: bolder;"><?php echo $billing_address['Details_of_Consignee']['state']; ?></span>
          <br><br>
          GSTN:&nbsp&nbsp<span style="font-weight: bolder;">08BLFPK3654C1ZB</span></td>
      </tr>
    </tbody>
  </table>
 <table class="table table-bordered table-responsive" style="font-size: 12px;">
    <thead>
      <tr>
        <th>S.N.</th>
        <th>Product Des.</th>
        <th>HSN/SAC</th>
        <th>Thick in MM</th>
        <th>Quant.</th>
        <th>UOM</th>
        <th>Rate</th>
        <th>Taxable Amt</th>
        <th colspan="2">CGST</th>
        <th colspan="2">SGST</th>
        <th colspan="2">IGST</th>
        <th>Total</th>
      </tr>
       <tr>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th></th>
        <th>Rate</th>
          <th>Amt</th>
         <th>Rate</th>
          <th>Amt</th>
          <th>Rate</th>
          <th>Amt</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
    <?php 
    $x=1;
    $total_pro_amt='0';
    $cgst_sum = '0';
    $sgst_sum = '0';
    $igst_sum = '0';
    foreach($product_details as $pro){ ?>
      <tr>
        <td style="color: red;"><?php echo $x++ ?>.</td>
        <td style="color: red;"><?php echo $pro['product_name']; ?></td>
        <td style="color: red;"><?php echo $pro['hsn_code']; ?></td>
         <td style="color: red;"><?php echo $pro['thickness']; ?></td>
         <td style="color: red;"><?php echo $qty= $pro['quantity']; ?></td>
          <td style="color: red;">SQMTR</td>
          <td style="color: red;"><?php echo $rate = $pro['retailer_price']; ?></td>
          <td>Rs.<?php echo  $amt1=$qty*$rate; ?></td>
          <?php $total_pro_amt += $qty*$rate; ?>
          <!-- CGST Calculatio -->
          <?php if(!empty($invoice[0]['cgst'])){ ?>
           <td>9%</td>
           <td><?php echo $cgst=9*($amt1/100);  ?></td>
               <?php $cgst_sum += $cgst;?>
          <?php }else{ ?>
            <td></td>
            <td></td> 
            <?php 
            $cgst=0;
            $cgst_sum +=0;?>
          <?php } ?>



            <?php if(!empty($invoice[0]['sgst'])){ ?>
           <td>9%</td>
           <td><?php echo $sgst=9*($amt1/100);  ?></td>
               <?php $sgst_sum += $sgst;?>
          <?php }else{ ?>
            <td></td>
            <td></td> 
            <?php 
            $sgst=0;
            $sgst_sum +=0;?>
          <?php } ?>

            <?php if(!empty($invoice[0]['igst'])){ ?>
           <td>18%</td>
           <td><?php echo $igst =18*($amt1/100);  ?></td>
               <?php $igst_sum += $igst ;?>
          <?php }else{ ?>
            <td></td>
            <td></td> 
            <?php 
            $igst=0;
            $igst_sum +=0;?>
          <?php } ?>
          <td><?php echo $s = $amt1+$cgst+$sgst+$igst; ?></td>
      </tr>
  <?php } ?>
      <!-- 
      <tr>
        <td style="color: red;">2.</td>
        <td style="color: red;">PVC SHEET DISP PLAIN</td>
        <td style="color: red;">3921</td>
        <td style="color: red;">5.00</td>
        <td style="color: red;">29.275</td>
        <td style="color: red;">SQMTR</td>
        <td style="color: red;">332.16</td>
        <td>9723.98</td>
         <td></td>
           <td>0</td>
            <td></td>
           <td>0</td>
           <td>18.00</td>
           <td>1750.32</td>
             <td>11474.3</td>
      </tr>
      <tr>
        <td  style="color: red;">3.</td>
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
        <td  style="color: red;">4.</td>
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
        <td  style="color: red;">5.</td>
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
        <td  style="color: red;">6.</td>
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
        <td  style="color: red;">7.</td>
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
        <td  style="color: red;">8.</td>
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
       -->  <th></th>
        <th>Total</th>
        <th></th>
        <th></th>
        <th></th>
        <th>Total</th>
        <th style="color: red; font-weight: bolder;">1 Pkt</th>
        <th>Rs.<?php echo $total_pro_amt; ?></th>
        <th></th>
          <th><?php echo $cgst_sum; ?></th>
         <th></th>
          <th><?php echo $sgst_sum; ?></th>
          <th></th>
          <th><?php echo $igst_sum; ?></th>
        <th><?php echo $total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; ?></th>
      </tr>
    </tbody>
  </table>
  <div class="col-md-12 text-right" style="margin-top: -15px;">
    <pre><p style="font-family: roboto;" >
      Total Amount Before Tax  11211.58
     <span> Add : CGST            <?php echo $cgst_sum; ?></span>
<span>Add : SGST            <?php echo $sgst_sum; ?></span>
<span>Add : IGST            <?php echo $igst_sum; ?></span>
<span>Total GST Amount      <?php echo $total_gst_amount=$cgst_sum+$sgst_sum+$igst_sum; ?></span>
</p></pre>
  </div>
  <div class="col-md-12" style="border: 1px solid black">
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
    $res .=  " AND " . $points . " Paise only";
 }

  $word_no = strtoupper($res);
  // echo $point;
  // return $result;


    
?>



   <div class="row col-md-12">
  <p  style="margin-left: -15px;" class="col-md-8">Indian Rs. -      <span  style="color: red; font-weight: bolder;margin-left: 4px;"><?php echo $word_no; ?> </span></p>&nbsp<b class="col-md-4">Total Amt. After Tax<span style="margin-left: 10px;margin-right: -120px;" class="pull-right"><?php echo $total_sum=$cgst_sum+$sgst_sum+$igst_sum+$total_pro_amt; ?></b></span>
</div>
  </div>
  <div class="col-lg-12 text-left">
    <h6>Terms and Conditions:</h6>
    <ol>
     <li> Interest @24% will be charged if the invoice is not paid on due date.</li> 
     <li>We do not accept responsibilities of loss, damages, shortages or delay once the goods leaves our premises.</li>
     <li>Subject to INDORE jurisdiction. </li>
    </ol>
    <p>Certified that the particulars given above are true and correct.</p>
    <h6 style="font-weight: bolder; text-align: right;">For Rajshri Plastiwood</h6>
   <pre> <i>Prepared By</i>                                               <i>Checked By</i></pre>
  <h6 class="text-center">Thanks For Your Business</h6>
  <h6 class="text-center">Regd. Office: 10, Dhenu Market S.G.S.I.T.S. Road, INDORE - 452003 (M.P.) Ph.: 0731-2538535</h6>



</div>  <!-- Card closing -->

</div>    <!-- wrapper closing -->
</div>
</div><!-- container closing -->




</body>
</html>