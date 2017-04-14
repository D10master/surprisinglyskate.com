<?php
	//chiamata al DB
	include('connect.php');
	include ('ProductCard.php');

	$query="";
	$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";


	if(isset($_POST['cerca_categoria'])){
		$query="";
		$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";
		$query=$query."WHERE id_categoria='".$_POST['categoria']."'";
	}

	if(isset($_POST['search_button'])){
		$query="";
		$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";
		$query=$query."WHERE nome LIKE '%".$_POST['search_field']."%'";
		echo $query;
	}


	$risultato=mysql_query($query) or die($query);

	$query="";
	$query=$query."SELECT id,nome FROM categorie ";
	$rcategorie=mysql_query($query) or die($query);


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
			<FORM method='post' action='prodotti.php'>
				<INPUT id='search_field' name='search_field' placeholder='Cerca...' type='text'></INPUT>
				<INPUT id='search_button' name='search_button'  type='submit' value=''></INPUT>
			</FORM>
			<BR><BR>
			<?php

			echo "<FORM method='post' action=''>";
			echo "<SELECT name='categoria'>";
			echo "<OPTION value=''>Seleziona</OPTION>";

	   while($array=mysql_fetch_array($rcategorie))
	   {
		  $id = $array['id'];
			$nome = $array['nome'];
		     echo "<OPTION value='".$id."'>".$nome."</OPTION>";
	   }
	   echo "</SELECT> <br>";
		 echo "<INPUT id='' name='cerca_categoria'  type='submit' value='Cerca per categoria'></INPUT>";
		 echo "</FORM>";

			if(mysql_num_rows($risultato)>0)
			{
				while($array=mysql_fetch_array($risultato))
				{
					$nome = $array['nome'];
					$prezzo =  $array['prezzo'];
					$produttore = $array['produttore'];
					$product = new ProductCard($nome,"","",$prezzo,"","",11);
				}
			}

				//prova per posizionare n prodotti uguali nella pagina
				$n=50;
				for($i=0; $i<$n; $i++)
				{
					$product = new ProductCard("board","Una fantastica tavola, ultra leggera perfetta per sfrecciare a massima velocità","","39.90","produttore","",12);
				}
			?>
		</DIV>

		<?php include("footer.php"); ?>
	</BODY>
</HTML>
