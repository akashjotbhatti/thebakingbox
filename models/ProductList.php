<?php
Class ProductList {
	var $id;
	var $name;
	var $price;
	var $image;
	var $description;
	var $product_type_id;

	public function __construct($data) 
	{
		$this->id = $data["id"];
		$this->name = $data["name"];
		$this->price = $data["price"];
		$this->image = $data["image"];
		$this->description = $data["description"];
		$this->product_type_id = $data["product_type_id"];
	}

	public static function build($data)
	{
		return new ProductList($data);
	}
}
?>