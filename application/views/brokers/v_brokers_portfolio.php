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
                                        <h4>Broker Dashboard</h4>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-sm-5">
                                            <?php echo $navigation_buttons ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group main_div" id="play_game_main_div">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h4 class="center">Portfolio of Players</h4>
                                                    </div>

                                                    <div class="panel-body">
                                                        <table class="table table-bordered table-striped table-hover">
                                                            <thead>
                                                                <tr class="alert-info">
                                                                    <th>Name</th>
                                                                    <th>ID</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                $tot=0;
                                                                $price=0;
//                                                                var_dump($details);
                                                                if ($details) {
                                                                    foreach ($details as $value) {
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $value['name']; ?></td>
                                                                            <td><?php echo $value['user_id']; ?></td>
                                                                            <td>Rs. <?php echo $value['price1']; ?></td>
                                                                            <td><?php echo $value['qty']; ?></td>
                                                                        </tr>
                                                                        <?php
                                                                        $tot+= $value['quantity']*$value['price'];
                                                                        $price+=$value['price'];
                                                                    }
                                                                }
                                                                ?>
                                                                <tr>
                                                                    <td colspan="2"><strong>Total</strong></td>
                                                                    <td>Rs. <?php echo $price; ?></td>
                                                                    <td>Rs. <?php echo $tot; ?></td>
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


<div class="modal fade" id="buy_stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><b>Should load all available shares in the market to
                        the grid from stock file</b></h4>
            </div>
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post"
                  class="form-horizontal">
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Enter Stock ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Quantity to be buying</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label bold col-sm-4"><b>Total cost of your Buying is</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <button type="button" class="btn btn-info">Buy</button>
                            <button type="button" data-dismiss="modal" class="btn ">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="sell_stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><b> Should load all current shares in hand of the
                        player from player’s stock file </b></h4>
            </div>
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post"
                  class="form-horizontal">
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Select the Company</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Quantity to be selling</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Cost per share</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label bold col-sm-4"><b>Total earning of your selling is</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <button type="button" class="btn btn-info">Sell</button>
                            <button type="button" data-dismiss="modal" class="btn ">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </form>
        </div>
    </div>
</div>