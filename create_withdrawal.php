<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="styles/bootstrap-337.min.css">
        <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
        <link rel="stylesheet" href="styles/style.css">
        <title>Wypłać pieniądze</title>
    </head>
    <body>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <div class id="top_menu">
            <div class="container">
                <div class="col-md-6 offer">
                    <a href="#" class= "btn btn-success btn-sm">Critical Bank</a>
                
                </div>
                <div class="col-md-6">
                    <ul class="menu">
                        <li>
                            <a href="Customer_register.php">Zarejestruj</a>
                        </li>
                        <li>
                            <a href="chechout.php">Moje konto</a>
                        </li>
                        
                        <li>
                        <?php

                        if(isset($_SESSION['czyZalogowany'])&&($_SESSION['czyZalogowany'])){
                        
                        $nazwaUzytkownika = $_SESSION['nazwaUzytkownika'];
                        echo "Witaj ".$nazwaUzytkownika;
                        echo "</li>";
                        echo "<li>";
                        echo "<a href=\"login.php\">Wyloguj<img src='./images/logout-icon.ico' style='margin-left:10px;'/></a>";
                        echo "</li>";

                        }
                        else{
                            echo "<a href=\"login.php\">Zaloguj</a>";
                            
                        }

                        
                    
                        ?>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <form action="save_payment.php" method="post">


    <?php

    session_start();
    ?>
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
            </div></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="h2-main">Dodaj wypłatę</h2>
                <?php
                $nrKonta=$_GET['nrKonta'];


                $nrKlienta = $_SESSION['nrKlienta'];
                $polaczenie = @new mysqli("localhost","root","","bank");

                if ($polaczenie->connect_errno!=0) {
                    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
                    exit;
                }

                echo "<input type=\"hidden\" id=\"nrKonta\" name=\"nrKonta\" value=\"".$nrKonta."\">";
                ?>
                <label class="main-label label-white" for="kwota">Kwota:</label><br>
                <input class="input-main" placeholder="np. 50" type="decimal" id="kwota" name="kwota" required><br>
                <label class="main-label label-white"  for="potwierdzHaslo">Potwierdź hasło:</label><br>
                <input class="input-main" placeholder="potwierdź hasło" type="password" id="potwierdzHaslo" name="potwierdzHaslo" required><br>
                <input class="submit-button button-margin-zero" type="submit" value="Dalej">
                <input class="submit-button button-margin-zero" type="reset" value="Wyczyść">
             </form>
            </div>
        </div>
    </div>
</body>
</html>