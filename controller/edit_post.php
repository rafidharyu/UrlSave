<?php
    
    if (isset($_POST['codigo'])) {
        
        require_once("../database/Connection.php");

        $url = htmlspecialchars($_POST['url'], ENT_QUOTES, 'UTF-8');
        $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
        $caption = htmlspecialchars($_POST['caption'], ENT_QUOTES, 'UTF-8');
        
        //sql querys to insert data form
        $sql = "UPDATE urlsave SET url=:url, title=:title, caption=:caption WHERE date=:codigo";
        //prepare query sentence
        $stmt = $conn -> prepare($sql);

        //insert query with the values into a sql database
        $stmt->bindParam(":url",$url);
        $stmt->bindParam(":title",$title);
        $stmt->bindParam(":caption",$caption);
        $stmt->bindParam(":codigo",$_POST['codigo']);
        
        

        if ($stmt -> execute()) {
            $message = "Register created";

            echo"<script>
            alert('$message!!!');
            window.location.href='/URLSAVE/views/components/show_post.php';
            </script>";

        }else{
            $message ="cant create Register";

            echo"<script>
            alert('$message!!!');
            window.location.href='/URLSAVE/views/components/edit_post.php';
            </script>";
            
        }

            
        }else{
            
            header('location: /URLSAVE/views/index.php');

        }
