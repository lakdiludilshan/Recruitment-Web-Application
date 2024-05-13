<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get the submitted username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    try {
        // Prepare the SQL query to check if the user exists
        $sql = "SELECT user_id,password FROM users WHERE user_id = ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);

        // Get the result from the query
        $result = mysqli_stmt_get_result($stmt);

        // Check if the user exists
        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            // Verify the password
            if (password_verify($password, $user['password'])) {
                // Password is correct, set up a session and redirect to the home page
                session_start();
                $_SESSION['userid'] = $user['user_id'];
                header("Location: index.php");
                exit();
            } else {
                // Password is incorrect, show an error message
                $error = "Invalid username or password.";
                echo $error;
            }
        } else {
            // User does not exist, show an error message
            $error = "User does not exist.";
            echo $error;
        }

        // Close the database connection
        mysqli_close($connection);
    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
    }
}
?>
