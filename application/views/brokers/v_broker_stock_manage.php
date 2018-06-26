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
                                                        <h4 class="center">Stock Management</h4>
                                                    </div>

                                                    <div class="panel-body">
                                                        <form action="">

                                                            <div class="row">
                                                                <div class="col-sm-12 text-center">
                                                                    <button type="button" class="btn btn-info btn-lg"
                                                                            data-toggle="modal"
                                                                            data-target="#add_stock">
                                                                        Add Stock
                                                                    </button>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <table class="table table-bordered table-striped table-hover">
                                                                    <thead>
                                                                        <tr class="alert-info">
                                                                            <th>Stock Name</th>
                                                                            <th>Original Quantity</th>
                                                                            <th>Current Quantity</th>
                                                                            <th>Previous Price</th>
                                                                            <th>Current Price</th>
                                                                            <th>Edit</th>
                                                                            <th>Delete</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $tot=0;
                                                                        $price=0;
        //                                                                var_dump($details);
                                                                        if ($company_stocks) {
                                                                            foreach ($company_stocks as $value) {
                                                                                ?>
                                                                                <tr>
                                                                    <input type="hidden" id="<?php echo $value['company_stock_id']; ?>-users_user_id" value="<?php echo $value['users_user_id']; ?>"/>
                                                                    <input type="hidden" id="<?php echo $value['company_stock_id']; ?>-company_stock_name" value="<?php echo $value['company_stock_name']; ?>"/>
                                                                    <input type="hidden" id="<?php echo $value['company_stock_id']; ?>-quantity" value="<?php echo $value['quantity']; ?>"/>
                                                                    <input type="hidden" id="<?php echo $value['company_stock_id']; ?>-price" value="<?php echo $value['price']; ?>"/>
                                                                    
                                                                                    <td><?php echo $value['company_stock_name']; ?></td>
                                                                                    <td><?php echo $value['original_quantity']; ?></td>
                                                                                    <td><?php echo $value['quantity']; ?></td>
                                                                                    <td>Rs. <?php echo $value['previous_price']; ?></td>
                                                                                    <td>Rs. <?php echo $value['price']; ?></td>
                                                                                    <td align="center">
                                                                                        <a href="#" onclick="confirm_edit('<?php echo $value['company_stock_id'] ?>')" data-toggle="modal" data-target="#add_stock" class=""><span class="fa fa-edit"></span></a>
                                                                                    </td>
                                                                                    <td align="center">
                                                                                        <a href="#" onclick="confirm_delete('<?php echo $value['company_stock_id'] ?>')" data-toggle="modal" data-target="#delete_stock" class="text-danger" ><span class="fa fa-remove"></span></a>
                                                                                    </td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </tbody>
                                                                </table>
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
<script>
function confirm_edit($id){            
    $("#company_stock_id").val($id) ;
    $("#company_stock_name").val($("#"+$id+"-company_stock_name").val());
    $("#quantity").val($("#"+$id+"-quantity").val()) ;
    $("#price").val($("#"+$id+"-price").val()) ;
}

function confirm_delete($id){            
    $("#delete_company_stock_id").val($id);
}
</script>

<!-- Modal -->
<div class="modal fade" id="add_stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Add Stock</h4>
            </div>
            <form action="<?php echo base_url('brokers/stock-management/save'); ?>" method="post" class="form-horizontal">
                <input type="hidden" id="company_stock_id" name="company_stock_id">
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label col-sm-4">Company Stock Name</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="company_stock_name" name="company_stock_name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Quantity</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-4">Price (Rs.)</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" name="price" min="0.00" step="0.01">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="delete_stock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Delete Stock</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this Stock Set ?</p>
            </div>
            <div class="modal-footer">
                <form class="form-horizontal" action="<?php echo base_url(); ?>brokers/stock-management/delete" method="post">
                    <input type="hidden" name="delete_company_stock_id" id="delete_company_stock_id" value="">

                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>