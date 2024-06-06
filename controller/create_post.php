<?php

session_start();

require_once("../database/Connection.php");

if(isset($_POST['url']) | isset($_POST['title']) | isset($_POST['caption'])){

    $url = htmlspecialchars($_POST['url'], ENT_QUOTES, 'UTF-8');
    $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
    $caption = htmlspecialchars($_POST['caption'], ENT_QUOTES, 'UTF-8');

    //sql querys to insert data form
    $sql = "INSERT INTO urlsave (email, url, title,  caption) VALUES(:mail,:url,:title,:caption)";
    //prepare query sentence
    $stmt = $conn -> prepare($sql);

    //insert query with the values into a sql database
    $stmt->bindParam(":mail",$_SESSION['email']);
    $stmt->bindParam(":url",$url);
    $stmt->bindParam(":title",$title);
    $stmt->bindParam(":caption",$caption);
    
    

    if ($stmt -> execute()) {
        $message = "Register created";

        echo"<script>
        alert('$message!!!');
        window.location.href='../views/index.php';
        </script>";

    }else{
        $message ="cant create Register";

        echo"<script>
        alert('$message!!!');
        window.location.href='/URLSAVE/views/components/create_post.php';
        </script>";
        
    }
    
}else{
    header('location: /URLSAVE/views/components/create_post.php');
}