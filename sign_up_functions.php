<?php include 'components/header.php'; ?>
<?php require 'db/utils.php' ?>
<?php require 'inc/utils.php' ?>
<?php require 'inc/upload_functions.php' ?>
<?php require_once 'inc/constants.php' ?>

<?php 

$tab_title = 'Sign up';
$errors = [];

$firstname = '';
$lastname = '';
$email = '';
$password = '';
$confirmPassword = '';

/*
Firstname string
Lastname string
Email should be email
Password should be more than 8 max 35
Confirm shoud be the same as password
 */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$firstname = sanitize($_POST['firstname']) ?? '';
	$lastname = sanitize($_POST['lastname']) ?? '';
	$file = $_FILES['picture'] ?? '';
	$email = sanitize($_POST['email']) ?? '';
	$password = sanitize($_POST['password']) ?? '';
	$confirmPassword = sanitize($_POST['confirmPassword']) ?? '';


	if (empty($firstname)) {
		$errors['firstname'] = 'First name' . IS_REQUIRED;
	} else if (!preg_match("/^[a-zA-Z-' ]*$/", $firstname)) {
		$errors['firstname'] = "Only letters and white space allowed";
	}

	if (empty($file) || empty($file['tmp_name'])) {
		$errors['picture'] = 'Picture' . IS_REQUIRED;
	} else if (is_image($file)) {
		$errors['picture'] = 'File is not an image.';
	} else if (file_stored($file)) {
		$errors['picture'] = 'File already exists.';
	} else if(over_limit($file)){
		$errors['picture'] = "Sorry, your file is too large.";
	} else if(not_allowed_type($file)){
		$errors['picture'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
	}

	if (empty($email)) {
		$errors['email'] = 'Email' . IS_REQUIRED;
	} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Email must be valid';
	} else if(email_exists($email)){
		$errors['email'] = 'User with such an email already exists';
	}

	if (empty($password)) {
		$errors['password'] = 'Password' . IS_REQUIRED;
	} else if (strlen($password) < 8 || strlen($password) > 35) {
		$errors['password'] = 'Password should have between 8 and 20 characters';
	}

	if (empty($confirmPassword)) {
		$errors['confirmPassword'] = 'Confirmation of password' . IS_REQUIRED;
	}

	if ($password && $confirmPassword && strcmp($password, $confirmPassword) !== 0) {
		$errors['confirmPassword'] = 'Your password must match the password you created first';
	}

	if (empty($errors)) {
		$user_details = [
			"firstname" => $firstname,
			"lastname" => $lastname,
			"picture" => get_target_file($file),
			"email" => $email,
			"password" => password_hash($password, PASSWORD_DEFAULT),
		];

		if (upload_file($file)) {
			echo "File uploaded successfully";
		}

		if(store_user($user_details)){
			echo "User stored successfully";
		} else {
			echo "Something went wrong";
		}

		redirect(ADMIN_PAGE, ['logged' => 0]);
	}
}

 ?>

 <?php echo sanitize($_REQUEST['error'] ?? '') ?>
 <?php require 'components/sign_up.php'; ?>
 <?php include 'components/footer.php'; ?>