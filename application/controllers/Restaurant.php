<?php 

	class Restaurant extends CI_Controller {

		public function getRestaurant($type, $slug=false) {
			$this->load->model('restaurants');

			$slug = $slug ? $slug : $this->getRandomRestaurantSlug($type);

			$restaurant = $this->restaurants->getRestaurantsBySlug($type, $slug);
			$id = $this->restaurants->getIdBySlug($slug, $type);
			$restaurant->opening_hours = $this->restaurants->getOpeningHours($id);

			$this->load->view('restaurant', [
				'restaurant' => $restaurant
			]);
		}

		protected function getRandomRestaurantSlug($type) {
			$restaurants = [];
			$restaurants = $this->restaurants->getRestaurantsByType($type);
			$random = array_rand($restaurants);
			$restaurant = $restaurants[$random];
			$random_slug = $restaurant->slug;
			return $random_slug;
		}

		public function getAJAXRestaurantSlug($type) {
			$this->load->model('restaurants');
			$restaurant_slug = $this->restaurants->getRandomSlugByType($type);
			echo json_encode($restaurant_slug);
		}

		public function getAJAXRestaurantById($type, $id) {
			$this->load->model('restaurants');
			$slug = $this->restaurants->getRandomSlugByTypeAndId($type, $id);
			echo json_encode($slug);
		}

	}
?>