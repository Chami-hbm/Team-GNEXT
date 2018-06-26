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
<!--                                                            <p>Hello <?php // echo $this->session->userdata('name')
                                            ?></p>-->
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Sector</label>
                                                                <div class="col-sm-9">
                                                                    <select name="sector" id="sector"
                                                                            class="form-control select-box"
                                                                            title="Sector" data-placeholder="Select the
                                                                            sector" onchange="change_company_by_sector(this);">
                                                                        <option></option>
                                                                        <option value="IT">IT</option>
                                                                        <option value="Finance">Finance</option>
                                                                        <option value="HealthCare">HealthCare</option>
                                                                        <option value="Consumer Services">Consumer Services</option>
                                                                        <option value="Manufacturing">Manufacturing</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-sm-3">Company</label>
                                                                <div  id="select-div">
                                                                    <div class="col-sm-9">
                                                                        <select name="company" id="company"
                                                                                class="form-control select-box"
                                                                                title="Company" data-placeholder="Select the
                                                                                company">
                                                                            <option></option>
                                                                            <?php
                                                                            if ($companies) {
                                                                                foreach ($companies as $value) {
                                                                                    ?>
                                                                                    <option value="<?php echo $value['user_id']; ?>"><?php echo $value['company_name']; ?></option>
                                                                                    <?php
                                                                                }
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="col-sm-6">
                                                                    <button type="button" class="btn btn-info btn-lg"
                                                                            data-toggle="modal"
                                                                            data-target="#comparision" onclick="get_table();">
                                                                        View Comparison
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

<div  class="modal fade" id="comparision" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog"  role="document">
        <div  class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Comparison of Selected Company</h4>
            </div>
            <div class="modal-body" id="table-div">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    
    function get_table() {
        company = $('#company').val();
        sector = $('#sector').val();
        if (company != '') {
            type = 'company';
            value = company;
        } else if (sector != '') {
            type = 'sector1';
            value = sector;
        } else {
            type = 'all';
            value = 'none';
        }
        console.log(value);
        console.log(type);
        $('#table-div').load(base_url + 'players/view-current-historical-price-shares/list/' + value + '/' + type);
    }

    function change_company_by_sector(vall) {
        sector = $(vall).val();

        $('#select-div').load(base_url + 'players/view-current-historical-price-shares/select-box/' + sector);
        
    }
</script>