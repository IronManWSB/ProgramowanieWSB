<?php
$polaczenie = new mysqli("localhost","root","","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT * FROM klienci WHERE CzyAktywny=1";

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2 class='h2-main'>Lista klientów</h2>
<?php


echo "<table class='table'>";
echo "<thead><tr> 
        <th>Imie</th>
        <th>Nazwisko</th>
        <th>Pesel</th>
        <th>Telefon</th>
        <th></th>
         </tr></thead>
         ";



for($i=0; $i<$iloscWierszy; $i++){
    $wiersz=$wynik->fetch_assoc();
    echo "<tr>
    <td>".$wiersz['Imie']."</td>
    <td>".$wiersz['Nazwisko']."</td>
    <td>".$wiersz['Pesel']."</td>
    <td>".$wiersz['Telefon']."</td>

    <td><a href=\"accept.php?id=".$wiersz['NrKlienta']."\">zatwierdź</a></td>
    </tr>";
}
         

echo "</table><hr class='hr-no-margin'>";


?>