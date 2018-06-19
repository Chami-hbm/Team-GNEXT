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
                                                        <h4 class="center">Historical Price of Shares</h4>
                                                    </div>

                                                    <div class="panel-body">
                                                        <form action="">
                                                            <p>Hello <?php echo $this->session->userdata('name')
                                                                ?></p>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Sector</label>
                                                                <div class="col-sm-9">
                                                                    <select name="sector" id="sector"
                                                                            class="form-control select-box"
                                                                            title="Sector" data-placeholder="Select the
                                                                             sector">
                                                                        <option></option>
                                                                        <option value="it">IT</option>
                                                                    </select>
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
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <button type="button" class="btn btn-primary btn-lg"
                                                                            data-toggle="modal"
                                                                            data-target="#current_price">
                                                                        View Current Price
                                                                    </button>
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <button type="button" class="btn btn-primary btn-lg"
                                                                            data-toggle="modal"
                                                                            data-target="#comparision">
                                                                        View Comparision
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </form>
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
<div class="modal fade" id="current_price" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Current Stock Price</h4>
            </div>
            <div class="modal-body">
                <table class="table-hover table table-bordered table-striped">
                    <thead>
                    <tr class="alert-info">
                        <td>Sector</td>
                        <td>Company</td>
                        <td>Price</td>
                        <td>Qty</td>
                    </tr>
                    </thead>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="comparision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Comparision of Selected Company</h4>
            </div>
            <div class="modal-body">
                <table class="table-hover table table-bordered table-striped">
                    <thead>
                    <tr class="alert-info">
                        <td>Before</td>
                        <td>Now</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>70</td>
                        <td>150</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>