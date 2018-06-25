<script>
    console.log('data.current_clock_value');
    var timer = new Timer();
    var turns = 1;
    var secs = 0;
    timer.start({precision: 'seconds', startValues: {seconds: 0}, target: {seconds: 900}});
    $('#time').html(timer.getTimeValues().toString());
//    $.get("<?php echo base_url() ?>clock/reset-turns", function() {});
    timer.addEventListener('secondsUpdated', function (e) {
//        secs++;
        $.get("<?php echo base_url() ?>clock/clock-time-getting", function(data) {
            var data = JSON.parse(data);
            if (data.current_clock_value == "00:15:00") {
                $('#leaderboard_timer').load("<?php echo base_url() ?>clock/view-player-leaderboard"); 
                $('#play-game-heading').html('Game Leaderboard');
                $('.nav_buttons').attr('disabled','disabled');
                $('#game-over-msg').removeClass('hide'); 
                
            }else{
                $('#time').val(data.current_clock_value);
                $('#turns').val(data.current_turn);            
                $('#game-over-msg').addClass('hide'); 
            }  
        });
    });
    timer.addEventListener('targetAchieved', function (e) {
        $('#turns').html('10 Turns completed. Game Over!!');
    });
</script>
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
                                                        <h4 class="center" id="play-game-heading">Play Game</h4>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="row" id="leaderboard_timer">
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
<!--                                                                <div class="form-group row">
                                                                    <button type="button" class="btn btn-info col-sm-8">
                                                                        Get Analyst<br/>Recommendation
                                                                    </button>
                                                                </div>-->
                                                            </div>
                                                            <div class="col-sm-7">
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Time
                                                                        Remaining</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="time">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Round
                                                                        No</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" id="turns">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label class="control-label col-sm-3">Number of
                                                                        Players</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control" value="3">
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
                                <h4 class="modal-title center" id="myModalLabel"><b> Buy Shares</b></h4>
            </div>
            <form action="<?php echo base_url('players/stocks/buy/save'); ?>" method="post" class="form-horizontal">
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Select the Stock</label>
                            <div class="col-sm-8">
                                <!--<select name="company_stocks_company_stock_id" id="company_stocks_company_stock_id"  class="form-control select-box" data-placeholder="Select Company" title="Select Company" required>-->
                                <select name="company_stocks_company_stock_id" onchange="price_calculation()"  id="company_stocks_company_stock_id" onchange="check_company_default();" class="form-control select-box" data-placeholder="Select Company" title="Select Company" required>
                                    <option value="" selected disabled>Select the Stock</option>
                                    <?php
                                    if (isset($stocks)) {
                                        foreach ($stocks as $row) {
                                            echo '<option value="' . $row['company_stock_id'] . '" data-price="' . $row['price'] . '"  data-quantity="' . $row['quantity'] . '" data-default="' . $row['company_default'] . '" data-company="' . $row['company_name'] . '">' . $row['company_name'] . ' | ' . $row['company_stock_name'] . ' | ' . $row['quantity'] . ' | ' . $row['price'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Quantity to be buying</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" id="buy_quantity" name="quantity" onchange="price_calculation()" onkeyup="this.onchange();" onpaste="this.onchange();" oninput="this.onchange();" min="1" value="1">
                            </div>
                        </div>
                        <div class="alert alert-primary hide" id="buy-validation-msg">
                          <strong>You are going to spend more than your current balance</strong>
                        </div>
                        <div class="alert alert-primary hide" id="qty-validation-msg">
                          <strong>You are going to buy more than the quantity available on the stock</strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label bold col-sm-4"><b>Total cost of your Buying is Rs.</b></label>
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
                            <label class="control-label bold col-sm-4"><b>Enter your bid Rs.</b></label>
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
                            <label class="control-label bold col-sm-4"><b>Total cost of your Buying is Rs.</b></label>
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
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><b> Sell Shares</b></h4>
            </div>
            <form action="<?php echo base_url('players/stocks/sell/save'); ?>" method="post"
                  class="form-horizontal">
                <div class="modal-body">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label class="control-label col-sm-4">Select the Stock</label>
                            <div class="col-sm-8">
                                <select name="player_stock_id" id="player_stock_id" class="form-control select-box" onchange="set_company_id();" title="Select Stock" required>
                                    <option value="" selected disabled>Select the Stock</option>
                                    <?php
                                    if (isset($stock_for_sell)) {
                                        foreach ($stock_for_sell as $row) {
                                            echo '<option value="' . $row['player_stock_id'] . '" data-price="' . $row['price'] . '"  data-quantity="' . $row['quantity'] . '" data-stock-id="' . $row['company_stocks_company_stock_id'] . '" data-company="' . $row['company_name'] . '">' . $row['company_name'] . ' | ' . $row['company_stock_name'] . ' | ' . $row['quantity'] . ' | ' . $row['price'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="company_stock_id" id="company_stock_id">
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Cost per share Rs.</label>
                            <div class="col-sm-8">
                                <input type="text" id="sell-cost" onkeyup="cal_total_selling();" readonly name="sell-cost" class="form-control">
                            </div>
                        </div>
                        <div class="alert alert-primary hide" id="sell-qty-validation-msg">
                          <strong>You are going to sell more than the quantity available on the stock</strong>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-4">Quantity to be selling</label>
                            <div class="col-sm-8">
                                <input type="text" id="sell-qty" onkeyup="cal_total_selling();" name="sell-qty" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label bold col-sm-4"><b>Total earning of your selling is Rs.</b></label>
                            <div class="col-sm-8">
                                <input type="text" id="sell_total" name="sell_total" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3"></div>
                            <button type="submit" class="btn btn-info" id="sell_submit">Sell</button>
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
            console.log($('#bid-form').serialize());
            $.ajax({
                type: 'POST',
                data: $('#bid-form').serialize(),
                url: "<?php echo base_url('players/stocks/bid-buy/save'); ?>",
                success: function(data) {
                    console.log(data);
                    if (data == 0) {
                        $('#winning-player').modal('toggle');
                        $('#biding').modal('toggle');
                        $('#winning-status').html('Congrats, You win the bid');
                    } else {
                        $('#winning-player').modal('toggle');
                        $('#biding').modal('toggle');
                        $('#winning-status').html('Sorry, You lost the bid');
                    }
                }
            });
        });
    });

    function price_calculation() {
        quantity = $("#buy_quantity").val();
        price = parseFloat($('#company_stocks_company_stock_id option:selected').data('price'));
        possible_qty = parseFloat($('#company_stocks_company_stock_id option:selected').data('quantity'));
        total = (parseFloat(quantity * price)).toFixed(2);
        total2 = (quantity * price);
        if(total2<=<?php echo $player_balance ?>){
            $('#price').val($('#company_stocks_company_stock_id option:selected').data('price'));
            $("#total").val(total);
            $("#buy_stock_submit").removeAttr('disabled');
            $('#buy-validation-msg').addClass('hide');
        }else{
            $("#total").val(total);
            $("#buy_stock_submit").attr('disabled','disabled');
            $('#buy-validation-msg').removeClass('hide');
        }
        if(quantity<=possible_qty){
//            console.log('Total is :'+total2);
//            console.log('Balance is :'+<?php echo $player_balance ?>);
//            $("#total").val(total);
//            $('#price').val($('#company_stocks_company_stock_id option:selected').data('price'));
            $("#total").val(total);
            $("#buy_stock_submit").removeAttr('disabled');
            $('#qty-validation-msg').addClass('hide');
        }else{
            $("#total").val(total);
            $("#buy_stock_submit").attr('disabled','disabled');
            $('#qty-validation-msg').removeClass('hide');
        }
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

        $('#total_bid').val((bid * qty));
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
    
    function cal_total_selling(){
        id=$('#player_stock_id option:selected').data('stock-id');
        cost=$('#sell-cost').val();
        qty=$('#sell-qty').val();
//        total = qty*cost;
        total = (parseFloat(qty * cost)).toFixed(2);
        
        if (qty == '') {
            qty = 0;
        }
        if (cost == '') {
            cost = 0;
        }
        possible_qty = parseFloat($('#player_stock_id option:selected').data('quantity'));
        if(qty<=possible_qty){
//            console.log('Total is :'+total2);
//            console.log('Balance is :'+<?php echo $player_balance ?>);
            $("#sell_total").val(total);
//            $('#price').val($('#company_stocks_company_stock_id option:selected').data('price'));
            $("#sell_submit").removeAttr('disabled');
            $('#sell-qty-validation-msg').addClass('hide');
        }else{
            $("#sell_total").val(total);
            $("#sell_submit").attr('disabled','disabled');
            $('#sell-qty-validation-msg').removeClass('hide');
        }
//        $('#sell_total').val(cost*qty);
    }
    
    function set_company_id(){
        id=$('#player_stock_id option:selected').data('stock-id');
        cost=$('#player_stock_id option:selected').data('price');
        $('#company_stock_id').val(id);
        $('#sell-cost').val(cost);
        
        cal_total_selling();
    }
</script>