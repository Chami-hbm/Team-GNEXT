jQuery(document).ready(function() {

// Chartist

    var options = {
        low: 0,
        high: 20,
        showArea: true,
        showPoint: false,
        fullWidth: true,
        axisY: {
            labelInterpolationFnc: function(value) {
                return '$'+value+'k';
            },
            scaleMinSpace: 20
        },
        series: {
            'series-2': {
                showArea: true,
                showPoint: false,
                fullWidth: true,
            },
            'series-1': {
                fullWidth: true,
            }
        }
    };

    var data = {
        labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
        series: [{
            name: 'series-1',
            data: [5, 9, 7, 8, 5, 3, 5, 4, 5, 9, 7, 8]
        }, {
            name: 'series-2',
            data: [11,14,11,19,15,12,14,18,11,10,13,15]
        }]
    };

    new Chartist.Line("#fullChart", data, options);

    var data = {
        series: [1, 5]
    };

    var sum = function(a, b) { return a + b };

    new Chartist.Pie('#chartistPie', data, {
        labelInterpolationFnc: function(value) {
            return '';
        }
    });

    new Chartist.Line('#areaChart', {
        labels: [1, 2, 3, 4, 5, 6, 7],
        series: [
            [5, 9, 7, 8, 5, 3, 5]
        ]
    }, {
    low: 0,
    showArea: true,
    fullWidth: true,
    fullWidth: true,
    showPoint: false,
    colors:["#f44336"],
    axisY: {
        showGrid: false,
        showLabel: false,
        offset: 0
    },
        axisX:{
        showGrid: false,
        showLabel: false,
        offset: 0
      },

        lineSmooth: true,
    });

// Extrabar
    $("#layout-static .static-content-wrapper").append("<div class='extrabar-underlay'></div>");

// Calendar

    $('#calendar').datepicker({todayHighlight: true});

// Easypie chart
    try{
        $('.easypiechart#chart1').easyPieChart({
            barColor: "#00bcd4",
            trackColor: 'rgba(255,255,255,0.1)',
            scaleColor: 'transparent',
            scaleLength: 8,
            lineCap: 'round',
            lineWidth: 4,
            size: 144,
            onStep: function(from, to, percent) {
                $(this.el).find('.percent').text(Math.round(percent));
            }
        });
    }
    catch(e){}


    $('.progress-pie-chart').each(function(index, obj) {
        new Chartist.Pie(obj, {
            series: [$(obj).attr('data-percent'), 15]
        }, {
            labelInterpolationFnc: function(value) {
                return '';
            },
            width: '42px',
            height: '42px',
        });
    })

// Sparklines    
    var sparker = function() {
        var barSpacing = ($('#dailysales2').width() - 13*6)/13;
        $("#dailysales, #dailysales2").sparkline([5,6,7,2,0,4,2,4,6,8,1,4,6,4], {
            type: 'bar',
            height: '144px',
            width: '100%',
            barWidth: 4,
            barSpacing: Math.floor(barSpacing),
            barColor: 'rgba(255,255,255,0.3)'});

        $("#biglines").sparkline([11,5,8,13,10,12,5,9,11], {
            type: 'line',
            width: '100%',
            height: '106px',
            lineWidth: 0.01,
            lineColor: '#fff',
            fillColor: '#e0e0e0',
            highlightSpotColor: '#b0bec5',
            highlightLineColor: '#b0bec5',
            chartRangeMin: 0,chartRangeMax: 20,
            spotRadius: 0
        });
        $("#biglines").sparkline([9,5,10,8,12,5,12,7,10], {
            type: 'line',
            width: '100%',
            height: '106px',
            lineWidth: 0.01,
            lineColor: '#fff',
            fillColor: '#3f51b5',
            highlightSpotColor: '#546e7a',
            highlightLineColor: '#546e7a',
            chartRangeMin: 0,
            chartRangeMax: 20,
            composite: true,
            spotRadius: 0
        });



        $('#dashboard-sparkline-indigo').sparkline([5,2,4,9,3,4,7,2,6,4], { type: 'bar', barColor: 'rgba(255,255,255,0.5)', height: '48px',width: '100%', barWidth: 2, barSpacing: 4, spotRadius: 4, chartRangeMin: 1});
        $('#dashboard-sparkline-gray').sparkline([5,3,1,4,3,4,7,8,2,3], { type: 'bar', barColor: 'rgba(255,255,255,0.5)', height: '48px',width: '100%', barWidth: 2, barSpacing: 4, spotRadius: 4, chartRangeMin: 1});
        $('#dashboard-sparkline-primary').sparkline([1,3,2,9,1,6,5,2,6,9], { type: 'bar', barColor: 'rgba(255,255,255,0.5)', height: '48px',width: '100%', barWidth: 2, barSpacing: 4, spotRadius: 4, chartRangeMin: 1});
        $('#dashboard-sparkline-success').sparkline([2,5,4,9,6,3,7,1,5,1], { type: 'bar', barColor: 'rgba(255,255,255,0.5)', height: '48px',width: '100%', barWidth: 2, barSpacing: 4, spotRadius: 4, chartRangeMin: 1});
    }
    var sparkResize;
 
    $(window).resize(function(e) {
        clearTimeout(sparkResize);
        sparkResize = setTimeout(sparker, 500);
    });
    sparker();


});