<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/save.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Komunikat - przelew</title>
</head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php
                session_start();

                $zRachunku = $_POST['zRachunku'];
                $naRachunek = $_POST['naRachunek'];
                $kwota = $_POST['kwota'];
                $potwierdzHaslo = $_POST['potwierdzHaslo'];
                $odbiorca = $_POST['odbiorca'];
                $tytulPrzelewu = $_POST['tytulPrzelewu'];


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
                $zapytanie = "insert into przelewy (DataPrzelewu, NaKonto, NazwaOdbiorcy, NrRachunku, TytulPrzelewu, 
                Kwota, ZKonta, ZNrKlienta) values(NOW(), $naRachunek, '$odbiorca', $nrKlienta, '$tytulPrzelewu', 
                $kwota, $zRachunku, $nrKlienta)";
                $wynik = $polaczenie->query($zapytanie);
                if ($wynik){
                    $zapytanie = "update konto set AktualnyBilans=AktualnyBilans - $kwota where nrKonta=$zRachunku";

                    $wynik = $polaczenie->query($zapytanie); 
                    if($wynik)
                    {
                        echo "Transakcja przebiegła pomyślnie.";
                        header("Location:transfers.php");

                    }
                    else
                    {
                    echo "<h2 class='h2-main-save'>Błąd w aktualizacji stanu konta</h2>";
                    echo "echo <a href=\"createTransfer.php\"><div class='account-button margin-separator'>Nowy przelew</div></a>";
                    }
                    
                }
                else{
                    echo $polaczenie->error;
                }
                }
                else{
                    echo "<h2 class='h2-main-save'>Błędne hasło</h2>";
                    echo "echo <a href=\"createTransfer.php\"><div class='account-button margin-separator'>Nowy przelew</div></a>";

                }
                $polaczenie->close();



                ?>
                </div>
            </div>
        </div>
    </body>
</html>

