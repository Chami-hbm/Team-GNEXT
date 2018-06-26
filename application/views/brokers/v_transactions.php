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
                                                        <h4 class="center">Player's Transactions</h4>
                                                    </div>

                                                    <div class="panel-body">
                                                        <form action="">
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Player</label>
                                                                <div class="col-sm-9">
                                                                    <select name="player" id="player"
                                                                            class="form-control select-box"
                                                                            title="Player" data-placeholder="Select the
                                                                            Player" onclick="get_player_table(this);">
                                                                        <option></option>
                                                                        <?php 
                                                                        if($players){
                                                                            foreach ($players as $value) {
                                                                                
                                                                        ?>
                                                                        <option value="<?php echo $value['user_id']; ?>"><?php echo $value['name']; ?></option>
                                                                        <?php
                                                                        
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <div id="table-div">
                                                        
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
<script>
function get_player_table(vall){
    player=$(vall).val();
    $('#table-div').load(base_url+'brokers/players-transactions/list/'+player);
    
}

</script>
