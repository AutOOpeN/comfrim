<?php

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";
$conn       = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$student_name = $_POST['student_name'];
$ref1 = $_POST['ref1'];
$ref2 = $_POST['ref2'];
$old_school = $_POST['old_school'];
$student_image = $_POST['student_image'];
$paln = "ห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";

require_once '../TCPDF/tcpdf.php';
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
        <td width = "500" colspan="2" style="text-align: right;"><h2>เลขที่นั่งสอบ <u>0000</u><br /> ห้องสอบ <u>1</u></h2></td>
    </tr>
    <tr>
        <td width = "500" colspan="2"  style="text-align: center;"><h3>บัตรประจำตัวผู้สอบเข้าศึกษาโครงการห้องเรียนพิเศษ โรงเรียนสตรีภูเก็ต</h3></td>
    </tr>
    <tr>
        <td width = "500" colspan="2"  style="text-align: center;"><h3>ชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา 2563</h3></td>
    </tr>
</table>

EOD;

/*$header1 = <<<EOD
<table >
    <tr>
        <td  width = "200" rowspan="2" style="text-align: right;"><img src="../../images/logo_spk.gif" width="70" height="80"></td>
        <td width ="400" style="text-align: center;">บัตรประจำตัวผู้สอบเข้าศึกษาโครงการห้องเรียนพิเศษ โรงเรียนสตรีภูเก็ต</td>
    </tr>
    <tr>
        <td  style="text-align: center;">ชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา 2563</td>
    </tr>
</table>

EOD;
*/
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

//Close and output PDF document


//$line1 = "ชื่อ-สกุล ผู้สมัคร :<u> $student_name </u>";
//$line2 = "เลขประจำตัวประชาชน (Ref.1) :<u> $ref1</u>";
//$line3 = "เลขประจำตัวผู้สมัคร (Ref.2):<u> $ref2</u>";
$line3 = <<<EOD
    
EOD;
$line4 = <<<EOD
<table width="600" border="0"  cellpadding="10">
    <tbody>
        <tr>
            <td width="150" style="text-align: center">
                <img src="$student_image" width="100px" hight="100px" border="1">
            </td>
            <td width="450" >
                <p style="font-size: 18px;">ชื่อ-สกุล :<u> $student_name </u> โรงเรียนเดิม:<u> $old_school </u></p>
                <p>โครงการที่สมัคร : <u> $paln </u></p>
            </td>
        </tr>
    </tbody>
</table>
EOD;

$hr_style = <<<EOD
<hr style="border-top: 2px dotted #8c8b8b;" >
EOD;
$str_comment = <<<EOD
(นำส่วนนี้มาแสดงในวันสอบ ถ้าไม่มีจะไม่อนุญาตให้เข้าสอบ)* <u>สอบวันที่ 7 มีนาคม 2563</u> กรุณานำ <u>ดินสอดำ 2B</u> มาใช้ในการสอบ
EOD;

//$pdf->SetFont('dejavusans', '', 14);
//$pdf->writeHTMLCell(0, 0, '', 60, $line1, 0, 1, 0, true, '', true);
//$pdf->Ln(1);
//$pdf->writeHTMLCell(0, 0, '', '', $line2, 0, 1, 0, true, '', true);
//$pdf->Ln(1);
//$pdf->writeHTMLCell(0, 0, '', '', $line3, 0, 1, 0, true, '', true);
//$pdf->Ln(8);
$pdf->writeHTMLCell(0, 0, '', 45, $line4, 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', $str_comment, 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', $hr_style, 0, 1, 0, true, '', true);
$pdf->Ln(6);
//$pdf->writeHTMLCell(0, 0, '', '', $header2, 0, 1, 0, true, '', true);

ob_clean();
$pdf->Output('m1_smte.pdf', 'I');
end_ob_clean();

$conn = null;
