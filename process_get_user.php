<?php
// Function to get user details by user_id
function getUserDetails($user_id)
{
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    try {
        // Prepare and execute the SQL query to fetch user details
        $sql = "SELECT * FROM users WHERE user_id = '$user_id'";
        $result = mysqli_query($connection, $sql);

        if ($result === false) {
            // Handle the query error, if any
            throw new Exception("Error executing SQL query: " . mysqli_error($connection));
        }

        // Fetch the user details
        $user = mysqli_fetch_assoc($result);

        // Close the database connection
        mysqli_close($connection);

        return $user; // Return the user details as an associative array

    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
        return null; // Return null in case of an error
    }
}
?>
