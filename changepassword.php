<?php
  require_once 'conn.php';
  
  if(ISSET($_POST['update'])){
     
    $changepass = $_POST['changepass'];
    $empcode = $_POST['empcode'];
    mysqli_query($conn, "UPDATE `faculty` SET   `pass` = '".$changepass."'   WHERE fcode = '". $empcode."'") or die(mysqli_error());
    
    echo "<script>alert('Successfully updated!')</script>";
    echo "<script>window.location = 'faculty.php'</script>";
  }
?>