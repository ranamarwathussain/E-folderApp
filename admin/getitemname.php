<?php session_start();
?>
<?php 
error_reporting(0);
include 'conn.php';

    $iid = intval($_GET['iid']);//

        $queryss=mysqli_query($conn,"select * from departments where depcode=".$iid."");                        
        $countt = mysqli_num_rows($queryss);
        $row = mysqli_fetch_array($queryss);
        echo ' <input type="hidden" name="depname1" class="form-control mb-3" value="'.$row['depname'].'" disabled><input type="hidden" name="depname" class="form-control mb-3" value="'.$row['depname'].'" >';
        echo ' <input type="hidden" name="depschool1" class="form-control mb-3" value="'.$row['depschool'].'" disabled><input type="hidden" name="depschool" class="form-control mb-3" value="'.$row['depschool'].'" >';
?>

