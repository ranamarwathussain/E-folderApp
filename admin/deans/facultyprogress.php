<?php session_start();
?>
<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php';
	extract($_GET);
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
<style type="text/css">
	td{
		text-align: center;
		 font-weight: 900;

	}
</style>
<body>
	 
	<?php include 'sidebar.php'?>
 
	<div  >
 
  
<br /><br />
		<b><h2>Faculty Progress Status </h2></b>
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
					<th>Folder Status</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$query = mysqli_query($conn, "select  * from faculty ") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){

						$query1 = mysqli_query($conn, "select count(fcode) from courses_assign   where fcode='".$fetch['fcode']."'") or die(mysqli_error());
						$getallassignedcourses=mysqli_fetch_array($query1);
						if($getallassignedcourses['count(fcode)']==0)
						{
							$getallassignedcourses['count(fcode)']=1;
						}
						
						$query12 = mysqli_query($conn, "select count(folderstatus) from courses_assign   where fcode='".$fetch['fcode']."' And folderstatus='1'") or die(mysqli_error());
						$getallafoldersubmit=mysqli_fetch_array($query12);
						$totalpercentage=($getallafoldersubmit['count(folderstatus)'
							]/$getallassignedcourses['count(fcode)'])*100;
				$string = floatval($totalpercentage);
				$formatted = number_format($string, 2, '.', '');
				?>
					<tr class="del_student<?php echo $fetch['fid']?>">
						<td><a href="faculty_getfile.php?fcode=<?php echo $fetch['fcode']?>" target='_blank'><?php echo $fetch['fcode']?></a></td>
						<td><?php echo $fetch['FirstName']?></td>
						<td><?php echo $fetch['LastName']?></td>
						<td><?php echo $fetch['gender']?></td>
						<td><?php echo $fetch['email']?></td>
						<td><?php echo $fetch['contactno']?></td>
					    <td><?php echo $fetch['depname']?></td>
						<td><?php echo $fetch['depschool']?></td>
						<td><div class="progress">
  <div class="progress-bar progress-bar-striped active" role="progressbar"
  aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $formatted;?>%">
   <a href="faculty_getfile.php?fcode=<?php echo $fetch['fcode']?>" target='_blank'> <p style='color: white;padding-top: 10px;'><?php echo $formatted.'%';?></p></a>
  </div>
</div>
</td>
					</tr>
	
				
				<?php
					}
				?>

			</tbody>
		</table>
		<br /><br />
			 
		 
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