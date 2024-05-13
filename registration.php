<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>

    <!-- main css file -->
    <link rel="stylesheet" href="./assets/css/main.css">

    <!-- registration page css file -->
    <link rel="stylesheet" href="./assets/css/registration.css">
</head>

<body>
    <div class="container">
        <h2 class="text-bold display-h4 mb-lg">User Registration</h2>
        <form action="process_registration.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="user_id" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div class="form-group">
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="profile_photo">Profile Photo:</label>
                <input type="file" id="profile_photo" name="profile_photo" accept="image/*" required>
            </div>
            <div id="form-group profile_photo_preview">
                <img id="preview_image" src="#" alt="Profile Photo Preview" style="max-width: 200px; display: none;">
            </div>
            <button type="submit" class="btn btn-secondary mb-md">Register</button>
        </form>
        <p>Already have an account? <a href="login_page.php"><span class="text-bold">Login here</span></a></p>
    </div>

    <script>
        // JavaScript to show profile photo preview
        document.getElementById("profile_photo").addEventListener("change", function() {
            const fileInput = this;
            const previewImage = document.getElementById("preview_image");

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = "block";
                };
                reader.readAsDataURL(fileInput.files[0]);
            } else {
                previewImage.src = "#";
                previewImage.style.display = "none";
            }
        });
    </script>
</body>

</html>