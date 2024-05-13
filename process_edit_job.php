<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include the database connection file
    require_once 'database_connection.php';

    // Connect to the database
    $connection = connectToDatabase();

    // Check if the form was submitted with an image
    if (isset($_FILES["job-banner"]) && $_FILES["job-banner"]["error"] === UPLOAD_ERR_OK) {
        require_once 'process_image.php';
        $image=uploadImage($_FILES["job-banner"], "uploads/job-banners/");
    } else {
        $image = null;
    }

    // Get form data
    $jobId = $_POST["job_id"];
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

    // Insert data into the "job" table
    if($image==null){
        $sql = "UPDATE jobs SET title='$title', description='$description', job_type='$jobType', category='$category', qualifications='$qualifications', experience=$experience, education='$education', 
        salary='$salary', city='$city', district='$district' WHERE job_id=$jobId";
    }else{
        $sql = "UPDATE jobs SET title='$title', description='$description', job_type='$jobType', category='$category', qualifications='$qualifications', experience=$experience, education='$education', 
        salary='$salary', city='$city', district='$district', image='$image' WHERE job_id=$jobId";
    }

    // Execute the insert query
    $result = mysqli_query($connection, $sql);

    // Check if the query was successful
    if ($result) {
        echo "Job posted successfully.";
        header("Location: job_view.php?job_id=$jobId");
    } else {
        echo 'Error posting job: ' . mysqli_error($connection);
    }

    // Close the database connection
    mysqli_close($connection);
}
