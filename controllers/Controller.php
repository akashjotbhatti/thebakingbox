<?php
abstract Class Controller {
	// show url
	protected function loadView($viewFilePath)
	{
		$newLines = "";
		if ($this->newLines)
		{
			$newLines = "\n";
		}

		ob_start(); // start the output buffer
		include($viewFilePath);
		$response = $newLines.ob_get_contents().$newLines; // transfer the content from the buffer
		ob_clean(); // deletes the content of the most recent output buffer
		return $response;
	}

	// a function that connects to the db to get data
	public function loadData($data, $variableName)
	{
		$this->$variableName = $data;
	}

	// for errors such as non-existing pages
	public abstract function err();
}
?>