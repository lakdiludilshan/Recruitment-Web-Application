<?php

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    // If the user is not logged in, redirect to the login page
    header("Location: login_page.php");
    exit();
}else{
    // If the user is logged in, get the user id
    $user_id = $_SESSION['userid'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a New Job</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/create_job.css">
    <script src="./assets/js/create_job.js" defer></script>
</head>

<body>
    <main class="post-job-section section">
        <div class="container">
        <h3 class="post-job-title display-h4 text-bold mb-lg">Fill in the details</h3>
        <form action="process_add_job.php" onsubmit="validateForm()" method="post" enctype="multipart/form-data" class="post-job-form">
            <h2 class="display-h4 text-bold mb-md">Job Details</h2>
            <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" id="title" name="title" placeholder="Example: Senior Web developer">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="15" placeholder="Describe the job in detail"></textarea>
            </div>
            <div class="form-group">
                <label for="job-type">Job Type</label>
                <select name="job-type" id="job-type">
                    <option value="">Select a category</option>
                    <option value="full-time">full time</option>
                    <option value="part-time">part time</option>
                    <option value="contract">contract</option>
                    <option value="internship">internship</option>
                    <option value="temporary">temporary</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="">Select a category</option>
                    <option value="IT & Software">IT & Software</option>
                    <option value="Accounting & Finance">Accounting & Finance</option>
                    <option value="Engineering">Engineering</option>
                    <option value="Sales & Marketing">Sales & Marketing</option>
                    <option value="Customer Service">Customer Service</option>
                    <option value="Admin & Support">Admin & Support</option>
                    <option value="Human Resources">Human Resources</option>
                    <option value="Operations">Operations</option>
                    <option value="Education">Education</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input name="salary" type="text" id="salary" placeholder="Enter salary">
            </div>
            <!-- Add an input for job-banner image -->
            <div class="form-group">
                <label for="job-banner">Job Banner Image</label>
                <input name="job-banner" type="file" id="job-banner">
            </div>

            <!-- Section to preview job-banner image -->
            <div class="form-group">
                <label>Job Banner Preview</label>
                <div id="job-banner-preview"></div>
            </div>

            <!-- Add sections for location details (city and district) -->
            <div class="form-group">
                <label for="city">City</label>
                <input name="city" type="text" id="city" placeholder="Enter city">
            </div>

            <div class="form-group">
                <label for="district">District</label>
                <input name="district" type="text" id="district" placeholder="Enter district">
            </div>
            <h2 class="display-h4 text-bold mb-md">Job Requirements</h2>
            <div class="form-group">
                <label for="qualifications">Qualifications</label>
                <input name="qualifications" type="text" id="qualifications" placeholder="Enter qualifications">
            </div>
            <div class="form-group">
                <label for="experience">Required work experience (years)</label>
                <input name="experience" type="number" id="experience" placeholder="Enter number of years">
            </div>
            <div class="form-group">
                <label for="education">Required education level</label>
                <select name="education" id="education">
                    <option value="">Select the education</option>
                    <option value="ordinary-level">ordinary level</option>
                    <option value="advanced-level">advanced level</option>
                    <option value="certified">certified</option>
                    <option value="deploma">deploma</option>
                    <option value="advanced-deploma">advanced deploma</option>
                    <option value="degree">degree</option>
                    <option value="doctorate">doctorate</option>
                    <option value="skilled-apprentice">skilled apprentice</option>
                </select>
            </div>
            <button type="submit" class="btn">Post Job</button>
        </form>
        </div>
    </main>
</body>

</html>