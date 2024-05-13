<?php
// Ensure that the user_id and job_id parameters are present in the GET request
if (isset($_GET['user_id']) && isset($_GET['job_id'])) {
    $user_id = $_GET['user_id'];
    $job_id = $_GET['job_id'];

    // Call the unsaveJob function to unsave the job
    $result = unsaveJob($user_id, $job_id);

    if ($result) {
        // If unsaveJob returns true, the job was successfully unsaved
        echo "Job unsaved successfully.";
        header("Location: profile.php");
    } else {
        // If unsaveJob returns false, there was an error unsaving the job
        echo "Failed to unsave the job.";
        exit();
    }
} else {
    // If user_id or job_id parameters are missing, display an error message
    echo "Invalid request. Please provide user_id and job_id parameters.";
    exit();
}

// Function to unsave a job for a specific user
function unsaveJob($user_id, $job_id)
{
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    try {
        // Prepare and execute the SQL query to delete the saved job entry
        $sql = "DELETE FROM saved_jobs WHERE user_id = ? AND job_id = ?";
        $stmt = mysqli_prepare($connection, $sql);

        // Bind the parameters
        mysqli_stmt_bind_param($stmt, 'ss', $user_id, $job_id);

        // Execute the prepared statement
        mysqli_stmt_execute($stmt);

        // Close the statement and the database connection
        mysqli_stmt_close($stmt);
        mysqli_close($connection);

        // Return true to indicate success
        return true;

    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
        return false; // Return false in case of an error
    }
}
?>
