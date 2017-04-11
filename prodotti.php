<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="stile.css">
	</HEAD>

	<BODY>
		<?php include("ProductCard.php") ?>
		<?php include("header.php"); ?>

		<DIV id='content'>
			<INPUT id='search_field' name='search' placeholder='Cerca...' type='text'></INPUT>
			<INPUT name='search_button' id='search_button' type='submit' value=''></INPUT>
			<BR><BR>
			<?php
			//esempio
			 $product = new ProductCard("board","Una fantastica tavola","","39.90","","",12);
			 //chiamata al DB
			 include('connect.php');
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
		 }


			 ?>
		</DIV>

		<?php include("footer.php"); ?>
	</BODY>
</HTML>
