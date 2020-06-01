<a href="createAccount.php">Dodaj konto osobiste</a>

<?php
session_start();
$nrKlienta = $_SESSION['nrKlienta'];
$polaczenie = new mysqli("localhost","Angela","123456","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT NazwaKonta, NrKonta FROM konto WHERE NrKlienta=$nrKlienta";

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;

echo "<table>";
echo "<tr> <td>Nazwa konta</td><td>Numer konta</td><td></td></tr>";



for($i=0; $i<$iloscWierszy; $i++){
    $wiersz=$wynik->fetch_assoc();
    echo "<tr> <td>".$wiersz['NazwaKonta']."</td><td>".$wiersz['NrKonta']."</td><td><a href=\"accountdetails.php?nrKonta=".$wiersz['NrKonta']."\">szczegóły</a></td></tr>";
}
echo "</table>";


?>
