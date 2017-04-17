
<?php
   session_start();
   $_SESSION['id']=null;
   $_SESSION['username']=null;
   if(isset($_POST['CONFERMA']))
   {
 
      include('connect.php');

      $NO = $_POST['NO'];
      $CO = $_POST['CO'];
	  $EM = $_POST['EM'];
	  $CE = $_POST['CE'];
      $IN = $_POST['IN'];
	  $US = $_POST['US'];
	  $PW = $_POST['PW'];
 	  

      $query = "SELECT username FROM dati_accesso WHERE username='".$US."'";
      $risultato = mysql_query($query) or die ($query);
      if(mysql_num_rows($risultato)>0)
      {
         $mess="<H4>Utente ".$US." già esistente. Registrazione non avvenuta</H4>";
      }  
      else 
      {
         $query = "INSERT INTO clienti (nome,cognome,email,cellulare,indirizzo) ";
         $query=$query."VALUES ('".$NO."','".$CO."','".$EM."','".$CE."','".$IN."')";
         $risultato = mysql_query($query) or die ($query);

         $query = "SELECT id FROM clienti WHERE email='".$EM."'";
         $risultato1 = mysql_query($query1) or die ($query1);
		 
		 $query = "INSERT INTO dati_accesso (username,password,id_cliente) ";
         $query=$query."VALUES ('".$US."','".$PW."','".$risultato1."')";
         $risultato = mysql_query($query) or die ($query);
         $mess="<H4>Utente ".$US." in attesa di conferma</H4>"; 
      }
   }

?>

<HTML>

	<?php
		include("header.php");

		echo "<DIV id='benvenuto'>";
		   echo "<H4>Registrazione nuovo utente</H4>";
		echo "</DIV>";

		echo "<DIV id='contenuto'>";
		   if(isset($_POST['CONFERMA']))
		   {
			  echo $mess;
		   }
		   else
		   {
			  echo "<FORM name='F3' method='post' action='".$_SERVER['PHP_SELF']."' >";
				 echo "nome: &nbsp;<INPUT type='text' name='NO' value='' size='7'><BR>";
				 echo "cognome: &nbsp;<INPUT type='text' name='CO' value='' size='7'><BR>";
				 echo "email: &nbsp;<INPUT type='text' name='EM' value='' size='7'><BR>";
				 echo "cellulare &nbsp;<INPUT type='text' name='CE' value='' size='7'><BR>";
				 echo "indirizzo: &nbsp;<INPUT type='text' name='IN' value='' size='7'><BR>";
				 echo "Username: &nbsp;<INPUT type='text' name='US' value='' size='7'><BR>";
				 echo "Password: &nbsp;<INPUT type='password' name='PW' value='' size='7'><BR>";
				 echo "<INPUT class='bottone' type='submit' name='CONFERMA' value='conferma'>";
			  echo "</FORM>";
		   }
		echo "</DIV>";

		echo "<DIV id='links'>";
		   echo "<BR><A href='login.php'>Logout</A>";
		echo "</DIV>";

		include("footer.php");
	?>

</HTML>

