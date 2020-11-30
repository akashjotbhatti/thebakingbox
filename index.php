<?php
// set the page the user will land on
$controller = (isset($_GET["controller"])) ? $_GET["controller"] : "page";
$action = (isset($_GET["action"])?$_GET["action"]: "home");

// if theres a controller uppercase the first letter to avoid conflict
if ($controller)
{
	$controller = ucfirst($controller)."Controller";
}

// include the controller and model files
include("controllers/Controller.php");
include("controllers/$controller.php");
include("models/DB.php");
include("models/ProductList.php");
include("models/Products.php");

// invoke the controller
$oController = new PageController();

// if page exists direct user to the page or show them an error
if(method_exists($oController, $action))
{
	$oController->$action();
} else {
	$oController->err();
}
?>