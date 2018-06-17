<style>
    .focused-form .static-sidebar-wrapper, .focused-form header, .focused-form footer{display: none;}
</style>

<div class="container" id="login-form">
    <center style="margin-top:20px">
        <a class="login-logo">
            <img src="<?php echo base_url(); ?>assets/img/gnext-logo.png" style="width:200px;height: auto" align="center">
        </a>
        
    </center>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-4 col-md-offset-4">
            <form action="<?php echo base_url("player/login-check"); ?>" class="form-horizontal" id="validate-form" method="post">
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
                                    <input class="form-control" placeholder="Email" id="username" name="username" type="email" required="required">
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