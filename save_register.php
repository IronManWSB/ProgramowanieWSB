<?php

$email = $_POST['email'];
$haslo = $_POST['haslo'];
$Imie = $_POST['Imie'];
$Nazwisko = $_POST['Nazwisko'];
$Ulica = $_POST['Ulica'];
$nrUlicy = $_POST['nrUlicy'];
$KodPocztowy = $_POST['KodPocztowy'];
$Miasto = $_POST['Miasto'];
$Wojewodztwo = $_POST['Wojewodztwo'];
$Pesel = $_POST['Pesel'];
$Telefon = $_POST['Telefon'];

$polaczenie = new mysqli("localhost","Angela","123456","bank");

$zapytanie = "insert into klienci (email, haslo, Imie, Nazwisko, Ulica, nrUlicy, KodPocztowy, Miasto, Województwo, Pesel, Telefon) values('$email', '$haslo', '$Imie', '$Nazwisko', '$Ulica', $nrUlicy, $KodPocztowy, '$Miasto', '$Wojewodztwo', '$Pesel', '$Telefon')";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
if ($wynik){
    echo "Rejestracja przebiegła pomyślnie.";
}
else{
    echo $polaczenie->error;
}
$polaczenie->close();
?>


