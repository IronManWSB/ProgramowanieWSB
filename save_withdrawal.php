<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/save.css">
        <link rel="stylesheet" href="styles/style.css">
        <title>Zapisano rejestrację</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php
                session_start();

                $kwota = $_POST['kwota'];
                $potwierdzHaslo = $_POST['potwierdzHaslo'];
                $nrKonta = $_POST['nrKonta'];

                $polaczenie = @new mysqli("localhost","root","","bank");

                $nazwaUzytkownika = $_SESSION['nazwaUzytkownika'];
                $nrKlienta = $_SESSION['nrKlienta'];

                $zapytanie = "select * from klienci where email = '$nazwaUzytkownika' and Haslo = '$potwierdzHaslo'";


                if ($polaczenie->connect_errno!=0) {
                    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
                    exit;
                }

                $wynik = $polaczenie->query($zapytanie);
                $iloscWierszy = $wynik->num_rows;
                if ($iloscWierszy>0){
                $zapytanie = "update konto set AktualnyBilans=AktualnyBilans - $kwota where nrKonta=$nrKonta";

                $wynik = $polaczenie->query($zapytanie);
                if ($wynik)
                {   
                    echo "Wypłata została dokonana pomyślnie.";
                    
                    echo "<br>";

                    header("Location:accounts.php");
                    
                }
                else{
                    echo $polaczenie->error;
                }
                }
                else{
                    echo "<h2 class='h2-main-save'>Błędne hasło</h2>";
                    echo "<a href='accounts.php'><div class='account-button margin-separator'>Wróć do listy kont</div></a>";
                }
                $polaczenie->close();



                ?>
                </div>
            </div>
        </div>
    </body>
</html>

