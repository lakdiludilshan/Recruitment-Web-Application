<?php
function getApplicantsForJob($job_id)
{
    // Include the database connection file
    require_once 'database_connection.php';
    $connection = connectToDatabase();

    try {
        // Prepare and execute the SQL query to fetch the applicants for the job
        $sql = "SELECT u.first_name,u.last_name,u.phone,u.email FROM users u
                INNER JOIN job_applicants ja ON u.user_id = ja.user_id
                WHERE ja.job_id = $job_id";

        $result = mysqli_query($connection, $sql);

        // Initialize an empty array to store the applicants details
        $applicants = array();

        // Fetch each applicant and add it to the $applicants array
        while ($row = mysqli_fetch_assoc($result)) {
            $applicants[] = $row;
        }

        // Close the database connection
        mysqli_close($connection);

        return $applicants; // Return the applicants details as an array

    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
        return null;
    }
}
?>
