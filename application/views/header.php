<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Where Should I Eat in Dublin? | <?php print isset($restaurant->name) ? $restaurant->name : ' ' ?></title>
		<!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
		<link href="<?php echo base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom CSS -->
		<link href="<?php echo base_url() ?>assets/css/freelancer.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="<?php echo base_url() ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
		<link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<!-- jQuery -->
		<script src="<?php echo base_url() ?>assets/js/jquery.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<!-- Plugin JavaScript -->
		<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/classie.js"></script>
		<script src="<?php echo base_url() ?>assets/js/cbpAnimatedHeader.js"></script>  
		<!-- Contact Form JavaScript -->
		<script src="<?php echo base_url() ?>assets/js/jqBootstrapValidation.js"></script>
		<script src="<?php echo base_url() ?>assets/js/contact_me.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?php echo base_url() ?>assets/js/freelancer.js"></script>
		<script>
			//fuuuuuuuuck you jquery you little bitch I own you cunt
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
				$('.choice1').click(function(e) {
					window.near_me = true;
					navigator.geolocation.getCurrentPosition(showPosition);
					$('html, body').animate({
					        scrollTop: $('#food-thumbnails').offset().top
					}, 2500);

					function showPosition(position) {
						window.lat = position.coords.latitude;
						window.long = position.coords.longitude;
						console.log(position.coords.latitude, position.coords.longitude);
					}
				});
				$('.choice3').click(function(e) {
					$('html, body').animate({
					        scrollTop: $('#food-thumbnails').offset().top
					}, 2500);
				});
				$('.food-type-thumbnail').click(function (e) {
					e.preventDefault();
					var type = $(this).data('type');
					var href = $(this).attr('href');

					if (window.near_me === true) {
						var loc = new google.maps.LatLng(window.lat,window.long);
						// var loc = new google.maps.LatLng(53.350140,-6.266155);
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
						serv.nearbySearch(req, callback);

						function callback(results, status) {
							var randomId = results[Math.floor(Math.random()*results.length)]['id'];
							var id = randomId;
							console.log(id);
							$.ajax({                                      
						     	url: 'index.php/near_ajax/'+type+'/'+id,
						     	context: this,
						     	success: function(data)
						    	{
						    		var restaurant = JSON.parse(data);
						    		var reference = restaurant['slug'];
						    		if (reference == 'undefined') {
						    			console.log('undefined');
						    			serv.nearbySearch(req, callback);
						    		} else { 
						    			var goTo = href + '/' + reference;
										window.location = goTo;
						    		}
						     	},
						     	error: function(jqXHR, exception)
						     	{
						     		console.log('oops, nothing near you');
						     	}
						    });
						    return false;
						}
					} else {
						$.ajax({                                      
					     	url: 'index.php/test_ajax/'+type,
					     	context: this,
					     	success: function(data)
					    	{
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
				$('.header-button').click(function(e) {
					$('.header-button').removeClass('active');
				    $(this).addClass('active');
				});
				$(window).scroll(function() {
					//checks if user scroll is near the top
					//if so it removes white background from navbar 
					if ($(window).scrollTop() < 10) {
						$('.navbar .navbar-collapse').removeClass('white');
						$('.header-button').removeClass('blue');
						$("#navbar-logo").attr('src', '<?php echo base_url() ?>assets/img/logo/wsiewhite.png');
					} else {
						$('.navbar .navbar-collapse').addClass('white');
						$('.header-button').addClass('blue');
						$('#navbar-logo').attr('src', '<?php echo base_url() ?>assets/img/logo/wsieblue.png');
					}
			    });
			});
		</script>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', 'UA-89823039-1', 'auto');
			ga('send', 'pageview');
		</script>
	</head>
	<!-- End of Async HubSpot Analytics Code -->
	<body id="page-top" class="index">
    <script>
      function initMap() {

        var styledMapType = new google.maps.StyledMapType(
            [
			    {
			        "featureType": "administrative",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "color": "#e85113"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "color": "#ffffff"
			            },
			            {
			                "weight": 6
			            }
			        ]
			    },
			    {
			        "featureType": "administrative.country",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative.province",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative.locality",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative.neighborhood",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "administrative.land_parcel",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "all",
			        "stylers": [
			            {
			                "lightness": 20
			            },
			            {
			                "color": "#efe9e4"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.man_made",
			        "elementType": "all",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "landscape.man_made",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "geometry",
			        "stylers": [
			            {
			                "visibility": "off"
			            },
			            {
			                "color": "#f0e4d3"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "hue": "#11ff00"
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "lightness": 100
			            }
			        ]
			    },
			    {
			        "featureType": "poi",
			        "elementType": "labels.icon",
			        "stylers": [
			            {
			                "hue": "#4cff00"
			            },
			            {
			                "saturation": 58
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "lightness": -100
			            }
			        ]
			    },
			    {
			        "featureType": "road",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "lightness": 100
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#efe9e4"
			            },
			            {
			                "lightness": -25
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#efe9e4"
			            },
			            {
			                "lightness": -40
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "road.highway.controlled_access",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry.fill",
			        "stylers": [
			            {
			                "color": "#efe9e4"
			            },
			            {
			                "lightness": -10
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "geometry.stroke",
			        "stylers": [
			            {
			                "color": "#efe9e4"
			            },
			            {
			                "lightness": -20
			            }
			        ]
			    },
			    {
			        "featureType": "road.arterial",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "road.local",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "on"
			            }
			        ]
			    },
			    {
			        "featureType": "transit",
			        "elementType": "labels",
			        "stylers": [
			            {
			                "visibility": "off"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "all",
			        "stylers": [
			            {
			                "color": "#19a0d8"
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text.fill",
			        "stylers": [
			            {
			                "lightness": -100
			            }
			        ]
			    },
			    {
			        "featureType": "water",
			        "elementType": "labels.text.stroke",
			        "stylers": [
			            {
			                "lightness": 100
			            }
			        ]
			    },
			],
            {name: 'Styled Map'});

        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 53.348579, lng: -6.259065},
          zoom: 15,
          scrollwheel:  false,
          disableDefaultUI: true,
          mapTypeControlOptions: {
            mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                    'styled_map']
          }
        });

        map.mapTypes.set('styled_map', styledMapType);
        map.setMapTypeId('styled_map');
      }
    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCLUvYOG7sIIqLSzLz43uSIZzeswUDYglQ&libraries=places&callback=initMap" async defer></script>
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-fixed-top">
		<?php if(!isset($map)): ?>
			<div id="map-wrapper">
				<div id="map"></div>
				<div class="overlay">
					<span class="location">Location</span>
					<div class="location-choices">
						<span class="choice1"><a class="choice1">Near Me</a></span>
						<span class="choice2">Choose Location</span>
						<span class="choice3"><a class="choice3">Anywhere</a></span>
					</div>
				</div>
			</div>
		<?php endif; ?>
			<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header page-scroll">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					
					<div class="collapse navbar-collapse navbar-fixed-top" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-center">
							<li class="hidden">
								<a href="#page-top"></a>
							</li>
							<li class="page-scroll">
								<a href="<?php print base_url() ?>" class="header-button">What to Eat</a>
							</li>
							<li class="page-scroll">
								<a href="<?php print base_url() ?>#about" class="header-button">About</a>
							</li>
							<a class="navbar-brand" href="<?php print base_url() ?>" title="Where Should I Eat?">
								<img id="navbar-logo" style="width:100%; max-width:300px; margin-top: -101px;"src="<?php echo base_url() ?>assets/img/logo/wsiewhite.png">
							</a>
					<!-- Collect the nav links, forms, and other content for toggling -->
							<li class="hidden">
								<a href="#page-top"></a>
							</li>
							<li class="page-scroll">
								<a href="<?php print base_url() ?>#contact" class="header-button">Contact</a>
							<li class="page-scroll" data-toggle="modal" data-target="#myModal">
								<a href="#login" class="header-button">Login</button></a>
							</li>
						</ul>
					</div>
				</div>
			<!-- /.navbar-collapse -->
			</div>
		<!-- /.container-fluid -->
		</nav>