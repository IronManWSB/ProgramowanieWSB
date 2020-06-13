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
    <div class="register-margin-form container">
        <div class="row">
          <div class="col-md-12">
          <h2 class="h2-main" style="text-align:justify">REJESTRACA W BANKU</h2>  
          </div> 
          <form action="save_register.php" method="post">
            <label class="main-label" for="email">E-mail:</label><br>
            <input class="input-main" type="email" id="email" name="email" required><br>
            <label class="main-label" for="haslo">Hasło:</label><br>
            <input class="input-main" type="password" id="haslo" name="haslo" required><br>
            <label class="main-label" for="Imie">Imię:</label><br>
            <input class="input-main" type="text" id="Imie" name="Imie" required><br>
            <label class="main-label" for="Nazwisko">Nazwisko:</label><br>
            <input class="input-main" type="text" id="Nazwisko" name="Nazwisko" required><br>
            <label class="main-label" for="Ulica">Ulica:</label><br>
            <input class="input-main" type="text" id="Ulica" name="Ulica" required><br>
            <label class="main-label" for="NrUlicy">Numer ulicy:</label><br>
            <input class="input-main" type="text" id="NrUlicy" name="NrUlicy" required><br>
            <label class="main-label" for="KodPocztowy">Kod pocztowy:</label><br>
            <input class="input-main" type="text" id="KodPocztowy" name="KodPocztowy" required><br>
            <label class="main-label" for="Miasto">Miasto:</label><br>
            <input class="input-main" type="text" id="Miasto" name="Miasto" required><br>
            <label class="main-label" for="Wojewodztwo">Województwo:</label><br>
            <input class="input-main" type="text" id="Wojewodztwo" name="Wojewodztwo" required><br>
            <label class="main-label" for="Kraj">Kraj:</label><br>
            <input class="input-main" type="text" id="Kraj" name="Kraj" required><br>
            <label class="main-label" for="Pesel">Pesel:</label><br>
            <input class="input-main" type="text" id="Pesel" minlength="11" maxlength="11" name="Pesel" required><br>
            <label class="main-label" for="Telefon">Telefon:</label><br>
            <input class="input-main" type="text" id="Telefon" name="Telefon" required><br>
            
            <input class="submit-button" type="submit" value="Zarejestruj">
            <input class="submit-button" type="reset" value="Wyczyść formularz">

          </form>
</div>
  </div>
    </div>
  </body>
</html>