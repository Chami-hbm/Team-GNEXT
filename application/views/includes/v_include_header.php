<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="description" content="Paper - Material Admin Theme">
    <meta name="author" content="KaijuThemes">

    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon_1.ico">

    <link type='text/css' href='http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500' rel='stylesheet'>
    <link type='text/css'  href="https://fonts.googleapis.com/icon?family=Material+Icons"  rel="stylesheet"> 

    <link href="<?php echo base_url(); ?>assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet">        <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>assets/css/styles.css" type="text/css" rel="stylesheet">                                     <!-- Core CSS with all styles -->

    <link href="<?php echo base_url(); ?>assets/plugins/codeprettifier/prettify.css" type="text/css" rel="stylesheet">                <!-- Code Prettifier -->

    <link href="<?php echo base_url(); ?>assets/plugins/dropdown.js/jquery.dropdown.css" type="text/css" rel="stylesheet">            <!-- iCheck -->
    <link href="<?php echo base_url(); ?>assets/plugins/progress-skylo/skylo.css" type="text/css" rel="stylesheet">                   <!-- Skylo -->

    <!--[if lt IE 10]>
        <script src="<?php echo base_url(); ?>assets/js/media.match.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/respond.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/placeholder.min.js"></script>
    <![endif]-->
    <!-- The following CSS are included as plugins and can be removed if unused-->
    
<link href="<?php echo base_url(); ?>assets/plugins/form-daterangepicker/daterangepicker-bs3.css" type="text/css" rel="stylesheet">    <!-- DateRangePicker -->
<link href="<?php echo base_url(); ?>assets/plugins/fullcalendar/fullcalendar.css" type="text/css" rel="stylesheet">                   <!-- FullCalendar -->
<link href="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" type="text/css" rel="stylesheet">
<link href="<?php echo base_url(); ?>assets/less/card.less" type="text/css" rel="stylesheet"> 

<!--select2-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/form-select2/select2.css" type="text/css"/>

<link href="<?php echo base_url(); ?>assets/plugins/chartist/dist/chartist.min.css" type="text/css" rel="stylesheet"> <!-- chartist -->
<link href="<?php echo base_url(); ?>assets/css/custom-styles.css" type="text/css" rel="stylesheet"> <!-- custome -->

<?php 
 
if(isset($styles)){
     foreach ($styles as $style) { 
         if($style['href']!=""){
?>
        <link href="<?php echo $style['href']; ?>" rel='stylesheet' type='text/css'>      
<?php   
         }
     }
} 
?>
	
        <!-- Jasny Bootstrap CSS -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
       
	
<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.min.js"></script> 							<!-- Load jQuery -->
<script src="<?php echo base_url(); ?>assets/js/jqueryui-1.10.3.min.js"></script> 							<!-- Load jQueryUI -->
<script type="text/javascript">
    $(document).ready(function (){
       base_url = '<?php echo base_url(); ?>';
    });
</script>

<script src="<?php echo base_url(); ?>assets/js/easytimer.min.js"></script>
<script>
    var timerInstance = new Timer();
</script>

    </head>
    <body class="<?php if(isset($form_class)){ echo $form_class; } ?> animated-content">
    <!--<body class="<?php if(isset($form_class)){ echo $form_class; } ?> animated-content sidebar-collapsed">-->