<?php
	if(isset($header)==FALSE)
		$header['meta']	= DESCRIPTION;
	
	$this->load->view('front/layout/header', isset($header)?$header:'');
	$this->load->view( isset($content)?$content:'');
	$this->load->view('front/layout/footer');
?>