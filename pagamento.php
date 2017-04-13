<?php
	//chiamata al DB
  session_start();
	include('connect.php');
  $titolare="";
  $id_utente = $_SESSION['id'];

	$query="";
	$query=$query."SELECT id_cliente  FROM dati_accesso WHERE id_cliente = ".$_SESSION['id'];
	$rid_cliente=mysql_query($query) or die($query);
  if(mysql_num_rows($rid_cliente)>0)
  {
    while($array=mysql_fetch_array($rid_cliente))
    {
        $id_cliente = $array['id_cliente'];
    }
  }

  $query="";
  $query=$query . "SELECT pagamento.titolare, pagamento.id, pagamento.codice, pagamento.scadenza, carte.nome FROM pagamento " ;
  $query=$query . "INNER JOIN carte ON pagamento.id_carta = carte.id ";
  $query=$query . "WHERE id_cliente = " . $id_cliente." ";
  $rcarte=mysql_query($query) or die($query);



?>

<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="stile.css">
	</HEAD>

	<BODY>
		<?php
			include("header.php");
		?>
    <DIV id='content'>

			<?php
			echo "<FORM method='post' action=''>";
			echo "<SELECT name='carta'>";
			echo "<OPTION value=''>Seleziona</OPTION>";

	   while($array=mysql_fetch_array($rcarte))
	   {
      $titolare = $array['titolare'];
		  $id = $array['id'];
			$codice = $array['codice'];
      $scadenza = date($array['scandenza']);
      $tipo_carta = $array['nome'];
		     echo "<OPTION value='".$id."'> carta:".$tipo_carta." " . $codice ." ". $scadenza . "</OPTION>";
	   }
	   echo "</SELECT> <br>";
     echo "Intestatario carta:".$titolare."<br/>";
     echo "<INPUT id='' name='paga'  type='submit' value='Paga'></INPUT>";
     echo "</FORM>";
     echo "scadenza = ".$scadenza;
     ?>

     </DIV>
		<?php include("footer.php"); ?>
	</BODY>
</HTML>
