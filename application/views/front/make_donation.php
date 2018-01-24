<main>
  <div class="container">
    <div class="container">
      <div class="row">
        <div class="col s12 m12 l12">
          <h1 class="breadcrumbs-title">Make Donation</h1>
        </div>
      </div>
    </div>
    <div class="row">
      <?php
      if(sizeof($arr_donation)):
        foreach ($arr_donation as $key => $value):
          ?>
          <div class="col s12 m4 l3">
            <div class="card hoverable" style="height:325px;">

              <div class="card-move-up card-image waves-effect waves-block waves-light">
                <a href="<?=base_url() .'donation/' . $value['slug'];?>" alt="donation type ">
                  <img src="<?=base_url() . $value['image_thumb'];?>" height="180px;" alt="<?=$value['donation_name'];?>">
                </a>
              </div>
              <div class="card-content" style="padding:8px;">
                <a style="right:15px;" class="btn-floating btn-move-up waves-effect waves-light blue darken-2 right" href="<?=base_url() .'donation/' . $value['slug'];?>"><i class="fa fa-chevron-right" aria-hidden="true"></i></a>

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
        <?php endforeach;
      else:
       echo "No Donation Requests";
     endif;
     ?>
   </div>
   <div class="text-center">
    <?php
    if(sizeof($arr_donation)):
      echo $pagination;
    endif;
    ?>
  </div>
</div>
</div>
</main>
