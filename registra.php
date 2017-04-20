
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
 	  

      $query = "SELECT username FROM clienti WHERE username='".$US."'";
      $risultato = mysql_query($query) or die ($query);
      if(mysql_num_rows($risultato)>0)
      {
         $mess="<H4>Utente ".$US." già esistente. Registrazione non avvenuta</H4>";
      }  
      else 
      {
         $query = "INSERT INTO clienti (username,password,nome,cognome,email,cellulare,indirizzo) ";
         $query=$query."VALUES ('".$US."','".$PW."','".$NO."','".$CO."','".$EM."','".$CE."','".$IN."')";
         $risultato = mysql_query($query) or die ($query);
         $mess="<H4>Utente ".$US." registrato correttamente.</H4>"; 
      }
   }

?>

<HTML>

	<?php
		include("header.php");

		echo "<DIV id='benvenuto'>";
		   echo "<H3>Registrazione nuovo utente:</H3>";
		echo "</DIV>";

		echo "<DIV id='contenuto'>";
		   if(isset($_POST['CONFERMA']))
		   {
			  echo $mess;
		   }
		   else
		   {
				echo "<FORM name='F3' method='post' action='".$_SERVER['PHP_SELF']."' >";
					echo "<INPUT type='text' name='NO' placeholder='nome' value='' size='7'><BR>";
					echo "<INPUT type='text' name='CO' placeholder='cognome' value='' size='7'><BR>";
					echo "<INPUT type='text' name='EM' placeholder='e-mail' value='' size='7'><BR>";
					echo "<INPUT type='text' name='CE' placeholder='cellulare' value='' size='7'><BR>";
					echo "<INPUT type='text' name='IN' placeholder='indirizzo' value='' size='7'><BR>";
					echo "<INPUT type='text' name='US' placeholder='username' value='' size='7'><BR>";
					echo "<INPUT type='password' name='PW' placeholder='password' value='' size='7'><BR>";
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

