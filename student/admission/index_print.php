<?php
    session_start();

require_once '../../TCPDF/tcpdf.php';
include($_SERVER['DOCUMENT_ROOT']. "/spk_admin_dev/config/config.inc.php");
// include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

$conn = new PDO("mysql:host=$servername;dbname=$dbnameAdmission;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  

// include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
// include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

// $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
// $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

try{

    $stmt_res = $conn->prepare($_SESSION['sql_res']);
    $stmt_res = $conn->prepare($_SESSION['sql_res']);
    $stmt_res->execute();
    
    $row_res = $stmt_res->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}

try{

    $stmt_reg = $conn->prepare($_SESSION['sql_reg']);
    $stmt_reg = $conn->prepare($_SESSION['sql_reg']);
    $stmt_reg->execute();
    
    $row_reg = $stmt_reg->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}


$name = $row_reg['reg_name_title'] . $row_reg['reg_name'] .  " " . $row_reg['reg_suname'] ;
$id_card = $_SESSION['ref1'];
$ex_id = $_SESSION['ex_id'];
$m = $_SESSION['m'];
switch ($_SESSION['plan']){
    case 10: // m1-smte
        $str_plan = "ห้องเรียนทั่วไป";
        $str_table_thead = "<thead><tr>
            <th> คณิตศาสตร์  (20)</th>
            <th> วิทยาศาสตร์ (40)</th>
            <th> อังกฤษ (20)</th>
            <th> ภาษาไทย (20)</th>
            <th> สั่งคมศึกษา (20)</th>
            <th> รวม (100)</th>
        </tr></thead>";
        $total = number_format($row_res['math'] + $row_res['sci'] + $row_res['eng'] + $row_res['thai'] + $row_res['soc'],2);
        $str_table_td = "<tr><td>" . number_format($row_res['math'],2) ."</td><td> " . number_format($row_res['sci'],2). "</td><td> "  . number_format($row_res['eng'],2). "</td><td> " . number_format($row_res['thai'],2). "</td><td> " . number_format($row_res['soc'],2) . "</td><td> " . $total ."</td></tr>";
        break;
    case 38: // m1-smte
        $str_plan = "ห้องเรียนทั่วไป";
        $str_table_thead = "<thead><tr>
            <th> คณิตศาสตร์  (20)</th>
            <th> วิทยาศาสตร์ (40)</th>
            <th> อังกฤษ (20)</th>
            <th> ภาษาไทย (20)</th>
            <th> สั่งคมศึกษา (20)</th>
            <th> รวม (100)</th>
        </tr></thead>";
        $total = number_format($row_res['math'] + $row_res['sci'] + $row_res['eng'] + $row_res['thai'] + $row_res['soc'],2);
        $str_table_td = "<tr><td>" . number_format($row_res['math'],2) ."</td><td> " . number_format($row_res['sci'],2). "</td><td> "  . number_format($row_res['eng'],2). "</td><td> " . number_format($row_res['thai'],2). "</td><td> " . number_format($row_res['soc'],2) . "</td><td> " . $total ."</td></tr>";
        break;
    case 39: // m1-smte
        $str_plan = "ห้องเรียนทั่วไป";
        $str_table_thead = "<thead><tr>
            <th> คณิตศาสตร์  (20)</th>
            <th> วิทยาศาสตร์ (40)</th>
            <th> อังกฤษ (20)</th>
            <th> ภาษาไทย (20)</th>
            <th> สั่งคมศึกษา (20)</th>
            <th> รวม (100)</th>
        </tr></thead>";
        $total = number_format($row_res['math'] + $row_res['sci'] + $row_res['eng'] + $row_res['thai'] + $row_res['soc'],2);
        $str_table_td = "<tr><td>" . number_format($row_res['math'],2) ."</td><td> " . number_format($row_res['sci'],2). "</td><td> "  . number_format($row_res['eng'],2). "</td><td> " . number_format($row_res['thai'],2). "</td><td> " . number_format($row_res['soc'],2) . "</td><td> " . $total ."</td></tr>";
        break;
    case 40: // m1-smte
        $str_plan = "ห้องเรียนทั่วไป";
        $str_table_thead = "<thead><tr>
            <th> คณิตศาสตร์  (20)</th>
            <th> วิทยาศาสตร์ (40)</th>
            <th> อังกฤษ (20)</th>
            <th> ภาษาไทย (20)</th>
            <th> สั่งคมศึกษา (20)</th>
            <th> รวม (100)</th>
        </tr></thead>";
        $total = number_format($row_res['math'] + $row_res['sci'] + $row_res['eng'] + $row_res['thai'] + $row_res['soc'],2);
        $str_table_td = "<tr><td>" . number_format($row_res['math'],2) ."</td><td> " . number_format($row_res['sci'],2). "</td><td> "  . number_format($row_res['eng'],2). "</td><td> " . number_format($row_res['thai'],2). "</td><td> " . number_format($row_res['soc'],2) . "</td><td> " . $total ."</td></tr>";
        break;

   
    default:
        $str_table_thead = "<thead><tr>
            <th>#</th>
            <th>#</th>
            <th>#</th>
            <th>#</th>
        </tr></thead>";
        $str_sql = "";          
}





class MYPDF extends TCPDF
{
    public function Header()
    {
        $headerData = $this->getHeaderData();
        $this->SetFont('thsarabunnew', 'B', '12');
        $this->writeHTML($headerData['string']);
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// create new PDF document
// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Satreephuket School');
$pdf->SetTitle('Satreephuket Payment');
$pdf->SetSubject('Satreephuket');
$pdf->SetKeywords('satreephuket');
$header1 = <<<EOD
<table>
<tr>
<td width="20%"><img src="../../images/logo_spk.gif" width="90" height="110"></td>
<td width="80%" style="text-align: center; vertical-align: middle;">
<h1>โรงเรียนสตรีภูเก็ต</h1>
<h2>ผลคะแนนสอบเข้าเรียนห้องเรียนทั่วไป $strEducationYear</h2>
</td>
</tr>

</table>
<hr>
EOD;
// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setHeaderData($ln = '', $lw = 0, $ht = '', $hs = $header1, $tc = array(0, 0, 0), $lc = array(0, 0, 0));
$pdf->setFooterData(array(0,64,0), array(0,64,128));




// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
// $pdf->SetFont('dejavusans', '', 14, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));




$html1 = <<<EOD
<table >

<tr>
    <td style="text-align: right;">ชื่อ - นามสกุล :</td>
    <td class="text-start"> $name </td>
</tr>
<tr>
    <td style="text-align: right;">เลขประจำตัวประชาชน :</td>
    <td class="text-start"> $id_card </td>
</tr>
<tr>
    <td style="text-align: right;">รหัสประจำตัวสอบ :</td>
    <td class="text-start"> $ex_id </td>
</tr>
<tr>
    <td style="text-align: right;">ระดับชั้นมัธยมศึกษาปีที่ :</td>
    <td class="text-start"> $m </td>
</tr>
<tr>
    <td style="text-align: right;">แผนการเรียน :</td>
    <td class="text-start"> $str_plan </td>
</tr>

</table>
EOD;
$html2 = <<<EOD
<table  width="100%" border = "1" style="text-align: center; vertical-align: middle;"  cellspacing="0" cellpadding="0">
    $str_table_thead
    $str_table_td      
</table>
            
EOD;

// Print text using writeHTMLCell()
$pdf->SetFont('thsarabun', 'B', '14'); 
$pdf->Ln(20);
$pdf->writeHTMLCell(0, 0, '', '', $html1, 0, 1, 0, true, '', true);
$pdf->SetFont('thsarabun', 'B', '16'); 
$pdf->Write(0, 'คะแนนสอบ', '', 0, '', true, 0, false, false, 0);
$pdf->SetFont('thsarabun', 'B', '14'); 
$pdf->Ln(5);
$pdf->writeHTMLCell(0, 0, '', '', $html2, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+