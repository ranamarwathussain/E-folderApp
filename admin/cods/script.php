<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>
   
<script src = "js/jquery-3.2.1.min.js"></script>
<script src = "js/bootstrap.js"></script>
<script src = "js/jquery.dataTables.js"></script>
<script src = "js/sidebar.js"></script>
<script type = "text/javascript">
	$(document).ready(function() {
		$('#table').DataTable();
	} );
</script>
	