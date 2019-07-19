<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/***********Login***************/
$route['logout'] = 'Login/logout';
$route['LoginAuth'] = 'Login/loginAuth';
$route['Dashboard'] = 'Login/dashboard';
$route['My_Account'] = 'Common/my_account';
$route['Update_Account'] = 'Common/account_save';

/***********Users Route*************/
$route['Users_List'] = 'Users/showUserList';
$route['Add_Users'] = 'Users/add_users';
$route['SaveUsers'] = 'Users/saveUsers';
$route['Edit_User_Details/(:any)']='Users/Edit_user_by_id';
$route['Upadte_Users_Save']='Users/user_edit_data_save';
/*************Manage Product**************/
$route['Add_Category'] = 'Product/add_category_form';
$route['SaveCategory'] = 'Product/save_category';
$route['Category_List'] = 'Product/category_list';
$route['Edit_Category/(:any)'] = 'Product/edit_category';
$route['UpdateCategory'] = 'Product/update_category';
$route['Add_Product_Option'] = 'Product/add_product_option';
$route['Add_Color_Option'] = 'Product/add_Color_Option';
$route['Add_Design_Option'] = 'Product/add_Design_Option';
$route['Add_Size_Option'] = 'Product/add_size_Option';
$route['Add_Thickness_Option'] = 'Product/add_thickness_Option';
$route['Add_Grade_Option'] = 'Product/add_grade_Option';
$route['Add_Product_Type_Option'] = 'Product/add_product_type_Option';
$route['Add_place_of_supply_Option'] = 'Product/add_place_of_supply_Option';
$route['Add_saleac_Option'] = 'Product/add_saleac_Option';
$route['Add_sale_ret_ac_Option'] = 'Product/add_sale_ret_ac_Option_Option';
$route['SaveOption'] = 'Product/save_option';
$route['List_Product_Option'] = 'Product/list_product_option';
$route['List_Color_Option'] = 'Product/list_color_option';
$route['List_Design_Option'] = 'Product/list_design_option';
$route['List_Size_Option'] = 'Product/list_size_option';
$route['List_Thickness_Option'] = 'Product/list_thickness_option';
$route['List_Grade_Option'] = 'Product/list_grade_option';
$route['List_Product_Type_Option'] = 'Product/list_product_type_option';
$route['List_Place_Option'] = 'Product/list_place_option';
$route['List_Sale_AC_Option'] = 'Product/list_sale_ac_option';
$route['List_Sale_Ret_AC_Option'] = 'Product/list_sale_ret_ac_option';
$route['Edit_Option/(:any)'] = 'Product/edit_option_list';
$route['Edit_Color_Option/(:any)'] = 'Product/edit_color_list';
$route['UpdateOption'] = 'Product/update_option_save';
$route['UpdateProductOption'] = 'Product/update_product_option_save';
$route['Add_Product'] = 'Product/add_product_form';
$route['SaveProduct'] = 'Product/SaveProduct';
$route['Product_list'] = 'Product/product_list';
$route['Edit_Product/(:any)'] = 'Product/edit_product_form';
$route['UpdateProduct'] = 'Product/UpdateSaveProduct';
/**************Vendors Admin Side**************/
$route['View_Purchase_Order_by_Vendor'] = 'Vendor/gotPurchaseOrderbyvendor';
$route['PO_Process/(:any)'] = 'Vendor/new_po_process_by_admin_view';
$route['Genrate_Sales_Order'] = 'Vendor/genrate_so_by_admin';
$route['View_Genrated_sales_order'] = 'Vendor/genrated_sales_order_list';
$route['So_Invoice/(:any)'] = 'Vendor/so_invoice';
$route['Invoice_Genrated'] = 'Vendor/invoice_save';
$route['Final_invoice/(:any)']='Vendor/final_invoice_data';
$route['Vendor_Profile/Final_invoice/(:any)'] = 'Vendor/final_invoice_data';
$route['View_Genrated_invoice']='Vendor/view_all_invoice_list';
$route['View_All_Vendor'] = 'Vendor/view_all_vendor';
$route['Edit_Vendor_Details/(:any)'] = 'Vendor/edit_id_data';
$route['Upadte_Vendor_Save']='Vendor/vendor_edit_data_save';
$route['Add_Vendor'] = 'Vendor/vendor_add_form';
$route['SaveVendor'] = 'Vendor/SaveVendor';
$route['Vendor_Profile/(:any)'] = 'Vendor/show_vendor_profile';
$route['View_Vendor_Payment']='Vendor/view_vendor_payment';
$route['Add_Payment']='Vendor/add_payment_form';
$route['SavePayment']='Vendor/savePayment';
$route['Vendor_Reject_list/(:any)'] = 'Vendor/show_vendor_wise_reject_list';
$route['Vendor_Total_Invoice_list/(:any)'] = 'Vendor/show_vender_wise_invoice_list';
$route['Vendor_Total_Pending_list/(:any)'] = 'Vendor/show_vender_wise_pending_list';
/******************Vendor Side URL************************/



/*******************Employee Section********/
$route['Production_list']='Employee_user/Production/view_production_list';
$route['See_Product_Status/(:any)']='Employee_user/Production/see_product_status_listing';



/*********Product Section************/
$route['Vendor_Genrate_PO'] = 'Vendor_user/Product/genrate_po_form';
$route['Genrate_po_save'] ='Vendor_user/Product/venderGenratePOSave';
$route['Vendor_PO_List'] = 'Vendor_user/Product/vendor_po_list';
$route['Vendor_SO_List'] = 'Vendor_user/Product/vendor_so_list';
$route['Vendor_Invoice'] = 'Vendor_user/Product/vendor_see_Invoice_list';
