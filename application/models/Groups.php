<?php 

	class Groups extends CI_Model {

		public function getGroups() {

			$groups = [];

			$query = $this->db->query("SELECT * FROM food_types");

			$result = $query->result();

			foreach ($result as $food_type) {
				$groups[$food_type->ID] = $food_type->food_type;
			}

			return $groups;
		}

	}

?>