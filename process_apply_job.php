<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Check if the form has been submitted

    // Get the user_id and job_id from the form data
    $user_id = $_POST['user_id'];
    $job_id = $_POST['job_id'];

    // Include the database connection file
    require_once 'database_connection.php';
    $connection = connectToDatabase();

    try {
        // Check if the job_applicants table already has a record with the given user_id and job_id
        $sql = "SELECT * FROM job_applicants WHERE user_id = '$user_id' AND job_id = '$job_id'";
        $result = mysqli_query($connection, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            // The user has already applied for this job, display a message or handle as needed
            echo "You have already applied for this job.";
        } else {
            // The user has not applied for this job, insert a new record into the job_applicants table
            $applied_date = date("Y-m-d");
            $applied_time = date("H:i:s");
            $status = "applied";

            $sql_insert = "INSERT INTO job_applicants (job_id, user_id, applied_date, applied_time, status)
                           VALUES ('$job_id', '$user_id', '$applied_date', '$applied_time', '$status')";
            $result02 = mysqli_query($connection, $sql_insert);

            // Check if the insert was successful
            if (!$result02) {
                // The insert failed, display a message or handle as needed
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($connection);
                exit();
            }

            // Display a success message or handle as needed
            echo "You have successfully applied for this job.";
            
            // Redirect to the job_view.php page with the job_id as a parameter
            header("Location: job_view.php?job_id=$job_id");
            exit();
        }

        // Close the database connection
        mysqli_close($connection);
    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
    }
}

?>
