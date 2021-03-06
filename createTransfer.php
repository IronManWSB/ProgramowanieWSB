<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <title>Wyślij przelew</title>
    </head>
    <body>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>


    <form action="save_transfer.php" method="post">

    <?php

    session_start();
    ?>
    <div class id="top_menu">
            <div class="container">
                <div class="col-md-6 offer">
                    <a href="#" class= "btn btn-success btn-sm">Critical Bank</a>
                    
                </div>
                <div class="col-md-6">
                    <ul class="menu">
                        
                        <li>
                        <?php

                        if(isset($_SESSION['czyZalogowany'])&&($_SESSION['czyZalogowany'])){
                        
                            $nazwaUzytkownika = $_SESSION['nazwaUzytkownika'];
                                echo "<a href=\"myAccount.php\">Moje konto</a>";
                                echo "</li>";
                                echo "<li>";
                                echo "Witaj ".$nazwaUzytkownika;
                                echo "</li>";
                                echo "<li>";
                                echo "<a href=\"logout.php\">Wyloguj</a>";
                            echo "</li>";
                        }
                        else{
                            echo "<a href=\"Customer_register.php\">Zarejestruj</a>";
                                echo "</li>";
                                echo "<li>";
                                echo "<a href=\"login.php\">Zaloguj</a>";
                            
                        }

                        
                    
                        ?>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div id="navbar" class="navbar navbar-default">
            <div class="cointainer">

                <div class="navbar-header">
                    
                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                        <span class="sr-only">Toggle Navigation</span>
                        <i class="fa fa-align-justify"></i>
                    </button>

        

                </div>

                <div class="navbar-collapse collapse" id="navigation">
                    <div class="padding-nav">
                        <ul class="nav navbar-nav left">
                            <li class="active">
                                <a href="index.php">Główna</a>
                            </li>
                            <?php
                            if(isset($_SESSION['czyZalogowany'])&&($_SESSION['czyZalogowany'])){
                            echo "<li>";
                            echo "<a href=\"accounts.php\">Moje konto</a>";
                            echo "</li>";
                            echo "<li>";
                            echo "<a href=\"transfers.php\">Przelewy</a>";
                            
                        echo "</li>";
                        
                            echo "<li>";
                            echo "<a href=\"recipient.php\">Odbiorcy</a>";
                                
                            echo "</li>";
                            }
                        ?>
                            <li>
                                <a href="contact.php">Kontakt</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="h2-main text-center">Przelew bankowy</h2>
                <?php
                $nrKlienta = $_SESSION['nrKlienta'];
                $polaczenie = @new mysqli("localhost","root","","bank");

                if ($polaczenie->connect_errno!=0) {
                    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
                    exit;
                }
                $zapytanie = "SELECT NazwaKonta, NrKonta FROM konto WHERE NrKlienta=$nrKlienta";

                $wynik = $polaczenie->query($zapytanie);
                $iloscWierszy = $wynik->num_rows;

                echo "<label class='main-label label-white' for=\"zRachunku\">Z rachunku:</label><br>";
                echo "<select name=\"zRachunku\" id=\"zRachunku\">";
                for($i=0; $i<$iloscWierszy; $i++)
                {
                $krotka=$wynik->fetch_assoc();
                echo "<option value=\"".$krotka['NrKonta']."\">".$krotka['NazwaKonta']."</option>";
                }
                echo "</select>";

                echo "<br>";

                $zapytanie = "SELECT NazwaSkrocona, KontoOdbiorcy FROM odbiorcy";

                $wynik = $polaczenie->query($zapytanie);
                $iloscWierszy = $wynik->num_rows;

                echo "<label class='main-label label-white'  for=\"naRachunek\">Nazwa skrócona odbiorcy:</label><br>";
                echo "<select name=\"naRachunek\" id=\"naRachunek\">";
                for($i=0; $i<$iloscWierszy; $i++)
                {
                $krotka=$wynik->fetch_assoc();
                echo "<option value=\"".$krotka['KontoOdbiorcy']."\">".$krotka['NazwaSkrocona']."</option>";
                }
                echo "</select>";

                ?>                
                <!nazwaodbiorcy, tytulprzelewu>
                <br>
                <label class="main-label label-white" for="nazwaOdbiorcy">Odbiorca:</label><br>
                <input class="input-main" placeholder="np. Jan" type="text" id="nazwaOdbiorcy" name="odbiorca" required><br>
                <label class="main-label label-white" for="tytulPrzelewu">Tytuł przelewu:</label><br>
                <input class="input-main" placeholder="np. Za owoce" type="text" id="tytulPrzelewu" name="tytulPrzelewu" required><br>
                <label class="main-label label-white" for="kwota">Kwota:</label><br>
                <input class="input-main" placeholder="np. 50" type="decimal" id="kwota" name="kwota" required><br>
                <label class="main-label label-white" for="potwierdzHaslo">Potwierdź hasło:</label><br>
                <input class="input-main" placeholder="potwierdź swoje hasło" type="password" id="potwierdzHaslo" name="potwierdzHaslo" required><br>
                <input class="submit-button button-margin-zero"  type="submit" value="Dalej">
                <input class="submit-button button-margin-zero"  type="reset" value="Wyczyść">
                </form>
                </div>
            </div>
        </div>
    </body>
</html>
