<form action="save_transfer.php" method="post">

  <!nazwaodbiorcy, tytulprzelewu>
  <label for="nazwaOdbiorcy">Odbiorca:</label><br>
  <input type="text" id="nazwaOdbiorcy" name="odbiorca" required><br>
  <label for="tytulPrzelewu">Tytuł przelewu:</label><br>
  <input type="text" id="tytulPrzelewu" name="tytulPrzelewu" required><br>
  <label for="zRachunku">Z rachunku:</label><br>
  <input type="mediumint" id="zRachunku" minlength="26" maxlength="26" name="zRachunku" required><br>
  <label for="naRachunek">Na rachunek:</label><br>
  <input type="mediumint" id="naRachunek" minlength="26" maxlength="26" name="naRachunek" required><br>
  <label for="kwota">Kwota:</label><br>
  <input type="decimal" id="kwota" name="kwota" required><br>
  <label for="potwierdzHaslo">Potwierdź hasło:</label><br>
  <input type="password" id="potwierdzHaslo" name="potwierdzHaslo" required><br>

  

  <input type="submit" value="Dalej">
 

  <input type="reset" value="Wyczyść">

 

</form>