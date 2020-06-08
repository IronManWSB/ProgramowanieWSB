<a href="createRecipient.php">Dodaj odbiorcę</a>

<?php
session_start();
$nrKlienta = $_SESSION['nrKlienta'];
$polaczenie = new mysqli("localhost","Angela","123456","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT NazwaSkrocona, IdOdbiorcy, Nazwisko, Imie, KontoOdbiorcy FROM odbiorcy";

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;

echo "<table>";
echo "<tr> <td>Nazwa skrócona</td><td>Nazwisko</td><td>Imię</td><td>Numer konta<td></td></tr>";



for($i=0; $i<$iloscWierszy; $i++){
    $wiersz=$wynik->fetch_assoc();
    echo "<tr> <td>".$wiersz['NazwaSkrocona']."</td><td>".$wiersz['Nazwisko']."</td><td>".$wiersz['Imie']."<\td><td>".$wiersz['KontoOdbiorcy']."</td><td><a href=\"recipientdetails.php?id=".$wiersz['IdOdbiorcy']."\">szczegóły</a></td></tr>";
}
echo "</table>";


?>

