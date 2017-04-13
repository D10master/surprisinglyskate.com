<?php
  session_start();

  //chiamata al DB
	include('connect.php');

  $titolare="";
  $id_utente = $_SESSION['id'];

  // QUERY PER RICAVARE L'ID DEL CLIENTE DAL ID DEL UTENTE
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

  //CARICAMENTO CARTE
  $query="";
  $query=$query . "SELECT pagamento.titolare, pagamento.id, pagamento.codice, pagamento.scadenza, carte.nome FROM pagamento " ;
  $query=$query . "INNER JOIN carte ON pagamento.id_carta = carte.id ";
  $query=$query . "WHERE id_cliente = " . $id_cliente." ";
  $rcarte=mysql_query($query) or die($query);

 //INSERIMENTO ORDINE
  if(isset($_POST['paga'])){
    $query="";
    $query=$query . "INSERT INTO ordini (data,stato,id_cliente) " ;
    $query=$query . "VALUES (now(),1,'".$id_cliente."')";
    $rordine=mysql_query($query) or die($query);

    /*
    $query="";
    $query=$query . "INSERT INTO dettaglio_ordine (id_ordine,i_prodotto,quantita) ";
    $query=$query . "VALUES ()";
    $rordine=mysql_query($query) or die($query);
    */
  }


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
      // CARICO LE CARTE IN UNA SELECT
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
		     echo "<OPTION value='".$id."'> carta:".$tipo_carta." " . $codice .", ". $scadenza .", Intestatario carta:".$titolare."<br/>". "</OPTION>";
	   }
	   echo "</SELECT> <br>";
     echo "<INPUT id='' name='paga'  type='submit' value='Paga'></INPUT>";
     echo "</FORM>";
     </DIV>
		<?php include("footer.php"); ?>
	</BODY>
</HTML>
