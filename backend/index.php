<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des articles</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  
  <div class="container mt-5">
    <h2>Liste des articles</h2>
    <div class="list-group">
        <?php
        
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
          
      ?>
    </div>
    <a href="Views/create.html" class="btn btn-primary mt-3 mb-3 btn-block">Créer un nouvel article</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


</html>
