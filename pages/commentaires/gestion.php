<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Info</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../../master.css" />
</head>

<body>
    <div class="section-gestion">
        <div class="gestion-card card">
            <?php
            //connexion à la BDD
            require("connect.php");
            $connexion = mysql_connect(SERVEUR, LOGIN, MDP);
            if (!$connexion) {
                echo '<span class="alert">LA CONNEXION AU SERVEUR MYSQL A ECHOUE</span>';
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
            echo "<br/>";
            //ajout d'un enregistrement dans la table commentaires
            if (isset($_POST['ajouter'])) {
                if ($nom == "NESCAP")
                    echo '<span class="alert">La requête n’a pu être exécutée parce que : c moi sa</span>';
                else {
                    echo "nom : $nom <br/> commentaire : $commentaire <br/> evaluation :";
                     
                    echo "&nbsp;&nbsp;";
                    for ($x = 0; $x <= $evaluation-1; $x++) {
                        echo "★";
                    } 
                    for ($x = 0; $x <= 4 - $evaluation; $x++) {
                        echo "☆";
                    }

                    $requete = "INSERT INTO commentaires (nom, email, commentaire, evaluation) VALUES ('$nom', '$email', '$commentaire', '$evaluation')";
                    $resultat = mysql_query($requete, $connexion);
                    if ($resultat) {
                        echo '<span class="success">Le commentaire a été ajouté!<br>';
                        echo 'La requête: <br>' . $requete . '<br> a été effectuée !</span>';
                    }
                    else {
                    echo '<span class="alert">La requête n’a pu être exécutee parce que : '
                        . mysql_error($connexion) . '</span>';
                    }
                }
                
            }
            //suppression d'un enregistrement dans la table commentaires
            if (isset($_POST['supprimer'])) {
                if ($nom == "NESCAP")
                    echo '<span class="alert">La requête n’a pu être exécutée parce que : you can’t delete me</span>';
                else {
                    $requete = "DELETE FROM commentaires WHERE nom='$nom'";
                    $resultat = mysql_query($requete, $connexion);
                    if ($resultat) {
                        echo '<span class="success">Le commentaire a été supprimé!';
                        echo "La requête: <br>" . $requete . "<br> a été effectuée !</span>";
                    }
                    else {
                        echo '<span class="alert">La requête n’a pu être exécutée parce que : </span>'
                        . mysql_error($connexion);
                    }
                }
                
            }
            //Fin de la connexion à la BDD
            mysql_close();
            ?>
            <button
            onclick="history.back()"
            class="btn-back"
            >
                Retour au formulaire
            </button>
            <!-- <form>
                <input type="button" value="Retour au formulaire" onclick="history.back()" class="button">
            </form> -->
        </div>
    
    </div>
</body>

</html>