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
<script>
$('#company').select2();
</script>