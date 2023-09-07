<?php session_start();
?>
<!DOCTYPE html>
<?php 
	require 'validator.php';
	require_once 'conn.php';
	extract($_GET);
?>
<html lang = "en">
	<head>
		<title>E-folder Application</title>
		<meta charset = "utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel = "stylesheet" type = "text/css" href = "../css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/jquery.dataTables.css" />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
   
   <style>
/*the container must be positioned relative:*/
.custom-select {
  position: relative;
  font-family: Arial;
}

.custom-select select {
  display: none; /*hide original SELECT element:*/
}

.select-selected {
  background-color: DodgerBlue;
}

/*style the arrow inside the select element:*/
.select-selected:after {
  position: absolute;
  content: "";
  top: 14px;
  right: 10px;
  width: 0;
  height: 0;
  border: 6px solid transparent;
  border-color: #fff transparent transparent transparent;
}

/*point the arrow upwards when the select box is open (active):*/
.select-selected.select-arrow-active:after {
  border-color: transparent transparent #fff transparent;
  top: 7px;
}

/*style the items (options), including the selected item:*/
.select-items div,.select-selected {
  color: #ffffff;
  padding: 8px 16px;
  border: 1px solid transparent;
  border-color: transparent transparent rgba(0, 0, 0, 0.1) transparent;
  cursor: pointer;
  user-select: none;
}

/*style items (options):*/
.select-items {
  position: absolute;
  background-color: DodgerBlue;
  top: 100%;
  left: 0;
  right: 0;
  z-index: 99;
}

/*hide the items when the select box is closed:*/
.select-hide {
  display: none;
}

.select-items div:hover, .same-as-selected {
  background-color: rgba(0, 0, 0, 0.1);
}
</style>
	</head>
<body>
	<nav class="navbar navbar-default navbar-fixed-top" style="background-color:blue;">
		<div class="container-fluid">
			<label class="navbar-brand" id="title">E-folder Application</label>
		</div>
	</nav>
	<div class="col-md-4">
		<?php
			$query = mysqli_query($conn, "SELECT * FROM `faculty` WHERE `fcode` = '$fcode' ") or die(mysqli_error());
			$fetch = mysqli_fetch_array($query);
		?>
		<div class="panel panel-default" style="background-color:#393f4d;" id="panel-margin">
			<div class="panel-heading" style="background-color:#feda6a;">
				<center><h1 class="panel-title" style="color:red;">Faculty Profile</h1></center>
			</div>
			<div class="panel-body">
				<h4 style="color:#fff;">Emp code: <label class="pull-right"><?php echo $fetch['fcode']?></label></h4>
				<h4 style="color:#fff;">Name: <label class="pull-right"><?php echo $fetch['FirstName']." ".$fetch['LastName']?></label></h4>
				<h4 style="color:#fff;">Gender: <label class="pull-right"><?php echo $fetch['gender']?></label></h4>
				<h4 style="color:#fff;">Department Code: <label class="pull-right"><?php echo $fetch['depcode'];?></label></h4>
				<h4 style="color:#fff;">Department Name: <label class="pull-right"><?php echo $fetch['depname']?></label></h4>
				<h4 style="color:#fff;">School Name: <label class="pull-right"><?php echo $fetch['depschool']?></label></h4>
			 
			 
			</div>
		</div>
	</div>
	
	<div class="col-md-8">
		<div class="panel panel-default" style="margin-top:100px;">
			<div class="panel-body">
				<b><h2>All Submitted Folder </h2></b>
				<table id="table" class="table table-bordered">
					<thead>
						<tr>
							<th>Course Code</th>
							<th>Course Name</th>
							<th>Course Section</th>
							<th>Session</th>
							<th>Folder Submission</th>
							<th>Re-Open Submission</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$stud_no = $fetch['fcode'];
							$query = mysqli_query($conn, "SELECT * FROM `courses_assign` WHERE `fcode` = '$fcode' And folderstatus='1' ORDER BY assid ASC") or die(mysqli_error());
							while($fetch = mysqli_fetch_array($query)){
									$query1= mysqli_query($conn, "SELECT * FROM `sessions` WHERE `session` = '".$fetch['session']."' ORDER BY sid ASC") or die(mysqli_error());
									$fetch1 = mysqli_fetch_array($query1)
						?>
						<tr>
							<td><?php echo $fetch['corsecode']?></td>
							<td><?php echo $fetch['courseName']?></td>
								<td><?php echo $fetch['coursesection']?></td>
							<td><?php echo $fetch['session']?></td>
							<td> <a href="getfile.php?fcode=<?php echo $fetch['fcode']?>&coursename=<?php echo $fetch['courseName']?>&coursesection=<?php echo $fetch['coursesection']?>" target='_blank'><button class="btn btn-success pull-left"><span></span>Get Submitted Folder</button></a>
			</td>
			<td> <a href="reopenfolder.php?fcode=<?php echo $fetch['fcode']?>&coursename=<?php echo $fetch['courseName']?>&coursesection=<?php echo $fetch['coursesection']?>"><button class="btn btn-warning pull-left"><span></span>Re-Open Folder</button></a>
			</td>
					</tr>
					 
						<?php
							}
						?>
					</tbody>
				</table>
				<b><h2>Pending For Submittion </h2></b>
<table id="table" class="table table-bordered">
					<thead>
						<tr>
							<th>Course Code</th>
							<th>Course Name</th>
							<th>Course Section</th>
							<th>Session</th>
							<th>Folder Submission</th>

						</tr>
					</thead>
					<tbody>
						<?php
							 
							$query = mysqli_query($conn, "SELECT * FROM `courses_assign` WHERE `fcode` = '$fcode' And folderstatus='0' ORDER BY assid ASC") or die(mysqli_error());
							while($fetch = mysqli_fetch_array($query)){
									$query1= mysqli_query($conn, "SELECT * FROM `sessions` WHERE `session` = '".$fetch['session']."' ORDER BY sid ASC") or die(mysqli_error());
									$fetch1 = mysqli_fetch_array($query1)
						?>
						<tr>
							<td><?php echo $fetch['corsecode']?></td>
							<td><?php echo $fetch['courseName']?></td>
								<td><?php echo $fetch['coursesection']?></td>
							<td><?php echo $fetch['session']?></td>
							<td> <a href="getfile.php?fcode=<?php echo $fetch['fcode']?>&coursename=<?php echo $fetch['courseName']?>&coursesection=<?php echo $fetch['coursesection']?>" target='_blank'><button class="btn btn-danger pull-left"><span></span>Pending Folder</button></a>
			</td>
					</tr>
					<div class="modal fade" id="modal_confirm1<?php echo $fetch['fcode']?>" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to Submit Folder?</h4></center>
				</div>
				<div class="modal-footer">
	<a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>
	<a href="submitfolder.php?fcode=<?php echo $fetch['fcode']?>&coursename=<?php echo $fetch['courseName']?>&section=<?php echo $fetch['coursesection']?>"  class="btn btn-danger">Confirm</a>
				</div>
			</div>
		</div>
	</div>
						<?php
							}
						?>
					</tbody>
				</table>



			</div>




		</div>
	</div>
	 
	<div id = "footer">
			<label class = "footer-title">&copy; Copyright UMT CS @SST <?php echo date("Y", strtotime("+8 HOURS"))?></label>
	</div>
	
	<div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to logout?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" data-dismiss="modal">Cancel</a>
					<a href="logout.php" class="btn btn-danger">Logout</a>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="modal_remove" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to remove this file?</h4></center>
				</div>
				<div class="modal-footer">
					<a type="button" class="btn btn-success" data-dismiss="modal">No</a>
					<button type="button" class="btn btn-danger" id="btn_yes">Yes</button>
				</div>
			</div>
		</div>
	</div>
<?php include 'script.php'?>
<script type="text/javascript">
$(document).ready(function(){
	$('.btn_remove').on('click', function(){
		var store_id = $(this).attr('id');
		$("#modal_remove").modal('show');
		$('#btn_yes').attr('name', store_id);
	});
	
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "remove_file.php",
			data:{
				store_id: id
			},
			success: function(data){
				$("#modal_remove").modal('hide');
				$(".del_file" + id).empty();
				$(".del_file" + id).html("<td colspan='4'><center class='text-danger'>Deleting...</center></td>");
				setTimeout(function(){
					$(".del_file" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});
</script>
<script>
var x, i, j, l, ll, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  ll = selElmnt.length;
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < ll; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h, sl, yl;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        sl = s.length;
        h = this.parentNode.previousSibling;
        for (i = 0; i < sl; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            yl = y.length;
            for (k = 0; k < yl; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
    });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, xl, yl, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  xl = x.length;
  yl = y.length;
  for (i = 0; i < yl; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < xl; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

</body>
</html>