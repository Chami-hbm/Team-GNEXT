$(function() {
    var data = {
        series: [1, 5]
    };

    var sum = function(a, b) { return a + b };

    new Chartist.Pie('#chartistPie', data, {
        labelInterpolationFnc: function(value) {
            return '';
        }
    });

    new Chartist.Line('#areaChart2', {
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
    colors:["#9c27b0"],
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
})