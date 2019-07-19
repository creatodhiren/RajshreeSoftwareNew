
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
