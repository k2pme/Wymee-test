<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Supprimer l'article</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <div class='container mt-5'>
      <h2>Supprimer l'article</h2>
    <?php

if(isset($_GET['id']) && !empty($_GET['id'])){

        $id = $_GET['id'];
        
        echo "
        
          <div class='alert alert-danger' role='alert'>
            Êtes-vous sûr de vouloir supprimer cet article?
          </div>
          <form method='POST' action='../Controlers/delete.php'>
            <div class='form-group'>
              <input type='hidden' class='form-control' id='id' name='id' value='$id'>
            </div>
        
      
            <button type='submit'  class='btn btn-danger'>Confirmer la suppression</button>
            <a href='../Views/update.html.php?id=$id' class='btn btn-secondary'>Annuler</a>";

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
            </div>
            </body>
            </html>"
            
            ;
      }
    ?>
    </form>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
