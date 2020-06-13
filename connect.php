<?php

require_once "connect.php";

$polaczenie = @new mysqli($host, "root", "", $db_name);

if($polaczenie->connect_errno!=0)
{
    echo "Brak połączenia z bazą danych"
}

else
{
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $polaczenie->close();
}

?>