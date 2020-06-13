<?php

$id=$_GET['id'];

$polaczenie = new mysqli("localhost","root","","bank");
if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "UPDATE klienci SET CzyAktywny=0 WHERE NrKlienta=$id";

$wynik = $polaczenie->query($zapytanie);

if($wynik)
{
    echo "<p>Konto zostało aktywowane</p>"; 
    echo "<br>";
    echo "<a href=\"manage.php\">Wróć do listy klientów</a>";
}
?>