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
<header id="topnav" class="navbar navbar-default navbar-fixed-top" role="banner">
    
    <div class="logo-area">
        <a class="navbar-brand navbar-brand-info" href="<?php echo $dashboard_url; ?>">
            <img class="show-on-collapse img-logo-white" alt="Paper" src="<?php echo base_url(); ?>assets/img/logo-icon-white.png">
            <img class="show-on-collapse img-logo-dark" alt="Paper" src="<?php echo base_url(); ?>assets/img/logo-icon-dark.png">
            <!--		    <img class="img-white" alt="Paper" src="--><?php //echo base_url(); ?><!--assets/img/logo-white.png">-->
            <h3 class="text-center"><?php echo $usertype; ?></h3>
            <img class="img-dark" alt="Paper" src="<?php echo base_url(); ?>assets/img/logo-dark.png">
            <!--<img src="<?php echo base_url(); ?>assets/img/gnext-logo.png" class="img-responsive"/>-->
        </a>
        
        <?php //
//        if(isset($type_of_page)) {
//            if($type_of_page != 'designers') {
                ?>
<!--            <span id="trigger-sidebar" class="toolbar-trigger toolbar-icon-bg stay-on-search">
                <a data-toggle="tooltips" data-placement="right" title="Toggle Sidebar">
                    <span class="icon-bg">
                        <i class="material-icons">menu</i>
                    </span>
                <div class="ripple-container"></div></a>
            </span>-->
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