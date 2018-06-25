<style>
    .focused-form .static-sidebar-wrapper, .focused-form header, .focused-form footer {
        display: none;
    }
</style>

<div class="container" id="login-form">
    <center style="margin-top:50px">
        <a class="login-logo">
            <img src="<?php echo base_url(); ?>assets/img/gnext-logo.png" style="width:200px;height: auto"
                 align="center">
        </a>
    </center>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-4 col-md-offset-4">
            <form action="<?php echo base_url("login-check"); ?>" class="form-horizontal" id="validate-form"
                  method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>"
                       value="<?php echo $this->security->get_csrf_hash(); ?>">

                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #606060;">
                        <h2 style="color:#ffffff">Login Form</h2>
                    </div>
                    <div class="panel-body" style="background-color: #606060;">


                        <div class="form-group mb-md">
                            <div class="col-xs-12">
                                <div class="input-group">							
                                    <span class="input-group-addon">
                                        <i class="ti ti-user"></i>
                                    </span>
                                    <input class="form-control" placeholder="Email" id="email" name="email" type="email"
                                           required="required">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="ti ti-key"></i>
                                    </span>
                                    <!--<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">-->
                                    <input class="form-control" placeholder="Password" id="password" name="password"
                                           type="password" required="required">
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="panel-footer" style="background-color: #606060;">
                        <div class="clearfix">
                            <input type="submit" class="btn btn-primary btn-raised pull-right" value="Login" style="background-color: #0066cc;"/>
                        </div>
                        <hr/>
                        <a href="<?php echo base_url('/register'); ?>"
                           class="btn btn-primary btn-raised btn-block" style="background-color: #0066cc;">
                            Register
                        </a>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>