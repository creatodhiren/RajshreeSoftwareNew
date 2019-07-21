
/*************Get State ********************/
function getcity(state_id){

var base_url =document.getElementById("base_url").value;

$.ajax({
  type: "POST",
  url: base_url+"Users/citynameGet",
  data: {state_id : state_id},
   success: function(html){
    $('#city').html(html);

  }
});
}

/***************/

/*************Get State ********************/
function getzonalhead(state_id){

var base_url =document.getElementById("base_url").value;

$.ajax({
  type: "POST",
  url: base_url+"Users/citynameGet",
  data: {state_id : state_id},
   success: function(html){
    $('#city').html(html);

  }
});
}
/****************Delete function for all********************/

function mydeletefun(id,table_name,option_id){
 //alert(table_name);
  swal({
  title: "Are you sure?",
  text: "You Want to delete this filed!!!!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
}) 
.then((willDelete) => {
  if (willDelete) {
    /*swal("Delete Successfully", {
      icon: "success",
    });
*/ /****************************************************/  
var base_url =document.getElementById("base_url").value;
//alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Common/delete",
  data: {id : id,table_name : table_name,option_id : option_id},
   success: function(html){
   if(html='1'){
    swal("Delete Successfully", {
      icon: "success",
     
    });
    window.setTimeout(function(){ 
    location.reload();
} ,1000);
          }else{
   	swal("Delete Process Not Successfully", {
      icon: "danger",
    });
    window.setTimeout(function(){ 
    location.reload();
} ,1000);
   //  window.location.href =base_url+'List_Product_Option';
   }	
   

  }
});
/*******************************/




  } else {
    swal("Your Delete Process Not Complete!!!!!");
  }
});
}
/************************Product Delete*********************************/

function myproductdeletefun(id){
  //alert('sanjay');
swal({
  title: "Are you sure?",
  text: "You Want to delete this filed!!!!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {
    /*swal("Delete Successfully", {
      icon: "success",
    });
*/ /****************************************************/  
var base_url =document.getElementById("base_url").value;
//alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Common/productdelete",
  data: {id : id},
   success: function(html){
   if(html='1'){
    swal("Delete Successfully", {
      icon: "success",
     
    });
    window.setTimeout(function(){ 
    location.reload();
} ,1000);
          }else{
    swal("Delete Process Not Successfully", {
      icon: "danger",
    });
    window.setTimeout(function(){ 
    location.reload();
} ,1000);
   //  window.location.href =base_url+'List_Product_Option';
   }  
   

  }
});
/*******************************/




  } else {
    swal("Your Delete Process Not Complete!!!!!");
  }
});
}

/*****************Vendor Product price section*********************/
function getproductprice(id,row){
	 //alert(id);
  var base_url =document.getElementById("base_url").value;
 
  $.ajax({
  type: "POST",
  url: base_url+"Common/productPrice",
  data: {id : id},
  dataType: "json",
   success: function(data){
	var id='';
	var id = data.id[0]['id'];
    var selOptstype = "";
    var selOptsize = "";
    var selOptcolor = "";
    var selOptgrade = "";
    var selOptdesign = "";
	
			//product type
            for (i=0;i<data.type.length;i++)
            {
                var product_type = data.type[i]['product_type'];
                selOptstype += "<option value='"+product_type+"'>"+product_type+"</option>";
            }
            $('#ptype_'+row).html(selOptstype);
			
			//product size
			for (i=0;i<data.size.length;i++)
            {
                var size = data.size[i]['size_feet'];
                selOptsize += "<option value='"+size+"'>"+size+"</option>";
            }
            $('#size_'+row).html(selOptsize);
			
			//product color
			for (i=0;i<data.color.length;i++)
            {
                var color = data.color[i]['color'];
                selOptcolor += "<option value='"+color+"'>"+color+"</option>";
            }
            $('#pcolor_'+row).html(selOptcolor);
			
			//product grade
			for (i=0;i<data.grade.length;i++)
            {
                var grade = data.grade[i]['grade'];
                selOptgrade += "<option value='"+grade+"'>"+grade+"</option>";
            }
            $('#pgrade_'+row).html(selOptgrade);
			
			//product design
			for (i=0;i<data.design.length;i++)
            {
                var design = data.design[i]['design'];
                selOptdesign += "<option value='"+design+"'>"+design+"</option>";
            }
            $('#pdesign_'+row).html(selOptdesign);
			
           
           
   //$('#size_'+row).html("<option value='"+size+"'>"+size+"</option>");
   //$('#pcolor_'+row).html(color);
   //$('#pgrade_'+row).html(grade);
   //$('#pdesign_'+row).html(design);
  
   
   $('#hidd_prod_'+row).val(id);
    getSingleProductPrice(size,row);
	
    /*$('#price_'+row).html(data);
    $('#price_hid_'+row).val(data);
    */
}
});
}


/********size ***********/
 function getSingleProductPrice(sizeData,row){
	  //alert(sizeData);
  var dealer_seg = $("#dealer_seg").val();
  //alert(dealer_seg);
  var product_sum_id =document.getElementById("hidd_prod_"+row).value;
  var base_url =document.getElementById("base_url").value;
   //alert(product_sum_id);
   //alert(sizeData);
  $.ajax({
  type: "POST",
  url: base_url+"Common/singleProductPrice",
  data: {sizeData : sizeData,product_sum_id : product_sum_id},
    dataType : "JSON",
    success: function(data){ 
    //alert(data[0]['retailer_price']);
    //alert(data[0]['product_id']);
   //$('#size_'+row).html(data);
   $('#hidd_prod_'+row).val(data[0]['id']);

   $('#product_id_'+row).val(data[0]['product_id']);
    var retailer_price = data[0]['retailer_price'];
	var govt_price = data[0]['govt_price'];
	if(dealer_seg == 'retailer'){
	 var prod_price=retailer_price;
	}else{
	 var prod_price=govt_price;
	}
   $('#price_'+row).html(prod_price);
   $('#price_hid_'+row).val(prod_price);

 }
});
 
}


/**************Product Details Page************************/


function productlisting(id,segment){
		//alert(segment);
      var base_url =document.getElementById("base_url").value;
     
      $.ajax({
          
  type: "POST",
  url: base_url+"Common/product_listing",
  data: {id : id},
  dataType : "JSON",
   success: function(html){
      //alert(html);
       var count = Object.keys(html['recordData']).length;
    
       var output = [];
       var x=1;
       var total=0;
       var subtotal=0;
      
       for(var i=0; i < count; i++){
		   var govt_price = html['recordData'][i]['govt_price'];
		   var retailer_price = html['recordData'][i]['retailer_price'];
           //alert(govt_price);
           //alert(retailer_price);
		   if(segment == 'retailer'){
	       var prod_price=retailer_price;
	       }else{
	       var prod_price=govt_price;
	        }
           var unitcaseprice = html['recordData'][i].packbox*html['recordData'][i].rate;
          //subtotal +=unitcaseprice*html['recordData'][i].quantity;
         output += "<tr>";
         output += "<td>"+x+++"</td>";
         output += "<td>"+html['recordData'][i].product_name+" "+html['recordData'][i].thickness+"mm "+html['recordData'][i].category_name+" ( "+html['recordData'][i].size_feet+" )</td>";
         output += "<td>"+html['recordData'][i].quantity+"</td>";
         total = html['recordData'][i].quantity*prod_price;
        output += "<td><b style='color:green;'>Rs."+total+"</b></td>";
        output += "</tr>"; 
        subtotal += html['recordData'][i].quantity*prod_price;
       }
       output +="<tr><td></td><td></td><td colspan='2'>Total :- <b style='color:green;margin-left: 63px;'>Rs."+subtotal+" </b></td></tr>";
           $('#tablrow').append(output);

  }
}); 
    }
/*********************Discount Apply******************************/
function discountcheck(totamt){
var mrp_tot =document.getElementById("mrp_tot").value;
var dis_amt = totamt*(mrp_tot/100);
var after_dis =  mrp_tot-dis_amt;
$('#mrptotamt').html(mrp_tot);
$('#after_dis').html(after_dis.toFixed(2));
$('#after_dis_hidd').val(after_dis.toFixed(2));
$('.totDiscount').html(totamt);

$('.discountAmt').html(dis_amt.toFixed(2));
}
/**************After Discount Apply done******************/
function after_discount_get_dis(per){
var after_dis_amt =document.getElementById("after_dis_hidd").value;
var dis_val = per*(after_dis_amt/100);
var after_dis =  after_dis_amt-dis_val;

$('#mrptotamt1').html(after_dis_amt);

$('.after_dis1').html(after_dis.toFixed(2));
$('#after_dis_hidd1').val(after_dis.toFixed(2));
var firstdis =document.getElementById("firstdis").value;
var totDiscount = parseInt(firstdis)+parseInt(per);
$('.totDiscount').html(totDiscount);

var mrp_tot =document.getElementById("mrp_tot").value;
var totdisAmount = mrp_tot-after_dis;
$('.discountAmt').html(totdisAmount.toFixed(2));
$('.discountAmt1').val(after_dis.toFixed(2));
}

/**********Cancel Po confirmation**************/
function cancelpo(id){
  swal({
  title: "Are you sure?",
  text: "You Want to cancel this Purchase Order !!!!!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
})
.then((willDelete) => {
  if (willDelete) {

    /****************Ajax Cancel**********************/
   var base_url =document.getElementById("base_url").value;

$.ajax({
  type: "POST",
  url: base_url+"Common/purchase_order_cancel",
  data: {id:id},
   success: function(html){
   // alert(html);
   if(html='1'){
    swal("Purchase Order Cancel Process Complete..", {
      icon: "success",
     
    });
    window.setTimeout(function(){ 
    location.reload();
} ,1000);
          }else{
    swal("Delete Process Not Successfully", {
      icon: "danger",
    });
    window.setTimeout(function(){ 
    location.reload();
} ,1000);
   //  window.location.href =base_url+'List_Product_Option';
   }  
   

  }



});

 

    /********************************************/
  } else {
    swal("Your Cancellation Process Not Complete!!!!!");
  }
}); 
}

/**************Checkbox for Address *******************/

function myFunction() {
  var checkBox = document.getElementById("myCheck");

  if (checkBox.checked == true){
     var company_name = document.getElementById("company_name1").value;
     $('#company_name2').val(company_name);
     var mobile = document.getElementById("mobile1").value;
     $('#mobile2').val(mobile);
     var address = document.getElementById("address1").value;
     $('#address2').val(address);
      var state = document.getElementById("state1").value;
     // alert(state);
          $("#state2 option[value="+state+"]").attr('selected', 'selected');
     

  } else {
    $('#company_name2').val('');
    $('#mobile2').val('');
     $('#address2').val('');
     $("#state2").find('option').removeAttr('selected');
     
  }
}

/*************Product listing for pO send list at vendor side**********************/
function productlistingfromsales(id){
  var base_url =document.getElementById("base_url").value;
     //alert(id);
      $.ajax({
          
  type: "POST",
  url: base_url+"Common/product_listing_from_sale",
  data: {id : id},
dataType : "JSON",
   success: function(html){
     // alert(html);
       var count = Object.keys(html['recordData']).length;
     //  alert(count);
    
       var output = [];
       var x=1;
       var subtotal=0;
      
       for(var i=0; i < count; i++){
           
         output += "<tr>";
         output += "<td>"+x+++"</td>";
          output += "<td>"+html['recordData'][i].product_name+" "+html['recordData'][i].thickness+"mm "+html['recordData'][i].category_name+" ( "+html['recordData'][i].size_feet+")</td>";
           output += "<td>"+html['recordData'][i].quantity+"</td>";
        output += "</tr>"; 
       }
           $('#tablrow').append(output);

  }
}); 

}
function productlistingfromPo(id,segment){
	//alert(segment);
 var base_url =document.getElementById("base_url").value;
      $.ajax({
          
  type: "POST",
  url: base_url+"Common/product_listing_from_po",
  data: {id : id},
dataType : "JSON",
   success: function(html){
     // alert();
       var count = Object.keys(html['recordData']).length;
       //alert(count);
    
       var output = [];
       var x=1;
       //var subtotal=0;
       var total =0;
       for(var i=0; i < count; i++){
		   
		   var govt_price = html['recordData'][i]['govt_price'];
		   var retailer_price = html['recordData'][i]['retailer_price'];
           
		   if(segment == 'retailer'){
	       var prod_price=retailer_price;
	       }else{
	       var prod_price=govt_price;
	        }
        
		   output += "<tr>";
           output += "<td>"+x+++"</td>";
           output += "<td>"+html['recordData'][i].product_name+" "+html['recordData'][i].thickness+"mm "+html['recordData'][i].category_name+" ( "+html['recordData'][i].size_feet+")</td>";
           output += "<td>"+html['recordData'][i].quantity+"</td>";
           total = html['recordData'][i].quantity*prod_price;
           output += "<td><b style='color:green;'>Rs."+total+"</b></td>";
           
        output += "</tr>"; 
       }
           $('#tablrow').append(output);

  }
}); 

}






function checkcondition(value){
var remai_amt =document.getElementById("remain_amount_hidd").value;
//alert(remai_amt);
//alert(value);
var diff = remai_amt - value;

if(diff<0){
 $('#showErrormess').show();
 $('#butthidden').hide();
}else{
$('#showErrormess').hide();
$('#butthidden').show();
}


}
function paymentlisting(invoice_no){
var base_url =document.getElementById("base_url").value;
    // alert(invoice_no);
      $.ajax({
          
  type: "POST",
  url: base_url+"Common/getpaymentList",
  data: {invoice_no : invoice_no},
  dataType : "JSON",
   success: function(html){
  //alert(html);
           var count = Object.keys(html['recordData']).length;
    
       var output = [];
       var x=1;
       var subtotal=0;
      
       for(var i=0; i < count; i++){
           
         output += "<tr>";
         output += "<td>"+x+++"</td>";
         output += "<td>"+html['recordData'][i].invoice_no+"</td>";
         output += "<td>"+html['recordData'][i].payment_date+"</td>";
         output += "<td>"+html['recordData'][i].payment_mode+"</td>";
         output += "<td style='color:green;'><b><i class='fa fa-inr' aria-hidden='true'></i> "+html['recordData'][i].amount+"</b></td>";
        output += "</tr>"; 
       }
           $('#tablrow').append(output);


    }
 });
}


function getDealerExe(salse_exe_id){
	//alert(salse_exe_id);
    $('#salse_id').val(salse_exe_id);

var base_url =document.getElementById("base_url").value;
// //alert(base_url);
$.ajax({
  type: "POST",
  url: base_url+"Vendor/getDealerListBySalseExeId",
  dataType: "json",
  data: {salse_exe_id : salse_exe_id},
  success: function(data){
    //$('#delear_list').html(html);
    var d_id = data[0]['user_id'];
    dealer_id_hidden(d_id);
     var selOpts = "";
            for (i=0;i<data.length;i++)
            {
                var id = data[i]['user_id'];
                var val = data[i]['name'];
                selOpts += "<option value='"+id+"'>"+val+"</option>";
            }
             $('#delear_list').html(selOpts);
              $('#dealer_id').val(d_id);
            
    
  }
});


}

function dealer_id_hidden(dealer_id){
//alert(dealer_id);
$('#dealer_id').val(dealer_id);
var base_url =document.getElementById("base_url").value;
    //alert(product_sum_id);
    //alert(sizeData);
     $.ajax({
     type: "POST",
     url: base_url+"Common/getDealerSegment",
     data: {dealer_id : dealer_id},
     dataType : "JSON",
     success: function(data){ 
	 var dealer_segment = data[0]['segment'];
     //alert(dealer_segment);
	 $('#dealer_seg').val(dealer_segment);
 }
     });
 
}


/********second qty**********/
function secondQty(e){
$("#second_qty").show();
if(e == 'No'){
    $("#second_qty").hide();
}else{
    $("#second_qty").show();
}

}

/********add product form start*****************/

/*************Get caculateUom ********************/


function caculateUom(e){
	//alert(e);
	var res = e.split("*");
	var length = res[0];
	var width = res[1];
/* var length = e.substring(0,1);
   var width = e.substring(2,5); */
	
var uom = length*width;
$("#stock_UOM").val(uom);
}


/**************get govt price***************************/
function govtPrice(e){
	//alert(e);
	var a = $("#stock_UOM").val();
	var govtPrice = a*e;
	$("#govt_price").val(govtPrice);
	//alert(govtPrice);
	
}
/**************end govt price***************************/

/**************retailer price***************************/
function retailerPrice(e){
	//alert(e);
	var a = $("#stock_UOM").val();
	var retailerPrice = a*e;
	$("#retail_price").val(retailerPrice);
	//alert(govtPrice);
	
}
/**************end retailer price***************************/


/* $('#design').on('change', function(){
  var design = $(this).val();
  
  //alert(color);
  var base_url =document.getElementById("base_url").value;
$.ajax({
  type: "POST",
  url: base_url+"Product/select_child",
  data: {option : design},
   success: function(html){
	
	$("#design1").html(html);
	$('#design1').multiselect("destroy").multiselect({
	includeSelectAllOption: true
	});
  }
 
});
}); */




$('#selectcolor').on('change', function(){
  var color = $(this).val();
  //alert(color);
  var base_url =document.getElementById("base_url").value;
$.ajax({
  type: "POST",
  url: base_url+"Product/select_child",
  data: {option : color},
   success: function(html){
    $("#color_id1").html(html);
	$('#color_id1').multiselect("destroy").multiselect({
	includeSelectAllOption: true
	});
	
  }
}); 
});


$(function() {
	/*$('#product_type').multiselect({
        includeSelectAllOption: true,
		maxHeight:150  
    });*/
 /*$('#grade').multiselect({
        includeSelectAllOption: true,
		maxHeight:150  
    });*/
    
    $('#color_id1').multiselect({
      includeSelectAllOption: true,
       maxHeight:150  
     });
    $('#thickness').multiselect({
        includeSelectAllOption: true,
		maxHeight:150  
    });
	$('#design').multiselect({
        includeSelectAllOption: true,
		maxHeight:150  
    });
	/* $('#size').multiselect({
        includeSelectAllOption: true,
		maxHeight:150  
    }); */
});

/********add product form end here*****************/

