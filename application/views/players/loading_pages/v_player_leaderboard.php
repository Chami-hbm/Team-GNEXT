<table class="table-hover table table-bordered table-striped">
    <thead>
        <tr class="alert-info">
            <td>Player ID</td>
            <td>Name</td>
            <td>Current Balance</td>
        </tr>
    </thead>
    <tbody>
        <?php
        $winner1="";
        $winner2="";
        $max=0;
        if ($players) {
            foreach ($players as $value) {
                ?>
                <tr>
                    <td><?php echo $value['user_id']; ?></td>
                    <td><?php echo $value['name']; ?></td>
                    <td><?php echo $value['current_balance']; ?></td>
                </tr>
                <?php
                if($max<$value['current_balance']){
                    $max=$value['current_balance'];
                    $winner1 = $value['name'];
                }elseif ($max==$value['current_balance']) {
                    $winner2 = $value['name'];
                }
            }
        }
        ?>
                <tr>
                    <td><strong></strong></td>
                    <td></td>
                    <td><strong></strong></td>
                </tr>
                <tr>
                    <td><strong>Winner</strong></td>
                    <td></td>
                    <td><strong><?php echo $winner1; echo ($winner2!="")? ', '.$winner2:""; ?></strong></td>
                </tr>
    </tbody>
</table>