<?php echo $header; ?>

<div id="wrapper">
    <div id="layout-static">
        <div class="static-content-wrapper">
            <div class="static-content">
                <div class="page-content">
<!--                    <ol class="breadcrumb">
                        <li class=""><a href="<?php echo base_url('player/inventory'); ?>">Home</a></li>
                        <li class="active"><a href="#">Banks</a></li>
                    </ol>

                    <div class="page-heading">
                        <h1>Banks
                            <small>Manage Banks</small>
                        </h1>

                        <div class="options"></div>
                    </div>-->

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-info">
                                    <div class="panel-heading">
                                        <h4>Player Dashboard</h4>
                                    </div>

                                    <div class="panel-body">
                                        <form action="<?php echo base_url('player/inventory/banks/insert'); ?>" class="form-horizontal" method="post">

                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <!--<div class="col-sm-1"></div>-->
                                                    <div class="com-sm-4">
                                                        <button type="button" class="btn btn-warning btn-lg" onclick="hide_all_main_div_and_display_one('play_game_main_div')">Play Game </button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="com-sm-4">
                                                        <button type="button" class="btn btn-warning btn-lg" onclick="hide_all_main_div_and_display_one('analyst_main_div')">Get analyst recommendation</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="com-sm-4">
                                                        <button type="button" class="btn btn-warning btn-lg" onclick="hide_all_main_div_and_display_one('bank_balance_main_div')">View current bank balance </button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="com-sm-4">
                                                        <button type="button" class="btn btn-warning btn-lg" onclick="hide_all_main_div_and_display_one('current_stock_main_div')">View current stocks/portfolio </button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="com-sm-4">
                                                        <button type="button" class="btn btn-warning btn-lg" onclick="hide_all_main_div_and_display_one('historical_price_main_div')" >View current and historical price and shares </button>
                                                    </div>
                                                    <!--<div class="col-sm-1"></div>-->

                                                </div>
                                            </div>
                                            <div class="col-sm-7">
                                                <div class="form-group main_div hide" id="play_game_main_div">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h4 class="center">Play Game</h4>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="col-sm-5">
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-info col-sm-8"  data-target="#buy_stock" data-toggle="modal" >Buy Stock</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" data-target="#sell_stock" data-toggle="modal" class="btn btn-info col-sm-8">Sell Stock</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-info col-sm-8">Get Analyst<br/>Recommendation</button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Time Remaining</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Round No</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-3">Number of Players</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group main_div hide" id="analyst_main_div">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h4 class="center">Get analyst recommendation</h4>
                                                        </div>

                                                        <div class="panel-body">

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group main_div hide" id="bank_balance_main_div">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h4 class="center">View current bank balance</h4>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="col-sm-1"></div>
                                                                <label class="control-label col-sm-2">Bank Account No.</label>
                                                                <div class="col-sm-4">
                                                                    <input type="number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-1"></div>
                                                                <label class="control-label col-sm-2">Your Balance</label>
                                                                <div class="col-sm-4">
                                                                    <input type="number" class="form-control">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-4"></div>
                                                                <button type="button" class="btn btn-info">Ok</button>
                                                                <button type="button" class="btn">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group main_div hide" id="current_stock_main_div">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h4 class="center">View current stocks/portfolio</h4>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="form-group">
                                                                <div class="table table-responsive">
                                                                    <table class="table table-bordered table-hover table-striped">
                                                                        <tr>
                                                                            <th>Sector</th>
                                                                            <th>Company</th>
                                                                            <th>Price</th>
                                                                            <th>Amount</th>
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
                                                            <div class="form-group">
                                                                <div class="col-sm-4"></div>
                                                                <button class="btn btn-info col-sm-offset-2 col-sm-2">OK</button>
                                                                <button class="col-sm-2 btn">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group main_div hide" id="historical_price_main_div">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <h4 class="center">View current and historical price and shares</h4>
                                                        </div>

                                                        <div class="panel-body">

                                                            <div class="col-sm-8">
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-4">Sector</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="select-box form-control">
                                                                            <option selected="" disabled="">Select Sector</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-sm-4">Company</label>
                                                                    <div class="col-sm-8">
                                                                        <select class="select-box form-control">
                                                                            <option selected="" disabled="">Select Company</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class=" col-sm-4">
                                                                <div class="form-group">
                                                                    <!--<div class="col-sm-2"></div>-->
                                                                    <button type="button" data-toggle="modal" data-target="#current_stock" class="col-sm-10 btn btn-info">View Current Price</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button" data-toggle="modal" data-target="#view_comparison" class="col-sm-10 btn btn-info">View Comparison</button>
                                                                </div>
                                                                <div class="form-group">
                                                                    <button type="button"  class="col-sm-10 btn ">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </form>
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit Bank</h4>
            </div>
            <form action="<?php echo base_url('player/inventory/banks/update'); ?>"
                  class="form-horizontal" method="post">

                <div class="modal-body">
                    <input type="hidden"
                           name="<?php echo $this->security->get_csrf_token_name(); ?>"
                           value="<?php echo $this->security->get_csrf_hash(); ?>">

                    <input type="hidden" name="edit_bank_id" id="edit_bank_id">

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-4 input-div">
                            <input type="text" name="edit_name" id="edit_name" class="form-control"/>
                        </div>

                        <label for="" class="col-sm-2 control-label">Branch</label>
                        <div class="col-sm-4 input-div">
                            <input type="text" name="edit_branch" id="edit_branch" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">Account No</label>
                        <div class="col-sm-4 input-div">
                            <input type="text" name="edit_acc_no" id="edit_acc_no" class="form-control">
                        </div>
                        <label for="" class="col-sm-2 control-label">Balance</label>
                        <div class="col-sm-4 input-div">
                            <input type="number" name="edit_balance" id="edit_balance" step="0.01"
                                   class="form-control">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>
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
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post" class="form-horizontal">
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
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post" class="form-horizontal">
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
                <h4 class="modal-title center" id="myModalLabel"><b>Should load all available shares in the market to the grid from stock file</b></h4>
            </div>
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post" class="form-horizontal">
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
                <h4 class="modal-title center" id="myModalLabel"><b> Should load all current shares in hand of the player from player’s stock file </b></h4>
            </div>
            <form action="<?php echo base_url('player/inventory/banks/delete'); ?>" method="post" class="form-horizontal">
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

<script>
    function hide_all_main_div_and_display_one(id_name) {
        $('.main_div').addClass('hide');
        $('#' + id_name).removeClass('hide');
    }


</script>