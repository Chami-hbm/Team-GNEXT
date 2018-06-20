<script>
    var timer = new Timer();
    var turns = 0;
    var secs = 0;
    timer.start({precision: 'seconds', startValues: {seconds: 0}, target: {seconds: 600}});
    $('#time').html(timer.getTimeValues().toString());
    timer.addEventListener('secondsUpdated', function (e) {
        secs++;
        if(secs==60){
            secs = 0;
            turns++;
            console.log(turns);
            $('#progress_bar').html(turns);
        }
        $('#time').html(timer.getTimeValues().toString());
    });
    timer.addEventListener('targetAchieved', function (e) {
        $('#progress_bar').html('COMPLETE!!');
    });
</script>



<div>
    <div id="time"></div>
    <div id="progress_bar"></div>
</div>