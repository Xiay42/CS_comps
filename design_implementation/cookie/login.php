<?php
// Check if the user is already logged in using cookies
if(isset($_COOKIE['username'])) {
    $cookieValue = $_COOKIE['username'];
} else {
    $cookieValue = "";
}


// Check if the logout button has been clicked
if(isset($_POST['logout'])) {
    // Delete the cookie by setting its expiration time to a time in the past
    setcookie('username', '', time() - 3600, '/');
    // Redirect to the same page to refresh and reflect the logout
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit; // Stop further execution after redirect
} else {
	// Check if the form has been submitted
	if(isset($_POST['username']) && isset($_POST['password'])) {
	    //dummy username and password
	    $valid_username = 'user';
	    $valid_password = 'password';

	    // Check if the provided credentials are correct
	    if($_POST['username'] === $valid_username && $_POST['password'] === $valid_password) {
		// Authentication successful, set cookie and redirect
		setcookie('username', $_POST['username'], time() + 3600, '/');
		echo 'Welcome, ' . $_POST['username'] . '!<br>';
		echo 'Your username has been stored in a cookie.';
		exit;
	    } else {
		echo 'Invalid username or password.';
	    }
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
        
        <?php
        // Show logout button if the user is logged in
        if($cookieValue !== "") {
            echo '<br><br><input type="submit" name="logout" value="Logout">';
        }
        ?>
    </form>

    <?php
    // Print out the cookie if it exists
    if($cookieValue !== "") {
        echo '<br><br>Your cookie value is: ' . $cookieValue;
    }
    ?>
</body>
</html>
