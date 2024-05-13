<?php
// Function to get application details by user_id
function getApplicationsByUserId($user_id)
{
    // Include the database connection file
    require_once 'database_connection.php';
    $connection = connectToDatabase();
    
    try {
        // Prepare and execute the SQL query to fetch application details
        $sql = "SELECT jobs.title, jobs.job_type, jobs.category, jobs.salary, jobs.city, jobs.district, 
                users.first_name, users.last_name, users.phone, 
                job_applicants.applied_date, job_applicants.applied_time, job_applicants.status 
                FROM job_applicants 
                INNER JOIN jobs ON job_applicants.job_id = jobs.job_id
                INNER JOIN users ON job_applicants.user_id = users.user_id
                WHERE job_applicants.user_id = '$user_id'";
        $result = mysqli_query($connection, $sql);

        // Initialize an empty array to store the application details
        $applications = array();

        // Fetch each application detail and add it to the $applications array
        while ($row = mysqli_fetch_assoc($result)) {
            $applications[] = $row;
        }

        // Close the database connection
        mysqli_close($connection);

        return $applications; // Return the application details as an array

    } catch (Exception $e) {
        // Handle errors
        echo "Database Error: " . $e->getMessage();
        return null; // Return null in case of an error
    }
}
?>
