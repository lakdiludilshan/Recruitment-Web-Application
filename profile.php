<?php
// attach the header
require_once 'includes\header.php';

// Get the user details from the database
require_once 'process_get_user.php';
$user = getUserDetails($user_id);

// Get the user's jobs from the database
require_once 'process_get_user_jobs.php';
$jobsPostedByUser = getJobsPostedByUser($user_id);

// Get the user's saved jobs from the database
require_once 'process_get_saved_jobs.php';
$savedJobs = getSavedJobs($user_id);

// get users applications
require_once 'process_get_applications.php';
$applications = getApplicationsByUserId($user_id);

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Profile</title>
  <link rel="stylesheet" href="assets/css/profile.css">
  <script src="./assets/js/profile.js" defer></script>
</head>

<body>
  <main class="account-section section">
    <div class="container">
      <h1 class="display-h4 text-bold text-capitalize mb-md">Account</h1>
      <section class="user-details">
        <h2 class="display-h4 text-bold text-capitalize mb-md">User Details</h2>
        <div class="profile-content">
          <div class="profile-photo">
            <img src="<?php echo $user['profile_photo']; ?>" alt="Profile Photo">
          </div>
          <div class="profile-info">
            <div class="name mb-lg">
              <h3 class="mb-sm text-muted display-h4">Name</h3>
              <p><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></p>
            </div>
            <div class="email mb-lg">
              <h3 class="mb-sm text-muted display-h4">Email</h3>
              <p><?php echo $user['email']; ?></p>
            </div>
            <div class="phone">
              <h3 class="mb-sm text-muted display-h4">Phone</h3>
              <p><?php echo $user['phone']; ?></p>
            </div>
          </div>
          <button type="button" class="btn btn-danger" id="logoutButton">Logout</button>
        </div>
      </section>
      <section class="posted-jobs-section">
        <h2 class="display-h4 text-bold text-capitalize mb-md">Posted Jobs</h2>
        <ul class="jobs-list">
          <?php foreach ($jobsPostedByUser as $job) : ?>
            <li class="job">
              <a href="#">
                <div class="job-info mb-lg">
                  <img class="job-banner" src="<?php echo $job['image']; ?>" alt="<?php echo $job['title']; ?>">
                  <div class="job-content">
                    <h3 class="job-title text-bold text-capitalize display-h4"><?php echo $job['title']; ?></h3>
                    <p class="job-posted-date"><span class="text-muted">Posted date: </span><?php echo $job['posted_date'] ?></p>
                    <p class="job-posted-time"><span class="text-muted">Posted time: </span><?php echo $job['posted_time'] ?></p>
                  </div>
                </div>

                <!-- Section for applicants details -->
                <div class="applicants-section">
                  <h4 class="text-capitalize display-h4 mb-md">Applicants for this job:</h4>
                  <?php
                  // Get the applicants for this job
                  require_once 'process_get_applicants.php';
                  $applicantsForJob = getApplicantsForJob($job['job_id']);

                  if (!empty($applicantsForJob)) {
                    echo "<ul class='applicants-list'>";
                    foreach ($applicantsForJob as $applicant) {
                      echo "<li class='applicant mb-md'>";
                      echo "<p>" . $applicant['first_name'] . " " . $applicant['last_name'] . "</p>";
                      echo "<p>" . $applicant['email'] . "</p>";
                      echo "<p>" . $applicant['phone'] . "</p>";
                      echo "</li>";
                    }
                    echo "</ul>";
                  } else {
                    echo "<p>No applicants found for this job.</p>";
                  }
                  ?>
                </div>
              </a>
              <div class="job-actions">
                <!-- view the job -->
                <form action="view_job.php">
                  <a href="job_view.php?job_id=<?php echo $job['job_id'] ?>" class="btn btn-primary">View</a>
                </form>
                <!-- edit the job -->
                <form action="edit_job.php">
                  <a href="edit_job.php?job_id=<?php echo $job['job_id'] ?>" class="btn btn-secondary">Edit</a>
                </form>
                <!-- delete the job -->
                <form action="process_delete_job.php">
                  <a href="process_delete_job.php?job_id=<?php echo $job['job_id'] ?>" class="btn btn-danger">Delete</a>
                </form>
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      </section>
      <section class="saved-jobs-section">
        <h2 class="display-h4 text-bold text-capitalize mb-md">Saved Jobs</h2>
        <ul class="jobs-list">
          <?php foreach ($savedJobs as $job) : ?>
            <li class="job">
              <a href="#">
                <img class="mb-sm" src="<?php echo $job['image']; ?>" alt="<?php echo $job['title']; ?>">
                <h3 class="mb-sm job-title text-bold text-capitalize display-h4"><?php echo $job['title']; ?></h3>
                <p class="text-muted"><?php echo $job['user_id']; ?></p>
                <p class="text-bold">Rs. <?php echo $job['salary']; ?></p>
                <p class="text-muted"><?php echo $job['city']; ?>, <?php echo $job['district']; ?></p>
                <p class="text-muted"><?php echo $job['posted_date'] ?></p>
                <p class="text-muted mb-md"><?php echo $job['posted_time'] ?></p>
              </a>
              <form action="process_unsave_job.php">
                <input type="hidden" name="job_id" value="<?php echo $job['job_id']; ?>">
                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                <button type="submit" class="btn btn-danger">Unsave</button>
              </form>
            </li>
          <?php endforeach; ?>
        </ul>
      </section>
      <section class="recent-applications-section">
        <h2 class="display-h4 text-bold text-capitalize mb-md">Recent Applications</h2>
        <ul class="applications-list">
          <li class="header card mb-sm">
            <p class="display-h6 text-bold title">Job Title</p>
            <p class="display-h6 text-bold company">Name</p>
            <p class="display-h6 text-bold phone">Phone</p>
            <p class="display-h6 text-bold job-type">Job Type</p>
            <p class="display-h6 text-bold job-category">Category</p>
            <p class="display-h6 text-bold salary">Salary</p>
            <p class="display-h6 text-bold location">Location</p>
            <p class="display-h6 text-bold applied-on">Applied Date</p>
            <p class="display-h6 text-bold status">Status</p>
          </li>
          <?php foreach ($applications as $application) : ?>
            <li class="card mb-sm">
              <p><?php echo $application['title'] ?></p>
              <p><?php echo $application['first_name'] ?> <?php echo $application['last_name'] ?></p>
              <p><?php echo $application['phone'] ?></p>
              <p><?php echo $application['job_type'] ?></p>
              <p><?php echo $application['category'] ?></p>
              <p><?php echo $application['salary'] ?></p>
              <p><?php echo $application['city'] ?>, <?php echo $application['district'] ?></p>
              <p><?php echo $application['applied_date'] ?> <?php echo $application['applied_time'] ?></p>
              <p><?php echo $application['status'] ?></p>
            </li>
          <?php endforeach; ?>
        </ul>
      </section>
    </div>
  </main>
</body>

</html>