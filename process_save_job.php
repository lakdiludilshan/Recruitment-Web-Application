<?php
function saveJob($user_id, $job_id)
{
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    // Prepare the SQL query to insert the job into the saved_job table
    $sql = "INSERT INTO saved_jobs (user_id, job_id) VALUES ('$user_id', '$job_id')";

    // Execute the SQL query
    $result = mysqli_query($connection, $sql);

    // Check if the insertion was successful
    if ($result) {
        // Job saved successfully
        return true;
    } else {
        // Error saving the job
        return false;
    }

    // Close the database connection
    mysqli_close($connection);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Check if the job_id is provided in the URL
    if (isset($_POST['job_id']) && !empty($_POST['job_id']) && isset($_POST['user_id']) && !empty($_POST['user_id'])) {
        
        // Get the job_id from the URL
        $job_id = $_POST['job_id'];

        // Get the user id from the URL
        $user_id = $_POST['user_id'];

        // save the job
        $result = saveJob($user_id, $job_id);

        if ($result) {
            // Job saved successfully
            echo 'Job saved successfully.';
            header("Location: job_view.php?job_id=$job_id");
            exit();
        } else {
            // Error saving the job
            echo 'Error saving the job.';
        }

    } else {
        // Redirect to a 404 page or show an error message
        echo 'Job ID not provided.';
        exit();
    }

    
}

?>