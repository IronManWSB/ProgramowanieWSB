<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <title>Dodaj odbiorcę</title>
    </head>
    <body>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>



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
                    <h2 class="h2-main">Dodaj swoich odbiorców</h2>
                    <form action="save_recipient.php" method="post">

                    <!nazwaodbiorcy, tytulprzelewu>
                    <br>
                    <label class="main-label label-white" for="NazwaSkrocona">Nazwa skrócona:</label><br>
                    <input class="input-main" placeholder="Nazwa skrócona"  type="text" id="NazwaSkrocona" name="NazwaSkrocona" required><br>
                    <label class="main-label label-white" for="Nazwisko">Nazwisko:</label><br>
                    <input class="input-main" placeholder="np. Kowalski" type="text" id="Nazwisko" name="Nazwisko" required><br>
                    <label class="main-label label-white" for="Imie">Imię:</label><br>
                    <input class="input-main" placeholder="np. Jan"  type="text" id="Imie" name="Imie" required><br>
                    <label class="input-main" for="KontoOdbiorcy">Numer Konta:</label><br>
                    <input class="input-main" placeholder="Numer konta odbiorcy" type="text" id="KontoOdbiorcy" minlength="26" maxlength="26" name="KontoOdbiorcy" required><br>  
                    <label class="input-main" for="potwierdzHaslo">Potwierdź hasło:</label><br>
                    <input class="input-main" placeholder="Hasło - pamiętaj o bezpieczeństwie" type="password" id="potwierdzHaslo" name="potwierdzHaslo" required><br>
                    <input class="submit-button button-margin-zero" type="submit" value="Dalej">
                    <input class="submit-button button-margin-zero" type="reset" value="Wyczyść">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>