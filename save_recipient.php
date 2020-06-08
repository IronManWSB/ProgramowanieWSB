<?php
session_start();

$NazwaSkrocona = $_POST['NazwaSkrocona'];
$Nazwisko = $_POST['Nazwisko'];
$Imie = $_POST['Imie'];
$KontoOdbiorcy = $_POST['KontoOdbiorcy'];
$Haslo = $_POST['potwierdzHaslo'];


$polaczenie = new mysqli("localhost","Angela","123456","bank");

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
      echo "Odbiorca został zapisany pomyślnie.";
  }
  else{
      echo $polaczenie->error;
  }
}
else{
    echo "Błędne hasło";
}
$polaczenie->close();



?>


