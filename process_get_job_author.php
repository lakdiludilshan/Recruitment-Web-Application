<?php
function getJobAuthorDetails($job_id)
{
    // Include the database connection file
    require_once 'database_connection.php';
    $connection = connectToDatabase();

    try {
        // Prepare and execute the SQL query to fetch the author (user) details for the specific job
        $sql = "SELECT u.first_name,u.last_name,u.phone,u.email FROM users u 
                INNER JOIN jobs j ON u.user_id = j.user_id
                WHERE j.job_id = $job_id";

        $result = mysqli_query($connection, $sql);

        // Check if there is a matching record
        if ($result && mysqli_num_rows($result) > 0) {
            // Fetch the user details
            $user = mysqli_fetch_assoc($result);

            // Close the database connection
            mysqli_close($connection);

            return $user; // Return the user details as an associative array
        } else {
            // No matching record found
            return null;
        }
    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
        return null;
    }
}
?>
