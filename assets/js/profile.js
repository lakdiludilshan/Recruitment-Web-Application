// Get the logout button element by its ID
const logoutButton = document.getElementById('logoutButton');

// Add a click event listener to the logout button
logoutButton.addEventListener('click', function () {
    // Redirect the user to the logout PHP script
    window.location.href = 'logout.php';
});
