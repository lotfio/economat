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
                                <h5 class="card-header">Validation Types</h5>
                                <div class="card-body">
                                    <form id="validationform" data-parsley-validate="" novalidate="">
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">User Name</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" required="" placeholder="Type something" class="form-control">
                                            </div>
                                        </div>
 


                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">E-Mail</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="email" required="" data-parsley-type="email" placeholder="Enter a valid e-mail" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Phone Number</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input data-parsley-type="number" type="text" required="" placeholder="Enter only numbers" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Password</label>
                                            <div class="col-sm-4 col-lg-3 mb-3 mb-sm-0">
                                                <input id="pass2" type="password" required="" placeholder="Password" class="form-control">
                                            </div>
                                            <div class="col-sm-4 col-lg-3">
                                                <input type="password" required="" data-parsley-equalto="#pass2" placeholder="Re-Type Password" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Alphanumeric</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
											    <select class="form-control" id="input-select">
											        <option>Large select</option>
											    </select>
											</div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">User Image</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                               <div class="custom-file mb-3">
	                                                <input type="file" class="custom-file-input" id="customFile">
	                                                <label class="custom-file-label" for="customFile">Image</label>
                                            	</div>
                                            </div>
                                        </div>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                                <button type="submit" class="btn btn-space btn-primary">Submit</button>
                                                <button class="btn btn-space btn-secondary">Cancel</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
		<!-- // add user form // -->







	</div> <!-- close col 12 -->

    </div>
</div>