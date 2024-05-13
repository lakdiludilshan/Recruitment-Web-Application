<?php
// Function to get all jobs posted by a user by user_id
function getJobsPostedByUser($user_id)
{
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    try {
        // Prepare and execute the SQL query to fetch jobs posted by the user
        $sql = "SELECT * FROM jobs WHERE user_id = '$user_id'";
        $result = mysqli_query($connection, $sql);

        // Initialize an empty array to store the jobs posted by the user
        $jobsPostedByUser = array();

        // Fetch each job posted by the user and add it to the $jobsPostedByUser array
        while ($row = mysqli_fetch_assoc($result)) {
            $jobsPostedByUser[] = $row;
        }

        // Close the database connection
        mysqli_close($connection);

        return $jobsPostedByUser; // Return the jobs posted by the user as an array

    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
        return null; // Return null in case of an error
    }
}
?>
