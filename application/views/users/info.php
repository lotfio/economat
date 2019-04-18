<!-- <div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
    <div class="row">

    </div>
</div>  example wrapper --> 

<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
    <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

		<div class="page-header">
		    <h3 class="mb-2"><span class="text-info"><?=$info_user->u_name?></span> User Information </h3>

		    <div class="page-breadcrumb">
		        <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="<?=base_url()?>users" class="breadcrumb-link">Users</a></li>
		                <li class="breadcrumb-item"><a>information</a></li>
		            </ol>
		        </nav>
		    </div>
		</div>
		
		<!-- user info card -->

		<div class="row">
	        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
	            <div class="card influencer-profile-data">
	                <div class="card-body">
	                    <div class="row">
	                        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-4 col-12">
	                            <div class="text-center">

	                                <!--<img src="assets/images/avatar-1.jpg" alt="User Avatar" class="rounded-circle user-avatar-xxl">-->
	                                <?php if(!empty($info_user->u_img) && file_exists(UP_IMG.$info_user->u_img)):?>
                                            <img src="<?=base_url()?>assets/images/<?=$info_user->u_img?>" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        <?php else:?>
                                            <img src="<?=base_url()?>assets/images/avatar.svg" alt="User Avatar" class="rounded-circle user-avatar-xxl">
                                        <?php endif?>
	                            </div>
	                            </div>
	                            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 col-12">
	                                <div class="user-avatar-info">
	                                    <div class="m-b-20">
	                                        <div class="user-avatar-name">
	                                            <h2 class="mb-1"><?=$info_user->u_name?></h2>
	                                        </div>
	                                        <div class="rating-star  d-inline-block">
	                                            <i class="fa fa-fw fa-star"></i>
	                                            <i class="fa fa-fw fa-star"></i>
	                                            <i class="fa fa-fw fa-star"></i>
	                                            <i class="fa fa-fw fa-star"></i>
	                                        </div>
	                                    </div>
	                                    <!--  <div class="float-right"><a href="#" class="user-avatar-email text-secondary">www.henrybarbara.com</a></div> -->
	                                    <div class="user-avatar-address">
	                                        <p class="border-bottom pb-3">
	                                            <span class="d-xl-inline-block d-block mb-2"><i class="fas fa-envelope mr-2 text-primary "></i>
	                                            	<?=$info_user->u_email?></span>
	                                            <span class="mb-2 ml-xl-4 d-xl-inline-block d-block"> <i class=" fas fa-mobile-alt text-primary
"></i>
	                                            	<?=$info_user->u_phone?>
	                                            </span>
	                                            <span class=" mb-2 d-xl-inline-block d-block ml-xl-4"><i class="fa fa-member text-primary"></i> 
	                                            	<span class="text-primary" ><?=$info_user->u_level?> since :</span> <?=$info_user->u_join_date?>
	                                            </span>
	                                            
	                                        </p>
	                                        <div class="mt-3">
	                                            <a href="#" class="badge badge-light mr-1">Fitness</a> <a href="#" class="badge badge-light mr-1">Life Style</a> <a href="#" class="badge badge-light">Gym</a>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="border-top user-social-box">
	                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 twitter-color"> <i class="fab fa-twitter-square"></i></span><span>13,291</span></div>
	                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  pinterest-color"> <i class="fab fa-pinterest-square"></i></span><span>84,019</span></div>
	                        <div class="user-social-media d-xl-inline-block"><span class="mr-2 instagram-color"> <i class="fab fa-instagram"></i></span><span>12,300</span></div>
	                        <div class="user-social-media d-xl-inline-block"><span class="mr-2  facebook-color"> <i class="fab fa-facebook-square "></i></span><span>92,920</span></div>

	                    </div>
	                </div>
	            </div>
	        </div>

	                  <!-- user info card end -->


	</div> <!-- close col 12 -->

    </div>
</div>