<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modifier l'article</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

  <div class="container mt-5">
    <h2>Modifier l'article</h2>
    <?php
    
    
    
    if(isset($_GET['id']) && !empty($_GET['id'])){
      
      require_once("../Models/Articles.php");
      $id = $_GET['id'];
      

      $data = Articles::findOne($id);
      $titre = htmlspecialchars($data['titre'], ENT_QUOTES, 'UTF-8');
      $contenu = $data['contenu'];
      

      echo 
        "<form action='../Controlers/update.php' method='POST'>
          <div class='form-group'>
            <label for='title'>Titre:</label>
            <input type='text' class='form-control' id='title' name='title' value='$titre'required>
          </div>
          
              <div class='form-group'>
              <input type='hidden' class='form-control' id='id' name='id' value='$id' required>
            </div>
          
          <div class='form-group'>
            <label for='content'>Contenu:</label>
            <textarea class='form-control' id='content' name='content' required>$contenu</textarea>
          </div>
          <div class='mb-5'>
            <button type='submit' class='btn btn-primary'>Mettre à jour</button>
          </div>
        </form>";

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
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
