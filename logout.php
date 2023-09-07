<?php session_start();
?>
<?php

	unset($_SESSION['faculty']);
	echo "<script>window.location = 'index.php'</script>";
?>