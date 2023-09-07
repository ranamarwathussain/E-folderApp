<?php session_start();
?>
<?php 
error_reporting(0);
include 'conn.php';

    $iid = intval($_GET['iid']);//

        $queryss=mysqli_query($conn,"SELECT DISTINCT * FROM `departments` WHERE depschool=".$iid."");                        
        $countt = mysqli_num_rows($queryss);
        echo '<label class="form-control-label">Deparments Under School<span class="text-danger ml-2">*</span></label>';
        while($row = mysqli_fetch_array($queryss))
        {


        echo '<input type="text" name="depname1" class="form-control mb-3" value="'.$iid.'" disabled>';
       
        }
?>

