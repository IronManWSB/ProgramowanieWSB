<?php
session_start();

$kwota = $_POST['kwota'];
$potwierdzHaslo = $_POST['potwierdzHaslo'];
$nrKonta = $_POST['nrKonta'];

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
  $zapytanie = "update konto set AktualnyBilans=AktualnyBilans + $kwota where nrKonta=$nrKonta";

  $wynik = $polaczenie->query($zapytanie);
  if ($wynik)
  {   
      echo "Wpłata została dokonana pomyślnie.";
      
      echo "<br>";

      header("Location:accounts.php");
     
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

