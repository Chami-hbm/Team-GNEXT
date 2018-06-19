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
                                                                <label class="control-label col-sm-3">Player ID</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                           name="player_id" id="player_id"
                                                                           placeholder="Enter Player ID"
                                                                           title="Player ID">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control"
                                                                           name="name" id="name" title="Name"
                                                                           placeholder="Enter name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Company</label>
                                                                <div class="col-sm-9">
                                                                    <select name="company" id="company"
                                                                            class="form-control select-box"
                                                                            title="Company" data-placeholder="Select the
                                                                             company">
                                                                        <option></option>
                                                                        <option value="1">Company 1</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        
                                                        <table class="table-striped table table-hover table-bordered">
                                                            <thead>
                                                            <tr class="alert-info">
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                                <th></th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
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
