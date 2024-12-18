<?php
session_start(); // Start the session to manage login status

// Part 2: Create the checkPassword function
function checkPassword($password) {
    // Check if password has at least 12 characters
    if (strlen($password) < 12) {
        return "Password is too short (less than 12 characters).";
    }

    // Check if password contains at least one number
    if (!preg_match('/[0-9]/', $password)) {
        return "Password does not contain a number.";
    }

    // Check if password contains at least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        return "Password does not contain a lowercase letter.";
    }

    // Check if password contains at least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return "Password does not contain an uppercase letter.";
    }

    // Check if password contains at least one non-alphanumeric character
    if (!preg_match('/[\W_]/', $password)) {
        return "Password does not contain a non-alphanumeric character.";
    }

    // Check if password contains any spaces
    if (strpos($password, ' ') !== false) {
        return "Password contains a space.";
    }

    // If all checks passed, the password is valid
    return true;
}

// Main Logic
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // User is attempting to log in
    $password = $_POST['password']; // Get the entered password

    // Call the checkPassword function
    $result = checkPassword($password);

    // If password is valid, log the user in and set session variables
    if ($result === true) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = 'User'; // You can customize the username or allow users to provide one
        header("Location: welcome.php"); // Redirect to a welcome page or dashboard
        exit;
    } else {
        // Password is invalid, display the error message
        $error_message = $result;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Validation</title>
    <link rel="stylesheet" href="styles.css"> <!-- Link to external CSS file -->
</head>
<body>
<header>
    <h1>Login</h1>
</header>

<?php
// Display error message if the password is invalid
if (isset($error_message)) {
    echo "<p class='error'>$error_message</p>";
}
?>

<!-- Login Form -->
<form method="POST" action="password.php">
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br><br>
    <input type="submit" value="Login">
</form>

<footer>
    <p>&copy; <?php echo date("Y"); ?> Your Business Name. All Rights Reserved.</p>
</footer>
</body>
</html>

