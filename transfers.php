<a href="createTransfer.php">Dodaj przelew</a>

<?php
session_start();
$nrKlienta = $_SESSION['nrKlienta'];
$polaczenie = new mysqli("localhost","Angela","123456","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT DataPrzelewu, IdPrzelewu, NaKonto, NazwaOdbiorcy, NrRachunku, TytulPrzelewu, Kwota, ZKonta, ZNrKlienta FROM przelewy WHERE ZNrKlienta=$nrKlienta";

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;

echo "<table>";
echo "<tr> <td>Data przelewu</td><td>Wysokosc przelewu</td><td>Na konto</td><td></td></tr>";



for($i=0; $i<$iloscWierszy; $i++){
    $wiersz=$wynik->fetch_assoc();
    echo "<tr> <td>".$wiersz['DataPrzelewu']."</td><td>".$wiersz['Kwota']."</td><td>".$wiersz['NaKonto']."</td><td><a href=\"transferdetails.php?id=".$wiersz['IdPrzelewu']."\">szczegóły</a></td></tr>";
}
echo "</table>";


?>



