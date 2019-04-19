<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                Are You Sure You want to delete This Service
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cancel</button>
                <a class="btn btn-secondary btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


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
	            </ol>
	        </nav>
	    </div>

<?php if(strtolower($user->u_level) == 'administrator' OR strtolower($user->u_level) == 'editor'):?>
	    <div style="margin-top: 20px">
	    	<a href="<?=base_url()?>services/add" class="btn btn-primary mt-50">Add Service</a>
	    </div>
	</div>
<?php endif ?>


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

<div class="row"> <!-- services row holder -->

<?php if($services):?>

	<?php foreach($services as $srv):?>
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
            	<div style="display:flex; justify-content: space-between;">
                	<h3 class="card-title"><?=$srv->s_name?></h3>
	                <div class="dropdown float-right">
	                    <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown" aria-expanded="false">
	                            <i class="mdi mdi-dots-vertical"></i>
	                                 </a>
	                    <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(14px, 19px, 0px); top: 0px; left: 0px; will-change: transform;">
	                        <!-- item-->
	                        <a href="<?=base_url()?>services/edit/<?=$srv->s_id?>" class="dropdown-item text-info"><i class="fa fa-fw fa-edit text-info"></i> Edit</a>
	                        <!-- item-->
	                        <a href="#" data-href="<?=base_url()?>services/delete/<?=$srv->s_id?>" class="dropdown-item text-danger" 
	                        data-toggle="modal" data-target="#confirm-delete"><i class="fa fa-fw fa-trash text-danger"></i> Delete</a>
	                    </div>
	                </div>
	            </div>
                <h6 class="card-subtitle mb-2 text-primary"><?=$srv->s_name?> Service</h6>
               
                <p class="card-text"><?=$srv->s_description?></p>
                <!-- <a href="<?=base_url()?>services/view/<?=$srv->s_id?>" class="card-link text-secondary">View Service</a>-->
            </div>
        </div>

    </div>
	<?php endforeach?>

<?php else: ?>
	<div class="col-md-12">
		<div class="alert alert-warning" role="alert">
		    No Services Were Found !
		</div>
	</div>
<?php endif ?>
</div> <!-- end of services row -->



</div> <!-- close of col 12 -->

</div>
</div>