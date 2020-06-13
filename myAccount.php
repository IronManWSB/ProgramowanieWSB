<?php
$polaczenie = @new mysqli("localhost","root","","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
session_start();
$NrKlienta=$_SESSION['nrKlienta'];
$zapytanie = "SELECT * FROM klienci k join adresy a on k.NrKlienta=a.NrKlienta WHERE K.NrKlienta=$NrKlienta";


$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;
?>
<div class="container">
<div class="row">
<div class="col-md-12">
<h2 class='h2-main'>Moje dane</h2>
<?php







for($i=0; $i<$iloscWierszy; $i++){
    $wiersz=$wynik->fetch_assoc();

echo "Imię: ".$wiersz['Imie']."<br>";
echo "Nazwisko: ".$wiersz['Nazwisko']."<br>";
echo "Ulica: ".$wiersz['Ulica']."<br>";
echo "Numer ulicy: ".$wiersz['NrUlicy']."<br>";
echo "Kod pocztowy: ".$wiersz['KodPocztowy']."<br>";
echo "Miasto: ".$wiersz['Miasto']."<br>";
echo "Województwo: ".$wiersz['Wojewodztwo']."<br>";
echo "Kraj: ".$wiersz['Kraj']."<br>";
echo "Pesel: ".$wiersz['Pesel']."<br>";
echo "Telefon: ".$wiersz['Telefon']."<br>";


    
}
         


?>