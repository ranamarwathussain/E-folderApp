<?php session_start();
?>
<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">
<script type="text/javascript">
      
    function classArmDropdown2(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint2").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getitemname.php?iid="+str,true);
        xmlhttp.send();
    }
}

</script> 
	<script type="text/javascript">
      
    function classArmDropdown(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getitemname.php?iid="+str,true);
        xmlhttp.send();
    }
}

</script> 
<body>
	 
	<?php include 'sidebar.php'?>
 
	<div  >
 
  <!-- Trigger the modal with a button -->
 
		<b><h2>Your Coordinators </h2></b>
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
					<th>EmpCode</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Contact No</th>
				 
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `cods` where cocode='".$_SESSION['user']."'") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				$query4 = mysqli_query($conn, "SELECT * FROM `coordiantor` where depcode='".$fetch['depcode']."'") or die(mysqli_error());
				$fetch5 = mysqli_fetch_array($query4)
				?>
					<tr>
						<td><a href="" ><?php echo $fetch5['ccode']?></a></td>
						<td><?php echo $fetch5['FirstName']?></td>
						<td><?php echo $fetch5['LastName']?></td>
						<td><?php echo $fetch5['gender']?></td>
						<td><?php echo $fetch5['email']?></td>
						<td><?php echo $fetch5['contactno']?></td>

					 </tr>
	 
				<?php
					}
				?>

			</tbody>
		</table>
	 
		  
  
  
</div>	 
		 
	 
	 
			 
		 
	 
	 
	<div id = "footer">
		<label class = "footer-title">&copy; Copyright UMT CS @SST <?php echo date("Y", strtotime("+8 HOURS"))?></label>
	</div>
<?php include 'script.php'?>
<script type="text/javascript">
$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var stud_id = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', stud_id);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete_student.php",
			data:{
				stud_id: id
			},
			success: function(){
				$("#modal_confirm").modal('hide');
				$(".del_student" + id).empty();
				$(".del_student" + id).html("<td colspan='6'><center class='text-danger'>Deleting...</center></td>");
				setTimeout(function(){
					$(".del_student" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});
</script>	
</body>
</html>