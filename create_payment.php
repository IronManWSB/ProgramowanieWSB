<form action="save_payment.php" method="post">

<?php

session_start();

$nrKonta=$_GET['nrKonta'];


$nrKlienta = $_SESSION['nrKlienta'];
$polaczenie = new mysqli("localhost","Angela","123456","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}

echo "<input type=\"hidden\" id=\"nrKonta\" name=\"nrKonta\" value=\"".$nrKonta."\">";
?>
<label for="kwota">Kwota:</label><br>
  <input type="decimal" id="kwota" name="kwota" required><br>

  <label for="potwierdzHaslo">Potwierdź hasło:</label><br>
  <input type="password" id="potwierdzHaslo" name="potwierdzHaslo" required><br>

  <input type="submit" value="Dalej">
 

  <input type="reset" value="Wyczyść">

  

  </form>