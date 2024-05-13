<?php
include './includes/header.php';
require_once 'process_get_all_jobs.php';
// Call the function to get all jobs
$allJobs = getAllJobs();

// Initialize an empty array to store selected categories
$selectedCategories = array();

// check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "GET") {


    // Check if the 'category' parameter exists in the URL and is an array
    if (isset($_GET['category']) && is_array($_GET['category'])) {
        // Sanitize and store the selected categories
        foreach ($_GET['category'] as $category) {
            $selectedCategories[] = filter_var($category, FILTER_SANITIZE_STRING);
        }
        require_once 'process_filter_jobs.php';

        //filter the jobs by category
        $allJobs = filterJobsByCategories($selectedCategories, $allJobs);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Website</title>
    <link rel="stylesheet" href="./assets/css/all_jobs.css">
</head>

<body>
    <main class="container section">
        <h2 class="mb-lg text-bold display-h3">Jobs list in sri lanka</h2>
        <section class="jobs-section">
            <ul class="job-list">
                <?php foreach ($allJobs as $job) : ?>
                    <li class="job-card card mb-md">
                        <a href="job_view.php?job_id=<?php echo $job['job_id'] ?>" class="job-link">
                            <div class="job-banner">
                                <img src="<?php echo $job['image']; ?>" alt="<?php echo $job['title']; ?>">

                            </div>
                            <div class="job-content">
                                <h3 class="display-h3 text-bold mb-sm text-capitalize"><?php echo $job['title']; ?></h3>
                                <p class="username mb-sm"><?php echo $job['user_id']; ?></p>
                                <p class="salary mb-sm display-h5 text-bold text-primary">Rs. <?php echo $job['salary']; ?></p>
                                <p class="city mb-lg text-muted"><?php echo $job['city']; ?>, <?php echo $job['district']; ?></p>
                                <div class="date-time">
                                <p class="posted-date mb-sm text-muted text-bold"><?php echo $job['posted_date'] ?></p>
                                <p class="posted-time mb-sm text-muted text-bold"><?php echo $job['posted_time'] ?></p>
                                </div>
                            </div>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="filters">
                <div class="filter-header mb-md">
                    <h2>Filter by category</h2>
                </div>
                <form action="#" method="get">
                    <input type="submit" class="mb-lg btn display-h5" value="Filter">
                    <div class="form-group mb-md">
                        <label for="IT-&-Software">IT & Software</label>
                        <input type="checkbox" name="category[]" id="IT-&-Software" value="IT & Software" <?php if (in_array('IT & Software', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                    <div class="form-group mb-md">
                        <label for="Accounting-&-Finance">Accounting & Finance</label>
                        <input type="checkbox" name="category[]" id="Accounting-&-Finance" value="Accounting & Finance" <?php if (in_array('Accounting & Finance', $selectedCategories)) echo 'checked'; ?>>
                    </div>

                    <div class="form-group mb-md">
                        <label for="Engineering">Engineering</label>
                        <input type="checkbox" name="category[]" id="Engineering" value="Engineering" <?php if (in_array('Engineering', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                    <div class="form-group mb-md">
                        <label for="Sales-&-Marketing">Sales & Marketing</label>
                        <input type="checkbox" name="category[]" id="Sales-&-Marketing" value="Sales & Marketing" <?php if (in_array('Sales & Marketing', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                    <div class="form-group mb-md">
                        <label for="Customer-Service">Customer Service</label>
                        <input type="checkbox" name="category[]" id="Customer-Service" value="Customer Service" <?php if (in_array('Customer Service', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                    <div class="form-group mb-md">
                        <label for="Admin-&-Support">Admin & Support</label>
                        <input type="checkbox" name="category[]" id="Admin-&-Support" value="Admin & Support" <?php if (in_array('Admin & Support', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                    <div class="form-group mb-md">
                        <label for="Human-Resources">Human Resources</label>
                        <input type="checkbox" name="category[]" id="Human-Resources" value="Human Resources" <?php if (in_array('Human Resources', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                    <div class="form-group mb-md">
                        <label for="Operations">Operations</label>
                        <input type="checkbox" name="category[]" id="Operations" value="Operations" <?php if (in_array('Operations', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                    <div class="form-group mb-md">
                        <label for="Education">Education</label>
                        <input type="checkbox" name="category[]" id="Education" value="Education" <?php if (in_array('Education', $selectedCategories)) echo 'checked'; ?>>
                    </div>
                </form>

            </div>
        </section>
    </main>
    <footer>
        <p>Copyright © 2023 Job Posting Website</p>
    </footer>
</body>

</html>