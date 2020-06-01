<?php

session_start();

$nrKlienta = $_SESSION['nrKlienta'];
$nrKonta = $_POST['nrKonta'];
$NazwaKonta = $_POST['NazwaKonta'];


$polaczenie = new mysqli("localhost","Angela","123456","bank");

$zapytanie = "insert into konto (AktualnyBilans, Depozyt, DostępnyBilans, NazwaKonta, NrKlienta, NrKonta, NrRachunku, TypKonta, Wyplata) 
values(0, 0, 0, '$NazwaKonta', '$nrKlienta', '$nrKonta', 0, 'osobiste', 0)";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
if ($wynik){
    echo "Konto zostało utworzone.";
}
else{
    echo $polaczenie->error;
}
$polaczenie->close();
?>
