<?php
	
	// hier geven we een standaard waarde aan postcode
	echo standardizePostcode('1111aa');

	function standardizePostcode($postcode)

	{
	
	$postcode = wordwrap($postcode, strlen($postcode)-2,' ', true);

	return strtoupper($postcode);

	}


?>