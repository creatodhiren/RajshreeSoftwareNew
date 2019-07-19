<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>RajShree | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="" name="description" />
<meta content="" name="author" />

<!-- <script src="../../cdn-cgi/apps/head/QJpHOqznaMvNOv9CGoAdo_yvYKU.js"></script><link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen" />
 --><link href="<?php echo base_url(); ?>assets/plugins/bootstrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/bootstrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 --><link href="<?php echo base_url(); ?>assets/plugins/animate.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" />


<link href="<?php echo base_url(); ?>webarch/css/webarch.css" rel="stylesheet" type="text/css" />

</head>
<?php if ($this->session->flashdata('category_error')) { ?>
    
    <div class="alert alert-danger"><button class="close" data-dismiss="alert"></button><center> <?= $this->session->flashdata('category_error') ?></center> </div>
<?php } ?>
	

<body class="error-body no-top lazy" data-original="<?php echo base_url(); ?>assets/img/work.jpg" style="background-image: url('assets/img/bg.jpg')">
<div class="container">
<div class="row login-container animated fadeInUp">
<div class="col-md-6 col-md-offset-3 tiles white no-padding">
<div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
<h2 class="normal">
Sign in to RajShree Software
</h2>

<p class="p-b-20">
Sign up Now! for RajShree accounts, it's free and always will be..
</p>
<!-- <div role="tablist">
<a href="#tab_login" class="btn btn-primary btn-cons" role="tab" data-toggle="tab">Sign In</a> or&nbsp;&nbsp;
<a href="#tab_register" class="btn btn-info btn-cons" role="tab" data-toggle="tab">Create an account</a>
</div> -->
</div>
<div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
<div role="tabpanel" class="tab-pane active" id="tab_login">

<form class="animated fadeIn validate" method="POST" action="<?php echo base_url(); ?>LoginAuth" id="" name="">
<div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
<div class="col-md-4 col-sm-4">
<input class="form-control" autocomplete="off" id="login_username" name="email" placeholder="Email ID" type="email" required>
</div>
<div class="col-md-4 col-sm-4">
<input class="form-control" id="login_pass" name="password" placeholder="Password" type="password" required>
</div>
<div class="col-md-2 col-sm-2">
	<input type="submit"  class="btn btn-primary btn-cons"  value="Login" />
</div>
</div>
<div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
<div class="control-group col-md-10">
<div class="checkbox checkbox check-success">
<a href="#">Trouble login in?</a>&nbsp;&nbsp;
<input id="checkbox1" type="checkbox" value="1">
<label for="checkbox1">Keep me reminded</label>
</div>
</div>
</div>
</form>


</div>

<!-- <div role="tabpanel" class="tab-pane" id="tab_register">
<form class="animated fadeIn validate" id="" name="">
<div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
<div class="col-md-6 col-sm-6">
<input class="form-control" id="reg_username" name="reg_username" placeholder="Username" type="text" required>
</div>
<div class="col-md-6 col-sm-6">
<input class="form-control" id="reg_pass" name="reg_pass" placeholder="Password" type="password" required>
 </div>
</div>
<div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
<div class="col-md-12">
<input class="form-control" id="reg_mail" name="reg_mail" placeholder="Mailing Address" type="email" required>
</div>
</div>
<div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
<div class="col-md-6 col-sm-6">
<input class="form-control" id="reg_first_Name" name="reg_first_Name" placeholder="First Name" type="text" required>
</div>
<div class="col-md-6 col-sm-6">
<input class="form-control" id="reg_first_Name" name="reg_first_Name" placeholder="Last Name" type="text" required>
</div>
</div>
<div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
<div class="col-md-12">
<input class="form-control" id="reg_email" name="reg_email" placeholder="Email" type="email" required>
</div>
</div>
</form>
</div>
 -->

</div>
</div>
</div>
</div>

<script src="<?php echo base_url(); ?>assets/plugins/pace/pace.min.js" type="text/javascript"></script>

<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-block-ui/jqueryblockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>


<script src="webarch/js/webarch.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/chat.js" type="text/javascript"></script>

</body>
</html>