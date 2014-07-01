<?php 
include 'core/init.php';
protect_page();


if (empty($_POST) === false) {
	$required_fields = array('current_password', 'password', 'password_again');
    foreach($_POST as $key=>$value) {
    	if (empty($value) && in_array($key, $required_fields) === true) {
    		$errors[] = 'Fields marked with an asterisk are required.';
    		break 1;
    	}
    }
    
	if (md5($_POST['current_password']) === $user_data['password']) {
		if (trim($_POST['password']) !== trim($_POST['password_again'])) {
			$errors[] = 'Your new passwords do not match.';
		} else if (strlen(trim($_POST['password'])) <= 6 || strlen(trim($_POST['password'])) >=30) {
			$errors[] = 'Your password must be at least 6 characters, and less than 30 characters long.';
		}
		
	} else {
			$errors[] = 'Your current password is incorrect.';

	}
}

include 'includes/overall/header.php'; 

?>
<h1>Change Password</h1>

<?php

?>


<form action="" method="post">
	<ul>
		<li>
			Current password:<font color='#B22222'>*</font><br>
			<input type="text" name="current_password">
		</li>
		<li>
			New password:<font color='#B22222'>*</font><br>
			<input type="text" name="password">
		</li>
		<li>
			New password:<font color='#B22222'>*</font><br>
			<input type="text" name="password_again">
		</li>
		<li>
				<input type="submit" value="Change password">
		</li>
	</ul>


<?php include 'includes/overall/footer.php'; ?>
