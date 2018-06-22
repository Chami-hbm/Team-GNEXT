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
                                        <h4>Player Dashboard</h4>
                                    </div>

                                    <div class="panel-body">
                                        <div class="col-sm-5">
                                            <?php echo $navigation_buttons ?>
                                        </div>
                                        <div class="col-sm-7">
                                            <div class="form-group main_div" id="play_game_main_div">
                                                <div class="panel panel-info">
                                                    <div class="panel-heading">
                                                        <h4 class="center">Play Game</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-sm-5">
                                                                <div class="form-group row">
                                                                    <button type="button" class="btn btn-info col-sm-8"
                                                                            data-target="#buy_stock"
                                                                            data-toggle="modal">Buy Stock
                                                                    </button>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <button type="button" data-target="#sell_stock"
                                                                            data-toggle="modal"
                                                                            class="btn btn-info col-sm-8">Sell Stock
                                                                    </button>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <button type="button" class="btn btn-info col-sm-8">
                                                                        Get Analyst<br/>Recommendation
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Time
                                                                        Remaining</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Round
                                                                        No</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Number of
                                                                        Players</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <!--                <h4 class="modal-title center" id="myModalLabel"><b>Should load all available shares in the market to
                                        the grid from stock file</b></h4>-->
            </div>
            <form action="<?php echo base_url('players/stocks/buy/save'); ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Select the Stock</label>
                            <div class="col-sm-8">
                                <!--<select name="company_stocks_company_stock_id" id="company_stocks_company_stock_id"  class="form-control select-box" data-placeholder="Select Company" title="Select Company" required>-->
                                <select name="company_stocks_company_stock_id" id="company_stocks_company_stock_id" onchange="check_company_default();" class="form-control select-box" data-placeholder="Select Company" title="Select Company" required>
                                    <option value="" selected disabled>Select the Stock</option>
                                    <?php
                                    if (isset($stocks)) {
                                        foreach ($stocks as $row) {
                                            echo '<option value="' . $row['company_stock_id'] . '" data-price="' . $row['price'] . '" data-default="' . $row['company_default'] . '" data-company="' . $row['company_name'] . '">' . $row['company_name'] . ' | ' . $row['company_stock_name'] . ' | ' . $row['quantity'] . ' | ' . $row['price'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Quantity to be buying</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="quantity" name="quantity" onchange="price_calculation(this.value)" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label bold col-sm-4"><b>Total cost of your Buying is</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  id="total" name="total" readonly="readonly">
                            </div>
                            <input type="hidden" id="price" name="price" >
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <button type="submit" class="btn btn-info" disabled id="buy_stock_submit">Buy</button>
                            <button type="button" data-dismiss="modal" class="btn ">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="biding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><b>
                        Hello Player, There is another buyer willing to buy this stock. Please enter your bid:
                    </b></h4>
            </div>
            <!--<form action="<?php echo base_url('players/stocks/bid-buy/save'); ?>" method="post" class="form-horizontal" id="bid-form">-->
            <form  class="form-horizontal" id="bid-form">
                <div class="modal-body">
                    <div class="col-sm-12">
                        <input type="hidden" id="stock_id_bid" name="stock_id_bid">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Current share point</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" id="share_point" name="share_point">
                            </div>
                        </div>
                        <div class="alert alert-primary hide" id="bid-validation-msg">
                          <strong>You have placed a lower bid than the Current Share Point and we have increased it for the minimum value</strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label bold col-sm-4"><b>Enter your bid</b></label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" onkeyup="change_total_cost('bid');" id="bid" name="bid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Quantity to be buying</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="quantity_bid" onkeyup="change_total_cost('qty');" name="quantity_bid">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label bold col-sm-4"><b>Total cost of your Buying is</b></label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  id="total_bid" name="total_bid" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <button type="button" class="btn btn-info" id="bid-btn">Buy</button>
                            <button type="button" data-dismiss="modal" class="btn ">Cancel</button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="winning-player" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><b id="winning-status"></b></h4>
            </div>
            <div class="form-group">
                <div class="col-sm-9"></div>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
            </div>
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
            <form action="<?php echo base_url('players/stocks/sell/save'); ?>" method="post"
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


<script>
    $(document).ready(function() {
        $('#bid-btn').click(function() {
            $.ajax({
                type: 'POST',
                data: $('#bid-form').serialize(),
                url: "<?php echo base_url('players/stocks/bid-buy/save'); ?>",
                success: function(data) {
                    if (data == 'ai') {
                        $('#winning-player').modal('toggle');
                        $('#biding').modal('toggle');
                        $('#winning-status').html('Sorry, You lost the bid');
                    } else {
                        $('#winning-player').modal('toggle');
                        $('#biding').modal('toggle');
                        $('#winning-status').html('Congrats, You win the bid');
                    }
                }
            });
        });
    });

    function price_calculation($quantity) {
        quantity = $quantity;
        price = parseFloat($('#company_stocks_company_stock_id option:selected').data('price'));
        total = (parseFloat(quantity * price)).toFixed(2);

        $("#total").val(total);
        $('#price').val($('#company_stocks_company_stock_id option:selected').data('price'));
        $("#buy_stock_submit").removeAttr('disabled');
    }

    function change_total_cost(element) {
        qty = $('#quantity_bid').val();
        bid = $('#bid').val();
        if(element=="qty" && bid<$('#bid').attr('min')){
            $('#bid-validation-msg').removeClass('hide');
            $('#bid').val(parseFloat($('#bid').attr('min'))+1)
        }else{
            $('#bid-validation-msg').addClass('hide');
        }
        if (qty == '') {
            qty = 0;
        }
        if (bid == '') {
            bid = 0;
        }

        $('#total_bid').val(bid * qty);
    }

    function check_company_default() {
        status = $('#company_stocks_company_stock_id option:selected').data('default');
        company = $('#company_stocks_company_stock_id option:selected').data('company');
        price = $('#company_stocks_company_stock_id option:selected').data('price');
        stock = $('#company_stocks_company_stock_id').val();

        if (status === 'Yes') {
            $('#buy_stock').modal('toggle');
            $('#biding').modal('toggle');
            $('#share_point').val(price);
            $('#bid').attr('min', price);
            $('#stock_id_bid').val(stock);
        }
    }
</script>