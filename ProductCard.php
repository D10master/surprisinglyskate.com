<STYLE>
.product_card
{
	display: inline-block;
	margin:14px;
	position: relative;
	width: 220px;
	height: 300px;
	box-shadow: 2px 4px 30px #202020;
	background-color: #EFEFEF;
	border-radius: 2px;
	text-decoration: none;
}
.image {
  display: block;
  width: 100%;
  height: auto;
}

.container {
  display: block;
  position: relative;
  width: auto;
  height:auto;
}

.container:hover .overlay {
  height: 100%;
}

.overlay {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgb(90,90,90,0.5);
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: .5s ease;
}

.price {
  white-space: nowrap; 
  color: white;
  font-size: 18px;
  position: absolute;
  overflow: hidden;
  bottom: 25%;
  left: 20%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

//parte inferiore che contiene il nome ed il produttore
.description
{
	position: static;
	bottom: 0%;
	width: 100%;
	height: 30%;
	background-color: #DADADA;
	text-decoration: none;
}

.name
{
	float: left;
	width:auto;
	color: black;
	font-size: 18pt;
	font-weight: bold;
	margin: 5px;
}

.producer
{
	float:left;
	width:80%;
	color: black;
	font-size: 14pt;
	font-weight: bold;
	margin: 5px;
	font-style: italic;
}

.name: visited
{
	text-decoration: none;
}

.no_decoration
{
	
}
</STYLE>

<?php
	class ProductCard
	{
		public $name="";
		public $description="";
		public $image;
		public $price;
		public $producer="";
		public $category="";
		public $stock;
		
		public function __construct($name,$description,$image,$price,$producer,$category,$stock)
		{
			echo"<a href=''>";
				echo"<div class='product_card' href=''>";
					echo"<div class='container'>";
						echo"<image class='image' src='skate.jpg'>";
						echo"<div class='overlay'>";
							echo"<div class='price'>".$price."$</div>";
						echo"</div>"; //overlay
					echo"</div>";// container
					echo"<div class='description'>";
						echo "<div class='name'>".$name."</div>";
						echo "<div style='float: left; position:relative; top:13px; background-color:rgb(0,200,30); border:2px black; border-radius:7px; width:14px; height:14px;'></div>";
						echo "<div class='producer'>".$producer."</div>";
					echo"</div>";	
				echo"</div>";
			echo"</a>";
		}
	}
?>