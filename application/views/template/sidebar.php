    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
      <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                   
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link <?=$this->uri->segment(1) == 'dashboard'? 'active' :''?> " href="<?=base_url()?>dashboard"><i class="fa fa-fw fa-user-circle"></i>Dashboard</a>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link <?=$this->uri->segment(1) == 'users'? 'active' :''?> " href="<?=base_url()?>users"><i class="fa fa-fw fa-users"></i>Users</a>
                            </li>

                             <li class="nav-item ">
                                <a class="nav-link <?=$this->uri->segment(1) == 'command'? 'active' :''?> " href="<?=base_url()?>command"><i class="fa fa-fw fa-users"></i>Command</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->