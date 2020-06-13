<?php
session_start();

$zRachunku = $_POST['zRachunku'];
$naRachunek = $_POST['naRachunek'];
$kwota = $_POST['kwota'];
$potwierdzHaslo = $_POST['potwierdzHaslo'];
$odbiorca = $_POST['odbiorca'];
$tytulPrzelewu = $_POST['tytulPrzelewu'];


$polaczenie = @new mysqli("localhost","root","","bank");

$nazwaUzytkownika = $_SESSION['nazwaUzytkownika'];
$nrKlienta = $_SESSION['nrKlienta'];

$zapytanie = "select * from klienci where email = '$nazwaUzytkownika' and Haslo = '$potwierdzHaslo'";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;
if ($iloscWierszy>0){
  $zapytanie = "insert into przelewy (DataPrzelewu, NaKonto, NazwaOdbiorcy, NrRachunku, TytulPrzelewu, 
  Kwota, ZKonta, ZNrKlienta) values(NOW(), $naRachunek, '$odbiorca', $nrKlienta, '$tytulPrzelewu', 
  $kwota, $zRachunku, $nrKlienta)";
  $wynik = $polaczenie->query($zapytanie);
  if ($wynik){
    $zapytanie = "update konto set AktualnyBilans=AktualnyBilans - $kwota where nrKonta=$zRachunku";

    $wynik = $polaczenie->query($zapytanie); 
    if($wynik)
    {
        echo "Transakcja przebiegła pomyślnie.";
        header("Location:transfers.php");

    }
    else
    {
    echo "Błąd w aktualizacji stanu konta";
    }
      
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


