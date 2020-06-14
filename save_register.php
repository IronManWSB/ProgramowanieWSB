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

$email = $_POST['email'];
$haslo = $_POST['haslo'];
$Imie = $_POST['Imie'];
$Nazwisko = $_POST['Nazwisko'];
$Pesel = $_POST['Pesel'];
$Telefon = $_POST['Telefon'];
$login = $_POST['email'];
$Ulica = $_POST['Ulica'];
$NrUlicy = $_POST['NrUlicy'];
$KodPocztowy = $_POST['KodPocztowy'];
$Miasto = $_POST['Miasto'];
$Wojewodztwo = $_POST['Wojewodztwo'];
$Kraj = $_POST['Kraj'];


$polaczenie = @new mysqli("localhost","root","","bank");

$zapytanie = "insert into klienci (Email, Login, haslo, Imie, Nazwisko, Pesel, Telefon, CzyAktywny, TypUzytkownika) 
values('$email', '$login', '$haslo', '$Imie', '$Nazwisko', '$Pesel', '$Telefon', 1, 0)";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
if ($wynik)
{
    $zapytanie = "select * from klienci where Pesel=$Pesel";
    $wynik=$polaczenie->query($zapytanie);
    $wiersz = $wynik->fetch_assoc();
    $NrKlienta = $wiersz['NrKlienta'];
    $zapytanie = "insert into adresy (KodPocztowy, Kraj, Miasto, NrKlienta, NrUlicy, Ulica, Wojewodztwo) values 
    ('$KodPocztowy', '$Kraj', '$Miasto', '$NrKlienta', '$NrUlicy', '$Ulica', '$Wojewodztwo')";
    $wynik = $polaczenie->query($zapytanie);
    if($wynik){
    echo "<h2 class='h2-main-save'>Rejestracja przebiegła pomyślnie!</h2>";
    echo "<a href='login.php'><div class='account-button margin-separator'>Zaloguj się</div></a>";
        
    }
    else{
        echo "<h2 class='h2-main-save '>Błąd! Skontaktuj się z administratorem</h2>";
    }
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
