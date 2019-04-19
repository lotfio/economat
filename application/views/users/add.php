<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
    <div class="row">

    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

		<div class="page-header">
		    <h3 class="mb-2"><span class="text-info">Add ECONOMAT User</h3>

		    <div class="page-breadcrumb">
		        <nav aria-label="breadcrumb">
		            <ol class="breadcrumb">
		                <li class="breadcrumb-item"><a href="<?=base_url()?>users" class="breadcrumb-link">Users</a></li>
		                <li class="breadcrumb-item"><a>Adding</a></li>
		            </ol>
		        </nav>
		    </div>
		</div>
		
		<!-- user info card -->

		<!-- add user form -->
		<div class="card">
	        <h5 class="card-header">Adding user</h5>
	        <div class="card-body">
	            <?=form_open_multipart(base_url().'users/performadd')?>
<!-- show error messages if the form validation fails -->
<?php if ($this->session->flashdata('error')) { ?>
    <?php foreach($this->session->flashdata('error') as $err):?>
    	<div class="alert alert-danger">
        	<?=$err?>
    	</div>
	<?php endforeach ?>
<?php } ?>

<?php if ($this->session->flashdata('success')) { ?>
    <div class="alert alert-success">
        <?=$this->session->flashdata('success'); ?>
    </div>
<?php } ?>
	                <div class="form-group row">
	                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Avatar</label>
	                    <div class="col-12 col-sm-8 col-lg-6">

	                    	<div class="profile-img profile-img-add">  
	                            <img src="<?=base_url()?>assets/images/avatar.svg" alt="User Avatar" class="rounded-circle mr-3">
	                            <label for="u_img"><i class="fa fa-fw fa-camera"></i></label>   
	                            <input type="file" name="u_img" id="u_img" class="u_img">
	                        </div>
	                  	</div>
	                 </div>

	                <div class="form-group row">
	                    <label class="col-12 col-sm-3 col-form-label text-sm-right">User Name <span class="text-danger">*</span></label>
	                    <div class="col-12 col-sm-8 col-lg-6">
	                        <input type="text" name="u_name" required="" placeholder="Enter a user name" class="form-control">
	                    </div>
	                </div>



	                <div class="form-group row">
	                    <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail <span class="text-danger">*</span></label>
	                    <div class="col-12 col-sm-8 col-lg-6">
	                        <input type="email" name="u_email" required="" data-parsley-type="email" placeholder="Enter a valid e-mail" class="form-control">
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
	                    <div class="col-12 col-sm-8 col-lg-6">
	                        <input data-parsley-type="number" name="u_phone" type="text" required="" placeholder="Enter only numbers" class="form-control">
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Password <span class="text-danger">*</span></label>
	                    <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
	                        <input id="pass2" type="password" name="u_pass" required="" placeholder="Password" class="form-control">
	                    </div>
	                    <div class="col-sm-4 col-lg-3">
	                        <input type="password" name="uc_pass" required="" data-parsley-equalto="#pass2" placeholder="Re-Type Password" class="form-control">
	                    </div>
	                </div>

	                <div class="form-group row">
	                    <label class="col-12 col-sm-3 col-form-label text-sm-right">Permissions</label>
	                    <div class="col-12 col-sm-8 col-lg-6">
						    <select class="form-control" name="u_level" id="input-select">
						                                                   
						    <?php 
						        foreach ($permissions as $permission) {

						            echo '<option value="'.$permission->p_level.'">'.$permission->p_name.'</option>';
						        }
						    ?>
	                        </select>
                    	</div>
						</div>
	                </div>

	                <div class="form-group row text-right">
	                    <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
	                        <button type="submit" name="add" value="add" class="btn btn-space btn-primary">Submit</button>
	                        <button class="btn btn-space btn-secondary">Cancel</button>
	                    </div>
	                </div>
	            <?=form_close()?>
	        </div>
	    </div>
		<!-- // add user form // -->







	</div> <!-- close col 12 -->

    </div>
<!-- </div> -->