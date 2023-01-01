<form action="testscript.php" method="POST" enctype="multipart/form-data">
   <input type="file" name="file">
   <input type ="submit" value="submit">
</form>

<?php
// testing all properties of the $_FILES
echo 'Filename: ' . $_FILES['file']['name'] . '<br>';
echo 'Type : ' . $_FILES['file']['type'] . '<br>';
echo 'Size : ' . $_FILES['file']['size'] . '<br>';
echo 'Temp name: ' . $_FILES['file']['tmp_name'] . '<br>';
echo 'Error : ' . $_FILES['file']['error'] . '<br>';

//Below is a script used to upload file in php
// with the help of $_FILES constant
$target_dir = 'uploads/';
$target_file = $target_dir . basename($_FILES['fileToUpload']['name']);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST['submit'])) {
    $check = getimagesize($_FILES['fileToUpload']['tmp_name']);
    if ($check !== false) {
        echo 'File is an image - ' . $check['mime'] . '.';
        $uploadOk = 1;
    } else {
        echo 'File is not an image.';
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo 'Sorry, file already exists.';
    $uploadOk = 0;
}

// Check file size
if ($_FILES['fileToUpload']['size'] > 500000) {
    echo 'Sorry, your file is too large.';
    $uploadOk = 0;
}

// Allow certain file formats
if (
    $imageFileType != 'jpg' &&
    $imageFileType != 'png' &&
    $imageFileType != 'jpeg' &&
    $imageFileType != 'gif'
) {
    echo 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo 'Sorry, your file was not uploaded.';
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo 'The file ' .
            htmlspecialchars(basename($_FILES['fileToUpload']['name'])) .
            ' has been uploaded.';
    } else {
        echo 'Sorry, there was an error uploading your file.';
    }
}

?>
