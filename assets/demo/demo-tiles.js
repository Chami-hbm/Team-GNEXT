$(function() {
	// Sparklines
    var sparker = function() {
        $("#pierightbar").sparkline([1,1,1,1], {
            type: 'pie',
            width: '24',
            height: '24',
            sliceColors: ['#eeeeee','#eeeeee','#3f51b5','#eeeeee']
        });

        $("#barrightbar").sparkline([2,6,2,4,0,7,4,5], {
            type: 'bar',
            width: '24',
            barSpacing: 3,
            barColor: '#4caf50'
        });
        $("#linerightbar").sparkline([6,7,5,8,7], {
            type: 'line',
            width: '64',
            lineColor: '#00bcd4',
            fillColor: '#b2ebf2',
            spotColor: 'transparent',
            minSpotColor: 'transparent',
            maxSpotColor: 'transparent'
        });

        $('.tile-line').each(function (index, elem) {
            var data = [Math.ceil(Math.random()*10), Math.ceil(Math.random()*10), Math.ceil(Math.random()*10),
                        Math.ceil(Math.random()*10), Math.ceil(Math.random()*10), Math.ceil(Math.random()*10),
                        Math.ceil(Math.random()*10), Math.ceil(Math.random()*10), Math.ceil(Math.random()*10),
                        Math.ceil(Math.random()*10)];
            $(elem).sparkline(data, { type: 'bar', barColor: 'rgba(255,255,255,0.5)', height: '48px',width: '100%', barWidth: 2, barSpacing: 4, spotRadius: 4, chartRangeMin: 1});
        });

        $('.tile-pie').each(function (index, elem) {
            var data = [Math.ceil(Math.random()*10), Math.ceil(Math.random()*10), Math.ceil(Math.random()*10)];
            $(elem).sparkline(data, { type: 'pie', height: '56px',width: '56px', sliceColors: ['#78909c','#e0e0e0','#546e7a']});
        });
    };

    sparker();
});