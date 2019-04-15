<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ECONOMAT | LOGIN </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?=base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?=base_url()?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?=base_url()?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?=base_url()?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
 </head>

 <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="<?=base_url()?>"><img class="logo-img" src="<?=base_url()?>assets/images/logo.jpg" alt="logo" width="100%"></a></div>
            <div class="card-body">

               <?=form_open('login/proceed')?>

                   <!-- show error messages if the form validation fails -->
                    <?php if ($this->session->flashdata()) { ?>
                        <div class="alert alert-danger">
                            <?=$this->session->flashdata('msg'); ?>
                        </div>
                    <?php } ?>

                    <div class="form-group">
                        <input name="u_email" class="form-control form-control-lg" id="username" type="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input name="u_pass" class="form-control form-control-lg" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input name="u_remember" class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
    
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                <?=form_close()?>
            </div>
            <div class="card-footer bg-white p-0  ">
                <!--<div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div> -->
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>

    <script src="<?=base_url()?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>