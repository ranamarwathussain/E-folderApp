<?php session_start();
?>
<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php'
?>
<html lang = "en">

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
        xmlhttp.open("GET","ajaxClassArms2.php?iid="+str,true);
        xmlhttp.send();
    }
}

</script> 
<script type="text/javascript">
      
    function classArmDropdown2(str) {
    if (str == "") {
        document.getElementById("txtHint2").innerHTML = "";
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
        xmlhttp.open("GET","assignsection.php?iid="+str,true);
        xmlhttp.send();
    }
}

</script> 
<body>
	 
	<?php include 'sidebar.php'?>
 
	<div  >
 
  <!-- Trigger the modal with a button -->
   
<br /><br />
		<b><h2>All Courses </h2></b>
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
					<th>course Code</th>
					<th>Course Name</th>
					 
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM `courses`  ;") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
				?>
					<tr class="del_student<?php echo $fetch['cid']?>">
						<td><?php echo $fetch['coursecode']?></td>
						<td><?php echo $fetch['courseName']?></td>
						

						 
					</tr>
	 
				
				<?php
					}
				?>

			</tbody>
		</table>
	<b><h2>All Courses Section</h2></b>
		<table id = "table" class="table table-bordered">
			<thead>
				<tr>
					<th>Course Code</th>
					<th>Course Name</th>
					<th>Course Section</th>
					<th>Session</th>
					 
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "SELECT * FROM courses_section  ") or die(mysqli_error($query));
					while($fetch = mysqli_fetch_array($query)){
						
				?>
					<tr>
						<td><?php echo $fetch['coursecode']?></td>
						<td><?php echo $fetch['coursename']?></td>
						<td><?php echo $fetch['coursesection']?></td>
						<td><?php echo $fetch['session']?></td>
						 
					</tr>
	 
				
				<?php
					}
				?>

			</tbody>
		</table>
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
		 <div class="modal fade" id="assign_modal2" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="save_course.php">
						<div class="col-xl-6">
                        <label class="form-control-label">Select Course<span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM courses ORDER BY cid ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="coursecode" onchange="classArmDropdown(this.value)" class="form-control mb-3">';
                          echo'<option value="">--Select Course--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['coursecode'].'" >'.$rows['coursecode'].'-'.$rows['courseName'].'</option>';
                              }
                                 echo '</select>';
                            }
                           ?>  
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Course Name<span class="text-danger ml-2">*</span></label>
                        
                            <?php
                                echo"<div id='txtHint'></div>";
                            ?>
                        </div>	
                        		

                       
                     
                    <button type="submit" name="getsection">Add Section</button>
								</form>
				

							
						</div>
					</div>
				
			</div>		 
		 
	</div>
	 <div class="modal fade" id="assign_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="save_course.php">
					<label class="form-control-label">Select faculty<span class="text-danger ml-2"> </span></label>
                         <?php
                        $qry= "SELECT * FROM faculty ORDER BY fid ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;   
                        if ($num > 0){
                          echo ' <select  required name="fcode"   class="form-control mb-3">';
                          echo'<option value="">--Select Item Code--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['fcode'].'" >'.$rows['fcode'].'-'.$rows['FirstName'].'-'.$rows['LastName'].'</option>';
                              }
                                 echo '</select>';
                            }
                           ?>
                           <div class="col-xl-6">
                        <label class="form-control-label">Select Course<span class="text-danger ml-2">*</span></label>
                         <?php
                        $qry= "SELECT * FROM courses ORDER BY cid ASC";
                        $result = $conn->query($qry);
                        $num = $result->num_rows;		
                        if ($num > 0){
                          echo ' <select required name="coursecode" onchange="classArmDropdown2(this.value)" class="form-control mb-3">';
                          echo'<option value="">--Select Course--</option>';
                          while ($rows = $result->fetch_assoc()){
                          echo'<option value="'.$rows['coursecode'].'" >'.$rows['coursecode'].'-'.$rows['courseName'].'</option>';
                              }
                                 echo '</select>';
                            }
                           ?>  
                        </div>
                        <div class="col-xl-6">
                        <label class="form-control-label">Course Name<span class="text-danger ml-2">*</span></label>
                        
                            <?php
                                echo"<div id='txtHint2'></div>";
                            ?>
                        </div>	
                        		

                       
                     
                    <button type="submit" name="getcoor">Assign Courses</button>
								</form>
				

							
						</div>
					</div>
				
			</div>		 
		 
	</div>
		 
  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-content">
				<form method="POST" action="save_course.php">	
					<div class="modal-header">
						<h4 class="modal-title">Add Courses</h4>
					</div>
					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label>Course Code</label>
								<input type="text" name="ccode" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label>Course Name</label>
								<input type="text" name="firstname" class="form-control" required="required"/>
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