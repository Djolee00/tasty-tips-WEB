<?php 

require '../db_connection.php';
require '../models/User.php';


if(isset($_POST['username']) || isset($_POST['email']))
{
    session_start();
    $username = sanitizeUserInput($_POST['username']);
    $email = sanitizeUserInput($_POST['email']);

    $user = unserialize($_SESSION['user']);
    $user->setUsername($username);
    $user->setEmail($email);

    if($user->update($conn))
    {
        $_SESSION['user'] = serialize($user);
        header("Location: ../index.php?message='User data updated successfully'");
    }else
    {
        header("Location: ../index.php?message='User data update failed'");
    }

}


/**
 * sanitize - to prevent any unsafe data which user can enter
 */
function sanitizeUserInput($data){
    $data = trim($data); 
    $data = stripslashes($data);   // removes '/', this is important for showing data through app
    $data = htmlspecialchars($data); // converts HTML special chars to normal chars
    return $data;
}


?>