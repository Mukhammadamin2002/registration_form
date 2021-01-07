<?php 
function redirect($url, $query=[], $exit=true) {
	$url = add_query($url, $query);

	header("Location: $url");
	if ($exit) {
		exit;
	}
}

function add_query($url, $query) {
	if (!empty($query)) {
		$url .= "?";
		foreach ($query as $name => $value) {
			$url .= "$name=$value";
		}
	}
	return $url;
}

function sanitize($data) {
	$data = trim($data);
	$data = stripcslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

function prettyDump($variable) {
	echo "<pre>";
	var_dump($variable);
	echo "</pre>";
}


?>