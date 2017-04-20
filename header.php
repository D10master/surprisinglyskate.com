<HEAD>
	<link rel="stylesheet" type="text/css" href="stile.css">
	<link rel="icon" href="media/immagini/skate.jpg" type="image/gif" sizes="16x16">
	<script src="script.js"></script>
</HEAD>

<BODY>
	<?php include("login.php");
		$categorie = mysql_query("SELECT nome FROM categorie");
	?>

	<DIV id='header'>
		<DIV id='logo'>
			<img src="media/immagini/logo.png" alt="logo.png" id='logo_image' href='index.php' />
		</DIV>
		
		<DIV id='navbar'>
			<a class='navbar_element' href='index.php'> Home </a>
			<DIV class="dropdown">
				<span><a class='' href='prodotti.php'>Categorie</a></span>
				<div class="dropdown-content">
					<?php
					while($row = mysql_fetch_array($categorie))
					{
						//$_SESSION['cat'] = 
						echo "<a href='prodotti.php'>$row[0]</a><br>";
						
					}
					?>
				</DIV>
			</DIV>

			<a class='navbar_element'> Chi siamo </a>
			<a class='navbar_element'> Dove siamo </a>
			<button class='navbar_element' onclick='openLogin()'> Login </button>
		</DIV>
	</DIV>
	