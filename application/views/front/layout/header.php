<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>

	<?php
if (isset($meta)) {
    echo '<meta name="description" content="' . $meta . '"/>';
}

?>

	<title>Daan | <?php echo ($page_name) ? $page_name : 'Daan'; ?></title>

	<!-- CSS  -->

	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

	<link href="<?php echo base_url(); ?>assets/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<link href="<?php echo base_url(); ?>assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<link href="<?php echo base_url(); ?>assets/css/core.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<link href="<?php echo base_url(); ?>assets/fonts/hindi.css" type="text/css" rel="stylesheet" media="screen,projection"/>

	<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">


	<style>
	body {
		display: flex;
		min-height: 100vh;
		flex-direction: column;
	}

	main {
		flex: 1 0 auto;
	}

	body {
		background: #fff;
	}

	.input-field input[type=date]:focus + label,
	.input-field input[type=text]:focus + label,
	.input-field input[type=email]:focus + label,
	.input-field input[type=password]:focus + label {
		color: #e91e63;
	}

	.input-field input[type=date]:focus,
	.input-field input[type=text]:focus,
	.input-field input[type=email]:focus,
	.input-field input[type=password]:focus {
		border-bottom: 2px solid #e91e63;
		box-shadow: none;
	}
</style>
</head>
<body class="white">
	<div class="navbar-fixed">
		<nav class="blue darken-1 white-text" role="navigation">
			<div class="nav-wrapper container">
				<a id="logo-container" href="index.php" class="brand-logo white-text"><b>Swa</b><span style="font-family:'Samarkan Normal';">Daan</span></a>

				<ul class="right hide-on-med-and-down">
					<li><a href="<?=base_url()?>" class="white-text w3-bar-item w3-button w3-hide-small">Home</a></li>
					<li><a href="#mkdonation" class="white-text w3-bar-item w3-button w3-hide-small"> Make Donation</a></li>
					<li><a href="#tkdonation" class="white-text w3-bar-item w3-button w3-hide-small">Take Donation</a></li>
					<li><a href="#about" class="white-text w3-bar-item w3-button w3-hide-small">About Us</a></li>
					<li><a href="#contact" class="white-text w3-bar-item w3-button w3-hide-small">Contact Us</a></li>

					<?php if (!empty($this->session->userdata('identity')) && !empty($this->session->userdata('user_id'))) {?>

					<li>
						<a href="<?=base_url('user/profile')?>" class="blue-text w3-bar-item w3-button w3-hide-small white"><i class="material-icons left"></i>
						<?php echo $this->session->userdata('identity') ?>
						</a>
					</li>
					<li>
						<a href="<?=base_url('user/logout')?>" class="blue-text w3-bar-item w3-button w3-hide-small white"><i class="material-icons left"></i>
						Logout
						</a>
					</li>

					<?php } else {?>

					<li><a href="<?=base_url('login')?>" class="blue-text w3-bar-item w3-button w3-hide-small white"><i class="material-icons left"></i>Login</a></li>

					<?php }?>
				</ul>
				<ul id="nav-mobile" class="side-nav blue darken-2 white-text">

					<li><a href="<?=base_url()?>" class="white-text w3-bar-item w3-button w3-hide-small"><i class="material-icons left">home</i>Home</a></li>

					<li><a href="#profile" class="white-text w3-bar-item w3-button w3-hide-small"><i class="material-icons mdi-action-search left">account_circle</i> Profile</a></li>

					<li><a href="#" class="white-text w3-bar-item w3-button w3-hide-sma><i class="material-icons left">timeline</i>Timeline</a></li>

					<li><a href="#my_request" class="white-text w3-bar-item w3-button w3-hide-small"><i class="material-icons left">line_weight</i>Donation Requests</a></li>

					<li><a href="#logout" class="white-text w3-bar-item w3-button w3-hide-small"><i class="fa fa-sign-out" aria-hidden="true"></i> logout</a></li>
					<li><a href="<?=base_url('login')?>" class="white-text w3-bar-item w3-button w3-hide-small"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a></li>

					<li><a href="#signup" class="white-text w3-bar-item w3-button w3-hide-small"><i class="material-icons left">person_add</i>Signup</a></li>
				</ul>

				<a href="#" data-activates="nav-mobile" class="button-collapse white-text"><i class="material-icons">menu</i></a>
			</div>
		</nav>
	</div>

