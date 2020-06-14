<html lang="pl">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./styles/login.css">
      <link rel="stylesheet" href="./styles/bootstrap.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Bank online - Poznań</title>
  </head>
  <body>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          <h2 class="h2-main" style="text-align:center">LOGOWANIE DO BANKU</h2>  
          </div> 
          <form class="main-form" action="save_login.php" method="post">
              <label class="main-label" for="email" >E-mail:</label><br>
                <input class="input-main" type="email" id="email" name="email" maxlength="45" placeholder="Podaj e-mail" required><br>
              <label class="main-label" style="margin-top:2%" for="Haslo">Hasło:</label><br>
                <input class="input-main" type="password" id="Haslo" name="Haslo" maxlength="45" placeholder="Podaj hasło" required><br>
                <input class="submit-button" type="submit" value="Zaloguj">
          </form>
      </div>
        </div>
          </div>
  </body>
</html>