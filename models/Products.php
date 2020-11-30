<?php
Class Products extends DB {
	public static function getProducts()
	{
 		$con = DB::connect(); // connect to db
 		$sql = "SELECT * FROM products ORDER BY product_type_id"; // get the needed products
		$data = mysqli_query($con, $sql); // save the connection and sql to a variable
		$response = array(); // create an empty array

		// loop over the data and add the data to the array
		foreach($data as $productInfo)
		{
			$response[] = ProductList::build($productInfo);
		}
		return $response;
 	}

 	public static function getDairyFreeProducts()
	{
 		$con = DB::connect();
 		$sql = "SELECT * FROM product_restrictions LEFT JOIN products ON products.id = product_restrictions.product_id WHERE restriction_id = 1";
		$data = mysqli_query($con, $sql);
		$response = array();

		foreach($data as $productInfo)
		{
			$response[] = ProductList::build($productInfo);
		}
		return $response;
 	}

 	public static function getGlutenFreeProducts()
	{
 		$con = DB::connect();
 		$sql = "SELECT * FROM product_restrictions LEFT JOIN products ON products.id = product_restrictions.product_id WHERE restriction_id = 2";
		$data = mysqli_query($con, $sql);
		$response = array();

		foreach($data as $productInfo)
		{
			$response[] = ProductList::build($productInfo);
		}
		return $response;
 	}

 	public static function getNutFreeProducts()
	{
 		$con = DB::connect();
 		$sql = "SELECT * FROM product_restrictions LEFT JOIN products ON products.id = product_restrictions.product_id WHERE restriction_id = 3";
		$data = mysqli_query($con, $sql);
		$response = array();

		foreach($data as $productInfo)
		{
			$response[] = ProductList::build($productInfo);
		}
		return $response;
 	}

 	public static function getBrownies()
	{
 		$con = DB::connect();
 		$sql = "SELECT * FROM products WHERE product_type_id = 1";
		$data = mysqli_query($con, $sql);
		$response = array();

		foreach($data as $productInfo)
		{
			$response[] = ProductList::build($productInfo);
		}
		return $response;
 	}

 	public static function getCookies()
	{
 		$con = DB::connect();
 		$sql = "SELECT * FROM products WHERE product_type_id = 2";
		$data = mysqli_query($con, $sql);
		$response = array();

		foreach($data as $productInfo)
		{
			$response[] = ProductList::build($productInfo);
		}
		return $response;
 	}

 	public static function getCupcakes()
	{
 		$con = DB::connect();
 		$sql = "SELECT * FROM products WHERE product_type_id = 3";
		$data = mysqli_query($con, $sql);
		$response = array();

		foreach($data as $productInfo)
		{
			$response[] = ProductList::build($productInfo);
		}
		return $response;
 	}
}
?>