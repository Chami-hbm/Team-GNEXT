<!-- /Switcher -->
    <!-- Load site level scripts -->

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js"></script> -->

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 								<!-- Load Bootstrap -->
<script src="<?php echo base_url(); ?>assets/js/enquire.min.js"></script> 									<!-- Load Enquire -->

<script src="<?php echo base_url(); ?>assets/plugins/velocityjs/velocity.min.js"></script>					<!-- Load Velocity for Animated Content -->
<script src="<?php echo base_url(); ?>assets/plugins/velocityjs/velocity.ui.min.js"></script>

<script src="<?php echo base_url(); ?>assets/plugins/progress-skylo/skylo.js"></script> 		<!-- Skylo -->

<script src="<?php echo base_url(); ?>assets/plugins/wijets/wijets.js"></script>     						<!-- Wijet -->

<script src="<?php echo base_url(); ?>assets/plugins/sparklines/jquery.sparklines.min.js"></script> 			 <!-- Sparkline -->

<script src="<?php echo base_url(); ?>assets/plugins/codeprettifier/prettify.js"></script> 				<!-- Code Prettifier  -->

<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-tabdrop/js/bootstrap-tabdrop.js"></script>  <!-- Bootstrap Tabdrop -->

<script src="<?php echo base_url(); ?>assets/plugins/nanoScroller/js/jquery.nanoscroller.min.js"></script> <!-- nano scroller -->

<script src="<?php echo base_url(); ?>assets/plugins/dropdown.js/jquery.dropdown.js"></script> <!-- Fancy Dropdowns -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-design/js/material.min.js"></script> <!-- Bootstrap Material -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-material-design/js/ripples.min.js"></script> <!-- Bootstrap Material -->

<script src="<?php echo base_url(); ?>assets/js/application.js"></script>
<script src="<?php echo base_url(); ?>assets/demo/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/demo/demo-switcher.js"></script>

 <!-- Jasny Bootstrap JS -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<!-- End loading site level scripts -->
    
    <!-- Load page level scripts-->
    
<!-- Charts -->
<script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.min.js"></script>                 <!-- Flot Main File -->
<script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.pie.min.js"></script>             <!-- Flot Pie Chart Plugin -->
<script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.stack.min.js"></script>           <!-- Flot Stacked Charts Plugin -->
<script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.resize.min.js"></script>          <!-- Flot Responsive -->
<script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.tooltip.min.js"></script>         <!-- Flot Tooltips -->
<script src="<?php echo base_url(); ?>assets/plugins/charts-flot/jquery.flot.spline.js"></script>              <!-- Flot Curved Lines -->
<script src="<?php echo base_url(); ?>assets/plugins/easypiechart/jquery.easypiechart.min.js"></script>        <!-- EasyPieChart-->
<script src="<?php echo base_url(); ?>assets/plugins/curvedLines-master/curvedLines.js"></script>              <!-- marvinsplines -->

<script src="<?php echo base_url(); ?>assets/plugins/form-daterangepicker/moment.min.js"></script>             <!-- Moment.js for Date Range Picker -->

                 <!-- Date Range Picker -->
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>               <!-- Datepicker -->
 <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>  
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-timepicker/bootstrap-timepicker.js"></script>

<link href="<?php echo base_url(); ?>assets/plugins/clockface/css/clockface.css" type="text/css" rel="stylesheet">                   	<!-- Clockface -->
<script src="<?php echo base_url(); ?>assets/plugins/clockface/js/clockface.js"></script>
<!--<script src="<?php echo base_url(); ?>assets/plugins/date-timepicker/js/bootstrap-datetimepicker.min.js"></script>-->

<!-- <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>   -->    <!-- jVectorMap -->
<!-- <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>  --> <!--World Map-->
<!--<script src="<?php echo base_url(); ?>assets/plugins/chartist/dist/chartist.min.js"></script>  chartist -->
<!--<script src="<?php echo base_url(); ?>assets/demo/demo-index.js"></script>                                      Initialize scripts for this page-->

<!--select 2-->
<script src="<?php echo base_url(); ?>assets/plugins/form-select2/select2.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/form-validation/jquery.validate.min.js"></script>

<script src="<?php echo base_url('assets/plugins/form-parsley/parsley.js'); ?>"></script>
    <!-- End loading page level scripts-->
    
<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

<!--<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>-->
<!--<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>-->
<script src="<?php echo base_url(); ?>assets/demo/demo-datatables.js"></script>

<script src="<?php echo base_url(); ?>assets/js/custom-scripts.js"></script>

<?php

if(isset($scripts)){
     foreach ($scripts as $script) { 
         if($script['src']!=""){
?>
        <script src="<?php echo $script['src']; ?>"></script>      
<?php   
         }
     }
} ?>


    </body>

</html>