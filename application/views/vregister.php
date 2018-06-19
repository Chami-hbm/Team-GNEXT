<style>
    .focused-form .static-sidebar-wrapper, .focused-form header, .focused-form footer {
        display: none;
    }
</style>

<div class="container" id="register-form">
    <center style="margin-top:50px">
        <a class="login-logo">
            <img src="<?php echo base_url(); ?>assets/img/gnext-logo.png" style="width:200px;height: auto"
                 align="center">
        </a>
    </center>
    <div class="row" style="margin-top: 20px">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>User Registration</h2>
                </div>
                <div class="panel-body">
                    Select the User type
                    <select name="user_type_select" id="user_type_select" class="form-control select-box" data-placeholder="Select user type" title="User Type">
                        <option value="" selected disabled>Select the User Type</option>
                        <option value="player">Player</option>
                        <option value="broker">Broker</option>
                    </select>

                    <form action="<?php echo base_url("register/save"); ?>" class="form-horizontal validation" id="broker-form" style="display: none;" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <input type="hidden" name="user_type" id="user_type_broker" value="brokers">

                        <div class="form-group">
                            Select the Company
                            <select name="company" id="company" class="form-control select-box" data-placeholder="Select Company" title="Select Company" required>
                                <option value="" selected disabled>Select the Company</option>
                                <?php
                                if (isset($companies)) {
                                    foreach ($companies as $row) {
                                        echo '<option value="' . $row['user_id'] . '">' . $row['company_name'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" title="Name" placeholder="Enter your name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" title="Email" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" title="Password" name="password" id="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" title="Password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm your password" data-parsley-equalto="#password" required>
                        </div>

                        <input type="submit" class="btn btn-primary btn-raised pull-right" value="Register"/>

                    </form>

                    <form action="<?php echo base_url("register/save"); ?>" class="form-horizontal validation" id="player-form" style="display: none;" method="post">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <input type="hidden" name="user_type" id="user_type_player" value="players">
                        <input type="hidden" name="player_type" id="player_type_player" value="human">

                        <div class="form-group">
                            <input type="text" name="name" id="name" class="form-control" title="Name" placeholder="Enter your name" required>
                        </div>

                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control" title="Email" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <input type="password" title="Password" name="password" id="p-password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" title="Password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm your password" data-parsley-equalto="#p-password" required>
                        </div>
                        <div class="form-group">
                            <input type="number" name="initial_balance" id="initial_balance" placeholder="Enter your initial balance" title="Initial Balance" class="form-control">
                        </div>

                        <input type="submit" class="btn btn-primary btn-raised pull-right" value="Register"/>

                    </form>
                </div>
                <div class="panel-footer">
                    <hr/>
                    <a href="<?php echo base_url('/login'); ?>" class="btn btn-primary btn-raised btn-block">
                        Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#user_type_select').on('change', function () {
            const value = this.value;
            if ($(`form`).is(':visible')) {
                $('form').slideUp('slow', function () {
                    $('#' + value + '-form').slideDown('slow');
                });
            } else {
                $('#' + value + '-form').slideDown('slow');
            }
        })
    });
</script>