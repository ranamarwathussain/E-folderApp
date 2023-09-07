<?php
	
	if(!ISSET($_SESSION['faculty'])){
		echo "<script>window.location.href = 'index.php'</script>";
	}
?>