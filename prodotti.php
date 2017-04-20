<?php
	//chiamata al DB
	include('connect.php');
	include ('ProductCard.php');

	$query="";
	$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";


	if(isset($_POST['cerca_categoria']))
	{
		$query="";
		$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";
		$query=$query."WHERE id_categoria='".$_POST['categoria']."'";
	}

	
	if(isset($_POST['search_button']))
	{
		$query="";
		$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";
		$query=$query."WHERE nome LIKE '%".$_POST['search_field']."%'";
	}


	$query="";
	$query=$query."SELECT id,nome FROM categorie ";
	$rcategorie=mysql_query($query) or die($query);

	while($row = mysql_fetch_array($rcategorie)){
		if(isset($_POST['cat_tutte'])){
			$query="";
			$query=$query."SELECT p.id,p.nome,p.prezzo,p.produttore FROM prodotti as p ";
		}
		
		if(isset($_POST[$row['nome']]))
		{
			$query="";
			$query=$query."SELECT p.id,p.nome,p.prezzo,p.produttore FROM prodotti as p ";
			$query=$query."INNER JOIN categorie ";
			$query=$query."ON p.id_categoria = categorie.id ";
			$query=$query."WHERE categorie.nome ='".$_POST[$row['nome']]."'";
		}
	}
	
	$risultato=mysql_query($query) or die($query);


?>

<HTML>
	<!--
	Contiene l'head e l'apertura del body con il logo e la barra di navigazione
	-->
	<?php include("header.php");?>

	<!--
	Riempire con i contenuti della pagina
	-->
	<DIV id='content'>
		<FORM method='post' action='prodotti.php'>
			<INPUT id='search_field' name='search_field' placeholder='Cerca...' type='text'></INPUT>
			<INPUT id='search_button' name='search_button'  type='submit' value=''></INPUT>
		</FORM>
		<BR><BR>
			
		<?php


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

			/*prova per posizionare n prodotti uguali nella pagina
			$n=50;
			for($i=0; $i<$n; $i++)
			{
				$product = new ProductCard("board","Una fantastica tavola, ultra leggera perfetta per sfrecciare a massima velocità","","39.90","produttore","",12);
			}
			*/
			
		?>
	</DIV>
	
	<!--
	Contiene il piè di pagina e la chiusura del body
	-->
	<?php include("footer.php"); ?>
</HTML>
