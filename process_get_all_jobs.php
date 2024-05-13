<?php
function getAllJobs()
{
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    // Retrieve all jobs from the database
    $query = "SELECT * FROM jobs";
    $result = mysqli_query($connection, $query);

    // Initialize an empty array to store the job details
    $jobs = array();

    // Check if the query was successful and if there are jobs
    if ($result && mysqli_num_rows($result) > 0) {
        // Fetch each job and add it to the $jobs array
        while ($row = mysqli_fetch_assoc($result)) {
            $jobs[] = $row;
        }
    }

    // Close the database connection
    mysqli_close($connection);

    return $jobs;
}
?>