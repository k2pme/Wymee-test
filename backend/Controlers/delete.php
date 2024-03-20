<?php
    $id = $_POST['id'];
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        
        if(isset($id) && !empty($id)){

            require_once("../Models/Articles.php");

            

            if(Articles::delete($id)){
                header("Location: ../index.php");
            }

        }else{

            echo "<!DOCTYPE html>
            <html lang='fr'>
            <head>
              <meta charset='UTF-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>Créer un nouvel article</title>
              <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
            </head>
            <body>
            <div class='container mt-5'>
                <div class='alert alert-danger' role='alert'>
                Il y a eu une erreur verifier vos données
                </div>

                <!--a href='../Views/update.html.php' class='btn btn-primary mt-5'>Retourner au formulaire</a-->
            </div>
            </body>
            </html>"
            
            ;

        }

    }else{

        echo "<!DOCTYPE html>
            <html lang='fr'>
            <head>
              <meta charset='UTF-8'>
              <meta name='viewport' content='width=device-width, initial-scale=1.0'>
              <title>Créer un nouvel article</title>
              <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
            </head>
            <body>
            <div class='container mt-5'>
                <div class='alert alert-danger' role='alert'>
                Il y a eu une erreur d'integrité
                </div>

                <a href='../Views/update.html.php' class='btn btn-primary mt-5'>Retourner au formulaire</a>
            </div>
            </body>
            </html>"
            
            ;


    }