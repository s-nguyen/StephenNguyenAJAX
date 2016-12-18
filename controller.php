<?php
  require_once './DataBaseAdapter.php';
  $sub = $_GET['substring'];
	$array = $movieTitles->get_titles($sub);
	echo json_encode($array);
?>
