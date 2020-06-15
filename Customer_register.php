<html lang="pl">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./styles/login.css">
      <link rel="stylesheet" href="./styles/bootstrap.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <title>Rejestracja</title>
  </head>
  <body>
    <div class="container-register">
        <div class="row">
          <div class="col-md-12">
            <h2 class="h2-main"  style="text-align:center">REJESTRACJA W BANKU</h2>  
          </div>
          <div class="col-md-6">
            <form action="save_register.php" method="post">
              <label class="main-label" for="email">E-mail:</label><br>
              <input class="input-main" placeholder="np. użytkownik@gmail" type="email" id="email" name="email" required><br>
              <label class="main-label" for="haslo">Hasło:</label><br>
              <input class="input-main" placeholder="pamiętaj o bezpiecznym haśle"  type="password" id="haslo" name="haslo" required><br>
              <label class="main-label" for="Imie">Imię:</label><br>
              <input class="input-main" placeholder="np. Jan"  type="text" id="Imie" name="Imie" required><br>
              <label class="main-label" for="Nazwisko">Nazwisko:</label><br>
              <input class="input-main" placeholder="np. kowalski" type="text" id="Nazwisko" name="Nazwisko" required><br>
              <label class="main-label" for="Ulica">Ulica:</label><br>
              <input class="input-main" placeholder="nazwa ulicy" type="text"  id="Ulica" name="Ulica" required><br>
              <label class="main-label" for="NrUlicy">Numer ulicy:</label><br>
              <input class="input-main" placeholder="numer ulicy"  type="text" id="NrUlicy" name="NrUlicy" required><br>
          </div>
          <div class="col-md-6">
            <label class="main-label" for="KodPocztowy">Kod pocztowy:</label><br>
            <input class="input-main" placeholder="np. 61-313" type="text" id="KodPocztowy" name="KodPocztowy" required><br>
            <label class="main-label" for="Miasto">Miasto:</label><br>
            <input class="input-main" placeholder="np. Poznań" type="text" id="Miasto" name="Miasto" required><br>
            <label class="main-label" for="Wojewodztwo">Województwo:</label><br>
            <input class="input-main" placeholder="np. Wielkopolskie" type="text" id="Wojewodztwo" name="Wojewodztwo" required><br>
            <label class="main-label" for="Kraj">Kraj:</label><br>
            <input class="input-main" placeholder="np. Polska" type="text" id="Kraj" name="Kraj" required><br>
            <label class="main-label" for="Pesel">Pesel:</label><br>
            <input class="input-main" placeholder="Podaj swój numer pesel (11 cyfr)" type="text" id="Pesel" minlength="11" maxlength="11" name="Pesel" required><br>
            <label class="main-label" for="Telefon">Telefon:</label><br>
            <input class="input-main" placeholder="numer kontaktowy" type="text" id="Telefon" name="Telefon" required><br>
          </div>
            <input class="submit-button" type="submit" value="Zarejestruj">
            <input class="submit-button" type="reset" value="Wyczyść formularz">
            </form>
          </div>
      </div>
    </div>
  </body>
</html>