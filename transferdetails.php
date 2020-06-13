<?php

$id=$_GET['id'];

$polaczenie = @new mysqli("localhost","root","","bank");
if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT DataPrzelewu, IdPrzelewu, NaKonto, NazwaOdbiorcy, NrRachunku, TytulPrzelewu, Kwota,
 ZKonta, ZNrKlienta FROM przelewy WHERE IdPrzelewu=$id";

$wynik = $polaczenie->query($zapytanie);
$wiersz = $wynik->fetch_assoc();
echo "<h3> szczegóły przelewu o identyfikatorze : ".$wiersz['IdPrzelewu']."</h3>";
echo "Odbiorca: ".$wiersz['NazwaOdbiorcy']."<br>";
echo "data przelewu: ".$wiersz['DataPrzelewu']."<br>";
echo "Tytuł przelewu: ".$wiersz['TytulPrzelewu']."<br>";


echo "Wysokość przelewu: ".$wiersz['Kwota']."<br>";
echo "Na konto: ".$wiersz['NaKonto']."<br>";

?>