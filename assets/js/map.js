function initMap() {

	//styling of map on home screen 
	var styledMapType = new google.maps.StyledMapType(
		[{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#444444"}]},{"featureType":"administrative.country","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.province","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.locality","elementType":"geometry","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.locality","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"administrative.locality","elementType":"labels.text","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.neighborhood","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text","stylers":[{"visibility":"simplified"},{"color":"#bf3b30"}]},{"featureType":"administrative.neighborhood","elementType":"labels.text.fill","stylers":[{"weight":"9.73"},{"visibility":"simplified"},{"color":"#bf3b30"}]},{"featureType":"administrative.land_parcel","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"administrative.land_parcel","elementType":"geometry.fill","stylers":[{"weight":"0.55"},{"visibility":"simplified"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape.man_made","elementType":"geometry.fill","stylers":[{"saturation":"0"},{"color":"#ffffff"}]},{"featureType":"landscape.natural.landcover","elementType":"geometry.fill","stylers":[{"visibility":"simplified"},{"weight":"0.61"},{"saturation":"0"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry","stylers":[{"visibility":"on"}]},{"featureType":"landscape.natural.terrain","elementType":"geometry.fill","stylers":[{"saturation":"0"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"poi.sports_complex","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"color":"#3a3a3a"},{"lightness":"85"}]},{"featureType":"road.arterial","elementType":"labels.text.fill","stylers":[{"color":"#3a3a3a"},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"road.local","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry.fill","stylers":[{"color":"#3a3a3a"},{"visibility":"simplified"},{"lightness":"85"}]},{"featureType":"road.local","elementType":"geometry.stroke","stylers":[{"color":"#3a3a3a"}]},{"featureType":"road.local","elementType":"labels.text.fill","stylers":[{"color":"#3a3a3a"}]},{"featureType":"road.local","elementType":"labels.text.stroke","stylers":[{"color":"#ffffff"},{"visibility":"simplified"},{"weight":"0.01"}]},{"featureType":"road.local","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#9ae2ff"},{"visibility":"on"}]}],
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

function initialize() {
	console.log("Hello Brian");
    var places = new google.maps.places.Autocomplete(
    (document.getElementById('test')), {
        types: ['geocode']
    });
    console.log(places);
}