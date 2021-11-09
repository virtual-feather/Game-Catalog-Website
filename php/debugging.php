<?php
	// Below are debugging functions 
	
	//stackoverflow.com/questions/4323411/how-can-i-write-to-the-console-in-php
	function toConsole($data) {
		$output = $data;

		if(is_array($output)) 
			$output = implode(',', $output);
		
		echo "<script>console.log('Debug Objects: ".$output."');</script>";
	}

?>