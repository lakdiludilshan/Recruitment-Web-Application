<?php
// Check if the 'job_id' parameter exists in the URL
if (isset($_GET['job_id']) && !empty($_GET['job_id'])) {
    $jobId = $_GET['job_id'];

    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    // Start a transaction to ensure atomicity of the delete operation
    mysqli_autocommit($connection, false);

    // Delete from the 'saved_jobs' table first
    $deleteSavedJobsSql = "DELETE FROM saved_jobs WHERE job_id = $jobId";
    if (!mysqli_query($connection, $deleteSavedJobsSql)) {
        mysqli_rollback($connection);
        echo "Error deleting from the 'saved_jobs' table: " . mysqli_error($connection);
        mysqli_close($connection);
        exit();
    }

    // Delete from the 'jobs' table
    $deleteJobsSql = "DELETE FROM jobs WHERE job_id = $jobId";
    if (mysqli_query($connection, $deleteJobsSql)) {
        // Check if any rows were affected (deleted)
        if (mysqli_affected_rows($connection) > 0) {
            mysqli_commit($connection);
            echo "Job with job_id $jobId deleted successfully.";
            header("Location: profile.php");
        } else {
            mysqli_rollback($connection);
            echo "Job with job_id $jobId not found or already deleted.";
        }
    } else {
        mysqli_rollback($connection);
        echo "Error deleting from the 'jobs' table: " . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    echo "Invalid job_id or job_id not provided.";
}
?>
