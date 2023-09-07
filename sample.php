<?php session_start();
?>
<?php include "conn.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="ilmu-detil.blogspot.com">
    <title>Menampilkan Dokumen PDF</title>
    <!-- Bagian css -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/ilmudetil.css">
    <!--<link rel='stylesheet' href='assets/css/jquery-ui-custom.css'>-->
    
    <!-- Akhir dari Bagian css -->
    <!-- Bagian js -->
    <script src='assets/js/jquery-1.10.1.min.js'></script>       
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- akhir dari Bagian js -->
    
    <style type="text/css">
    .grsbawah{
        margin-top: 0px; 
        margin-bottom: 0px; 
        border: 0;
        border-top: 1px solid #AD0B47;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
            Pusat Ilmu Secara Detil</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li class="clr1 active"><a href="index.html">Home</a></li>
                <li class="clr2"><a href="">Programming</a></li>
                <li class="clr3"><a href="">English</a></li>
            </ul>
        </div>
    </div>
</nav>
</br></br></br>
<!--- Tampil Judul dan Kategori PDF-->  
<div class="container"> 
    <h2>Contoh Mengload Dokumen PDF</h2> 
    <div class="row">
    <div class="col-md-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left">DOKUMEN PDF</div>
                <br>
            </div>
            <div class="panel-body">
                <?php
                    $qu=mysqli_query($conn,"select * from storage");
                    $no=1;
                    while($has=mysqli_fetch_row($qu))
                    {
                        if($no<10)
                            $no='0'.$no;
                        echo "
                        <div class='row' style='margin-bottom:12px;padding-left:15px'>
                            <div class='col-md-2' style='background-color:#EE0930 ;color:#eee' ;>
                                <h2 style='text-align:center'>$no</h2>
                            </div>
                            <div class='col-md-10'>
                            <h5 style='padding-bottom:0px;'>$has[1]</h5>";
                                                        // Header content type
                            
                        $no++;
                    }
                    header("Content-type: application/pdf");
  
                            header("Content-Length: " . filesize($has[1]));
                              
                            // Send the file to the browser.
                            readfile("files/1123/".$has[1]);
                            
                ?>
            </div>
        </div>
        </div>
    </div>
</div> 
<!-- Akhir Tampil Judul dan Kategori PDF -->
</body>
</html>