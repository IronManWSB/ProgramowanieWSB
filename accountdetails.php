<?php

$nrKonta=$_GET['nrKonta'];

$polaczenie = new mysqli("localhost","Angela","123456","bank");
if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT NazwaKonta, NrKonta, AktualnyBilans, TypKonta FROM konto WHERE NrKonta=$nrKonta";

$wynik = $polaczenie->query($zapytanie);
$wiersz = $wynik->fetch_assoc();
echo "<h3> Szczegóły konta o numerze : ".$wiersz['NrKonta']."</h3>";
echo "Nazwa Konta: ".$wiersz['NazwaKonta']."<br>";
echo "Aktualny Bilans: ".$wiersz['AktualnyBilans']."<br>";
echo "Typ Konta: ".$wiersz['TypKonta']."<br>";

echo "<a href=\"create_payment.php?nrKonta=".$nrKonta."\">Dodaj wpłatę</a>";

?>

<br>

<a href="create_payment.php">Dodaj wypłatę</a>

