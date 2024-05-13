<?php
// add the header file
require_once 'includes/header.php';

// Get the user id from the session
$userId = $_SESSION['userid'];

// Include the database connection file
require_once 'database_connection.php';

// Check if the job_id is provided in the URL
if (isset($_GET['job_id']) && !empty($_GET['job_id'])) {
    // Connect to the database
    $connection = connectToDatabase();

    // Get the job_id from the URL
    $job_id = $_GET['job_id'];

    // get the job details from the database
    require_once 'process_get_job_details.php';

    $job = getJobDetails($job_id);

    if (!$job) {
        // Redirect to a 404 page or show an error message
        echo 'Job not found.';
        exit();
    }

    // Get the job author details from the database
    require_once 'process_get_job_author.php';
    $jobAuthor = getJobAuthorDetails($job_id);
    if (!$jobAuthor) {
        echo "Author details not found for this job.";
    }

    // Close the database connection
    mysqli_close($connection);
} else {
    // Redirect to a 404 page or show an error message
    echo 'Job ID not provided.';
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title><?php echo $job['title']; ?> - Job Details</title>
    <link rel="stylesheet" href="./assets/css/job_view.css">
    <script src="./assets/js/job_view.js"></script>
</head>

<body>
    <main class="view-job-section">
        <div class="container">
            <div class="view-job-header">
                <div class="top">
                    <div class="job-banner">
                        <img src="<?php echo $job['image'] ?>" alt="<?php echo $job['title']; ?>">
                    </div>
                    <div class="job-title">
                        <h1 class="mb-lg display-h3 text-capitalize"><?php echo $job['title']; ?></h1>
                        <div class="posted-on">
                            <p class="mb-sm"><span class="text-muted">Posted Date:</span> <?php echo $job['posted_date']; ?></p>
                            <p class="mb-sm"><span class="text-muted">Posted Time:</span> <?php echo $job['posted_time']; ?></p>
                            <p class="mb-sm"><span class="text-muted">Location:</span> <?php echo $job['city']; ?>, <?php echo $job['district']; ?></p>
                        </div>
                    </div>
                </div>
                <div class="bottom">
                    <p class="mb-sm"><span class="text-muted">Employer:</span> <?php echo $jobAuthor['first_name']; ?> <?php echo $jobAuthor['last_name']; ?></p>
                    <p class="mb-sm"><span class="text-muted">Job Type:</span> <?php echo $job['job_type']; ?></p>
                    <p class="mb-sm"><span class="text-muted">Salary per month:</span> <?php echo $job['salary']; ?></p>
                    <p class="mb-sm"><span class="text-muted">Education Required:</span> <?php echo $job['education']; ?></p>
                    <p class="mb-sm"><span class="text-muted">Experience Required:</span> <?php echo $job['experience']; ?> years</p>
                    <p class="mb-sm"><span class="text-muted">Qualifications:</span> <?php echo $job['qualifications']; ?></p>
                </div>
            </div>

            <div class="job-description">
                <h2 class="mb-sm display-h4 text-capitalize text-bold">Job Description</h2>
                <p><?php echo $job['description']; ?></p>
            </div>

            <div class="job-actions">
                <!-- Add buttons for applying, saving, and messaging the job author -->
                <form id="applyJobForm" method="post" action="process_apply_job.php">
                    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                    <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
                    <button class="btn" type="submit" onclick="return applyJob()">Apply Now</button>
                </form>
                <form id="saveJobForm" method="post" action="process_save_job.php">
                    <input type="hidden" name="user_id" value="<?php echo $userId; ?>">
                    <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
                    <button class="btn" type="submit" onclick="return saveJob()">Save Job</button>
                </form>
                <a class="btn" href="tel:<?php echo $jobAuthor['phone'] ?>">Call Employer</a>
                <a class="btn" href="mailto:<?php echo $jobAuthor['email'] ?>">Email Employer</a>
            </div>
        </div>
    </main>
</body>

</html>