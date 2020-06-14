<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Przelewy</title>
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
                <a href="checkuot.php"> Users is 5</a>
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
                        if(isset($_SESSION['czyZalogowany'])&&($_SESSION['czyZalogowany']))
                        {
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
<?php
$polaczenie = @new mysqli("localhost","root","","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

$NrKlienta=$_SESSION['nrKlienta'];
$zapytanie = "SELECT * FROM klienci k join adresy a on k.NrKlienta=a.NrKlienta WHERE K.NrKlienta=$NrKlienta";


$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;
?>

<div class="container">
<div class="row">
<div class="col-md-12">
<h2 class="h2-main text-center">Moje dane</h2>
<?php


    for($i=0; $i<$iloscWierszy; $i++)
    {
    $wiersz=$wynik->fetch_assoc();
    echo "<div class='col-md-6 padding-left-md'>";   
    echo "<p class='p-contact'>Imię: ".$wiersz['Imie']."<p>";
    echo "<p class='p-contact'>Nazwisko: ".$wiersz['Nazwisko']."</p>";
    echo "<p class='p-contact'>Ulica: ".$wiersz['Ulica']."</p>";
    echo "<p class='p-contact'>Numer ulicy: ".$wiersz['NrUlicy']."</p>";
    echo "<p class='p-contact'>Kod pocztowy: ".$wiersz['KodPocztowy']."</p>";
    echo "</div>";
    echo "<div class='col-md-6'>";
    echo "<p class='p-contact'>Miasto: ".$wiersz['Miasto']."</p>";
    echo "<p class='p-contact'>Województwo: ".$wiersz['Wojewodztwo']."</p>";
    echo "<p class='p-contact'>Kraj: ".$wiersz['Kraj']."</p>";
    echo "<p class='p-contact'>Pesel: ".$wiersz['Pesel']."</p>";
    echo "<p class='p-contact'>Telefon: ".$wiersz['Telefon']."</p>";
    echo "</div>";
    }
?>
</div>
</div>
</div>
</body>
</html>
