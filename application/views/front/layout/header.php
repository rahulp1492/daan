<!DOCTYPE html>

<html lang="en">
	<head>		
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <?php 
    if(isset($meta))
        echo '<meta name="description" content="'.$meta.'"/>';
    ?>

  	   <title>Daan | <?php echo ($page_name)? $page_name:'Daan'; ?></title>

		  <!-- CSS  -->

		  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

		  <link href="<?php echo base_url();?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		  <link href="<?php echo base_url();?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		  <link href="<?php echo base_url();?>assets/css/core.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		  <link href="<?php echo base_url();?>assets/fonts/hindi.css" type="text/css" rel="stylesheet" media="screen,projection"/>

		<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
	</head>
	<body>
		  <nav class="teal lighten-2" role="navigation">

		    <div class="nav-wrapper container">

		      <a id="logo-container" href="index.php" class="brand-logo" style="font-family:'Samarkan Normal';">Daan</a>

		      <ul class="right hide-on-med-and-down">

			  <li><a href="index.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">home</i>Home</a></li>


		        <li><a href="myprofile.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons mdi-action-search left">account_circle</i> Profile</a></li>

				<li><a href="#" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">timeline</i>Timeline</a></li>

				<li><a href="my_request.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">line_weight</i>Donation Requests</a></li>

		        <li><a href="logout.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">power_settings_new</i>logout</a></li>

				<li><a href="login.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">exit_to_app</i>Login</a></li>

		        <li><a href="signup.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left	">person_add</i>Signup</a></li>

		      </ul>

		      <ul id="nav-mobile" class="side-nav">

			  <li><a href="index.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">home</i>Home</a></li>

		        <li><a href="myprofile.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons mdi-action-search left">account_circle</i> Profile</a></li>

				<li><a href="#" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">timeline</i>Timeline</a></li>

				<li><a href="my_request.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">line_weight</i>Donation Requests</a></li>

		        <li><a href="logout.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a></li>

				<li><a href="login.php" class="w3-bar-item w3-button w3-hide-small"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>

		        <li><a href="signup.php" class="w3-bar-item w3-button w3-hide-small"><i class="material-icons left">person_add</i>Signup</a></li>

		      </ul>

		      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>

		    </div>

		  </nav>
		  
