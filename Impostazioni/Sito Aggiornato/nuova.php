<?php
session_start();
//se non c'� la sessione registrata
if (!session_is_registered('autorizzato')) {
  echo "<h1>Area riservata, accesso negato.</h1>";
  echo "Per effettuare il login clicca <a href='index.php'><font color='blue'>qui</font></a>";
  die;
}
 
//Altrimenti Prelevo il codice identificatico dell'utente loggato
session_start();
$cod = $_SESSION['cod']; //id cod recuperato nel file di verifica
?>

<html>
<link rel="stylesheet" href="stilenuova.css" type="text/css" />
<form method="post" name="Salva" action="nuovastazione.php" />
  <h3>Nuova Stazione</h3>

<p>ID Stazione<p>
 
<input type="text" name="idstazione" />
 
<p>Linea Produzione<p>
 
<input type="text" name="lineaproduzione" />

<p>Timeout Barcode<p>
 
<input type="text" name="timeout" />


    <br></br>

 
<input type="submit" name="Submit" value="Salva" />

<br></br>
<a href="logout.php">Logout</a>

</form>


 
 
</html>
