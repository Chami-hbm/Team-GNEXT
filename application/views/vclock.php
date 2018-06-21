<script>
    var timer = new Timer();
    var turns = 1;
    var secs = 0;
    timer.start({precision: 'seconds', startValues: {seconds: 0}, target: {seconds: 600}});
    $('#time').html(timer.getTimeValues().toString());
    $.get("<?php echo base_url() ?>clock/reset-turns", function() {});
    timer.addEventListener('secondsUpdated', function (e) {
        secs++;
        if (secs == 60) {
            secs = 0;
            turns++;
            console.log(turns);
            $('#turns').html(turns);
        }
        $('#time').html(timer.getTimeValues().toString());
        $('#turns').html(turns);
    });
    timer.addEventListener('targetAchieved', function (e) {
        $('#turns').html('10 Turns completed. Game Over!!');
    });
</script>


<div class="row" style="margin-top: 20px">
    <div class="col-md-6 col-md-offset-3">
        <form action="" class="form-horizontal" id="validate-form" >
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 style="font-size: 15px;">Game Clock & Turns</h2>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label col-sm-4">Time</label>
                        <label class="control-label col-sm-8" id="time"></label>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-4">Turns</label>
                        <label class="control-label col-sm-8" id="turns"></label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
