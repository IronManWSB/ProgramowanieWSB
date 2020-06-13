<?php

$email = $_POST['email'];
$haslo = $_POST['haslo'];
$Imie = $_POST['Imie'];
$Nazwisko = $_POST['Nazwisko'];
$Pesel = $_POST['Pesel'];
$Telefon = $_POST['Telefon'];
$login = $_POST['email'];

$polaczenie = @new mysqli("localhost","root","","bank");

$zapytanie = "insert into klienci (Email, Login, haslo, Imie, Nazwisko, Pesel, Telefon, CzyAktywny, TypUzytkownika) 
values('$email', '$login', '$haslo', '$Imie', '$Nazwisko', '$Pesel', '$Telefon', 1, 0)";


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


