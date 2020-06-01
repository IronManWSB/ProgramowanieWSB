<?php

$email = $_POST['email'];
$haslo = $_POST['haslo'];
$Imie = $_POST['Imie'];
$Nazwisko = $_POST['Nazwisko'];
$Pesel = $_POST['Pesel'];
$Telefon = $_POST['Telefon'];

$polaczenie = new mysqli("localhost","Angela","123456","bank");

$zapytanie = "insert into klienci (email, haslo, Imie, Nazwisko, Pesel, Telefon) values('$email', '$haslo', '$Imie', '$Nazwisko', '$Pesel', '$Telefon')";


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


