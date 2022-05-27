<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8" />
    <title>Gyro - Créer un compte</title>
    <link rel="stylesheet" href="../master.css" />
    <link rel="icon" type="../image/x-icon" href="favicon.png" />
    <script
      src="https://kit.fontawesome.com/66a5a2e7fe.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <header>
      <?php include('../html/header.php'); ?>
    </header>
    <div class="section-signup">
      <div class="signup-card card">
        <div class="warp-signup">
          <img
            src="../GFX/logo/PNG/logo-with-text.png"
            alt="logo"
            class="logo-with-text"
          />
        </div>
        <div class="warp-signup">
          <span class="alert">
            Veuillez prendre compte que ceci n'est pas un vrai site web. <br />
            Veuillez ne pas entrer votre vrai mot de passe.</span
          >
          <br />
          <br />
          <script src="https://www.google.com/recaptcha/api.js"></script>
          <script>
            function get_action(form) {
              var v = grecaptcha.getResponse();
              if (v.length == 0) {
                document.getElementById("captcha").innerHTML =
                  "Complétez le Capcha";
                return false;
              } else {
                document.getElementById("captcha").innerHTML =
                  "Captcha complet";
                return true;
              }
            }
          </script>
          <form action="" method="post">
            <div
              class="g-recaptcha"
              id="rcaptcha"
              data-sitekey="site key"
            ></div>
            <span id="captcha" style="color: red"></span>
            <!-- this will show captcha errors -->
            <input type="email" class="input" placeholder="Email" />
            <input
              type="password"
              class="input"
              placeholder="Faux mot de passe"
            />
            <input
              type="password"
              class="input"
              placeholder="Confirmer le mot de passe"
            />

            <button type="submit" class="button signup-btn">
              Créer un compte
            </button>
          </form>
          <div class="a-signup">
            <a href="connect.php">
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
              se connecter
            </a>
            <a href="https://youtu.be/dQw4w9WgXcQ" target="blank_"
              >© 2022, GYRO, inc. Aucun Droit Réservé</a
            >
          </div>
        </div>
      </div>
    </div>
    <footer id="footer">
      <?php include('../html/footer.php'); ?>
    </footer>
  </body>
</html>
