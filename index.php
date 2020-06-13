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
                       echo "<a href=\"chechout.php\">Moje konto</a>";
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
    
</body>
</html>


