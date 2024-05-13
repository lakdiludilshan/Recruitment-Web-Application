<?php
function getJobDetails($job_id)
{
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    // Sanitize the job_id to prevent SQL injection
    $job_id = mysqli_real_escape_string($connection, $job_id);

    // Retrieve the job details from the database
    $query = "SELECT * FROM jobs WHERE job_id = '$job_id'";
    $result = mysqli_query($connection, $query);

    // Check if the query was successful and if the job exists
    if ($result && mysqli_num_rows($result) > 0) {
        $job = mysqli_fetch_assoc($result);
    } else {
        // Return null if the job does not exist
        $job = null;
    }

    // Close the database connection
    mysqli_close($connection);

    return $job;
}
?>