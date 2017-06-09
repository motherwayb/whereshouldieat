<?php
	$this->load->helper('GooglePlaces');

	$keyword = 'Vegetarian';

	// $google_places = new joshtronic\GooglePlaces('AIzaSyCLUvYOG7sIIqLSzLz43uSIZzeswUDYglQ');
	// $google_places->location = array(53.344606, -6.267401);
	// $google_places->radius   = 20000;
	// $google_places->types    = 'restaurant';
	// $google_places->keyword  = $keyword;
	// $google_places->rankby  =  'distance';
	// $results                 = $google_places->radarSearch();

	$references = [];

	foreach ($results['results'] as $result) {
		$references[] = $result['reference'];
	}

	// echo '<pre>' . print_r($results, true) . '</pre>';

	$details = [];

	foreach ($references as $id) {
		$google_places->reference = $id;
		$data = $google_places->details();
		$details[] = $data['result'];
	}

	foreach ($details as $restaurant) {
		$reference 		= $restaurant['id'] ? $restaurant['id'] : '';
		$name 			= $restaurant['name'] ? $restaurant['name'] : '';
		$addr 			= $restaurant['formatted_address'] ? $restaurant['formatted_address'] : '';
		$slug 			= strtolower($restaurant['name']);
		$slug 			= preg_replace("/[^a-z0-9_\s-]/", "", $slug);
		$slug 			= preg_replace("/[\s-]+/", " ", $slug);
		$slug 			= preg_replace("/[\s_]/", "-", $slug);
		$phone 			= $restaurant['formatted_phone_number'] ? $restaurant['formatted_phone_number'] : '';
		$website 		= $restaurant['website'] ? $restaurant['website'] : '';
		$rating			= $restaurant['rating'] ? $restaurant['rating'] : '';
		$url			= $restaurant['url'] ? $restaurant['url'] : '';
		$open_now		= $restaurant['opening_hours']['open_now'] ? $restaurant['opening_hours']['open_now'] : '';
		$opening_hours	= $restaurant['opening_hours']['weekday_text'] ? $restaurant['opening_hours']['weekday_text'] : '';

		$rest 		= array('', $reference, $name, $addr, $slug, $keyword);
		$contact	= array('', $reference, $phone, $website);
		$goo_rate	= array($reference, $rating, round($rating));
		$loc		= array($reference, $url, $addr);
		$opening	= array($reference, $open_now, $opening_hours[0], $opening_hours[1], $opening_hours[2], $opening_hours[3], $opening_hours[4], $opening_hours[5], $opening_hours[6]);
		$price 		= array($reference);
		$ratings 	= array($reference, $rating, '', round($rating));
		$web 		= array('', $reference, $website);

		$rest_csv		= fopen(__DIR__."/../csvs/restaurants.csv", "a");
		$contact_csv 	= fopen(__DIR__."/../csvs/contact_details.csv", "a");
		$goo_rate_csv 	= fopen(__DIR__."/../csvs/google_ratings.csv", "a");
		$loc_csv 		= fopen(__DIR__."/../csvs/location.csv", "a");
		$open_csv 		= fopen(__DIR__."/../csvs/opening_hours.csv", "a");
		$price_csv 		= fopen(__DIR__."/../csvs/price.csv", "a");
		$ratings_csv	= fopen(__DIR__."/../csvs/ratings.csv", "a");
		$website_csv	= fopen(__DIR__."/../csvs/website.csv", "a");

		fputcsv($rest_csv, $rest);
		fputcsv($contact_csv, $contact);
		fputcsv($goo_rate_csv, $goo_rate);
		fputcsv($loc_csv, $loc);
		fputcsv($open_csv, $opening);
		fputcsv($price_csv, $price);
		fputcsv($ratings_csv, $ratings);
		fputcsv($website_csv, $web);

		fclose($rest_csv);
		fclose($contact_csv);
		fclose($goo_rate_csv);
		fclose($loc_csv);
		fclose($open_csv);
		fclose($price_csv);
		fclose($ratings_csv);
		fclose($website_csv);
	}

?>