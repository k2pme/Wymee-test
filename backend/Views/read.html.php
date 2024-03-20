<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Détail de l'article</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class='container mt-5'>
      <h2>Détail de l'article</h2>

      <?php

        require_once("../Models/Articles.php");

        $id = $_GET['id'];

        $res = Articles::findOne($id);
        $titre = $res['titre'];
        $contenu = $res['contenu'];

        $date = $res['date_publication'];
        $date = strtotime($date);
        $date = date("d F Y H:i", $date);


        echo "<div class='card'>
                  <div class='card-body'>
                    <h5 class='card-title'>".$titre."</h5>
                    <div class='card-text'>".$contenu."</div>
                    <p class='card-text mt-5'><small class='text-muted'>".$date."</small></p>
                  </div>
                </div>
                <div class='mb-5'>
                <a href='update.html.php?id=".$id."' class='btn btn-primary mt-3'>Modifier</a>
                <a href='delete.html.php?id=$id' class='btn btn-danger mt-3'>Supprimer</a>
                </div>
              </div>"



      ?>
      

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

