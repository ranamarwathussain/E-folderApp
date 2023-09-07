<?php session_start();
?>
<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">
	 
<body>
	 <div>
	<?php include 'sidebar.php'?>
 
	
  
  	<b><h2>Your Assigned Departments </h2></b>
<br /><br />
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
					<th>Department Code</th>
					<th>Department Name</th>
					<th>School Name</th>
					<th>Department Location</th>
					<th>Created By</th>
					<th>Created On</th>
					<th>Folder Progress</th>
				</tr>
			</thead>
			<tbody>
				<?php
						$query = mysqli_query($conn, "SELECT * FROM `cod_assigndep` where cocode='".$_SESSION['user']."'") or die(mysqli_error());
					
					while($fetch = mysqli_fetch_array($query)){
						$query2 = mysqli_query($conn, "SELECT * FROM `departments` where depcode='".$fetch['depcode']."'") or die(mysqli_error());

						$fetch1 = mysqli_fetch_array($query2);

				?>
					<tr>
						<td><?php echo $fetch1['depcode']?></td>
						<td><?php echo $fetch1['depname']?></td>
						<td><?php echo $fetch1['depschool']?></td>
						<td><?php echo $fetch1['deploc']?></td>
						<td><?php echo $fetch1['createdby']?></td>
						<td><?php echo $fetch1['createdon']?></td>
					 <td>
						<a href="facultyprogress.php?id=<?php echo $fetch1['depcode']?>" ><button class="btn btn-danger btn-delete"  type="button"><span class="glyphicon glyphicon-folder"></span>Faculty Progress</button></center></a></td>   
					</tr>
 
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
		 
  <!-- Modal -->
  
  
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