
<?php

include_once("../includes/connection.php");
require_once("Todosignin.php");

class updateUser extends Dbh{

    public function changeuserpassword($email, $current_password, $new_password){
        $Todosignin=new Todosignin;

        $hashpassword= $Todosignin->checkemail("retrievepassword", $email);

        if (password_verify($current_password, $hashpassword)) {
            $new_password=password_hash($new_password, PASSWORD_DEFAULT);

            $now = date("Y-m-d H:i:s");
            $mysqli = $this->connect();
            $sql1 = "UPDATE public.user SET password='$new_password', updated_at='$now' WHERE email='$email'";
    
            // Prepare statement
            $stmt= $mysqli->prepare($sql1);
    
    
            if($stmt->execute()){
                return array("Email"=>$email, "New_Password"=>$new_password);
            } else {
                return throw new Exception("An error occured in the mysqli");   
            }
           
        } else {
            return throw new Exception("Invalid login details");  
        }

    }

}


class updateTodoitem extends Dbh{

    public function todoitem($tid, $status){
       
            $now = date("Y-m-d H:i:s");
            $mysqli = $this->connect();
            $sql1 = "UPDATE public.todo SET status='$status', updated_at='$now' WHERE tid=$tid";
    
            // Prepare statement
            $stmt= $mysqli->prepare($sql1);
    
    
            if($stmt->execute()){
                return array("Status"=>$status, "Updated_at"=>$now);
            } else {
                return throw new Exception("An error occured in the mysqli");   
            }

    }
    
}