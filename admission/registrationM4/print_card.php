<?php
session_start();
include_once '../../spk/word.php';

// checkTimeToPrintCard
$tmp_print = strtotime("now");
$timeStrat = strtotime($Print_Card_Start_General);

if (($tmp_print <  $timeStrat) && ($_SESSION['admin_level'] != "0")) {    
    
    header("Location: index.php");
    exit;
}
$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "admission";

$student_name = $_POST['student_name'];
$ref1 = $_POST['ref1'];
$ref2 = $_POST['ref2'];
$old_school = $_POST['old_school'];
$student_image = $_POST['student_image'];
$plan1 = $_POST['plan1'];
$plan2 = $_POST['plan2'];
//$plan = "โครงการ IP (International Program)";

$exam_id="";
$exam_room="";
$conn       = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $str_sql = "SELECT * FROM ex_m4 WHERE ref1 = '" . $ref1 . "'";
    $stmt = $conn->prepare($str_sql);
    $stmt->execute();
    while ($a = $stmt->fetch()) {
        $exam_id = $a['ex_id'];
        $exam_room = $a['ex_room'];
    }
    if ($exam_id < 1000) {
        if ($exam_id < 10) {
            $exam_id =  "4000" . $exam_id;
        } elseif ($exam_id < 100) {
            $exam_id = "400" . $exam_id;
        } else {
            $exam_id = "40" . $exam_id;
        }
    }else{
        $exam_id = "4" . $exam_id;
    }

require_once '../../TCPDF/tcpdf.php';
class MYPDF extends TCPDF
{
    public function Header()
    {
        $headerData = $this->getHeaderData();
        $this->SetFont('thsarabunnew', 'B', '14');
        $this->writeHTML($headerData['string']);
    }
}
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Satreephuket School');
$pdf->SetTitle('บัตรประจำตัวผู้สอบ');
$pdf->SetSubject('Satreephuket');
$pdf->SetKeywords('Satreephuket, card');
// set default header data
$header1 = <<<EOD
<table>
    <tr>
        <td width = "100" rowspan="3" style="text-align: center;"><img src="../../images/logo_spk.gif" width="70" height="80"></td>
        <td width = "500" colspan="2" style="text-align: right;"><h2>เลขที่นั่งสอบ: <b><u> $exam_id </u></b><br /> ห้องสอบที่: <b><u> $exam_room </u></u></h2></td>
    </tr>
    <tr>
        <td width = "500" colspan="2"  style="text-align: center;"><h3>บัตรประจำตัวผู้เข้าสอบ ประเภทห้องเรียนทั่วไป โรงเรียนสตรีภูเก็ต</h3></td>
    </tr>
    <tr>
        <td width = "500" colspan="2"  style="text-align: center;"><h3>ชั้นมัธยมศึกษาปีที่ 4 ปีการศึกษา 2565 (สอบวันที่ 27 มีนาคม 2565)</h3></td>
    </tr>
</table>

EOD;


$pdf->setHeaderData($ln = '', $lw = 0, $ht = '', $hs = $header1, $tc = array(0, 64, 255), $lc = array(0, 64, 255));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin('15');
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// Create PDF page.
$pdf->AddPage('P','A4');

$line3 = <<<EOD
    
EOD;
$line4 = <<<EOD
<table width="600" border="1"  cellpadding="10">
    <tbody>
        <tr>
            <td width="150" style="text-align: center">
                <img src="$student_image" width="100px" hight="100px" border="1">
            </td>
            <td width="450" >
                <p style="font-size: 20px;">ชื่อ-สกุล :<u> $student_name </u> </p>
                <p style="font-size: 18px;">โรงเรียนเดิม:<u> $old_school </u></p>
                <p style="font-size: 18px;">แผนการเรียนที่ 1 :<u> $plan1 </u></p>
                <p style="font-size: 18px;">แผนการเรียนที่ 2 :<u> $plan2 </u></p>
            </td>
        </tr>
    </tbody>
</table>
EOD;

$hr_style = <<<EOD
<hr style="border-top: 2px dotted #8c8b8b;" >
EOD;
$str_ref = "Ref#1:  $ref1       |  Ref#2 : $ref2";
$str_comment = <<<EOD
<h2><b>(*** นำส่วนนี้มาแสดงในวันสอบ ถ้าไม่มีจะไม่อนุญาตให้เข้าสอบ ***)</b></h2>
EOD;


$pdf->writeHTMLCell(0, 0, '', 45, $line4, 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', $str_ref, 0, 1, 0, true, '', true);
$pdf->Ln(5);
$pdf->writeHTMLCell(0, 0, '', '', $str_comment, 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', $hr_style, 0, 1, 0, true, '', true);
$pdf->Ln(6);

ob_clean();
$pdf->Output('m4.pdf', 'I');
end_ob_clean();

$conn = null;
