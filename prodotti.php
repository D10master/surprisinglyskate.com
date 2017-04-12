<?php
	//chiamata al DB
	include('connect.php');
	include ('ProductCard.php');
	$query="";
	$query=$query."SELECT id,nome,prezzo,produttore FROM prodotti ";
	$risultato=mysql_query($query) or die($query);


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
			<FORM method='post' action=''>
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
