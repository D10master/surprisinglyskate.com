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
	border-radius: 6px;
}
.image {
  display: block;
  width: 100%;
  height: auto;
}

.top {
  display: block;
  position: relative;
  width: auto;
  height:auto;
}

.top:hover .overlay 
{
  height: 100%;
}

.overlay 
{
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgb(0,140,255,0.55);
  overflow: hidden;
  width: 100%;
  height: 0;
  transition: .5s ease;
}

.price {
  white-space: nowrap; 
  color: white;
  font-size: 20px;
  position: absolute;
  overflow: hidden;
  top: 10%;
  left: 17%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

.description {
  word-wrap: break-word;
  color: white;
  font-size: 16px;
  font-style: italic;
  text-align: right;
  font-family:Courier New;
  position: relative;
  //overflow: hidden;
  top: 20%;
  left: 2%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
}

//parte inferiore che contiene il nome ed il produttore
.bottom
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
	font-size: 20pt;
	font-weight: bold;
	margin: 5px;
}

.producer
{
	float:left;
	width:80%;
	color: black;
	font-size: 12pt;
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
					echo"<div class='top'>";
						echo"<image class='image' src='skate.jpg'>";
						echo"<div class='overlay'>";
							echo"<span class='price'>".$price."$</span>";
							echo"<span class='description'>".$description."</span>";
						echo"</div>"; //overlay
					echo"</div>";// top
					echo"<div class='bottom'>";
						echo "<span class='name'>".$name."</span>";
						echo "<div style='float: left; position:relative; top:13px; background-color:rgb(0,200,30); border:2px black; border-radius:7px; width:14px; height:14px;'></div>";
						echo "<span class='producer'>".$producer."</span>";
					echo"</div>";	
				echo"</div>";
			echo"</a>";
		}
	}
?>