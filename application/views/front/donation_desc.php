<div class="conatiner">
			<div class="row">
				<div class="col l9 s12 m12">
					<section>
						<div id="profile-page-wall-post" class="card" style="padding:16px;">
							<div class="card-profile-title">
								<div class="row">
									<div class="col s1">
										<img style="height: 50px;width: 50px;" src="<?=base_url().$desc_card[0]["pro_img"];?>" alt="Q" class="circle responsive-img valign profile-post-uer-image">                       
									</div>
									<div class="col s10">
										<p class="grey-text text-darken-4 margin"><?=$desc_card[0]["first_name"]." ".$desc_card[0]["first_name"];?></p>
										<span class="grey-text text-darken-1 ultra-small"><?=$desc_card[0]["donation_date"];?></span>
									</div>
									<div class="col s1 right-align">
										<i class="mdi-navigation-expand-more"></i>
									</div>
								</div>
								<div class="row">
									<div class="col s12">
										<span><?=$desc_card[0]["donation_message"];?></span>
									</div>
								</div>
							</div>
							<div class="card-image profile-medium">
								<img style="height: 300px;" src="<?=base_url().$desc_card[0]["image"];?>" alt="<?=$desc_card[0]["donation_name"];?>" class="responsive-img profile-post-image profile-medium">
								<span class="card-title"><?=$desc_card[0]["donation_title"];?></span>
							</div>
							<div class="card-action row">
								<div class="col s4 card-action-share">
								<button class="btn-floating btn waves-effect" onclick="copy('#url')"><i name="share" class="material-icons">share</i></button>
							</div>
						</div>
					</div>
				</section>
				<section>
					<div class="row">
						<div class="col l12">
							<div class="row">
					              <div class="card">
					                  <h4 id="makerequest" class="header1 center">Make request</h4>
					                  <?php if($this->session->flashdata('makerequest')){?>
					                  <p><?php $this->load->view('front/layout/alert') ?></p>
					                  <?php }?>
					                  <form method="post" action="<?=base_url().INDEXPHP;?>index/make_donaton_reqst/<?=$this->uri->segment(3);?>">
					                   <div class="row">
					                    <div class="input-field col s6">
					                      <textarea required="" data-emojiable="true" data-emoji-input="unicode" maxlength="150" id="textarea_req" name="message" class="materialize-textarea"></textarea>
											 <label for="textarea_req" class="">Say why you ?</label>
											 
										</div>
					                    <div class="input-field col s6">
					                      <input type="number" min="1" name="donate_qty" style="padding-bottom: 36px;" max="10" >
												 <label for="textarea" class="">Please Enter Quantity</label> 
					                    </div>
					                    <div class="input-field col s12 center">
					                        <input type="submit" class="waves-button-input btn waves-effect"  value="Make Request" />				                      
					                    </div>
					                  </div>
					                </form>
					               </div>
					          </div>
						</div>
						 					
						<div class="col l12">
							<ul class="collection with-header">
							<li class="collection-header">
								<h4>Requested people List</h4>
							 </li>
                            <?php foreach ($req_list as $key => $value):?>
							  <li class="collection-item avatar"> 

                              <a href="#"><img src="<?=base_url().$value['pro_img'];?>" alt="<?=$value['first_name']." ".$value['last_name'];?>" class="circle">

                              <p class="title"><?=$value['first_name']." ". $value["last_name"];?></p></a>

                             <span class="grey-text text-darken-1 ultra-small"><?=$value['datetime'];?></span>

							  <p><?=$value['message'];?></p>
							  <a class="right" href="#">Comments</a>
							  <br/>
                            </li>
                            <ul class="collection-header grey lighten-3">
                            	<form action="<?=base_url().INDEXPHP;?>index/makeComment/<?=$this->uri->segment(3);?>" method="post">
	                            	<li> <?php if($this->session->flashdata('comment')){?>
	                            		<p><?php $this->load->view('front/layout/alert') ?></p>
	                            		<?php } ?>
	                            	</li>
	                            	<li class="input-field">
	                            		<input type="hidden" name="user_request_id" value="<?=$value['users_request_id'];?>"/>
								  		 <i class=" material-icons prefix">border_color</i>
								  	     <textarea name="comment" class="materialize-textarea"></textarea>
								  		 <label for="textarea" class="">Make comments</label>
								  		 <input type="submit" class="btn" style="width:180px;" value="post" />
								  	</li>
							    </form>
							    <li class="collection-item grey lighten-3"></li>
							  	<li class="collection-item avatar">
							  		<a href="#"><img src="<?=base_url().$value['pro_img'];?>" alt="<?=$value['first_name']." ".$value['last_name'];?>" class="circle"></a>
							  		<p>vxvdvd sds</p></li>
							  	
							  <li class="collection-item avatar">
							  		<a href="#"><img src="<?=base_url().$value['pro_img'];?>" alt="<?=$value['first_name']." ".$value['last_name'];?>" class="circle"></a>
							  		<p>vxvdvd sds</p></li>

							  </ul>
                            <?php endforeach;?>                        
                        </ul>
						</div>
					</div>
				</section>
			</div>

				<div class="col l3 s12 m12 card">
					<ul class="collection with-header">
						<li class="collection-header"><h4 style="font-size:24px;">Top Donor List</h4></li>
						<?php //print_r($angles_donar);
		  				foreach ($angles_donar as $key => $value) :
		  				?>
						<li class="collection-item avatar waves-effect" style="width:100%;">
							<a href="profile.php?uid=2">
						  <img src="<?=base_url().$value['pro_img']?>" alt="<?=$value['first_name']." ".$value['last_name'];?>" class="circle">

						  <span class="title"><?=$value['first_name']." ".$value['last_name'];?></span>
						  
							</a>
							
							<p>Nasik, Maharastra</p>
						</li>
					<?php endforeach;?>
						 </ul>
					  <div class="container row">
					  	<p><b>Want to do an open Donation</b></p>
					  	<a href="#" style="width:100%" class="btn blue darken-2">Do Donation</a>
					  	<p><b>Want to do an open Donation Request</b></p>
					  	<a href="#" style="width:100%" class="btn blue darken-2">reqst Donation</a>
					  	<br/><br/>
					  </div> 
	          	</div>
				</div>
			</div>
		</div>
		  <!--  Scripts-->