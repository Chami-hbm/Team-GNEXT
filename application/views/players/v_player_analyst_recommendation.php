<?php echo $header; ?>

<div id="wrapper">
    <div id="layout-static">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4>Analyst Recommendation</h4>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-sm-5">
                                            <?php echo $navigation_buttons ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group main_div" id="play_game_main_div">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h4 class="center">Recommended Stocks to Buy</h4>
                                                    </div>

                                                    <div class="panel-body">
                                                        <table class="table table-bordered table-striped table-hover data_table">
                                                            <thead>
                                                                <tr class="alert-info">
                                                                    <th>Sector</th>
                                                                    <th>Company</th>
                                                                    <th>Stock Name</th>
                                                                    <th>Previous Price</th>
                                                                    <th>Current Price</th>
                                                                    <th>Increment %</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $qty_tot=0;
                                                                $price_tot=0;
                                                                if (isset($buy_set)) {
                                                                    foreach ($buy_set as $value) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $value['company_sector'] ?></td>
                                                                            <td><?php echo $value['company_name'] ?></td>
                                                                            <td><?php echo $value['company_stock_name'] ?></td>
                                                                            <td><?php echo $value['previous_price'] ?></td>
                                                                            <td><?php echo $value['price'] ?></td>
                                                                            <td><?php echo number_format((float)((($value['price']-$value['previous_price'])/$value['previous_price'])*100), 2, '.', '').'%'; ?></td>
                                                                            <td><?php echo $value['quantity'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                $qty_tot+=$value['quantity'];
                                                                $price_tot+=$value['price']*$value['quantity'];
                                                                    }
                                                                }
                                                                ?>
                                                            <tbody>
                                                        </table>
<!--                                                        <table class="table table-bordered table-striped table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <td><strong>Total</strong></td>
                                                                    <td><?php echo $price_tot; ?></td>
                                                                    <td><?php echo $qty_tot; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>-->
                                                    </div>
                                                </div>
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h4 class="center">Recommended Stocks to Sell</h4>
                                                    </div>

                                                    <div class="panel-body">
                                                        <table class="table table-bordered table-striped table-hover data_table">
                                                            <thead>
                                                                <tr class="alert-info">
                                                                    <th>Sector</th>
                                                                    <th>Company</th>
                                                                    <th>Stock Name</th>
                                                                    <th>Previous Price</th>
                                                                    <th>Current Price</th>
                                                                    <th>Decrement %</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $qty_tot=0;
                                                                $price_tot=0;
                                                                if (isset($sell_set)) {
                                                                    foreach ($sell_set as $value) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $value['br_company_sector'] ?></td>
                                                                            <td><?php echo $value['br_company_name'] ?></td>
                                                                            <td><?php echo $value['company_stock_name'] ?></td>
                                                                            <td><?php echo $value['cs_previous_price'] ?></td>
                                                                            <td><?php echo $value['cs_price'] ?></td>
                                                                            <td><?php echo number_format((float)((($value['cs_price']-$value['cs_previous_price'])/$value['cs_previous_price'])*100*(-1)), 2, '.', '').'%'; ?></td>
                                                                            <td><?php echo $value['ps_quantity'] ?></td>
                                                                        </tr>
                                                                        <?php
                                                                $qty_tot+=$value['quantity'];
                                                                $price_tot+=$value['price']*$value['quantity'];
                                                                    }
                                                                }
                                                                ?>
                                                            <tbody>
                                                            </table>
                                                            <table class="table table-bordered table-striped table-hover">
                                                                <tbody>
                                                                <tr>
                                                                    <td><strong>Total</strong></td>
                                                                    <td><?php echo $price_tot; ?></td>
                                                                    <td><?php echo $qty_tot; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- #page-content -->
            </div>

            <?php echo $footer; ?>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="view_comparison" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><b>Current Stock Price</b></h4>
            </div>
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post"
                  class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="table table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Sector</th>
                                    <th>Current</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                                <tr>
                                    <td>IT</td>
                                    <td>Datavail</td>
                                    <td>150</td>
                                    <td>10</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="current_stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><b>Comparison of ABC Company shows</b></h4>
            </div>
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post"
                  class="form-horizontal">
                <div class="modal-body">
                    <div class="form-group">
                        <div class="table table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <tr>
                                    <th>Before</th>
                                    <th>Now</th>
                                </tr>
                                <tr>
                                    <td>150</td>
                                    <td>10</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $(".data_table").dataTable( {
          "pageLength": 3
        } );
    });
</script>
    