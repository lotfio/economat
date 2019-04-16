<div class="dashboard-wrapper">
            <div class="influence-profile">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2"><?=$user->u_level?> Profile Edit </h3>
                                
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item">
                                                <a href="<?=base_url()?>dashboard" class="breadcrumb-link">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">
                                                <a href="<?=base_url()?>dashboard/account" class="breadcrumb-link">Profile</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Update</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- content -->
                    <!-- ============================================================== -->
                    <div class="row">

                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Update Your Profile Information</h5>
                                <div class="card-body">
                                    <?=form_open_multipart("dashboard/proceededit")?>

       <!-- show error messages if the form validation fails -->
        <?php if ($this->session->flashdata('error')) { ?>
            <div class="alert alert-danger">
                <?=$this->session->flashdata('error'); ?>
            </div>
        <?php } ?>

        <?php if ($this->session->flashdata('success')) { ?>
            <div class="alert alert-success">
                <?=$this->session->flashdata('success'); ?>
            </div>
        <?php } ?>
                                        <div class="form-group ">

                                            <div class="profile-img">  
                                                <?php if(!empty($user->u_img) && file_exists(UP_IMG.$user->u_img)):?>
                                                    <img src="<?=base_url()?>assets/images/<?=$user->u_img?>" alt="User Avatar" class="rounded-circle mr-3 mw-100">
                                                <?php else:?>
                                                    <img src="<?=base_url()?>assets/images/avatar.svg" alt="User Avatar" class="rounded-circle mr-3 mw-100">
                                                <?php endif?>

                                                <label for="u_img"><i class="fa fa-fw fa-camera"></i></label>   
                                                <input type="file" name="u_img" id="u_img" class="u_img">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <label for="inputUserName">User Name</label>
                                            <input id="inputUserName" type="text" name="u_name" data-parsley-trigger="change" required="" placeholder="Enter user name" autocomplete="off" class="form-control" value="<?=$user->u_name?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input id="inputEmail" type="u_email" name="email" data-parsley-trigger="change" required="" placeholder="Enter email" autocomplete="off" class="form-control"  value="<?=$user->u_email?>">
                                        </div>

                                         <div class="form-group">
                                            <label for="inputPhoned">Phone</label>
                                            <input id="inputPhoned" type="phone" name="u_phone" placeholder="Phone" class="form-control"  value="<?=$user->u_phone?>">
                                        </div>
                                        
                                        <?php if(strtolower($user->u_level) == 'administrator'):?>
                                            <div class="form-group">
                                                <label for="input-select"><span class="text-secondary">Permissions level</span></label>
                                                <select class="form-control" name="u_level" id="input-select">
                                                   
    <?php 

        foreach ($permissions as $permission) {
            if($user->u_level == $permission->p_name)
            {
                echo ' <option value="'.$permission->p_level.'" selected>'.$permission->p_name.'</option>';
                continue;
            }

            echo '<option value="'.$permission->p_level.'">'.$permission->p_name.'</option>';
        }
    ?>


                                                </select>
                                            </div>
                                         <?php endif?>

                                        <div class="row">
                                            <div class="col-sm-12 pl-0">
                                                <p class="text-right">
                                                    <button type="submit" name="update" value="update" class="btn btn-space btn-primary">Submit</button>
                                                    <button type="reset" class="btn btn-space btn-secondary">Cancel</button>
                                                </p>
                                            </div>
                                        </div>
                                   <?=form_close()?>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- ============================================================== -->
                    <!-- end campaign data -->                        