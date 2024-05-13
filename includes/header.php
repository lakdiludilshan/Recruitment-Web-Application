<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userid'])) {
    $user = null;
} else {
    // Access the user_id from the session
    $user_id = $_SESSION['userid'];
    // Get the user details from the database
    require_once 'process_get_user.php';
    $user = getUserDetails($user_id);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <title>RecuirtME</title>
</head>

<body>
    <header class="header-section text-capitalize">
        <div class="container">
            <div class="header-logo">
                <a href="https://www.nsbm.ac.lk/">
                    <img src="../assets/images/Recuirtme.png" alt="logo">
                </a>
            </div>
            <nav class="nav-menu">
                <a href="index.php" class="nav-link">Home</a>
                <a href="all_jobs.php" class="nav-link">Find Jobs</a>
                <a href="create_job.php" class="nav-link">Post Job</a>
                <a href="contact_us.php" class="nav-link">Contact Us</a>

                <?php if ($user) : ?>
                    <div class="nav-profile">
                        <img class="nav-link" src="../<?php echo $user['profile_photo'] ?>" alt="profile photo">
                    </div>
                <?php endif; ?>
                <?php if (!$user) : ?>
                    <a href="login_page.php" class="nav-link">Login</a>
                <?php else : ?>
                    <a class="nav-link" href="profile.php"><?php echo $user['first_name'] . ' ' . $user['last_name']; ?></a>
                <?php endif; ?>
            </nav>
        </div>
    </header>
</body>