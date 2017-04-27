<HEAD>
	<link rel="stylesheet" type="text/css" href="stile.css">
	<link rel="icon" href="media/immagini/skate.jpg" type="image/gif" sizes="16x16">
	<script src="script.js"></script>
</HEAD>

<BODY>
	<?php
		include ("connect.php");
		include("login.php");
		$categorie = mysql_query("SELECT nome FROM categorie");
	?>

	<DIV id='header'>
		<DIV id='logo'>
			<img src="media/immagini/logo.png" alt="logo.png" id='logo_image' href='index.php' />
		</DIV>
		
		<DIV id='navbar'>
			<a class='navbar_element' href='index.php'> Home </a>
			<DIV class="dropdown">
				<span> Prodotti </span>
				<div class="dropdown-content">
					<?php
					echo "<FORM method='post' action='prodotti.php' class='dropdown_form'>";
					echo "<input type='submit' value='tutte' name='cat_tutte'><BR>";
					while($row = mysql_fetch_array($categorie))
					{
						echo "<input type='submit' value='$row[0]' name='$row[0]'><BR>";
						
					}
					echo "</FORM>";
					?>
				</DIV>
			</DIV>

			<a class='navbar_element'> Chi siamo </a>
			<a class='navbar_element' href='where.php'> Dove siamo </a>
			<button class='navbar_element' onclick='openLogin()'> Login </button>
		</DIV>
	</DIV>
	