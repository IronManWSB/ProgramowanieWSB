<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/save.css">
        <link rel="stylesheet" href="styles/style.css">
        <title>Logowanie</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                        echo "<h2 class='h2-main-save'>Twoje konto nie jest aktywne, skontaktuj się z administratorem</h2>";
                        echo "<a href='contact.php'><div class='account-button margin-separator'>Kontakt</div></a>";
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
                    echo "<h2 class='h2-main-save'>Błędny email lub hasło</h2>";
                    echo "<a href='login.php'><div class='account-button margin-separator'>Spróbuj ponownie</div></a>";
                }
                $polaczenie->close();

                ?>
                </div>
            </div>
        </div>
    </body>
</html>
