<?php session_start();
?>
<?php
// Database Connection 
include "validator.php";
include "conn.php";
extract($_GET);
//import fpdi and fpdf files
use setasign\Fpdi\Fpdi;
require_once('fpdf/fpdf.php');
require_once('fpdi/src/autoload.php');


/*
header('Content-type: application/pdf'); 
$arrlength = count($array);
for ($i=0; $i <$arrlength  ; $i++) { 
  $getname=$getname.$array[$i ];
header('Content-Disposition: inline; filename="' .$array[$i ]. '"'); 
header('Content-Transfer-Encoding: binary'); 
header('Accept-Ranges: bytes'); 
@readfile($array[$i ]);
  
}*/


//create your class to merge pdfs
class MergePdf extends Fpdi
{
    public $pdffiles = array();

    public function setFiles($pdffiles)
    {
        $this->pdffiles = $pdffiles;
    }
    //function to merge pdf files using fpdf and fpdi.
    public function merge()
    {
        foreach($this->pdffiles AS $file) {
            $pdfCount = $this->setSourceFile($file);
            for ($pdfNo = 1; $pdfNo <= $pdfCount; $pdfNo++) {
                $pdfId = $this->ImportPage($pdfNo);
                $temp = $this->getTemplatesize($pdfId);
                $this->AddPage($temp['orientation'], $temp);
                $this->useImportedPage($pdfId);
            }
        }
    }
}

$Outputpdf = new MergePdf();
$select = "SELECT * FROM `storage` WHERE `fcode` = '$fcode' and coursename='$coursename' and section='$coursesection' ORDER BY pattern ASC";
$result = $conn->query($select);
$files1 = array();
while($row = $result->fetch_object()){
    //we gave absolute path because sometimes the libraries can't detect the path. Please use your path here.
   array_push($files1,'files/'.$row->fcode.'/'.$row->filename);
  
}
 
$Outputpdf->setFiles($files1);
 $Outputpdf->merge();

//I: The output pdf will run on the browser
//D: The output will download a merged pdf file
//F: The output will save the file to a particular path.
//We select the default I to run the output on the browser.
 $Outputpdf->Output('I', 'CourseFolder-fcode-'.$fcode.'-cname-'.$coursename.'-section-'.$coursesection.'.pdf');


  


?>