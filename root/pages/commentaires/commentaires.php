<html>

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/x-icon" href="../../favicon.png" />
    <script
      src="https://kit.fontawesome.com/66a5a2e7fe.js"
      crossorigin="anonymous"
    ></script>
    <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /> -->
    <title>Gyro - Commentaires</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="../../master.css" />
</head>

<body>
  <header>
      <?php include('../../html/header.php'); ?>
  </header>
  <div class="section-comments">
    <form action="gestion.php " method='post' class="form-commentaires card">
    <div class="rating">
      Évaluation: 
      <input id="star5" name="evaluation" type="radio" value="5" class="radio-btn hide" />
      <label for="star5">☆</label>
      <input id="star4" name="evaluation" type="radio" value="4" class="radio-btn hide" />
      <label for="star4">☆</label>
      <input id="star3" name="evaluation" type="radio" value="3" class="radio-btn hide" />
      <label for="star3">☆</label>
      <input id="star2" name="evaluation" type="radio" value="2" class="radio-btn hide" />
      <label for="star2">☆</label>
      <input id="star1" name="evaluation" type="radio" value="1" class="radio-btn hide" />
      <label for="star1">☆</label>
      <div class="clear"></div>
    </div>
    <input required type='text' name='nom' value='' placeholder="Nom" class="input-comment"/>
    <input required type='email' name='email' value='' placeholder="Email" class="input-comment"/><br>
    <textarea name="commentaire" placeholder="Commentaire" class="input-comment"></textarea> <br>
    <input type='submit' value='Ajouter' name='ajouter' class="button"/>
    <input type='submit' value='Supprimer' name='supprimer' class="button"/>
    <input type='reset' value='Annuler' class="button"/> <br>
    </form>
    <div class="comments-card card">
      <?php

      require("connect.php");
      $connexion = mysql_connect(SERVEUR, LOGIN, MDP);
      if (!$connexion) {
          echo "LA CONNEXION AU SERVEUR À ECHOUE\n";
          exit;
      }
      mysql_select_db(BDD);

      // $currentDate = new date();
      // echo $currentDate->format('Y-m-d H:i:s');
      echo "<br/>";

      $resultat = mysql_query("SELECT * FROM commentaires ORDER BY id DESC LIMIT 100");
      while ($ligne = mysql_fetch_array($resultat)) {
          echo '<div class="comment card">';
          echo '<span class="comment-date">' . $ligne['datetime']. '</span>';
          echo "<br>";
          if ($ligne['nom'] == "NESCAP") 
          echo "<strong><font color='orange'>( le vrai ) " . $ligne['nom'] . "</font></strong>";
          
          else 
          echo $ligne['nom'];
          echo "&nbsp;&nbsp;";
          for ($x = 0; $x <= $ligne['evaluation']-1; $x++) {
            echo "★";
          } 
          for ($x = 0; $x <= 4 - $ligne['evaluation']; $x++) {
            echo "☆";
          }
          // echo $ligne['evaluation'];
          echo "<br/>";
          echo $ligne['commentaire'];
          echo "&nbsp;&nbsp;";
          echo '</div>';
      }
      ?>
    </div>
    
  </div>
  <footer id="footer">
      <?php include('../../html/footer.php'); ?>
  </footer>
</body>

</html>