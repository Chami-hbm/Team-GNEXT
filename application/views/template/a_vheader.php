<?php
if(isset($usertype)) {
    if($usertype === "players") {
        $dashboard_url = base_url() . 'player/play-game';
    }
    if($usertype === "brokers") {
        $dashboard_url = base_url() . 'broker';
    }
    $logout_url = base_url() . 'logout';
}
?>
<script>
    $.get("<?php echo base_url() ?>clock/clock-time-getting", function(data) {
            var data = JSON.parse(data);
            if (data.current_clock_value == "00:03:00") {
//                $('#leaderboard_timer').load("<?php echo base_url() ?>clock/view-player-leaderboard"); 
//                $('#play-game-heading').html('Game Leaderboard');
                $('.nav_buttons').attr('disabled','disabled');
                $('#game-over-msg').removeClass('hide'); 
                
            }
    });
    timer.addEventListener('targetAchieved', function (e) {
        $('#turns').html('10 Turns completed. Game Over!!');
    });
</script>
<header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner" style="background: #a0a0a0;color:#000099">
    
    <div class="logo-area">
        <a class="navbar-brand navbar-brand-info" href="<?php echo $dashboard_url; ?>">
            <img class="show-on-collapse img-logo-white" alt="Paper" src="<?php echo base_url(); ?>assets/img/logo-icon-white.png">
            <img class="show-on-collapse img-logo-dark" alt="Paper" src="<?php echo base_url(); ?>assets/img/logo-icon-dark.png">
            <img class="img-white" alt="Paper" src="<?php echo base_url(); ?>assets/img/gnext-logo.png" style="width: 100px;height: auto;margin-top: 10px;">
            
            <img src="<?php echo base_url(); ?>assets/img/gnext-logo.png" class="img-responsive"/>
            <img class="img-dark" alt="Paper" src="<?php echo base_url(); ?>assets/img/logo-dark.png">
            <!--<img src="<?php echo base_url(); ?>assets/img/gnext-logo.png" class="img-responsive"/>-->
        </a>
        
        <?php //
//        if(isset($type_of_page)) {
//            if($type_of_page != 'designers') {
                ?>
            <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg stay-on-search">
                <h2 style="width: 500px;margin-left: 20px">Hello, <?php echo $this->session->userdata['name'] ?></h2>
<!--                <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                    <span class="icon-bg">
                        <i class="material-icons">menu</i>
                    </span>
                <div class="ripple-container"></div></a>-->
            </span>
        <?php // }
//        }
        ?>
    
    </div>
    
    <ul class="nav navbar-nav toolbar pull-right">
        
        <li class="toolbar-icon-bg appear-on-search ov-h" id="trigger-search-close">
            <a class="toggle-fullscreen"><span class="icon-bg">
	        	<i class="material-icons">close</i>
	        </span></i></a>
        </li>
        <li class="toolbar-icon-bg hidden-xs" id="trigger-fullscreen">
            <a href="#" class="toggle-fullscreen"><span class="icon-bg">
	        	<i class="material-icons">fullscreen</i>
	        </span></i></a>
        </li>
        
        
        <li class="toolbar-icon-bg" id="trigger-infobar">
            <a href="<?php echo $logout_url; ?>" data-toggle="tooltips" data-placement="right" title="Logout">
				<span class="icon-bg">
				    <i class="fa fa-sign-out fa-2x"></i>
				</span>
            </a>
        </li>
        <!--		<li class="toolbar-icon-bg" id="trigger-infobar">
                    <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                        <span class="icon-bg">
                            <i class="material-icons">more_vert</i>
                        </span>
                    </a>
                </li>-->
    
    </ul>

</header>