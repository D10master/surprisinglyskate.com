<?php
	//chiamata al DB
	/*include('connect.php');
	$query="";
	$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";
	$risultato=mysql_query($query) or die($query);
	
	if(mysql_num_rows($risultato)>0)
 	{
 		while($array=mysql_fetch_array($risultato))
 		{
			$nome = $array['nome'];
			$prezzo =  $array['prezzo'];
			$produttore = $array['produttore'];
			$product = new ProductCard($nome,"","",$prezzo,"","",11);
		}
	}*/
?>

<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="stile.css">
	</HEAD>

	<BODY>
		<?php 
			include("ProductCard.php");
			include("header.php"); 
		?>

		<DIV id='content'>
			<INPUT id='search_field' name='search' placeholder='Cerca...' type='text'></INPUT>
			<INPUT name='search_button' id='search_button' type='submit' value=''></INPUT>
			<BR><BR>
			<?php
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
