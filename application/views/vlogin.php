<style>
    .focused-form .static-sidebar-wrapper, .focused-form header, .focused-form footer{display: none;}
</style>

<div class="container" id="login-form">
    <a href="index-2.html" class="login-logo"><img src="<?php echo base_url(); ?>assets/img/logo-kalyt.jpg"></a>
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
			    <form action="<?php echo base_url("player/login-check");?>" class="form-horizontal" id="validate-form" method="post">
				<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<h2>Login Form</h2>
					</div>
					<div class="panel-body">
						
						
							<div class="form-group mb-md">
		                        <div class="col-xs-12">
		                        	<div class="input-group">							
										<span class="input-group-addon">
											<i class="ti ti-user"></i>
										</span>
										<!--<input type="text" class="form-control" name="username" placeholder="Username" data-parsley-minlength="6" placeholder="At least 6 characters" required>-->
						    <input class="form-control" placeholder="Username" id="username" name="username" type="text" required="required">
									</div>
		                        </div>
							</div>

							<div class="form-group mb-md">
		                        <div class="col-xs-12">
		                        	<div class="input-group">
										<span class="input-group-addon">
											<i class="ti ti-key"></i>
										</span>
										<!--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">-->
						    <input class="form-control" placeholder="Password" id="password" name="password" type="password" required="required">
									</div>
		                        </div>
							</div>

							
						
					</div>
					<div class="panel-footer">
						<div class="clearfix">
						    <input type="submit" class="btn btn-primary btn-raised pull-right" value="Login"/>							
						</div>
					</div>
				    </form>
				</div>
			</div>
		</div>
</div>