<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form was submitted with an image
    if (isset($_FILES["profile_photo"]) && $_FILES["profile_photo"]["error"] === UPLOAD_ERR_OK) {
        require_once 'process_image.php';
        $image=uploadImage($_FILES["profile_photo"], "uploads/profile-photos/");
    } else {
        $image = null;
        die("No image selected or error during upload.");
    }

    // Validate and sanitize form inputs
    $firstName = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
    $lastName = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"]);
    $username = filter_var($_POST["user_id"], FILTER_SANITIZE_STRING);
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirm_password"];
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);

    // Validation for email
    if (!$email) {
        echo "Invalid email address.";
        exit();
    }

    // Validation for password
    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit();
    }

    // Validation for username (assuming it should be alphanumeric)
    if (!preg_match("/^[a-zA-Z0-9_]+$/", $username)) {
        echo "Invalid username. Username must be alphanumeric.";
        exit();
    }

    // Validation for phone number (assuming it should be numeric)
    if (!preg_match("/^[0-9]+$/", $phone)) {
        echo "Invalid phone number. Phone number must contain only digits.";
        exit();
    }

    // Check if the password and confirm password match
    if ($password !== $confirmPassword) {
        echo "Password and confirm password do not match.";
        exit();
    }

    // Hash the password for security
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    // Prepare and execute the SQL query to insert user data into the database
    $sql = "INSERT INTO users (user_id, first_name, last_name, email, phone, password, profile_photo) 
    VALUES ('$username', '$firstName', '$lastName', '$email', '$phone', '$hashedPassword', '$image')";

    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if (!$result) {
        echo "Error creating user: " . mysqli_error($connection);
        exit();
    }
    
    // Close the database connection
    mysqli_close($connection);

    // If the registration is successful, redirect the user to the login page
    header("Location: login_page.php");
    exit();
}
?>
