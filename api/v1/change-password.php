<?php
 require_once 'header.php';
 include("../phpclass/phpupdate.php");
 
try {

    // make sure request method are eith POST or PUT or DELETE or GET
    require_once 'client-request.php'; 

    // Valid request method
    if ($_SERVER['REQUEST_METHOD'] != 'PUT') 
        throw new Exception("Bad request. PUT method required 400"); 

    //Assign values to variables    
    $email = isset($_POST['email']) ? formatInput($_POST['email']) : null;
    $new_password = isset($_POST['new_password']) ? formatInput($_POST['new_password']) : null; 
    $current_password = isset($_POST['current_password']) ? formatInput($_POST['current_password']) : null;
    
    // confirm new and current password isn't empty
    if (empty($email)) throw new Exception("Please enter your email address 417");
    if (empty($new_password)) throw new Exception("Please enter new password 417");
    if (empty($current_password)) throw new Exception("Please enter current password 417");

    $updateUser= new updateUser;
    $response=$updateUser-> changeuserpassword($email, $current_password, $new_password);
    

    $response = array(
        "data" => $response,
        "success" => true,
        "message" => "password changed successfully"
    );

    require_once 'response.php';
        
} catch(Exception $error) {
    require_once 'error-response.php';
}