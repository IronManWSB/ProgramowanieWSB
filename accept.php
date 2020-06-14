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
    echo "<h2 class='h2-main-save'>Konto zostało aktywowane</h2>"; 
    echo "<br>";
    echo "<a href=\"manage.php\"><div class='account-button margin-separator'>Wróć do listy klientów</div></a>";
}
?>

</div>
</div>
</div>
</body>
</html>