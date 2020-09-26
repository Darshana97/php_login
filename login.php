<?php

    include('db_con.php');

   if(isset($_POST['uname']) && isset($_POST['password'])){

        function validate($data){
            $data = trim($data);
            $data = stripcslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $uname = validate($_POST['uname']);
        $pass = validate($_POST['password']);

        if(empty($uname)){
            header("location: index.php?error=User name is required");
            exit();
        }else if(empty($pass)){
            header("location: index.php?error=Password is required");
            exit();
        }else{
            $sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

            $result = mysqli_query($con, $sql);

            if(mysqli_num_rows($result)){
                echo "Hello";

            }
        }


   }else{
       header("location: index.php");
       exit();
   }

?>