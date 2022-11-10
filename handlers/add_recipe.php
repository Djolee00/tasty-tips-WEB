<?php

require '../db_connection.php';
require '../models/User.php';
require '../models/Recipe.php';

/**
 *  this is file which handles POST request for adding recipe
 */


session_start();
$user = unserialize($_SESSION['user']);

$name = sanitizeUserInput($_POST['name']);
$prep_time = $_POST['prep_time'];
$cook_time = $_POST['cook_time'];
$servings = $_POST['servings'];
$step_one = $_POST['step_1'];
$step_two = $_POST['step_2'];
$step_three = $_POST['step_3'];
$description = $_POST['description'];
$user_id = $user->getId();


// every member of $_FILES have ['temp_name'] and ['name']

/*  From StackverFlow
    //  $image['tmp_name'] -  Provides the name of the file stored on the web server’s hard disk in the system temporary file directory
    //  $imga['name'] -Provides the name of the file on the client machine before 
    //                 it was submitted.If you make a permanent copy of the temporary file, 
    //                 you might want to give it its original name instead of the 
    //                 automatically-generated temporary filename that’s described above.
    */
$image = $_FILES['image'];

$image_extension = pathinfo($image['name'], PATHINFO_EXTENSION); // to get extension of image (example .jpeg .png)
$image['name'] = guidv4() . '.' . $image_extension; // because images can maybe have same names, i generate random names to store them in db

move_uploaded_file($image['tmp_name'], '../assets/recipes/' . $image['name']);

$imageName = $image['name'];

if (
    isset($name) && isset($prep_time) && isset($cook_time) && isset($servings) && isset($step_one) && isset($step_two) && isset($step_three) &&
    isset($description) && isset($user_id) && isset($image)
) {
    $recipe = new Recipe(null, $name, $prep_time, $cook_time, $servings, $step_one, $step_two, $step_three, $description, $imageName, $user_id);
    if ($recipe->insert($conn)) {
        // header("Location: ../index.php?message='Recipe has been posted successfully'");
        echo "Success";
        exit();
    } else {
        // header("Location: ../index.php?message='Error adding new Recipe'");
        echo "Failure";
        exit();
    };
} else {
    echo "Error";
    exit();
    // header("Location: ../index.php?message='Invalid request format'");
}




/**
 * sanitize - to prevent any unsafe data which user can enter
 */
function sanitizeUserInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);   // removes '/', this is important for showing data through app
    $data = htmlspecialchars($data); // converts HTML special chars to normal chars
    return $data;
}

/**
 * function to generate random GUID - globally unique identifier
 */
function guidv4($data = null)
{
    $data = $data ?? random_bytes(16);
    assert(strlen($data) == 16);

    $data[6] = chr(ord($data[6]) & 0x0f | 0x40);
    $data[8] = chr(ord($data[8]) & 0x3f | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($data), 4));
}
