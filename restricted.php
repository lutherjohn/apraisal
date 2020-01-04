<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Restricted Page</title>

</head>
<body>

<div id="container">
	<h1>You don't have access to this page</h1>
	
	<a href = '<?php echo base_url(). "mainx/login" ?>' > Log in</a>

</div>

</body>
</html>