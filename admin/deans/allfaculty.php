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
 
   
<br /><br />
		<b><h2>All Faculty </h2></b>
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
					<th>EmpCode</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Gender</th>
					<th>Email</th>
					<th>Contact No</th>
					<th>Department</th>
					<th>School</th>
					 
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `faculty`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['fid']?>">
						<td><?php echo $fetch['fcode']?></td>
						<td><?php echo $fetch['FirstName']?></td>
						<td><?php echo $fetch['LastName']?></td>
						<td><?php echo $fetch['gender']?></td>
						<td><?php echo $fetch['email']?></td>
						<td><?php echo $fetch['contactno']?></td>
					    <td><?php echo $fetch['depname']?></td>
						<td><?php echo $fetch['depschool']?></td>
						 

					 
					</tr>
	<div class="modal fade" id="edit_modal<?php echo $fetch['fid']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="update_faculty.php">	
					<div class="modal-header">
						<h4 class="modal-title">Update Faculty</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Emp Code</label>
								<input type="hidden" name="cid" value="<?php echo $fetch['fid']?>" class="form-control"/>
								<input type="number" name="ccode" value="<?php echo $fetch['fcode']?>" class="form-control" disabled/>
							</div>
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" value="<?php echo $fetch['FirstName']?>" class="form-control"  />
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" value="<?php echo $fetch['LastName']?>" class="form-control"  />
							</div>
							<div class="form-group">
								<label>Gender</label>
								<select name="gender" class="form-control" required >
									<option value=""></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							
							<br />
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" value="<?php echo $fetch['email']?>" />
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" value="<?php echo $fetch['pass']?>"  />
							</div>
							<div class="form-group">
								<label>Contact No</label>
								<input type="number" name="contactno" class="form-control" value="<?php echo $fetch['contactno']?>" />
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
		<b><h2>All Courses Assignments</h2></b>
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
					<th>Emp Code</th>
					<th>Firstname</th>
					<th>Lastname</th>
					<th>Course code</th>
					<th>Course Name</th>
					<th>Course Section</th>
					<th>Session</th>
				  
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `faculty` as fo JOIN courses_assign as cass WHERE cass.fcode=fo.fcode;") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
						
				?>
					<tr class="del_student<?php echo $fetch['fcode']?>">
						<td><?php echo $fetch['fcode']?></td>
						<td><?php echo $fetch['FirstName']?></td>
						<td><?php echo $fetch['LastName']?></td>
						<td><?php echo $fetch['corsecode']?></td>
						<td><?php echo $fetch['courseName']?></td>
						<td><?php echo $fetch['coursesection']?></td>
						<td><?php echo $fetch['session']?></td>
					</tr>
	 
				
				<?php
					}
				?>

			</tbody>
		</table>	 
		 
	</div>
		 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-content">
				<form method="POST" action="save_faculty.php">	
					<div class="modal-header">
						<h4 class="modal-title">Add Faculty</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Emp Code</label>
								<input type="number" name="ccode" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Firstname</label>
								<input type="text" name="firstname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Lastname</label>
								<input type="text" name="lastname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Gender</label>
								<select name="gender" class="form-control" required="required">
									<option value=""></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<label>Email</label>
								<input type="email" name="email" class="form-control" required="required"/>
							</div>
							
							<br />
							<div class="form-group">
								<label>Password</label>
								<input type="password" name="password" class="form-control" required="required"/>
							</div>
								<div class="form-group">
								<label>Contact No</label>
								<input type="number" name="contactno" class="form-control" required="required"/>
							</div>
						<label class="form-control-label">Select Department<span class="text-danger ml-2"> </span></label>
                         <?php
                        $qry= "SELECT * FROM coordiantor_assigndep where ccode='".$_SESSION['user']."' ";
                        $result = $conn->query($qry);

                          echo ' <select  required name="depcode"   class="form-control mb-3">';
                          echo'<option value="">--Select Item Code--</option>';
                          while ($rows = $result->fetch_assoc()) {
                          	$qry1= "SELECT * FROM departments where depcode='".$rows['depcode']."' ";
                      		  $result1 = $conn->query($qry1);
                      		  $getnamedep=$result1->fetch_assoc();

                          echo'<option value="'.$getnamedep['depcode'].'" >'.$getnamedep['depcode'].'-'.$getnamedep['depname'].'-'.$getnamedep['depschool'].'</option>';
                              }
                                 echo '</select>';
                           
                          ?>


						
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