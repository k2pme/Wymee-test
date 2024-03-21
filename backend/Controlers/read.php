<?php

    /*
     *Controller de lecture des articles depuis index.php
      *
      */

    function readAll(){
      #Lire tous les articles disponible et les rendre

        require_once("./Models/Articles.php");

        $res = Articles::readAll();

        if(is_array( $res )){

          if($res['status'] == 1){

            function comparer_dates($a, $b) {
              return strtotime($b['date_publication']) - strtotime($a['date_publication']);
            }

            usort($res['data'], 'comparer_dates');

            foreach($res['data'] as $row){

              $id = $row['id'];
              $titre = $row['titre'];
              $date = $row['date_publication'];
              $date = strtotime($date);
              $date = date("d F Y H:i", $date);


              echo "<div class='card mt-3'>
                      <div class='card-body'>
                        <h5 class='card-title'>$titre</h5>
                        <p class='card-text'><small class='text-muted'>$date</small></p>
                        <a href='Views/read.html.php?id=$id' class='btn btn-outline-warning'><b>Lire<b></a>
                      </div>
                    </div>";

            }
          }else{

            $msg = $res['msg'];
            echo "<div class='alert alert-secondary mt-4' role='alert'><h6>$msg</h6></div>";

          }

        }else{

        }
  };