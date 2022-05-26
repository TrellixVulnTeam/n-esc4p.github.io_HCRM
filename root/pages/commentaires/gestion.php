<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Info</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../../master.css" />
</head>

<body>
    <?php
    //connexion à la BDD
    require("connect.php");
    $connexion = mysql_connect(SERVEUR, LOGIN, MDP);
    if (!$connexion) {
        echo "LA CONNEXION AU SERVEUR MYSQL A ECHOUE\n";
        exit;
    }
    mysql_select_db(BDD);
    echo "<br/>";
    //Récupération des données du formulaire  
    $nom = strtoupper(trim($_POST['nom']));
    $email = $_POST['email'];
    $commentaire = $_POST['commentaire'];
    $evaluation = $_POST['evaluation'];


    echo "<br/>";
    echo "=======================================================";
    echo "<br/>";
    //ajout d'un enregistrement dans la table commentaires
    if (isset($_POST['ajouter'])) {
        if ($nom == "NESCAP")
            echo "La requête n’a pu être exécutée parce que : c moi sa";
        else {
            echo "nom : $nom <br/> commentaire : $commentaire <br/> evaluation : $evaluation<br/> \n";
            $requete = "INSERT INTO commentaires (nom, email, commentaire, evaluation) VALUES ('$nom', '$email', '$commentaire', '$evaluation')";
            $resultat = mysql_query($requete, $connexion);
            if ($resultat) {
                echo "Le commentaire a été ajouté!<br>";
                echo "La requête " . $requete . " a été effectuée !\n";
            }
            else {
            echo "La requête n’a pu être exécutee parce que : "
                . mysql_error($connexion);
            }
        }
        
    }
    //suppression d'un enregistrement dans la table commentaires
    if (isset($_POST['supprimer'])) {
        if ($nom == "NESCAP")
            echo "La requête n’a pu être exécutée parce que : you can't delete me";
        else {
            $requete = "DELETE FROM commentaires WHERE nom='$nom'";
            $resultat = mysql_query($requete, $connexion);
            if ($resultat) {
                echo "Le commentaire a été supprimé!";
                echo "La requête " . $requete . " a été effectuée !\n";
            }
            else {
                echo "La requête n’a pu être exécutée parce que : "
                . mysql_error($connexion);
            }
        }
        
    }
    //Fin de la connexion à la BDD
    mysql_close();
    ?>
    <p><a href="commentaires.php">Retour au formulaire</a></p>
</body>

</html>