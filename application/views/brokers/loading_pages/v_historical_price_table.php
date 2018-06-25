<table class="table-hover table table-bordered table-striped">
    <thead>
        <tr class="alert-info">
            <td>Stock</td>
            <td>Company</td>
            <td>Quantity</td>
            <td>Previous Price</td>
            <td>Current Price</td>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($details) {
            foreach ($details as $value) {
                ?>
                <tr>
                    <td><?php echo $value['company_stock_name']; ?></td>
                    <td><?php echo $value['company_name']; ?></td>
                    <td><?php echo $value['quantity']; ?></td>
                    <td><?php echo $value['previous_price']; ?></td>
                    <td><?php echo $value['price']; ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>