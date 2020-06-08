<form action="save_recipient.php" method="post">



  <!nazwaodbiorcy, tytulprzelewu>
  <br>
  <label for="NazwaSkrocona">Nazwa skrócona:</label><br>
  <input type="text" id="NazwaSkrocona" name="NazwaSkrocona" required><br>
  <label for="Nazwisko">Nazwisko:</label><br>
  <input type="text" id="Nazwisko" name="Nazwisko" required><br>
  <label for="Imie">Imię:</label><br>
  <input type="text" id="Imie" name="Imie" required><br>
 
  <label for="KontoOdbiorcy">Numer Konta:</label><br>
  <input type="text" id="KontoOdbiorcy" minlength="26" maxlength="26" name="KontoOdbiorcy" required><br>
  
  <label for="potwierdzHaslo">Potwierdź hasło:</label><br>
  <input type="password" id="potwierdzHaslo" name="potwierdzHaslo" required><br>


  

  <input type="submit" value="Dalej">
 

  <input type="reset" value="Wyczyść">

 

</form>