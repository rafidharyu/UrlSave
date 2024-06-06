<?php

    //Start web session
    session_start();



    //Database connecion PDO
    require_once("../database/Connection.php");

    //check if the input value is not empty
    if (
    !empty($_POST['mail_login'])
    &&
    !empty($_POST['password_login'])
    )
    {

        $mail_login = $_POST['mail_login'];
        $password_login = $_POST['password_login'];

        //Database consulting 
        $query = $conn->prepare( "SELECT id, email, name, password FROM register WHERE email= :email ");
        $query->bindParam( ':email', $mail_login );
        $query->execute();
        $results = $query -> fetch(PDO::FETCH_ASSOC);

       

        //Check if user has register on database and compare passwords
        if (!$results) {
            $message ="Credentials Wrong";

                echo"<script>
                alert('$message!!!');
                window.location.href='/URLSAVE/views/login.php';
                </script>";
        }else{
            // if (password_verify($password_login, $results['password'])) {
            if ($password_login == $results['password']) {
                $_SESSION['user_id'] = $results['id'];
                $_SESSION['email'] = $results['email'];
                $_SESSION['username'] = $results['name'];
                $message ="logged";

                echo"<script>
                alert('$message!!!');
                window.location.href='../views/index.php';
                </script>";
            }else{
                $message ="Credentials Wrong";

                echo"<script>
                alert('$message!!!');
                window.location.href='/URLSAVE/views/login.php';
                </script>";
            }
        }

    }
    else{
        echo"<script>
                alert('Credentials are empty');
                window.location.href='/URLSAVE/views/login.php';
            </script>";
    }

    
    