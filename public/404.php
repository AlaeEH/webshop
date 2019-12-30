<?php

	// hiermee geven we door aan google dat het een 404 error pagina is
	http_response_code(404);
?>

<!DOCTYPE html>
<html>
<head>
	<title>404 Not Found</title>
	<link rel="stylesheet" type="text/css" href="404.css">
</head>
<body>
	<a href="index.php"><button>Click here to get back to the homepage!</button></a>
</body>
</html>