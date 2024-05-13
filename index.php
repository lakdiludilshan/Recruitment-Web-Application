<?php
//include the header
include_once 'includes/header.php';

//get the jobs from the database
require_once 'process_get_all_jobs.php';
$allJobs = getAllJobs();

// Define a custom sorting function
function sortByPostedDateTime($a, $b)
{
  // Combine the posted_date and posted_time into a single timestamp
  $timestampA = strtotime($a['posted_date'] . ' ' . $a['posted_time']);
  $timestampB = strtotime($b['posted_date'] . ' ' . $b['posted_time']);

  // Sort in descending order based on the timestamps
  return $timestampB - $timestampA;
}

// Sort the $allJobs array using the custom sorting function
usort($allJobs, 'sortByPostedDateTime');

// Extract the first three elements from the sorted array
$recentJobs = array_slice($allJobs, 0, 3);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RecuirtME - browse thousands of jobs</title>
  <link rel="stylesheet" href="../assets/css/index.css">
</head>

<body>
  <div class="container">
    <main>
      <section class="hero section">
        <h1 class="display-h1 text-capitalize mb-sm">Find the perfect job for you</h1>
        <p class="display-h4 mb-md">Browse thousands of jobs in Sri Lanka</p>
        <a href="all_jobs.php" class="btn">Find Jobs</a>
      </section>
      <section class="category section">
        <h2 class="mb-md text-bold display-h3">Browse Jobs</h2>
        <ul class="categories mb-lg">
          <li class="card"><a href="all_jobs.php?category%5B%5D=IT+%26+Software#">IT & Software</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Accounting+%26+Finance#">Accounting & Finance</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Engineering#">Engineering</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Sales+%26+Marketing#">Sales & Marketing</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Customer+%26+Service#">Customer Service</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Admin+%26+Support#">Admin & Support</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Human+%26+Resources#">Human Resources</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Operations#">Operations</a></li>
          <li class="card"><a href="all_jobs.php?category%5B%5D=Education#">Education</a></li>
        </ul>
        <a href="all_jobs.php" method="post" class="btn">View all Jobs</a>
      </section>
      <section class="featured-jobs">
        <h2 class="mb-lg text-bold display-h3">Featured Jobs</h2>
        <ul class="featured-job-list mb-lg">
          <?php foreach ($recentJobs as $job) : ?>
            <li class="job-card card mb-md">
              <a href="job_view.php?job_id=<?php echo $job['job_id'] ?>" class="job-link">
                <div class="job-banner">
                  <img src="<?php echo $job['image']; ?>" alt="<?php echo $job['title']; ?>">

                </div>
                <div class="job-content text-bold">
                  <h3 class="display-h3 text-bold mb-sm text-capitalize"><?php echo $job['title']; ?></h3>
                  <p class="username mb-sm"><?php echo $job['user_id']; ?></p>
                  <p class="salary mb-sm display-h5 text-bold text-primary">Rs. <?php echo $job['salary']; ?></p>
                  <p class="city mb-sm text-muted"><?php echo $job['city']; ?>, <?php echo $job['district']; ?></p>
                  <p class="posted-date mb-sm text-muted"><?php echo $job['posted_date'] ?></p>
                  <p class="posted-time mb-sm text-muted"><?php echo $job['posted_time'] ?></p>
                </div>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
        <a href="all_jobs.php" method="post" class="btn">View all Jobs</a>
      </section>
    </main>
  </div>
</body>

</html>

