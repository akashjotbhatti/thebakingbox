<?php
Class PageController extends Controller {
	
	var $newLines = true;
	var $data = array();

	public function home() 
	{
		$nav = $this->loadView("views/NavigationView.php"); // get the navigation to display on the page
		$content = $this->loadView("views/HomeView.php"); // get the specific view needed for the page
		$footer = $this->loadView("views/FooterView.php"); // get the footer to dispaly on the page
		include("views/MainView.php"); // get the overall layout for the page
	}

	public function about() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("views/AboutView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function products() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$this->data = Products::getProducts(); // get data from the database using a model and function
		$content = $this->loadView("views/ProductView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function dairyfree() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$this->data = Products::getDairyFreeProducts();
		$content = $this->loadView("views/DairyFreeView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function glutenfree() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$this->data = Products::getGlutenFreeProducts();
		$content = $this->loadView("views/GlutenFreeView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function nutfree() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$this->data = Products::getNutFreeProducts();
		$content = $this->loadView("views/NutFreeView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function brownies() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$this->data = Products::getBrownies();
		$content = $this->loadView("views/BrownieView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function cookies() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$this->data = Products::getCookies();
		$content = $this->loadView("views/CookieView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function cupcakes() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$this->data = Products::getCupcakes();
		$content = $this->loadView("views/CupcakeView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function cart() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("views/CartView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function login() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("register_login/login.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

    public function register() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("register_login/register.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function welcome() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("views/WelcomeView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function pastOrders() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("views/PastOrdersView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function conformation() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("views/ConformationView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}

	public function err() 
	{
		$nav = $this->loadView("views/NavigationView.php");
		$content = $this->loadView("views/ErrorView.php");
		$footer = $this->loadView("views/FooterView.php");
		include("views/MainView.php");
	}
}
?>