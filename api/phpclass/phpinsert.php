<?php include_once("../includes/connection.php");
        require_once("Todosignin.php");

class insertTable extends Dbh{


    //Inserting into five different fields
    public function insert_user($email, $password){

        $Todosignin= new Todosignin;
        $emailcheck=$Todosignin->checkemail("checkingregisteredemail", $email);

        //Checking whether email has been registered already
        if($emailcheck==0){

            $mysqli = $this->connect();
            // $password=md5($password);
            $password = password_hash($password, PASSWORD_DEFAULT);
            $now = date("Y-m-d H:i:s");

            $sql = "INSERT INTO public.user"
            . " (email, password, created_at, updated_at)"
            . " VALUES (?, ?, ?, ?)";

            $stmt = $mysqli->prepare($sql);

            if($stmt->execute([$email, $password, $now, $now])){

                
                $id=$mysqli->lastInsertId();
                return array('id'=>$id, 'email'=>$email, 'password'=>$password, 'created_at'=>$now, 'updated_at'=>$now);
            
            } else {
                    return throw new Exception("An error occured in the mysqli");   
                    
            }

        }else throw new Exception("This email has been registered already, Please Try another");
    }

     //Inserting into five different fields
     public function insert_todo($name, $description, $status, $user_id){

        $mysqli = $this->connect();
       
        $now = date("Y-m-d H:i:s");

        $sql = "INSERT INTO public.todo"
        . " (Name, Description, Created_at, Updated_at, status, User_id)"
        . " VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);

        if($stmt->execute([$name, $description, $now, $now, $status, $user_id])){

            
            $id=$mysqli->lastInsertId();
            return array('id'=>$id, 'Description'=>$description, 'status'=>$status, 'created_at'=>$now, 'updated_at'=>$now, 'user_id'=>$user_id);
           
        } else {
                return throw new Exception("An error occured in the mysqli");   
                
         }
    }
}


   