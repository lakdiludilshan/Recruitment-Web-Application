<?php
// Function to get all saved jobs with their details by user_id
function getSavedJobs($user_id)
{
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    try {
        // Prepare and execute the SQL query to fetch saved jobs with their details for the user
        $sql = "SELECT jobs.* FROM jobs
                INNER JOIN saved_jobs ON jobs.job_id = saved_jobs.job_id
                WHERE saved_jobs.user_id = '$user_id'";

        $result = mysqli_query($connection, $sql);

        // Initialize an empty array to store the saved jobs with details
        $savedJobs = array();

        // Fetch each saved job with details and add it to the $savedJobs array
        while ($row = mysqli_fetch_assoc($result)) {
            $savedJobs[] = $row;
        }

        // Close the database connection
        mysqli_close($connection);

        return $savedJobs; // Return the saved jobs with details as an array

    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
        return null; // Return null in case of an error
    }
}
?>
