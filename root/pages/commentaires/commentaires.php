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
    <div class="header-body">
      <a href="../../index.html"
        ><img src="../../GFX/logo/PNG/logo-with-text-white.png" id="logo-main"
      /></a>

      <div class="wrap">
        <div class="search">
          <input
            type="text"
            class="search-txt"
            placeholder="Rechercher ..."
          />
          <button type="submit" class="search-btn">
            <i class="fa-solid fa-magnifying-glass" aria-hidden="true"></i>
          </button>
        </div>
      </div>

      <button
        onclick="window.location.href='signup.html';"
        class="identify-btn"
      >
      S'identifier
        <svg
          class="arrow"
          aria-hidden="true"
          viewBox="0 0 63 99"
          focusable="false"
        >
          <path
            d="M59.8 57.6l-38 38c-10.7 10.8-29.4-7-18.3-18l28-28L3.5 21C-8 9.5 12.2-6.5 21.7 3l38 38c4.4 5 4.4 12.3 0 16.6z"
          ></path>
        </svg>
      </button>
    </div>
    <ul class="nav-bar">
      <a href="../index.html#category-audio">Audio</a>
      <a href="../index.html#category-video">Vidéo</a>
      <a href="../index.html#category-ordinateurs">Ordinateurs</a>
      <a href="../index.html#category-periferiques">Périfériques</a>
      <a href="commentaires.php">Commentaires</a>
      <a href="info.html">Plus d'informations</a>
    </ul>
  </header>
  <form action="gestion.php " method='post' class="form-commentaires">
    Nom : <input type='text' name='nom' value='' /><br>
    Email : <input type='email' name='email' value='' placeholder="test@example.com"/><br>
    Commentaire : <br><textarea name="commentaire" rows="10" cols="30"></textarea> <br>
    <!-- <input type='text' name='commentaire' value='' id="commentaire"/><br> -->
    Évaluation: 
    <!-- <select name="evaluation">
        <option value="5">5</option>
        <option value="4">4</option>
        <option value="3">3</option>
        <option value="2">2</option>
        <option value="1">1</option>
        <option value="0">0</option>
    </select> <br> -->
    <div class="rating">
        <input id="star5" name="evaluation" type="radio" value="5" class="radio-btn hide" />
        <label for="star5" >☆</label>
        <input id="star4" name="evaluation" type="radio" value="4" class="radio-btn hide" />
        <label for="star4" >☆</label>
        <input id="star3" name="evaluation" type="radio" value="3" class="radio-btn hide" />
        <label for="star3" >☆</label>
        <input id="star2" name="evaluation" type="radio" value="2" class="radio-btn hide" />
        <label for="star2" >☆</label>
        <input id="star1" name="evaluation" type="radio" value="1" class="radio-btn hide" />
        <label for="star1" >☆</label>
        <div class="clear"></div>
      </div>
      <!-- <input type='text' name='annee' value='' /><br> -->
      <input type='submit' value='Ajouter' name='ajouter' />
      <input type='submit' value='Supprimer' name='supprimer' />
      <input type='reset' value='Annuler' /> <br>
  </form>
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
      echo '<span class="test">' . $ligne['datetime']. '</span>';
      echo "&nbsp;&nbsp;";
      if ($ligne['nom'] == "NESCAP") 
          echo "<strong><font color='orange'>(le vrai) " . $ligne['nom'] . "</font></strong>";
      
      else 
          echo $ligne['nom'];
      echo "&nbsp;&nbsp;";
      echo $ligne['evaluation'];
      echo "<br/>";
      echo $ligne['commentaire'];
      echo "&nbsp;&nbsp;";
      echo "<br/><br/>";
  }

  ?>
</body>

</html>