<table class="table-striped table table-hover table-bordered" >
    <thead>
        <tr class="alert-info">
            <th>Player</th>
            <th>Type</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($details) {
            foreach ($details as $value) {
                ?>
                <tr>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['type'] ?></td>
                    <td><?php echo $value['amount'] ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>