</div>
      
       
      <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>
      
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>webarch/js/webarch.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/js/chat.js" type="text/javascript"></script>
      <!--<script src="<?php //echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>-->
    <!--   <script src="<?php echo base_url(); ?>assets/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script> -->
      <script src="<?php echo base_url(); ?>assets/plugins/jquery-sparkline/jquery-sparkline.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/skycons/skycons.js"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
      <!-- <script src="<?php echo base_url(); ?>assets/plugins/jquery-gmap/gmaps.js" type="text/javascript"></script> -->
      <script src="<?php echo base_url(); ?>assets/plugins/Mapplic/js/jquery.easing.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/Mapplic/js/jquery.mousewheel.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/Mapplic/js/hammer.js" type="text/javascript"></script>
      <script src="<?php echo base_url(); ?>assets/plugins/Mapplic/mapplic/mapplic.js" type="text/javascript"></script>
     <!--  <script src="<?php echo base_url(); ?>assets/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script> -->

      <script src="<?php echo base_url(); ?>assets/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript"></script>
    <!--   <script src="<?php echo base_url(); ?>assets/js/dashboard_v2.js" type="text/javascript"></script> -->
      <script src="<?php //echo base_url(); ?>assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript"></script>
     <script src="<?php echo base_url(); ?>assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript"></script>

      <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/lodash.min.js"></script>

      <script src="<?php echo base_url(); ?>assets/js/datatables.js" type="text/javascript"></script>
 -->
      <script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>

     <script src="<?php echo base_url();?>assets/plugins/sweet-alert/sweet-alert-script.js"></script>
     <script src="<?php echo base_url();?>assets/plugins/sweet-alert/sweetalert.min.js"></script>
	 
	 <!---multiple select--->
	 <script src="<?php echo base_url();?>assets/js/multiselect.js"></script>
	 <script src="<?php echo base_url(); ?>assets/js/custom.js" type="text/javascript"></script>

<!-- ---------------------Sweet alert script---------------------- -->

<script type="text/javascript">
  $(document).ready(function() {
    $('.datatable_for').DataTable({
	//"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
	 "iDisplayLength": 50,
	
    });
}); 

     function test(){
     	
         swal({
  title: "Are you sure?",
  text: "Once logout, you will not be able to redirect this page!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    swal("logout Successfully", {
      icon: "success",
    });
     window.setTimeout(function(){ 
    window.location.href ='<?php echo base_url(); ?>logout';
} ,1000);
   
  } else {
    swal("Your logout Process Not Complete!!!!!");
  }
});
   }
$('.datepicker').datepicker({ dateFormat: 'dd/mm/yy' });
 </script>
<!-- <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<div id="piechart_3d" style="width: 500px; height: 400px;"></div>
<?php 
if(!empty($total_invoice)){
  $tot_in = $total_invoice;
}else{
  $tot_in = '0';
}
if(!empty($total_PO)){
  $tot_po = $total_PO;
}else{
  $tot_po = '0';
}
if(!empty($total_pending)){
  $tot_pending = $total_pending;
}else{
  $tot_pending = '0';
}
if(!empty($total_reject)){
  $tot_reject = $total_reject;
}else{
  $tot_reject = '0';
}
?>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Total PO',<?php echo $tot_po; ?>],
          ['Total Pending', <?php echo $tot_pending; ?>],
          ['Total Invoice', <?php echo $tot_in; ?>],
          ['Total Rejected', <?php echo $tot_reject; ?>]
         
        ]);

        var options = {
          title: 'My Requirement Progress Report',
          is3D: true,
           slices: {
            0: { color: 'green' },
            1: { color: 'orange' },
            2: { color: 'blue'},
            3: {color:'red'}
          }

        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script> -->
    <script>  
   $(document).ready(function(){
		 
   var base_url =document.getElementById("base_url").value;
  $("#invoice_number").autocomplete({
              source: function (request, response) {
                  $.ajax({
                      type: "POST",
                      url: base_url+"Common/get_invoice_list",
                      data: {term: request.term},
                      dataType: "json",
                      success: function (output) {
                        //alert(output);
                          response(output.slice(0,25));
                      },
                      error: function (errormsg) {
                          alert(errormsg.responseText);
                      },
                  });
              }, select: function(request, response){
               $('#showHidden').show();
               $('#vendor_id').val(response.item.vendor_id);
             $('#invoice_amount').html(response.item.after_tax_amount);
             $('#paid_amt').val(response.item.paid_amt);
             $('#paid_amount').html(response.item.paid_amt);
             var remain = parseInt(response.item.after_tax_amount)-parseInt(response.item.paid_amt);
             $('#remain_amount').html(remain);
             $('#remain_amount_hidd').val(remain);
            }
              });

      });   
    

  function update_status(id, tbl, status){
// alert(status);
var base_url =document.getElementById("base_url").value;

$.ajax({
  type: "POST",
  url: base_url+"Users/update_status",
  data: {id : id, tbl : tbl,status : status},
  success: function(html){
     window.location.href ='<?php echo base_url(); ?>Users_List';

  }
});
}
   
/********filter from date to date************/


    </script>
   </body>
   
</html>