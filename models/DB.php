<?php
abstract Class DB 
{
	// create a function to connect to database
	public static function connect() 
	{
		return mysqli_connect("localhost", "akashjot_baking", "hWeut8XKW0c", "akashjot_thebakingbox");
	}
}
?>