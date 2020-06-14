<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/save.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Przelewy</title>
</head>
<body>
<div class="container">
<div class="row">
<div class="col-md-12">
<?php

session_start();

$nrKlienta = $_SESSION['nrKlienta'];

$NazwaKonta = $_POST['NazwaKonta'];


$polaczenie = new mysqli("localhost","root","","bank");
$zapytanie = "select Pesel from klienci where NrKlienta=$nrKlienta";

$wynik = $polaczenie->query($zapytanie);

$wiersz = $wynik->fetch_assoc();
$pesel=$wiersz['Pesel'];

$zapytanie = "select * from konto where NrKlienta=$nrKlienta";

$wynik = $polaczenie->query($zapytanie);
$ileWierszy=$wynik->num_rows;
if($ileWierszy>9)
{
    echo "<h2 class='h2-main-save'>Nie można założyć więcej niż 10 kont. Skontaktuj się z pracownikiem banku</h2>";
    echo "<br>";
    echo "<a href=\"accounts.php\"><div class='account-button margin-separator'>Wróć do listy kont</div></a>";

    exit;
}



$nrKonta="1122340".$pesel."5678".$ileWierszy."000";



$zapytanie = "insert into konto (AktualnyBilans, Depozyt, DostępnyBilans, NazwaKonta, NrKlienta, NrKonta, NrRachunku, TypKonta, Wyplata) 
values(0, 0, 0, '$NazwaKonta', '$nrKlienta', '$nrKonta', 0, 'osobiste', 0)";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
if ($wynik){
    echo "<h2 class='h2-main-save'>Konto zostało utworzone.</h2>";
    echo "<br>";
    echo "<a href=\"accounts.php\"><div class='account-button margin-separator'>Wróć do listy kont</div></a>";
    
}
else{
    echo $polaczenie->error;
}
$polaczenie->close();
?>
</div>
</div>
</div>
</body>
</html>
