<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"></div>
            <div class="modal-body">
                Are You Sure You want to delete This User
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
    <h3 class="mb-2">Economat commands</h3>

    <div class="page-breadcrumb">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url()?>commands" class="breadcrumb-link">commands</a></li>
            </ol>
        </nav>
    </div>
</div>

<!-- show commands table -->
<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-head">
                                <h5 class="card-header">commands Tabel</h5>
                                <?php if($user->u_level == 'Administrator'):?>
                                    <a href="<?=base_url()?>commands/add" class="btn btn-brand btn-table">Add Command</a>
                                <?php endif?>
                            </div>
                            
                            <div class="card-body">

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



                                <?php if(is_array($commands)): // if there is commands ?>

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered first">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Service</th>
                                                <th>Agent</th>
                                                <th>Number of articles</th>
                                                <th>Issue date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                        <?php foreach($commands as $cmd):?>

                                                <tr> <!-- row -->
                                                <th><?=$cmd->c_id?></th>
                                                <th><?=$cmd->s_name?></th>
                                                <th><?=$cmd->u_name?></th>
                                                <th><?=$cmd->u_level?></th>
                                                <th><?=$cmd->c_request_date?></th>



                                                <td>
                                                    <a href="<?=base_url()?>commands/info/<?=$cmd->u_id?>"><span class="badge badge-info">Info</span></a>
                                                <?php if($user->u_level == 'Administrator'):?>
                                                        <a href="<?=base_url()?>commands/update/<?=$cmd->u_id?>"><span class="badge badge-success">update</span></a>
        
        <a data-href="<?=base_url()?>commands/delete/<?=$cmd->u_id?>" data-toggle="modal" data-target="#confirm-delete"

        ><span class="badge badge-secondary pointer">delete</span></a>



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
            <!-- end show commands table -->
        </div>
    </div>
</div>