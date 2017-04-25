<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="keywords" content="Food,Dublin,dublin-food,ireland-food, irish-food, belfast-food, galway-food, cork-food, dublin-burrito, dublin-kebab, dublin-burger, dublin-best-food">
		<meta name="description" content="Where Should I Eat? An Irish site which gives you all the best places to eat in Ireland.">
		<meta name="author" content="Paddy Keogh-Goode, Brian Motherway, Paul Kelly">
        <link rel="shortcut icon" href="../assets/favicon.ico" type="image/x-icon">
		<title>Where Should I Eat? | <?php print isset($restaurant->name) ? $restaurant->name : ' ' ?></title>
		<!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
		<link href="<?php echo base_url() ?>assets/css/bootstrap.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="<?php echo base_url() ?>assets/css/freelancer.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- jQuery -->
		<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<!-- Plugin JavaScript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/classie.js"></script>
		<script src="<?php echo base_url() ?>assets/js/cbpAnimatedHeader.js"></script>  
		<!-- Contact Form JavaScript -->
		<script src="<?php echo base_url() ?>assets/js/jqBootstrapValidation.js"></script>
		<script src="<?php echo base_url() ?>assets/js/contact_me.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?php echo base_url() ?>assets/js/freelancer.js"></script>
		<!-- Functionality for Google Places Querying -->
		<script src="<?php echo base_url() ?>assets/js/site.js"></script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-89823039-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>
	<body id="page-top" class="index">
	    <script src="<?php echo base_url() ?>assets/js/map.js"></script>
	    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLUvYOG7sIIqLSzLz43uSIZzeswUDYglQ&libraries=places&callback=initMap" async defer></script>
	    <?php $this->load->view('navbar') ?>