<?php include "components/header.php";//Header ?>
<?php require_once 'db/utils.php'; ?>
<?php require_once 'inc/constants.php'; ?>
<?php require_once 'inc/utils.php'; ?>


<?php 

$tab_title = 'Sign In';

$errors = [];

$email = '';
$password = '';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$email = sanitize($_POST['email']) ?? '';
		$password = sanitize($_POST['password']) ?? '';

		if (empty($email)) {
			$errors['email'] = 'Email is required';
		} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$errors['email'] = 'Email must be valid';
 		}

 		if (empty($password)) {
			$errors['password'] = 'Password is required';
		} elseif (strlen($password) < 8 || strlen($password) > 35) {
			$errors['password'] = 'Password should have 8 and 35 characters';
 		}

 		if (empty($errors)) {
 			$user = get_user($email, 'email');
 			$validPassword = password_verify($password, $user['password']);

 			if ($user && $validPassword) {
 				redirect(ADMIN_PAGE, ['logged' => 1]);
 			} else {
 				redirect(SIGN_IN_PAGE, ['error' => "Either not user or password is not valid"]);
 			}
 		}
	}


?>

<?php echo sanitize($_REQUEST['error'] ?? '') ?>
<?php include 'components/sign_in.php'; ?>
<?php include 'components/footer.php';//Footer ?>