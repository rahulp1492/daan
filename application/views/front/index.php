		  <div id="index-banner" class="parallax-container">
		  	<div class="section no-pad-bot">
		  		<div class="container">
		  			<br><br><br><br><br>
		  			<h1 class="header center">We can Help Someone</h1>
		  			<div class="row center">
		  				<h5 class="header col s12 light">The value of a man resides in what he gives and not in what he is capable of receiving.</h5>
		  			</div>
		  			<div class="row center">
		  				<a href="#" id="download-button" class="btn-large btn-floating  waves-effect waves-light blue darken-2"><i class="fa fa-chevron-down" aria-hidden="true"></i></a>
		  			</div>
		  			<br><br>
		  		</div>
		  	</div>
		  	<div class="parallax"><img src="<?=base_url()?>assets/img/slider.jpg" alt="Unsplashed background img 1" style="display: block; transform: translate3d(-50%, 145px, 0px);"></div>
		  </div>
		  <section>
		  	<div class="container">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col s12 m12 l12">
		  					<h1 class="breadcrumbs-title">Make Donation</h1>
		  					<p style="margin-top: -2px;">List of real life heores , angles for all </p>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="row">
		  			<?php //print_r($do_donation);
		  				foreach ($do_donation as $key => $value) :
		  			?>
		  			<div class="col s12 m4 l3">
		  				<div class="card hoverable" style="height:325px;">
		  				 
		  					<div class="card-move-up card-image waves-effect waves-block waves-light">  
		  						<a href="<?=base_url().INDEXPHP.'index/donate_description/'.$value['slug'];?>" alt="donation type ">
		  							<img src="<?=base_url().$value['image'];?>" height="180px;" alt="<?=$value['donation_name'];?>">
		  						</a>
		  					</div>
		  					<div class="card-content" style="padding:8px;">
		  						<a style="right:15px;" class="btn-floating btn-move-up waves-effect waves-light blue darken-2 right" href="<?=base_url().INDEXPHP.'index/donate_description/'.$value['slug'];?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

		  						<span style="padding-bottom:4px;" class="grey-text text-darken-4"><i><?=$value['donation_title'];?></i></span>
		  						<p >
		  							<b><?=$value['donation_name'];?></b>

		  						</p>

		  						<div class="row">
		  							<div class="col s2">
		  								<img style="height: 30px; width:30px;" src="<?=base_url().$value['pro_img'];?>" alt="" class="circle responsive-img valign profile-image">
		  							</div>
		  							<div class="col s9"> By <a style="text-decoration:none;" href="#"><?=$value['first_name']." ".$value['first_name'];?></a>

		  							</div>

		  						</div>
		  						<div class="center green-text" style="margin-top:-20px;">

		  							<span><b>Raised: <?php if(isset($value['qty'])) echo $value['qty']; else echo "0";?> Units</b></span>
		  							<span style="color: #ce7653; margin-left: 10px;">Goal: <?=$value['goal_qty'];?> Units</span> 
		  						</div>
		  					</div> 
		  				</div>
		  			</div>
		  		<?php endforeach;?>
		  			<div class="col s12">
		  				<a href="#" class="btn right blue darken-2">Load More <i class="fa fa-chevron-right" aria-hidden="true"></i> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		  				<br/><br/>
		  			</div>

		  		</div>
		  	</div>
		  </section>

		  <section class="grey darken-4 white-text">
		  	<div class="container">
		  		<div class="row">
		  			<div class="col s12 m12 l12">
		  				<h1 class="breadcrumbs-title">Open Donation</h1>
		  				<p style="margin-top: -2px;">This is open request where other users will response , respectively</p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="container">
		  		<div class="row">
		  			<div class="col s6 offset-l3 l3">
		  				<a style="width:100%" class="btn blue darken-2 btn-wave btn-large">Do Donation</a>
		  			</div>
		  			<div class="col s6 l3">
		  				<a style="width:100%" class="btn blue darken-2 btn-wave btn-large">Reqst Donation </a>
		  			</div>
		  		</div>
		  	</div>
		  	<br/>
		  	<br/>
		  </section>

		  <section>
		  	<div class="container">
		  		<div class="container">
		  			<div class="row">
		  				<div class="col s12 m12 l12">
		  					<h1 class="breadcrumbs-title">Take Donation</h1>
		  					<p style="margin-top: -2px;">List of real life heores , angles for all </p>
		  				</div>
		  			</div>
		  		</div>
		  		<div class="row">
		  			<?php //print_r($do_donation);
		  				foreach ($reqst_donation as $key => $value) :
		  			?>
		  			<div class="col s12 m4 l3">
		  				<div class="card hoverable" style="height:325px;">
		  					<div class="card-move-up card-image waves-effect waves-block waves-light">  
		  						<a href="<?=base_url().INDEXPHP.'index/donate_description/'.$value['slug'];?>" alt="donation type ">
		  							<img src="<?=base_url().$value['image'];?>" height="180px;" alt="<?=$value['donation_name'];?>">
		  						</a>
		  					</div>
		  					<div class="card-content" style="padding:8px;">
		  						<a href="<?=base_url().INDEXPHP.'index/donate_description/'.$value['slug'];?>" style="right:15px;" class="btn-floating btn-move-up waves-effect waves-light blue darken-2 right"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

		  						<span style="padding-bottom:4px;" class="grey-text text-darken-4"><i><?=$value['donation_title'];?></i></span>
		  						<p >
		  							<b><?=$value['donation_name'];?></b>

		  						</p>

		  						<div class="row">
		  							<div class="col s2">
		  								<img style="height: 30px; width:30px;" src="<?=base_url().$value['pro_img'];?>" alt="" class="circle responsive-img valign profile-image">
		  							</div>
		  							<div class="col s9"> By <a style="text-decoration:none;" href="#"><?=$value['first_name']." ".$value['first_name'];?></a>

		  							</div>

		  						</div>
		  						<div class="center green-text" style="margin-top:-20px;">

		  							<span><b>Given: <?php if(isset($value['qty'])) echo $value['qty']; else echo "0";?> Units</b></span>
		  							<span style="color: #ce7653; margin-left: 10px;">Goal: <?=$value['goal_qty'];?> Units</span> 
		  						</div>
		  					</div> 
		  				</div>
		  			</div>
		  		<?php endforeach;?>	
		  			<div class="col s12">
		  				<a href="#" class="btn right blue darken-2">Load More <i class="fa fa-chevron-right" aria-hidden="true"></i> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
		  				<br/><br/>
		  			</div>

		  		</div>
		  	</div>
		  </section>

		  <section class="grey darken-4 white-text">
		  	<div class="container">
		  		<div class="row">
		  			<div class="col s12 m12 l12">
		  				<h1 class="breadcrumbs-title">Angles</h1>
		  				<p style="margin-top: -2px;">List of real life heores , angles for all </p>
		  			</div>
		  		</div>
		  	</div>
		  	<div class="container">
		  		<div class="row">
		  			<?php //print_r($angles_donar);
		  				foreach ($angles_donar as $key => $value) :
		  			?>
		  			<div class="col s6 m4 l2">
		  				<div class="card">
		  					<a href="#">
			  					<div class="card-image waves-effect waves-block waves-light">

			  						<img src="<?=base_url().$value['pro_img']?>" alt="<?=$value['first_name']." ".$value['last_name'];?>">
			  						<span class="card-title"><?=$value['first_name']." ".$value['last_name'];?></span>
			  					</div>
		  				   </a>
		  				</div>
		  			</div>
		  		<?php endforeach;?>
		  		</div>
		  	</div>
		  	<br/>
		  	<br/>
		  </section>

