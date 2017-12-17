<div id="index-banner" class="parallax-container">
	<div class="row" id="1">
		<div class="col s6 m8 l8">
			<div class="section no-pad-bot">
				<div class="container">
<!-- 					<h1 class="header center">We can Help Someone</h1>
					<div class="row center">
						<h5 class="header col s12 light">The value of a man resides in what he gives and not in what he is capable of receiving.</h5>
					</div><br><br>
 -->			</div>
		</div>
	</div>
	<div class="col s6 m4 l4">
	</div>
</div>
<div class="parallax"><img src="<?=$banner['banner_image']?>" alt="Unsplashed background img 1" style="display: block; transform: translate3d(-50%, 145px, 0px);"></div>
</div>
<section>
	<div class="row">
		<div class=" col offset-m6 offset-l8 l4 m6 s12"  style="margin-top:-580px;">
			<div class="card row white">
				<div class="col m12 l12 s12">
						<?php $this->load->view('front/layout/alert')?>
					<ul class="tabs">
						<li class="tab col s6"><a class="active" href="#test1">Do Request</a></li>
						<li class="tab col s6"><a class="#" href="#test2">Do Donation</a></li>
					</ul>
				</div>
				<form method="POST" action="<?=base_url('do_request')?>" enctype="multipart/form-data">
					<div id="test1" class="col s12">
						<div class="white">
							<div class="row">
								<div class="row margin">
									<div class="input-field col s12">
										<input id="name2" type="text" name="title">
										<label for="first_name" class="active">Title</label>
										<div style="color:red;">
											<?php echo form_error('title'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="file-field input-field col s6">
										<div class="btn">
											<span>Image</span>
											<input type="file" name="timeline_file">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Upload Banner Image or Video">
										</div>
										<div style="color:red;">
											<?php echo form_error('timeline_file'); ?>
										</div>
									</div>
									<div class="input-field col s6">
										<select name="donation_type">
											<option value="" disabled selected>Choose Your Type</option>
											<?php foreach ($donation_type as $type) {
												echo "<option value=\"" . $type['id'] . "\">" . $type['name'] . "</option>";
											}
											?>
										</select>
										<div style="color:red;">
											<?php echo form_error('donation_type'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s12">
										<input id="name2" type="text" name="address">
										<label for="address" class="active">Address</label>
										<div style="color:red;">
											<?php echo form_error('address'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s6">
										<select name="city">
											<option value="" disabled selected>Choose Your City</option>
											<option value="1">Nashik</option>
										</select>
										<div style="color:red;">
											<?php echo form_error('city'); ?>
										</div>
									</div>
									<div class="input-field col s6">
										<select name="state">
											<option value="" disabled selected>Choose Your State</option>
											<option value="1">Maharashtra</option>
										</select>
										<div style="color:red;">
											<?php echo form_error('state'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s6">
										<input id="name2" type="text" name="pincode">
										<label for="zip" class="active">Zip</label>
										<div style="color:red;">
											<?php echo form_error('pincode'); ?>
										</div>

									</div>
									<div class="input-field col s6">
										<input id="name2" type="text" name="quantity">
										<label for="quantity" class="active">Quantity</label>
										<div style="color:red;">
											<?php echo form_error('quantity'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s12">
										<textarea id="message2" class="materialize-textarea" name="message"></textarea>
										<label for="Message" class="active">Message</label>
										<div style="color:red;">
											<?php echo form_error('message'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s12">
										<button class="btn waves-effect waves-light right" type="submit" name="action">Submit
											<i class="mdi-content-send right"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
				<form method="POST" action="<?=base_url('do_donation')?>" enctype="multipart/form-data">
					<div id="test2" class="col s12">
						<div class="white">
							<div class="row">
								<div class="row margin">
									<div class="input-field col s12">
										<input id="name2" type="text" name="title">
										<label for="first_name" class="active">Title</label>
										<div style="color:red;">
											<?php echo form_error('title'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="file-field input-field col s6">
										<div class="btn">
											<span>Image</span>
											<input type="file" name="timeline_file">
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Upload Banner Image or Video">
											<div style="color:red;">
												<?php echo form_error('timeline_file'); ?>
											</div>
										</div>

									</div>
									<div class="input-field col s6">
										<select name="donation_type">
											<option value="" disabled selected>Choose Your Type</option>
											<?php foreach ($donation_type as $type) {
												echo "<option value=\"" . $type['id'] . "\">" . $type['name'] . "</option>";
											}
											?>
										</select>
										<div style="color:red;">
											<?php echo form_error('donation_type'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s12">
										<input id="name2" type="text" name="address">
										<label for="address" class="active">Address</label>
										<div style="color:red;">
											<?php echo form_error('address'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s6">
										<select name="city">
											<option value="" disabled selected>Choose Your City</option>
											<option value="1">Nashik</option>
										</select>
										<div style="color:red;">
											<?php echo form_error('city'); ?>
										</div>
									</div>
									<div class="input-field col s6">
										<select name="state">
											<option value="" disabled selected>Choose your state</option>
											<option value="1">Maharashtra</option>
										</select>
										<div style="color:red;">
											<?php echo form_error('state'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s6">
										<input id="name2" type="text" name="pincode">
										<label for="zip" class="active">Zip</label>
										<div style="color:red;">
											<?php echo form_error('pincode'); ?>
										</div>
									</div>
									<div class="input-field col s6">
										<input id="name2" type="text" name="quantity">
										<label for="quantity" class="active">Quantity</label>
										<div style="color:red;">
											<?php echo form_error('quantity'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s12">
										<textarea id="message2" class="materialize-textarea" name="message"></textarea>
										<label for="Message" class="active">Message</label>
										<div style="color:red;">
											<?php echo form_error('message'); ?>
										</div>
									</div>
								</div>
								<div class="row margin">
									<div class="input-field col s12">
										<button class="btn waves-effect waves-light right" type="submit" name="action">Submit
											<i class="mdi-content-send right"></i>
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</section>
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
			<?php
			foreach ($do_donation as $key => $value):
				?>
				<div class="col s12 m4 l3">
					<div class="card hoverable" style="height:325px;">

						<div class="card-move-up card-image waves-effect waves-block waves-light">
							<a href="<?=base_url() . 'donation/' . $value['slug'];?>" alt="donation type ">
								<img src="<?=base_url() . $value['image_thumb'];?>" height="180px;" alt="<?=$value['donation_name'];?>">
							</a>
						</div>
						<div class="card-content" style="padding:8px;">
							<a style="right:15px;" class="btn-floating btn-move-up waves-effect waves-light blue darken-2 right" href="<?=base_url() . 'donation/' . $value['slug'];?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

							<span style="padding-bottom:4px;" class="grey-text text-darken-4"><i><?=$value['donation_title'];?></i></span>
							<p >
								<b><?=$value['donation_name'];?></b>
							</p>

							<div class="row">
								<div class="col s2">
									<img style="height: 30px; width:30px;" src="<?=base_url() . $value['pro_img'];?>" alt="" class="circle responsive-img valign profile-image">
								</div>
								<div class="col s9"> By <a style="text-decoration:none;" href="#"><?=$value['first_name'] . " " . $value['last_name'];?></a>
								</div>
							</div>
							<div class="center green-text" style="margin-top:-20px;">
								<span><b>Raised: <?php if (isset($value['qty'])) {
									echo $value['qty'];
								} else {
									echo "0";
								}
								?> Units</b></span>
								<span style="color: #ce7653; margin-left: 10px;">Goal: <?=$value['goal_qty'];?> Units</span>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach;?>
			<div class="col s12">
				<a href="<?=base_url('make_donation')?>" class="btn right blue darken-2">Load More <i class="fa fa-chevron-right" aria-hidden="true"></i> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
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
				<a style="width:100%" href="#1" class="btn blue darken-2 btn-wave btn-large">Do Donation</a>
			</div>
			<div class="col s6 l3">
				<a style="width:100%" href="#1" class="btn blue darken-2 btn-wave btn-large">Request Donation </a>
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
					<p style="margin-top: -2px;">List Of Real Life Heros , Angles For All </p>
				</div>
			</div>
		</div>
		<div class="row">
			<?php
			foreach ($reqst_donation as $key => $value):
				?>
				<div class="col s12 m4 l3">
					<div class="card hoverable" style="height:325px;">
						<div class="card-move-up card-image waves-effect waves-block waves-light">
							<a href="<?=base_url() . 'donation/' . $value['slug'];?>" alt="donation type ">
								<img src="<?=base_url() . $value['image_thumb'];?>" height="180px;" alt="<?=$value['donation_name'];?>">
							</a>
						</div>
						<div class="card-content" style="padding:8px;">
							<a href="<?=base_url() . 'donation/' . $value['slug'];?>" style="right:15px;" class="btn-floating btn-move-up waves-effect waves-light blue darken-2 right"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

							<span style="padding-bottom:4px;" class="grey-text text-darken-4"><i><?=$value['donation_title'];?></i></span>
							<p >
								<b><?=$value['donation_name'];?></b>
							</p>

							<div class="row">
								<div class="col s2">
									<img style="height: 30px; width:30px;" src="<?=base_url() . $value['pro_img'];?>" alt="" class="circle responsive-img valign profile-image">
								</div>
								<div class="col s9"> By <a style="text-decoration:none;" href="#"><?=$value['first_name'] . " " . $value['first_name'];?></a>
								</div>
							</div>
							<div class="center green-text" style="margin-top:-20px;">
								<span><b>Given: <?php if (isset($value['qty'])) {
									echo $value['qty'];
								} else {
									echo "0";
								}
								?> Units</b></span>
								<span style="color: #ce7653; margin-left: 10px;">Goal: <?=$value['goal_qty'];?> Units</span>
							</div>
						</div>
					</div>
				</div>

			<?php endforeach;?>
			<div class="col s12">
				<a href="<?=base_url('take_donation')?>" class="btn right blue darken-2">Load More <i class="fa fa-chevron-right" aria-hidden="true"></i> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
				<br/><br/>
			</div>
		</div>
	</div>
</section>
<?php if (sizeof($angles_donar)): ?>
<section class="grey darken-4 white-text">
	<div class="container">
		<div class="row">
			<div class="col s12 m12 l12">
				<h1 class="breadcrumbs-title">Angles</h1>
				<p style="margin-top: -2px;">List Of Real Life Heros , Angles For All </p>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
	<?php
	foreach ($angles_donar as $key => $value):
	?>
	<div class="col s6 m4 l2">
		<a href="<?=base_url('timeline/'.base64_encode($value['uid']))?>">
		<div class="card">
			<div class="card-image  waves-light">
				<img class="circle responsive-img"  src="<?=base_url() . $value['pro_img']?>" alt="*">
			</div>
			<div class="card-content">
				<span class="card-title white-text text-darken-4"><?=$value['first_name'] . " " . $value['last_name'];?></span>
			</div>
		</div>
		</a>
	</div>
<?php endforeach;?>
</div>
</div>
<br/>
<br/>
</section>
<?php endif; ?>