<?php

$id=$_GET['id'];

$polaczenie = new mysqli("localhost","Angela","123456","bank");
if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT NazwaSkrocona, IdOdbiorcy, Nazwisko, Imie, NumerOdbiorcy FROM odbiorcy WHERE IdOdbiorcy=$id";

$wynik = $polaczenie->query($zapytanie);
$wiersz = $wynik->fetch_assoc();
echo "<h3> Szczegóły konta odbiorcy : ".$wiersz['NazwaSkrocona']."</h3>";
echo "Nazwisko: ".$wiersz['Nazwisko']."<br>";
echo "Imię: ".$wiersz['Imie']."<br>";
echo "Numer konta: ".$wiersz['NumerOdbiorcy']."<br>";




?>