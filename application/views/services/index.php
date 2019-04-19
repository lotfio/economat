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
	</div>
	
<div class="row"> <!-- services row holder -->

<?php if($services):?>
	
	<?php foreach($services as $srv):?>
	<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title"><?=$srv->s_name?></h3>
                
                <h6 class="card-subtitle mb-2 text-primary"><?=$srv->s_name?> Service</h6>
                <p class="card-text"><?=$srv->s_description?></p>
                <a href="<?=base_url()?>services/view/<?=$srv->s_id?>" class="card-link text-secondary">View Service</a>
            </div>
        </div>

    </div>
	<?php endforeach?>

<?php endif ?>
</div> <!-- end of services row -->







</div> <!-- close of col 12 -->

</div>
</div>
