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
        $row1 = mysqli_fetch_array($queryss1);
      echo ' <div class="col-xl-6">
                        <label class="form-control-label">Assign Section<span class="text-danger ml-2">*</span></label>
                        <div class="form-group">
                                 
                                <input type="text" name="section" class="form-control" required="required"/>
                                <input type="hidden" name="coursecode" class="form-control" value='.$row1['coursecode'].'  />
                            </div>
                        </div> ';
                        
?>

