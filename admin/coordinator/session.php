<?php session_start();
?>
<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">
 



<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
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
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span> Add Session</button>
   
<br /><br />
		<b><h2>All Faculty </h2></b>
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
					<th>Session Code</th>
					<th>Session</th>
					<th>Session Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `sessions`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['sid']?>">
						<td><?php echo $fetch['sid']?></td>
						<td><?php echo $fetch['session']?></td>
							<td><?php echo $fetch['status']?></td>
						<td><center><button class="btn btn-warning" data-toggle="modal" data-target="#edit_modal<?php echo $fetch['sid']?>"><span class="glyphicon glyphicon-edit"></span> Edit</button> 
						<a href="deletesession.php?id=<?php echo $fetch['sid']?>" ><button class="btn btn-danger btn-delete"  type="button"><span class="glyphicon glyphicon-trash"></span> Delete</button></center></a></td>
					</tr>
	<div class="modal fade" id="edit_modal<?php echo $fetch['sid']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="update_session.php">	
					<div class="modal-header">
						<h4 class="modal-title">Update Session</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							 <label>Session Status</label>
							<div class="form-group">
								<select class="form-control" name="sessionstatus" required>
								  <option selected>Please Select Status</option>
								  <option value="Active">Active</option>
								  <option value="IN Active">In Active</option>
								 
								</select>
								<input type="hidden" name="sid" value="<?php echo $fetch['sid']?>">
							</div>
						 	
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
		<br /><br />
			 
		 
	</div>
		 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-content">

				<form method="POST" action="save_session.php">	
					<div class="modal-header">
						<h4 class="modal-title">Add Session</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<label>Session</label>
							<div class="form-group">
								<select class="form-control" name="sessionname" required>
								  <option selected>Please Select Session</option>
								  <option value="FALL">FALL</option>
								  <option value="SPRING">SPRING</option>
								  <option value="SUMMER">SUMMER</option>
								</select>
							</div>
							<div class="form-group">
								<label>Year</label>
								<input type="datepicker" class="form-control" name="datepicker" id="datepicker" value=" <?php echo date("Y"); ?> " disabled />
								<input type="hidden" class="form-control" name="sessionyear"  value=" <?php echo date("Y"); ?> "  />
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