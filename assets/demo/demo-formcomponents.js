// -------------------------------
// Demos: Form Components
// -------------------------------

$(function() {
	//Credit Card
	$('form.card').card({ container: $('.card-wrapper')})
	//FSEditor
	$(".fullscreen").fseditor({maxHeight: 500});

	// Autogrow Textarea
	$('textarea.autosize').autosize({append: "\n"});

	//Credit Card
	$('form.cardy').card({ container: $('.card-wrapper')})

	//Typeahead for Autocomplete
	var substringMatcher = function(strs) {
	  return function findMatches(q, cb) {
	    var matches, substrRegex;
	 
	    // an array that will be populated with substring matches
	    matches = [];
	 
	    // regex used to determine if a string contains the substring `q`
	    substrRegex = new RegExp(q, 'i');
	 
	    // iterate through the pool of strings and for any string that
	    // contains the substring `q`, add it to the `matches` array
	    $.each(strs, function(i, str) {
	      if (substrRegex.test(str)) {
	        // the typeahead jQuery plugin expects suggestions to a
	        // JavaScript object, refer to typeahead docs for more info
	        matches.push({ value: str });
	      }
	    });
	 
	    cb(matches);
	  };
	};
	 
	var states = ['Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
	  'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia', 'Hawaii',
	  'Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky', 'Louisiana',
	  'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
	  'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
	  'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
	  'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island',
	  'South Carolina', 'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont',
	  'Virginia', 'Washington', 'West Virginia', 'Wisconsin', 'Wyoming'
	];
	 
	$('.example-countries').typeahead({
	  hint: true,
	  highlight: true,
	  minLength: 1
	},
	{
	  name: 'states',
	  displayKey: 'value',
	  source: substringMatcher(states)
	});


	//Tokenfield

	var engine = new Bloodhound({
		local: [{value: 'red'}, {value: 'blue'}, {value: 'green'} , {value: 'yellow'}, {value: 'violet'}, {value: 'brown'}, {value: 'purple'}, {value: 'black'}, {value: 'white'}],
		datumTokenizer: function(d) {
			return Bloodhound.tokenizers.whitespace(d.value); 
		},
		queryTokenizer: Bloodhound.tokenizers.whitespace    
	});

	engine.initialize();


	$('#tokenfield-typeahead').tokenfield({
		typeahead: [null, { source: engine.ttAdapter() }]
	});


	$('#tokenfield-email')
	  .on('tokenfield:createtoken', function (e) {
	    var data = e.attrs.value.split('|')
	    e.attrs.value = data[1] || data[0]
	    e.attrs.label = data[1] ? data[0] + ' (' + data[1] + ')' : data[0]
	  })
	  .on('tokenfield:createdtoken', function (e) {
	    // Über-simplistic e-mail validation
	    var re = /\S+@\S+\.\S+/
	    var valid = re.test(e.attrs.value)
	    if (!valid) {
	      $(e.relatedTarget).addClass('invalid')
	    }
	  })
	  .on('tokenfield:edittoken', function (e) {
	    if (e.attrs.label !== e.attrs.value) {
	      var label = e.attrs.label.split(' (')
	      e.attrs.value = label[0] + '|' + e.attrs.value
	    }
	  })
	  .on('tokenfield:removedtoken', function (e) {
	    alert('Token removed! Token value was: ' + e.attrs.value)
	  })
	  .tokenfield();


	//Touchspin
	 $("input#touchspin1").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        boostat: 5,
        maxboostedstep: 10,
        postfix: '%'
    });
	 $("input#touchspin2").TouchSpin({
        min: -1000000000,
        max: 1000000000,
        stepinterval: 50,
        maxboostedstep: 10000000,
        prefix: '$'
    });
	$("input#touchspin3").TouchSpin({
      verticalbuttons: true
    });
    $("input#touchspin4").TouchSpin({
      verticalbuttons: true,
      verticalupclass: 'fa fa-fw fa-plus',
      verticaldownclass: 'fa fa-fw fa-minus'
    });

    // Chained Select Boxes
    $("#series").chained("#mark");
	$("#model").chained("#series");


	//SELECT2

	//For detailed documentation, see: http://ivaynberg.github.io/select2/index.html

	//Populate all select boxes with from select#source
	var opts=$("#source").html(), opts2="<option></option>"+opts;
	$("select.populate").each(function() { var e=$(this); e.html(e.hasClass("placeholder")?opts2:opts); });

	//select2
	$("#e1, #e2").select2({width: '100%'});

	$("#e3").select2({
		minimumInputLength: 2,
		width: '100%'
	});

	$("#e5").select2({
		minimumInputLength: 1,
		width: '100%',
		query: function (query) {
			var data = {results: []}, i, j, s;
			for (i = 1; i < 5; i++) {
				s = "";
				for (j = 0; j < i; j++) {s = s + query.term;}
					data.results.push({id: query.term + i, text: s});
			}
			query.callback(data);
		}
	});

	$("#e12").select2({width: "100%", tags:["red", "white", "purple", "orange", "yellow"]});


	$("#e9").select2({width: '100%'});



	//Rotten Tomatoes Infinite Scroll + Remote Data example
	$("#e7").select2({
		placeholder: "Search for a movie",
		minimumInputLength: 3,
		width: '100%',
		ajax: {
			url: "http://api.rottentomatoes.com/api/public/v1.0/movies.json",
			dataType: 'jsonp',
			quietMillis: 100,
					data: function (term, page) { // page is the one-based page number tracked by Select2
						return {
									q: term, //search term
									page_limit: 10, // page size
									page: page, // page number
									apikey: "q7jnbsc56ysdyvvbeanghegk" // please do not use so this example keeps working
								};
							},
							results: function (data, page) {
							var more = (page * 10) < data.total; // whether or not there are more results available

							// notice we return the value of more so Select2 knows if more results can be loaded
							return {results: data.movies, more: more};
						}
					},
					formatResult: movieFormatResult,
					formatSelection: movieFormatSelection,
			dropdownCssClass: "bigdrop", // apply css that makes the dropdown taller
			escapeMarkup: function (m) { return m; } // we do not want to escape markup since we are displaying html in results
		});


	//MULTISELECT2

	// For detailed documentatin, see: loudev.com

	// $('#multi-select2').multiSelect();

	// $('#multi-select').multiSelect({
	// 	selectableHeader: "<input type='text' class='form-control' style='margin-bottom: 10px;'  autocomplete='off' placeholder='Filter entries...'>",
	// 	selectionHeader: "<input type='text' class='form-control' style='margin-bottom: 10px;' autocomplete='off' placeholder='Filter entries...'>",
	// 	afterInit: function(ms){
	// 		var that = this,
	// 		$selectableSearch = that.$selectableUl.prev(),
	// 		$selectionSearch = that.$selectionUl.prev(),
	// 		selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
	// 		selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

	// 		that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
	// 		.on('keydown', function(e){
	// 			if (e.which === 40){
	// 				that.$selectableUl.focus();
	// 				return false;
	// 			}
	// 		});

	// 		that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
	// 		.on('keydown', function(e){
	// 			if (e.which == 40){
	// 				that.$selectionUl.focus();
	// 				return false;
	// 			}
	// 		});
	// 	},
	// 	afterSelect: function(){
	// 		this.qs1.cache();
	// 		this.qs2.cache();
	// 	},
	// 	afterDeselect: function(){
	// 		this.qs1.cache();
	// 		this.qs2.cache();
	// 	}
	// });


});








function movieFormatResult(movie) {
	var markup = "<table class='movie-result'><tr>";
	if (movie.posters !== undefined && movie.posters.thumbnail !== undefined) {
		markup += "<td class='movie-image'><img src='" + movie.posters.thumbnail + "'/></td>";
	}
	markup += "<td class='movie-info'><div class='movie-title'>" + movie.title + "</div>";
	if (movie.critics_consensus !== undefined) {
		markup += "<div class='movie-synopsis'>" + movie.critics_consensus + "</div>";
	}
	else if (movie.synopsis !== undefined) {
		markup += "<div class='movie-synopsis'>" + movie.synopsis + "</div>";
	}
	markup += "</td></tr></table>"
	return markup;
}

function movieFormatSelection(movie) {
	return movie.title;
}