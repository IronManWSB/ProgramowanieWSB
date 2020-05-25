<?php

session_start();

unset($_SESSION['nazwaUzytkownika']);
unset($_SESSION['nrKlienta']);
unset($_SESSION['czyZalogowany']);

header('location:index.php');

?>