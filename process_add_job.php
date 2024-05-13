<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    // Check if the form was submitted with an image
    if (isset($_FILES["job-banner"]) && $_FILES["job-banner"]["error"] === UPLOAD_ERR_OK) {
        require_once 'process_image.php';
        $image = uploadImage($_FILES["job-banner"], "uploads/job-banners/");
    } else {
        $image = null;
        die("No image selected or error during upload.");
    }

    // Get form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $jobType = $_POST["job-type"];
    $category = $_POST["category"];
    $qualifications = $_POST["qualifications"];
    $experience = $_POST["experience"];
    $education = $_POST["education"];
    $salary = $_POST["salary"];
    $city = $_POST["city"];
    $district = $_POST["district"];
    $user_id = $_POST["user_id"];

    // Current date and time
    $postedDate = date("Y-m-d");
    $postedTime = date("H:i:s");

    // Sanitize the inputs to prevent SQL injection
    $title = mysqli_real_escape_string($connection, $title);
    $description = mysqli_real_escape_string($connection, $description);
    $jobType = mysqli_real_escape_string($connection, $jobType);
    $category = mysqli_real_escape_string($connection, $category);
    $qualifications = mysqli_real_escape_string($connection, $qualifications);
    $experience = mysqli_real_escape_string($connection, $experience);
    $education = mysqli_real_escape_string($connection, $education);
    $salary = mysqli_real_escape_string($connection, $salary);

    $query = "INSERT INTO jobs (user_id, title, description, job_type, category, qualifications, experience, education, salary, posted_date, posted_time, city, district, image)
              VALUES ('$user_id', '$title', '$description', '$jobType', '$category', '$qualifications', '$experience', '$education', '$salary', '$postedDate', '$postedTime', '$city', '$district', '$image')";

    // Execute the insert query
    $result = mysqli_query($connection, $query);

    // Check if the query was successful
    if ($result) {
        
        // Redirect to the job details page with parameters
        header("Location: profile.php");
    } else {
        echo 'Error posting job: ' . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
