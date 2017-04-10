<HTML>
	<HEAD>
		<link rel="stylesheet" type="text/css" href="stile.css">
	</HEAD>

	<BODY>
		<?php include("ProductCard.php") ?>
		<?php include("header.php"); ?>
		
		<DIV id='content'>
			<INPUT id='search_field' name='search' placeholder='Search...' type='text'>
			<INPUT name='search_button' id='search_button' type='submit'>
			<BR><BR>
			<?php $product = new ProductCard("board","Una fantastica tavola","","39.90","","",12);?>
		</DIV>
		
		<?php include("footer.php"); ?>
	</BODY>
</HTML>