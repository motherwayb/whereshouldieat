$(function () {
	window.near_me = false;
	$('#form1').on('submit', function (e) {
		//stop page refresh
		e.preventDefault();
		var inputs = $('#form1 :input');
		var values = {};
		
		inputs.each(function() {
			values[this.name] = $(this).val();
		});

		var keyword = values['food-type'];
		var searchBusinessArray = {};
		var businessDetails = {};
		var dublin = new google.maps.LatLng(53.350140,-6.266155);

		var map = new google.maps.Map(document.getElementById('google-map-results'), {
			center: dublin,
			zoom: 15
		});

		var request = {
			location: dublin,
			radius: '500',
			query: 'restaurant'
		};

		var service = new google.maps.places.PlacesService(map);
		service.textSearch(request, callback);

		function callback(results, status) {
			searchBusinessArray = results;
			var randomPlaceId = results[Math.floor(Math.random()*results.length)]['place_id'];
			var placeRequest = { placeId: randomPlaceId };
			service.getDetails(placeRequest, getDetails);
		}

		function getDetails(results, status) {
			var randomPlace = results;
			businessDetails = {
				'name': randomPlace['name'] || '',
				'opening_hours': randomPlace['opening_hours']['weekday_text'] || '',
				'rating': randomPlace['rating'] || '',
				'map_url': randomPlace['url'] || '',
				'address': randomPlace['formatted_address'] || '',
				'phone': randomPlace['formatted_phone_number'] || '',
				'website': randomPlace['website'] || ''
			}

			document.getElementById("search-business-name").innerHTML = businessDetails['name'];
			document.getElementById("search-food-type").innerHTML = keyword;
			document.getElementById("search-address").innerHTML = businessDetails['address'];
			document.getElementById("search-phone").innerHTML = businessDetails['phone'];
			document.getElementById("search-website").innerHTML = businessDetails['website'];
			$("#search-website").attr("href", businessDetails['website']);
			$("#search-map").attr("src", businessDetails['map_url']+'&ie=UTF8&output=embed');
			document.getElementById("search-rating").innerHTML = businessDetails['rating'];
			document.getElementById("search-opening-hours").innerHTML = businessDetails['opening_hours'];
			$('#portfolioModalSearch').modal('toggle');
		}
	});
	//When user clicks "near me" this brings them to food type thumbnails and sets their location in the background using showPosition()
	$('.choice1 a').click(function(e) {
		document.getElementById('load').style.visibility="visible";
		window.near_me = true;
		navigator.geolocation.getCurrentPosition(showPosition);
		$('html, body').animate({
		        scrollTop: $('#food-thumbnails').offset().top
		}, 2500);

		function showPosition(position) {
			window.lat = position.coords.latitude;
			window.long = position.coords.longitude;
			document.getElementById('load').style.visibility="hidden";
			console.log(position.coords.latitude, position.coords.longitude);
		}
	});
	$(".choice2").click(function(event) {
	    $('.choice2').html("<input type='text' id='test' placeholder='Enter Location' onclick='initialize()' />");
	    $('#test').focus();
	    event.stopPropagation();
	});
	$('.choice3 a').click(function(e) {
		$('html, body').animate({
		        scrollTop: $('#food-thumbnails').offset().top
		}, 2500);
	});
	$('.food-type-thumbnail').click(function (e) {
		e.preventDefault();
		var type = $(this).data('type');
		var href = $(this).attr('href');

		//if user chooses "near me"
		if (window.near_me === true) {
			//gets user's location
			var loc = new google.maps.LatLng(window.lat,window.long);
			// var loc = new google.maps.LatLng(53.3980234,-6.2352455);
			var area = new google.maps.Map(document.getElementById('google-map-results'), {
				center: loc,
				zoom: 15
			});
			var req = {
				location: loc,
				radius: '1000',
				type: 'restaurant',
				keyword: type
			};
			var serv = new google.maps.places.PlacesService(area);
			//GOOGLE API QUERY based on req outlined above
			window.check = 0;
			serv.nearbySearch(req, callback);

			//function that results are passed through from api query
			function callback(results, status) {
				//if restaurants in db are in their area
				if (status != 'ZERO_RESULTS') {
					//grabs a random reference id from the results of google api call
					var randomId = results[Math.floor(Math.random()*results.length)]['id'];
					var id = randomId;

					$.ajax({     
						//Sends food type and id in real time to Restaurants model using config.php file                            
				     	url: 'index.php/near_ajax/'+type+'/'+id,
				     	context: this,
				     	success: function(data)
				    	{
				    		//Restaurants model returns the database info for that reference id

				    		var restaurant = JSON.parse(data);
				    		if (restaurant.length == 0) {
				    			console.log('undefined');
				    			window.check++;
				    			window.check < 5 ? serv.nearbySearch(req, callback) : alert("Oops, we don't have any "+type+" restaurants near you! Try again!");
				    		} else { 
				    			var reference = restaurant['slug'];
				    			//build the dynamic url with the restaurant slug
				    			var goTo = href + '/' + reference;
				    			//go to that restaurant landing page
								window.location = goTo;
				    		}
				     	},
				     	error: function(jqXHR, exception)
				     	{
				     		console.log('oops, nothing near you');
				     	}
				    });
				    return false;
				} else {
					//no restaurants from db are in their area
					alert("Oops, we don't have any restaurants near you! Try again!");
					//remove the near me setting and return results from anywhere if they click again
					window.near_me = false;
				}
			}
		} else {
			//if user chooses anywhere
			$.ajax({       
				//Sends ONLY food type in real time to Restaurants model using config.php file                                 
		     	url: 'index.php/test_ajax/'+type,
		     	context: this,
		     	success: function(data)
		    	{
		    		//returns db data for a restaurant related to that food type
		    		var restaurant = JSON.parse(data);
		    		var reference = restaurant['slug'];
					var goTo = href + '/' + reference;
					window.location = goTo;
		     	},
		     	error: function(jqXHR, exception)
		     	{
		     		console.log('oops, nothing near you');
		     	}
		    });
		}

	});
	//sets which navbar tab is active
	$('.header-button').click(function(e) {
		$('.header-button').removeClass('active');
	    $(this).addClass('active');
	});
	$(window).scroll(function() {
		//checks if user scroll is near the top
		//if so it removes white background from navbar
		//hides navbar background when the user arrives on page so map can be seen in full
		if ($(window).scrollTop() < 10) {
			$('.navbar .navbar-collapse').removeClass('white');
			$('.header-button').removeClass('blue');
			$('#navbar-logo').attr('src', document.location.origin+'/assets/img/logo/wsiewhite.png');
		} else {
			//puts in white background for navbar as user scrolls down
			$('.navbar .navbar-collapse').addClass('white');
			$('.header-button').addClass('blue');
			$('#navbar-logo').attr('src', document.location.origin+'/assets/img/logo/wsieblue.png');
		}
    });
});