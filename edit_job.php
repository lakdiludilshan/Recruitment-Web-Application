<?php 

// add header
require_once 'includes/header.php';

// Check if the 'job_id' parameter exists in the URL
if (isset($_GET['job_id']) && !empty($_GET['job_id'])) {
    $jobId = $_GET['job_id'];

    // get the job details from the database
    require_once 'process_get_job_details.php';
    $job = getJobDetails($jobId);

} else {
    echo "job not selected.";
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Job Details</title>
    <link rel="stylesheet" href="assets/css/edit_job.css">
</head>

<body>
    <main class="edit-job-section section">
        <div class="container">
        <h3 class="display-h4 text-bold mb-lg">Edit the details</h3>
        <form action="process_edit_job.php" onsubmit="validateForm()" method="post" enctype="multipart/form-data" class="edit-job-form">
            <h2>Job Details</h2>
            <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
            <div class="form-group">
                <label for="title">Job Title</label>
                <input type="text" id="title" name="title" placeholder="Example: Senior Web developer" value="<?php echo $job['title']; ?>">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" rows="15" placeholder="Describe the job in detail"><?php echo $job['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="job-type">Job Type</label>
                <select name="job-type" id="job-type">
                    <option value="">Select a category</option>
                    <option value="full-time" <?php if ($job['job_type'] === 'full-time') echo 'selected'; ?>>full time</option>
                    <option value="part-time" <?php if ($job['job_type'] === 'part-time') echo 'selected'; ?>>part time</option>
                    <option value="contract" <?php if ($job['job_type'] === 'contract') echo 'selected'; ?>>contract</option>
                    <option value="internship" <?php if ($job['job_type'] === 'internship') echo 'selected'; ?>>internship</option>
                    <option value="temporary" <?php if ($job['job_type'] === 'temporary') echo 'selected'; ?>>temporary</option>
                </select>
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <select name="category" id="category">
                    <option value="">Select a category</option>
                    <option value="IT & Software" <?php if ($job['category'] === 'IT & Software') echo 'selected'; ?>>IT & Software</option>
                    <option value="Accounting & Finance" <?php if ($job['category'] === 'Accounting & Finance') echo 'selected'; ?>>Accounting & Finance</option>
                    <option value="Engineering" <?php if ($job['category'] === 'Engineering') echo 'selected'; ?>>Engineering</option>
                    <option value="Sales & Marketing" <?php if ($job['category'] === 'Sales & Marketing') echo 'selected'; ?>>Sales & Marketing</option>
                    <option value="Customer Service" <?php if ($job['category'] === 'Customer Service') echo 'selected'; ?>>Customer Service</option>
                    <option value="Admin & Support" <?php if ($job['category'] === 'Admin & Support') echo 'selected'; ?>>Admin & Support</option>
                    <option value="Human Resources" <?php if ($job['category'] === 'Human Resources') echo 'selected'; ?>>Human Resources</option>
                    <option value="Operations" <?php if ($job['category'] === 'Operations') echo 'selected'; ?>>Operations</option>
                    <option value="Education" <?php if ($job['category'] === 'Education') echo 'selected'; ?>>Education</option>
                </select>
            </div>
            <div class="form-group">
                <label for="salary">Salary</label>
                <input name="salary" type="text" id="salary" placeholder="Enter salary" value="<?php echo $job['salary']; ?>">
            </div>

            <div class="form-group">
                <label for="job-banner">Job Banner Image</label>
                <input name="job-banner" type="file" id="job-banner" value="">
            </div>

            <div class="form-group">
                <label>Job Banner Preview</label>
                <div id="job-banner-preview" class="job-banner-preview">
                    <img src="<?php echo $job['image']; ?>" alt="Job Banner Preview" width="200">
                </div>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input name="city" type="text" id="city" placeholder="Enter city" value="<?php echo $job['city']; ?>">
            </div>

            <div class="form-group">
                <label for="district">District</label>
                <input name="district" type="text" id="district" placeholder="Enter district" value="<?php echo $job['district']; ?>">
            </div>
            <h2>Job Requirements</h2>
            <div class="form-group">
                <label for="qualifications">Qualifications</label>
                <input name="qualifications" type="text" id="qualifications" placeholder="Enter qualifications" value="<?php echo $job['qualifications']; ?>">
            </div>
            <div class="form-group">
                <label for="experience">Required work experience (years)</label>
                <input name="experience" type="number" id="experience" placeholder="Enter number of years" value="<?php echo $job['experience']; ?>">
            </div>
            <div class="form-group">
                <label for="education">Required education level</label>
                <select name="education" id="education">
                    <option value="">Select the education</option>
                    <option value="ordinary-level" <?php if ($job['education'] === 'ordinary-level') echo 'selected'; ?>>ordinary level</option>
                    <option value="advanced-level" <?php if ($job['education'] === 'advanced-level') echo 'selected'; ?>>advanced level</option>
                    <option value="certified" <?php if ($job['education'] === 'certified') echo 'selected'; ?>>certified</option>
                    <option value="deploma" <?php if ($job['education'] === 'deploma') echo 'selected'; ?>>deploma</option>
                    <option value="advanced-deploma" <?php if ($job['education'] === 'advanced-deploma') echo 'selected'; ?>>advanced deploma</option>
                    <option value="degree" <?php if ($job['education'] === 'degree') echo 'selected'; ?>>degree</option>
                    <option value="doctorate" <?php if ($job['education'] === 'doctorate') echo 'selected'; ?>>doctorate</option>
                    <option value="skilled-apprentice" <?php if ($job['education'] === 'skilled-apprentice') echo 'selected'; ?>>skilled apprentice</option>
                </select>
            </div>
            <button type="submit" class="btn">Save changes</button>
        </form>
        </div>
    </main>
    <footer>
        <p>Copyright © 2023 Job Posting Website</p>
    </footer>
</body>

</html>