<form action="save_transfer.php" method="post">

<?php

session_start();

$nrKlienta = $_SESSION['nrKlienta'];
$polaczenie = new mysqli("localhost","Angela","123456","bank");

if ($polaczenie->connect_errno!=0) {
    echo "Brak połączenia z bazą danych: " . $polaczenie -> connect_error;
    exit;
}
$zapytanie = "SELECT NazwaKonta, NrKonta FROM konto WHERE NrKlienta=$nrKlienta";

$wynik = $polaczenie->query($zapytanie);
$iloscWierszy = $wynik->num_rows;

echo "<label for=\"zRachunku\">Z rachunku:</label><br>";
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

echo "<label for=\"naRachunek\">Na rachunek:</label><br>";
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
  <label for="nazwaOdbiorcy">Odbiorca:</label><br>
  <input type="text" id="nazwaOdbiorcy" name="odbiorca" required><br>
  <label for="tytulPrzelewu">Tytuł przelewu:</label><br>
  <input type="text" id="tytulPrzelewu" name="tytulPrzelewu" required><br>
 
  <label for="kwota">Kwota:</label><br>
  <input type="decimal" id="kwota" name="kwota" required><br>
  <label for="potwierdzHaslo">Potwierdź hasło:</label><br>
  <input type="password" id="potwierdzHaslo" name="potwierdzHaslo" required><br>


  

  <input type="submit" value="Dalej">
 

  <input type="reset" value="Wyczyść">

 

</form>