<STYLE>
.product_card
{
	width: 120px;
	height: 160px;
	background-color: #EFEFEF;
	border-radius: 2px;
}

image
{
	position: static;
	top: 0px;
	width: 100%;
	height: 70%;
	
}

.content
{
	position: static;
	bottom: 0px;
	width: 100%;
	height: 30%;
	background-color: #CCCCCC;
}

.hidden_content
{
	background-color: rgba(125,125,125,0.6)
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
			echo"<div class='product_card' href=''>";
				echo"<image src=''> </image>";
				echo"<div class='content'>".$name."</div>";
			echo"</div>";
		}
	}
?>