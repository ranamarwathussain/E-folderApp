<?php 
      require_once 'conn.php';

    $cid = intval($_GET['iid']);

        $queryss=mysqli_query($conn,"select  * from courses where cid=".$cid."");                        
         echo '
        <select required name="coursename" class="form-control mb-3">';
        echo'<option value="">--Select Class Arm--</option>';
        while ($row = mysqli_fetch_array($queryss)) {
        echo'<option value="'.$row['courseName'].'" >'.$row['courseName'].'</option>';
        }
        echo '</select>';
     $queryss1=mysqli_query($conn,"select  * from courses where cid=".$cid."");   
     $row1 = mysqli_fetch_array($queryss1) ;
    $queryss2=mysqli_query($conn,"select * from courses_section where coursecode='".$row1['coursecode']."'");                        
      echo ' <label class="form-control-label">Select Section<span class="text-danger ml-2">*</span></label>
                        
        <select required name="coursesection" class="form-control mb-3">';
        echo'<option value="">--Select Class Arm--</option>';
        while ($row12 = mysqli_fetch_array($queryss2)) {
        echo'<option value="'.$row12['coursesection'].'" >'.$row12['coursesection'].'</option>';
        }
        echo '</select>';
        
        echo "<input type='hidden' name='coursecode' value=". $row1['coursecode']." />";
                        
?>

