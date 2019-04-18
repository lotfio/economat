<div class="dashboard-wrapper">
<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

<div class="page-header">
    <h3 class="mb-2">Economat Users</h3>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>users" class="breadcrumb-link">Users</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- show users table -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-head">
                                <h5 class="card-header">Users Tabel</h5>
                                <?php if($user->u_level == 'Administrator'):?>
                                    <a href="<?=base_url()?>users/add" class="btn btn-brand btn-table">Add User</a>
                                <?php endif?>
                            </div>
                            
                            <div class="card-body">

                                <?php if(is_array($users)): // if there is users ?>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>User Name</th>
                                                <th>Email</th>
                                                <th>Phone Number</th>
                                                <th>Permissions level</th>
                                                <th>Join date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php foreach($users as $usr):?>

                                                <tr> <!-- row -->
                                                <th><?=$usr->u_name?></th>
                                                <th><?=$usr->u_email?></th>
                                                <th><?=$usr->u_phone?></th>
                                                <th><?=$usr->u_level?></th>
                                                <th><?=$usr->u_join_date?></th>



                                                <td>
                                                    <a href="<?=base_url()?>users/info/<?=$usr->u_id?>"><span class="badge badge-info">Info</span></a>
                                                <?php if($user->u_level == 'Administrator'):?>
                                                        <a href="<?=base_url()?>users/update/<?=$usr->u_id?>"><span class="badge badge-success">update</span></a>
                                                        <a href="<?=base_url()?>users/delete/<?=$usr->u_id?>"><span class="badge badge-secondary">delete</span></a>
                                                <?php endif?>
                                                </td>
                                                </tr> <!-- end row -->
                                            <?php endforeach;?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                                <?php else:?>
    
                                <?php endif ?>
                            </div>
                        </div>
                    </div>


            <nav aria-label="Page navigation example">
                <?php echo $links; ?>    
            </nav>
            <!-- end show users table -->
        </div>
    </div>
</div>