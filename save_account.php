<?php

session_start();

$nrKlienta = $_SESSION['nrKlienta'];

$NazwaKonta = $_POST['NazwaKonta'];


$polaczenie = new mysqli("localhost","Angela","123456","bank");
$zapytanie = "select Pesel from klienci where NrKlienta=$nrKlienta";

$wynik = $polaczenie->query($zapytanie);

$wiersz = $wynik->fetch_assoc();
$pesel=$wiersz['Pesel'];

$zapytanie = "select * from konto where NrKlienta=$nrKlienta";

$wynik = $polaczenie->query($zapytanie);
$ileWierszy=$wynik->num_rows;


$nrKonta="1122340".$pesel."5678".$ileWierszy."000";



$zapytanie = "insert into konto (AktualnyBilans, Depozyt, DostępnyBilans, NazwaKonta, NrKlienta, NrKonta, NrRachunku, TypKonta, Wyplata) 
values(0, 0, 0, '$NazwaKonta', '$nrKlienta', '$nrKonta', 0, 'osobiste', 0)";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
if ($wynik){
    echo "Konto zostało utworzone.";
    echo "<br>";
    echo "<a href=\"accounts.php\">Wróć do listy kont</a>";
    
}
else{
    echo $polaczenie->error;
}
$polaczenie->close();
?>
