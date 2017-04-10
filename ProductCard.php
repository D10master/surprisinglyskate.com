<STYLE>
.product_card
{
	width: 220px;
	height: 300px;
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

.text {
  white-space: nowrap; 
  color: white;
  font-size: 18px;
  position: absolute;
  overflow: hidden;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

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
	color: black;
	font-size: 18pt;
	font-weight: bold;
	margin: 5px;
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
							echo"<div class='text'>".$price."$<div>";
						echo"</div>"; //overlay
					echo"</div>";// container
					echo"<div class='content'>";
						echo "<span class='name'>".$name."</span>";
						echo "<div style='position:relative; top:5px; right:3px; background-color:rgb(0,200,30); border:2px black; border-radius:10px; width:20px; height:20px;'></div>";
					echo"</div>";	
				echo"</div>";
			echo"<a>";
		}
	}
?>