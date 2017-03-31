<?php 

	class Restaurants extends CI_Model {

		public function getRestaurantsByType($type) {

			$query = $this->db->query("SELECT * FROM restaurants WHERE food_type = '$type'");
			$result = $query->result();

			return $result;

		}

		public function getRestaurantsBySlug($type, $slug) {

			$query = $this->db->query(
				"SELECT * FROM restaurants r
				JOIN google_ratings gr ON r.reference_id = gr.id
				JOIN contact_details cd ON r.reference_id = cd.reference_id
				JOIN location l ON r.reference_id = l.reference_id
				WHERE r.food_type = '$type' 
				AND r.slug = '$slug'"
			);
			$result = $query->result();

			return $result[0];

		}

		public function getIdBySlug($slug, $type) {
			$query = $this->db->query(
				"SELECT reference_id FROM restaurants r
				WHERE r.slug = '$slug'
				AND r.food_type = '$type'"
			);
			$result = $query->result();

			return $result[0]->reference_id;
		}

		public function getOpeningHours($ref) {
			$query = $this->db->query(
				"SELECT Monday, Tuesday, Wednesday, Thursday, Friday, Saturday, Sunday 
				FROM opening_hours oh 
				WHERE oh.reference_id = '$ref'"
			);
			$result = $query->result();

			return $result[0];
		}

		public function getRandomSlugByType($type) {
			$query = $this->db->query("SELECT slug FROM restaurants WHERE food_type = '$type' ORDER BY RAND()");
			$result = $query->result();

			return isset($result[0]) ? $result[0] : $result;

		}

		public function getRandomSlugByTypeAndId($type, $id) {
			$query = $this->db->query("SELECT * FROM restaurants WHERE reference_id = '$id' AND food_type = '$type'");
			$result = $query->result();

			return isset($result[0]) ? $result[0] : $result;

		}

	}

?>