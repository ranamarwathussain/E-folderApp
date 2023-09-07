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
 
	
  
  <!-- Trigger the modal with a button -->
  
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
					 
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `departments`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['did']?>">
						<td><?php echo $fetch['depcode']?></td>
						<td><?php echo $fetch['depname']?></td>
						<td><?php echo $fetch['depschool']?></td>
						<td><?php echo $fetch['deploc']?></td>
						<td><?php echo $fetch['createdby']?></td>
						<td><?php echo $fetch['createdon']?></td>
					     
					</tr>
	<div class="modal fade" id="edit_modal<?php echo $fetch['did']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="update_department.php">	
					<div class="modal-header">
						<h4 class="modal-title">Update Department</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Department Code</label>
								<input type="hidden" name="did" value="<?php echo $fetch['did']?>" class="form-control"/>
								<input type="number" name="depcode" value="<?php echo $fetch['depcode']?>" class="form-control" disabled/>
							</div>
							<div class="form-group">
								<label>Department Name</label>
								<input type="text" name="depname" value="<?php echo $fetch['depname']?>" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>School Name</label>
								<select required="required" name="depschool" class="form-control"  >
									<option value=""></option>
									<option value="SST">SST</option>
									<option value="SCA">SCA</option>
								</select>
							</div>
							<div class="form-group">
								<label>Department Location</label>
								<input type="text" name="deploc" value="<?php echo $fetch['deploc']?>" class="form-control" required="required"/>
							</div>
						</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="update" class="btn btn-warning" ><span class="glyphicon glyphicon-save"></span> Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
		 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-content">
				<form method="POST" action="save_department.php">	
					<div class="modal-header">
						<h4 class="modal-title">Add Departments</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Department Code</label>
								<input type="number" name="depcode" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Department Name</label>
								<input type="text" name="depname" class="form-control" required="required"/>
							</div>
							
							<div class="form-group">
								<label>School Name</label>
								<select name="depschool" class="form-control" required="required">
									<option value=""></option>
									<option value="SST">SST</option>
									<option value="SCA">SCA</option>
								</select>
							</div>
						 
							<br />
							<div class="form-group">
								<label>Department Location</label>
								<input type="text" name="deploc" class="form-control" required="required"/>
							</div>
						</div>
					</div>
					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
						<button name="save" class="btn btn-success" ><span class="glyphicon glyphicon-save"></span> Save</button>
					</div>
				</form>
			</div>
  </div>
  
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