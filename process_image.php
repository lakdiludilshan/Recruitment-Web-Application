<?php
function uploadImage($sourceFile, $uploadsFolderPath)
{
    // Get file details
    $file_name = $sourceFile["name"];
    $file_tmp = $sourceFile["tmp_name"];
    $file_type = $sourceFile["type"];

    // Generate a unique filename to avoid overwriting files with the same name
    $target_file = $uploadsFolderPath . uniqid() . '_' . $file_name;

    // Check if the file is an image
    $allowed_types = array("image/jpeg", "image/png", "image/gif");
    if (!in_array($file_type, $allowed_types)) {
        die("Invalid file type. Allowed image formats: JPG, PNG, GIF.");
    }

    // Move the uploaded image to the desired location
    if (!move_uploaded_file($file_tmp, $target_file)) {
        die("Error uploading the image.");
    }

    return $target_file;
}
?>
