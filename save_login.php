
<?php

session_start();

$email = $_POST['email'];
$Haslo = $_POST['Haslo'];

$polaczenie = new mysqli("localhost","Angela","123456","bank");

$zapytanie = "select * from klienci where email = '$email' and Haslo = '$Haslo'";


if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;
if ($iloscWierszy>0){
    $wiersz = $wynik->fetch_assoc();
    $nazwaUzytkownika = $wiersz['Email'];
    $NrKlienta = $wiersz['NrKlienta'];
    $_SESSION['nazwaUzytkownika'] = $nazwaUzytkownika;
    $_SESSION['nrKlienta'] = $nrKlienta;
    $_SESSION['czyZalogowany'] = true;
    header('location:index.php');
}
else{
    echo "Błędny email lub hasło";
}
$polaczenie->close();

?>