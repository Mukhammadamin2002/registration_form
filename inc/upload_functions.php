<?php 
require_once 'inc/constants.php';
require_once 'inc/utils.php';

function check_uploads_folder(){
	$dir = UPLOADS_PATH;

	if(!file_exists($dir) && !is_dir($dir)){
	    mkdir( $dir );
	} 
}

function is_image($input){
	return getimagesize($input["tmp_name"]) === false;
}

function file_stored($input){
	check_uploads_folder();
	$target_file = get_target_file($input);
	return file_exists($target_file);
}

function over_limit($input, $limit = 500000){
	return $input["size"] > $limit;
}

// Allow certain file formats
function not_allowed_type($input){
	$image_types = ["jpg", "png", "jpeg", "gif"];
	$image_file_type = get_image_extension($input);

	return !in_array($image_file_type, $image_types);
}

function upload_file($input){
	$target_file = get_target_file($input);# uploads/${file}

	return move_uploaded_file($input["tmp_name"], $target_file);
}

function get_target_file($input){
	return UPLOADS_PATH . basename($input["name"]);
}

function get_image_extension($input){
	$target_file = get_target_file($input);
	return strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
}