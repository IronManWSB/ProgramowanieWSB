<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Critical Bank</title>
</head>
<body>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    <div class id="top_menu">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class= "btn btn-success btn-sm">Critical Bank</a>
                <a href="checkuot.php"> Users is 5</a>
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

                <button class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
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
<?php

$nrKonta=$_GET['nrKonta'];

$polaczenie = new mysqli("localhost","root","","bank");
if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT NazwaKonta, NrKonta, AktualnyBilans, TypKonta FROM konto WHERE NrKonta=$nrKonta";

$wynik = $polaczenie->query($zapytanie);
$wiersz = $wynik->fetch_assoc();
echo "<h3> Szczegóły konta o numerze : ".$wiersz['NrKonta']."</h3>";
echo "Nazwa Konta: ".$wiersz['NazwaKonta']."<br>";
echo "Aktualny Bilans: ".$wiersz['AktualnyBilans']."<br>";
echo "Typ Konta: ".$wiersz['TypKonta']."<br>";

echo "<a href=\"create_payment.php?nrKonta=".$nrKonta."\">Dodaj wpłatę</a>";
echo "<br>";
echo "<a href=\"create_withdrawal.php?nrKonta=".$nrKonta."\">Dodaj wypłatę</a>";

?>

<br>

</div>
</div>
</div>
