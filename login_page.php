<!-- login.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- main css file -->
    <link rel="stylesheet" href="./assets/css/main.css">

    <!-- login page css file -->
    <link rel="stylesheet" href="./assets/css/login_page.css">
</head>

<body>
    <div class="container">
        <div class="background-wrapper">
        <div class="info-section">
            <h2 class="text-bold display-h1 text-capitalize mb-sm">Welcome to recruitme</h2>
            <p class="text-muted display-h4 mb-lg">Post your job and find the right candidate.</p>
            <img class="mb-lg" src="./assets/images/Recuirtme.png" alt="logo">
            <p class="display-h5 mb-sm">Start posting your own ads.</p>
            <p class="display-h5 mb-sm">Mark ads as favorite and view them later.</p>
            <p class="display-h5 mb-sm">View and manage your ads at your convenience.</p>
        </div>
        <div class="login-section">
            <h3 class="text-bold display-h4 text-capitalize mb-lg">Login to your account</h3>
            <form action="process_login.php" method="post">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" name="username" required placeholder="Enter your username"><br>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" required placeholder="Enter your password"><br>
                </div>
                <button class="btn mb-lg" type="submit">Login</button>
            </form>
            <p class="mb-sm">Forgot Password? <a href="forgot_password.php"><span class="text-bold">Reset it</span></a></p>
            <p class="">Don't have an account? <a href="registration.php"><span class="text-bold">Register here</span></a></p>
        </div>
        </div>
    </div>
</body>

</html>