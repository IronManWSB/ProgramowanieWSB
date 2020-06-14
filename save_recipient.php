<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/save.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Przelewy</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">

<?php
session_start();

$NazwaSkrocona = $_POST['NazwaSkrocona'];
$Nazwisko = $_POST['Nazwisko'];
$Imie = $_POST['Imie'];
$KontoOdbiorcy = $_POST['KontoOdbiorcy'];
$Haslo = $_POST['potwierdzHaslo'];


$polaczenie = @new mysqli("localhost","root","","bank");

$nazwaUzytkownika = $_SESSION['nazwaUzytkownika'];
$nrKlienta = $_SESSION['nrKlienta'];

$zapytanie = "select * from klienci where email = '$nazwaUzytkownika' and Haslo = '$Haslo'";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;

if ($iloscWierszy>0){
   $zapytanie = "insert into odbiorcy (NazwaSkrocona, Nazwisko, Imie, KontoOdbiorcy)
   values('$NazwaSkrocona', '$Nazwisko', '$Imie', '$KontoOdbiorcy')";
  $wynik = $polaczenie->query($zapytanie);
  if ($wynik){
      echo "<h2 class='h2-main-save'>Odbiorca został zapisany pomyślnie.</h2>";
      echo "echo <a href=\"recipient.php\"><div class='account-button margin-separator'>Wróć do listy odbiorców</div></a>";
  }
  else{
      echo $polaczenie->error;
  }
}
else{
    echo "<h2 class='h2-main-save'>Błędne hasło</h2>";
    echo "echo <a href=\"recipient.php\"><div class='account-button margin-separator'>Wróć do listy odbiorców</div></a>";
}
$polaczenie->close();


?>
</div>
</div>
</div>
</body>
</html>


