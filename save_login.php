
<?php

session_start();

$email = $_POST['email'];
$Haslo = $_POST['Haslo'];

$polaczenie = @new mysqli("localhost","root","","bank");

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
    $czyAktywny = $wiersz['CzyAktywny'];
    if($czyAktywny==1)
    {
        echo "Twoje konto nie jest aktywne, skontaktuj się z administratorem";
    }
    else
    {
    $NrKlienta = $wiersz['NrKlienta'];
    $_SESSION['nazwaUzytkownika'] = $nazwaUzytkownika;
    $_SESSION['nrKlienta'] = $NrKlienta;
    $_SESSION['czyZalogowany'] = true;
    $TypUzytkownika=$wiersz['TypUzytkownika'];
    $_SESSION['TypUzytkownika']=$TypUzytkownika;
    header('location:index.php');

    }
    

}
else{
    echo "Błędny email lub hasło";
}
$polaczenie->close();

?>