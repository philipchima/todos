<?php
require_once 'header.php';

require_once 'client-request.php'; 
    
require_once("../phpclass/Todosignin.php");


try {
 
    $method = $_SERVER['REQUEST_METHOD'];
    $status = isset($_GET['status']) ? formatInput($_GET['status']) : null;
        
    $Todosignin=new Todosignin;    
    $id = isset($_GET['id']) ? formatInput($_GET['id']) : null;
    

        if ($status){
            if (empty($status)) throw new Exception("Error: Todos Status can not be empty 417");
            $response = $Todosignin->retrivetodobystatus($status);

        }else $response = $Todosignin->retrivealltodo();

        // fetch todos
        $response = array(
           "data" => $response,
            "success" => true,
        );
   
    
    require_once 'response.php';
    
} catch(Exception $error) {
    require_once 'error-response.php';
}