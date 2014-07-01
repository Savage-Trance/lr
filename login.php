<?php
include 'core/init.php';
logged_in_redirect();


if(empty($_POST) === false){

	$username = $_POST['username'];
	$password = $_POST['password'];

	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'You need to enter a user name and password.';
	} else if (strlen($username) > 32){
		$errors[] = 'User ID too long';
	} else if (user_exists($username) === false) {
		$errors[] = 'We can\'t find that username.  Have you registered?';
	} else {

		if (strlen($password) > 32) {
			$errors[] = 'Password too long';
		}

		$login = login($username, $password);
		if($login === false){
			$errors[] = 'That username/password combination is incorrect';
		} else if (user_active($username) === false) {
			$errors[] = 'You haven\'t activated your account.'; 
		} else {
			$_SESSION['user_id'] = $login;
			header('Location: index.php');
			exit();
			
		}
		
	}

} else {
	$errors[] = 'No data recieved';
}
include 'includes/overall/header.php';
if (empty($errors) === false) {
?>	
	<h3>We tried to log you in, but...</h3>
<?php
	echo output_errors($errors);
}
include 'includes/overall/footer.php';
?>