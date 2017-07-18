<?php 

	$query = $this->db->query("SELECT * FROM restaurants WHERE food_type = '$type'");
	$result = $query->result();

	echo $result;

?>