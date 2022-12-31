<?php
require_once 'header.php';
include("../phpclass/todosignin.php");

try {      

    // make sure request method are eith POST or PUT or DELETE or GET
    require_once 'client-request.php';  

    // Valid request method
    if ($_SERVER['REQUEST_METHOD'] != 'POST') 
        throw new Exception("Bad request. POST method required 400");

    //assign value to variables
    $email = isset($_POST['email']) ? formatInput($_POST['email']) : null;
    $password =  isset($_POST['password']) ? formatInput($_POST['password']) : null;
    if (empty($email)) throw new Exception("Error: Email can not be empty 417");
    if (empty($password)) throw new Exception("Error: Password can not be empty 417");

    include_once("../phpclass/Todosignin.php");

     
    $Todosignin= new Todosignin;
    $response=$Todosignin->usersignin($email, $password);
    $response = array(
        "data" => $response,
        "success" => true,
        "message" => "signin successfully"
    );

    //$response = array(
     //   "data" => array(
     //       "id" => 2,
     //       "email" => $email,
     //       "password" => $password,
     //       "created_at" => "2022-12-09 18:00:00",
     //       "updated_at" => "2022-12-09 18:00:00"
     //   ),
     //   "success" => true,
      //  "message" => "login successfully"
   // );

    // return response
    require_once 'response.php';
        
} catch(Exception $error) {
    // throw error
    require_once 'error-response.php';
}