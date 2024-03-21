<?php
    
    /*
     *Controler de modification d'un article depuis un formulaire
     *dans la base de donnée
     */

if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if((isset($_POST['id']) && isset($_POST['title']) && isset($_POST['content'])) && (!empty($_POST['id']) && !empty($_POST['title']) && !empty($_POST['content']))) {
    
        $id = $_POST['id'];
        $title = $_POST['title'];
        $contenu = $_POST['content'];

        require_once("../Models/Articles.php");





        Articles::update( trim($id), trim($title), trim($contenu));

        header("Location: ../Views/read.html.php?id=$id");

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