<?php
require_once 'header.php';
include("../phpclass/phpinsert.php");

try { 

    // make sure request method are eith POST or PUT or DELETE or GET
    require_once 'client-request.php';      

    // Valid request method
    if ($_SERVER['REQUEST_METHOD'] != 'POST') 
        throw new Exception("Bad request. POST method required 400");

    //assign value to variables
    $email = isset($_POST['email']) ? formatInput($_POST['email']) : null;
    $password = isset($_POST['password']) ? formatInput($_POST['password']) : null;
    
    if (empty($email)) throw new Exception("Error: Email can not be empty 417");
    if (empty($password)) throw new Exception("Error: Password can not be empty 417");

    
    $todosignupclass= new insertTable;
    $response=$todosignupclass->insert_user($email, $password);
    $response = array(
        "data" => $response,
        "success" => true,
        "message" => "signup successfully"
    );

    // return response
    require_once 'response.php';
            
} catch(Exception $error) {
    // thro error
    require_once 'error-response.php';
}