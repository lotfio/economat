<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
    

<div class="row">

<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

	<div class="page-header">
	    <h3 class="mb-2"><span class="text-info"></span> Services </h3>

	    <div class="page-breadcrumb">
	        <nav aria-label="breadcrumb">
	            <ol class="breadcrumb">
	                <li class="breadcrumb-item"><a href="<?=base_url()?>users" class="breadcrumb-link">Services</a></li>
	                <li class="breadcrumb-item">Edit</li>
	            </ol>
	        </nav>
	    </div>

	</div>


<!-- add service form -->
	<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
	<div class="card"> 
		<h5 class="card-header">Add Service</h5>

		<div class="card-body">
			<?=form_open(base_url().'services/proceededit/'.$srv->s_id)?>
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
		        <div class="form-group">
		            <label for="inputUserName">Service Name</label>
		            <input id="inputUserName" type="text" name="s_name" value="<?=$srv->s_name?>" data-parsley-trigger="change" required="" placeholder="Enter service name" autocomplete="off" class="form-control">
		        </div>
				<div class="form-group">
				    <label for="exampleFormControlTextarea1">Service Description</label>
				    <textarea name="s_description" class="form-control" placeholder="Enter service discription" id="exampleFormControlTextarea1" rows="3"><?=$srv->s_description?></textarea>
				</div>

				<div class="row">
				    <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0"></div>
				    <div class="col-sm-6 pl-0">
				        <p class="text-right">
				            <button type="submit" name="add" value="add" class="btn btn-space btn-primary">Submit</button>
				            <button class="btn btn-space btn-secondary">Cancel</button>
				        </p>
				    </div>
				</div>
		    <?=form_close()?>
		</div>
	</div>
</div>
	<!-- end add service form -->






	</div> <!-- col 12 -->
</div>
</div>