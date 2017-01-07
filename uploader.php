<?php

session_start();
include("connection.php");

$target_path = "profile_pictures/"; 

//$target_path = $target_path . 'Your_new_filename'; 

//$original_name = $_FILES['uploadedfile']['name'];
//$ext = pathinfo($original_name, PATHINFO_EXTENSION);

//echo $ext['extension'];
//$extension = $ext['extension'];

//$target_path = $target_path . basename($_SESSION["username"]."."."$ext");


//$target_file = $target_path . basename($_FILES["fileToUpload"]["name"]);       ***************
$target_path = $target_path . basename($_SESSION["username"]);  

/*$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}*/

/*$picture = $_FILES['uploadedfile']['name'];
$uid = $_SESSION['userId'];
$p = "UPDATE asker SET picturename = '$picture' WHERE uid = '$uid'";
$pic = mysqli_query($conn, $p);*/
/*if($_FILES['uploadedfile']['name'] != "jpg" && $_FILES['uploadedfile']['name'] != "png" && $_FILES['uploadedfile']['name']= "jpeg"
&& $_FILES['uploadedfile']['name'] != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}*/
if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) { 
    echo "The file ".  basename( $_FILES['uploadedfile']['name']).  
    " has been uploaded"; 
    header("Location: profile.php");
} else{ 
    echo "There was an error uploading the file, please try again!"; 
}  

mysqli_close($conn);

?>