<?php 
	
	if(!ISSET($_SESSION['user'])){
		echo "<script>window.location.href = 'index.php'</script>";
	}

?>