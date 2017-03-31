<?php	

	class Groups {

		public function showGroups() {

			$this->load->model('groups');
			$groups = $this->groups->getGroups();
			echo '<pre>' . print_r($groups, true) . '</pre>';
			return $groups;
		}
	}

?>