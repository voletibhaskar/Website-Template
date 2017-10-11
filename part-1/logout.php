<?php
	session_start();
	session_destroy();
	echo "<script>window.location='http://localhost/project/success_logout.php'</script>";
?>
