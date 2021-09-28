<?php
session_start();

if ((isset($_GET['Id'])) && !empty($_GET['Id']))
{
    $id =strip_tags($_GET['Id']);



    if (!$libelle) {
        $_SESSION['erreur'] ="Ce type de livre n'existe pas ";

        header ('Location : index.php');
        exit();
    }
    } else {
        $_SESSION['erreur'] ="URL INVALIDE";
        header ('Location : index.php');
    exit();
    }

    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <title>Oui</title>
    </head>
    <body>
    <main class ="container">
        <div class="row">
            <section class="col-12">
            <h1>Details des utilisateurs <?php print($libelle); ?></h1>
            <p>ID : <?php print($id) ;?> </p>
            <p>Email : <?php print($email); ?> </p>
            <p>role : <?php print($role); ?> </p>
            <a class ="btn btn-info" href="index.php"> Retour à la liste </a>
            
            <a class="btn btn-primary" href='edit.php?Id=<?php print($id);?>'>Modifier </a><br>
            
            </p>
            </section>
        </div>
    </main>
        
    </body>
    </html>