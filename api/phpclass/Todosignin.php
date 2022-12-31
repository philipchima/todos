<?php 
include_once("../includes/connection.php");
class Todosignin extends Dbh{

    public function usersignin($email, $password){
    $hashpassword=$this->checkemail("retrievepassword", $email);

        if (password_verify($password, $hashpassword)) {
            return array("email:"=>$email, "password:"=>$password);
        } else {
            return throw new Exception("Invalid login details");  
        }
   
    }

    public function checkemail($request, $email){

    $mysqli = $this->connect();
    $sql="SELECT * FROM public.user WHERE email=:email";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute([':email' => $email]);

        if($stmt->rowCount()){

           if($request=="retrievepassword"){
           $row=$stmt->fetch();
            return $row['password'];
           }

           if($request=="checkingregisteredemail"){
            return 1;
           }

        } else {

            if($request=="retrievepassword"){
            return throw new Exception("Invalid login details");   
            }

            if($request=="checkingregisteredemail"){
                return 0;
            }
            
        }
    }


    public function retrivetodobystatus($status){

    $mysqli = $this->connect();
    $sql="SELECT * FROM public.todo WHERE status=:status";

    $stmt = $mysqli->prepare($sql);
    $stmt->execute([':status' => $status]);


        if($stmt->rowCount()){
                while($row=$stmt->fetch()){
                    $data[]=$row;
                }
                return $data;
        } else return throw new Exception("Record not retrieved");  
    }


    public function retrivealltodo(){

    $mysqli = $this->connect();
    $sql="SELECT * FROM public.todo";

    
    $stmt = $mysqli->prepare($sql);
    $stmt->execute();

        if($stmt->rowCount()){
            while($row=$stmt->fetch()){
                $data[]=$row;
            }
                return $data;
        }else return throw new Exception("Record not retrieved");  
    }

}
               
