<?php
require_once 'header.php';

require_once 'client-request.php'; 
require_once("../phpclass/phpinsert.php");
require_once("../phpclass/phpupdate.php");        
require_once("../phpclass/Todosignin.php");
require_once("../phpclass/phpdelete.php");

try {
 
    $method = $_SERVER['REQUEST_METHOD'];
    $status = isset($_GET['status']) ? formatInput($_GET['status']) : null;
        
    $Todosignin=new Todosignin;    
    $id = isset($_GET['id']) ? formatInput($_GET['id']) : null;
   
        $name = isset($_POST['name']) ? formatInput($_POST['name']) : null;
        $description = isset($_POST['description']) ? formatInput($_POST['description']) : null;
        $status = isset($_POST['status']) ? formatInput($_POST['status']) : "NotStarted";
        $user_id = isset($_POST['user_id']) ? formatInput($_POST['user_id']) : null;

        $message = null;

        if ($method == 'POST') {
            // post new todo
            if (empty($name)) throw new Exception("Error: Todos Name cannot be is empty 417");
            if (empty($status)) throw new Exception("Error: Todos Status can not be empty 417");
            if (empty($user_id)) throw new Exception("Error: Todos user id can not be empty 417");
            $todosignupclass= new insertTable;
            $response=$todosignupclass->insert_todo($name, $description, $status, $user_id);

            $message = "New todo created successfully";
        } elseif ($method == 'PUT') {
            // update existing todo
            if (empty($id)) throw new Exception("Error: Todos ID cannot be is empty 417");
            if (empty($status)) throw new Exception("Error: Todos Status can not be empty 417");
            
            $updateTodoitem=new updateTodoitem;
            $response= $updateTodoitem->todoitem($id, $status);
            $message = "Exisiting todo updated successfully";

        } elseif ($method == 'DELETE') {

            // delete existing todo
            if (empty($id)) throw new Exception("Error: Todos ID cannot be is empty 417");
            
            $Phpdelete=new Phpdelete;
            $response= $Phpdelete->deletebyonefield('todo', 'tid', $id);
            $message = "Todo deleted successfully";

        } else throw new Exception("Invalid request method", 1);

        $response = array(
            "data" =>  $response,
            "method" => $method,
            "success" => true,
            "message"=>$message
        );
    
    
    require_once 'response.php';
    
} catch(Exception $error) {
    require_once 'error-response.php';
}