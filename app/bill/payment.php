<?php

require_once '../TCPDF/tcpdf.php';
require_once '../../spk/word.php';
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

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Satreephuket School');
$pdf->SetTitle('Payment');
$pdf->SetSubject('Satreephuket');
$pdf->SetKeywords('Satreephuket');
// set default header data
$payment_code = "80069";
$header1 = <<<EOD
<table>
<tr>
    <td rowspan="2" style="text-align: center;"><img src="logo_spk.gif" width="90" height="100"></td>
    <td style="text-align: center;"><br><h1>ใบแจ้งชำระเงินค่าสมัครสอบ</h1></td>
    <td style="text-align: right;"><h3>ส่วนที่ 1 (สำหรับผู้สมัคร)</h3></td>
</tr>
<tr>
    <td colspan="2" style="text-align: left;"><h2>โรงเรียนสตรีภูเก็ต Product Code : $payment_code </h2></td>
</tr>
</table>
<hr>
EOD;
$pdf->setHeaderData($ln = '', $lw = 0, $ht = '', $hs = $header1, $tc = array(0, 0, 0), $lc = array(0, 0, 0));

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
$pdf->AddPage();
//Close and output PDF document

$servername = "localhost";
$username   = "root";
$password   = ",uok8,";
$dbname     = "SpkEntrance";
$conn       = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$reg_id_card = $_POST['id_card'];
$plan_tmp    = $_POST['plan'];
try {
    switch ($plan_tmp) {
        case 'm1_smte':
            $str_sql     = "SELECT * FROM m1_s WHERE m1s003 = '" . $_POST['id_card'] . "'";
            $plan_select = "ค่าสมัครสอบ <br>เข้าศึกษาโครงการห้องเรียนพิเศษ SMTE ชั้นมัธยมศึกษาปีที่ 1 $strEducationYear";
            break;
        case 'm1_ip':
            $str_sql     = "SELECT * FROM m1_ip WHERE m1s003 = '" . $_POST['id_card'] . "'";
            $plan_select = "ค่าสมัครสอบ <br>เข้าศึกษาโครงการห้องเรียนพิเศษ IP ชั้นมัธยมศึกษาปีที่ 1 $strEducationYear";
            break;
        case 'm4_smte':
            $str_sql     = "SELECT * FROM m4_s WHERE m1s003 =  '" . $_POST['id_card'] . "'";
            $plan_select = "ค่าสมัครสอบ <br>เข้าศึกษาโครงการห้องเรียนพิเศษ SMTE ชั้นมัธยมศึกษาปีที่ 4 $strEducationYear";
            break;
        case 'm4_ip':
            $str_sql     = "SELECT * FROM m4_ip WHERE m1s003 =  '" . $_POST['id_card'] . "'";
            $plan_select = "ค่าสมัครสอบ <br>เข้าศึกษาโครงการห้องเรียนพิเศษ IP ชั้นมัธยมศึกษาปีที่ 4 $strEducationYear";
            break;
        default:
            $str_sql     = "";
            $plan_select = "ค่าสมัครสอบ <br>เข้าศึกษาโครงการห้องเรียนพิเศษ $strEducationYear";
            break;
    }
    //$str_sql = "SELECT * FROM m4_ip where m1s003 =  '" . $_POST['id_card'] . "'";
    $stmt = $conn->query($str_sql);
    while ($row = $stmt->fetch()) {
        $reg_name = $row['m1s010'] . $row['m1s020'] . '  ' . $row['m1s030'];
        $reg_id   = $row['m1s001'];
        $reg_plan = $row['m1s290']; //แผนการเรียน
        switch ($reg_plan) {
            case 2:
                $plan_select = $plan_select . "IP แผนการเรียน ภาษาอังกฤษ - คณิตศาสตร์";
                break;
            case 3:
                $plan_select = $plan_select . "IP แผนการเรียน วิทยาศาสตร์ - คณิตศาสตร์";
                break;
            case 4:
                $plan_select = $plan_select . "IPC แผนการเรียน Cambridge";
                break;
        }
        if ($reg_id < 1000) {
            if ($reg_id < 10) {
                $reg_id = "000" . $reg_id;
            } elseif ($reg_id < 100) {
                $reg_id = "00" . $reg_id;
            } else {
                $reg_id = "0" . $reg_id;
            }
        }
    }
} catch (PDOException $e) {

    echo $e->getMessage();

}
$line1 = "ชื่อ-สกุล ผู้สมัคร :<u> $reg_name </u>";
$line2 = "เลขประจำตัวประชาชน (Ref.1) :<u> $reg_id_card</u>";
$line3 = "ลำดับผู้สมัคร (Ref.2):<u> $reg_id</u>";
$line4 = <<<EOD
<table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tbody>
        <tr align="center" bgcolor="#aaa">
            <td>รายการที่ </td>
            <td colspan="2">รายการ </td>
            <td >จำนวนเงิน</td>
        </tr>
        <tr>
            <td align="center" >1<br><br></td>
            <td colspan="2" > $plan_select <br><br><br> $rec</td>
            <td align="right" >200.- <br><br></td>
        </tr>
        <tr>
            <td colspan="2" align="left"><b><br>&nbsp;&nbsp;เงินสด (ตัวอักษร) &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;สองร้อยบาทถ้วน&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;<br></b></td>
            <td align="right" >รวม&nbsp;&nbsp;</td>
            <td align="right" >200.- </td>
        </tr>
        <tr>
            <td colspan="2">
                หมายเหตุ
                <ul>
                <li>ยอดเงินรวมข้างต้น ยังไม่รวมอัตราค่าธรรมเนียมของธนาคาร</li>
                <li>ผู้ชำระเงินเป็นผู้รับผิดชอบค่าธรรมเนียมธนาคารในอัตรา 10 บาท อัตราเดียวทั่วประเทศ</li>
                <li>สามารถนำไปชำระเงินได้ที่ <u>ธนาคารกรุงไทย จำกัด (มหาชน)</u> ทุกสาขาทั่วประเทศ</li>
                <li>กรณีมีเหตุขัดข้องไม่สามารถชำระเงินได้ กรุณาติดต่อที่ Call Center ธ.กรุงไทย โทร. 1551 หรือ ธนาคารกรุงไทย สาขา ถนนรัษฎา  โทร. 0-7622-5116</li>
                </ul>
            </td>
            <td colspan="2" align="center">
                <p>สำหรับเจ้าหน้าที่ธนาคาร</p>
                <p>ผู้รับเงิน...............................................</p>
                <p>วันที่...................................................</p>
                <p>(ลงลายมือชื่อและประทับตรา) </p>
            </td>
        </tr>
    </tbody>
</table>
EOD;
$hr_style = <<<EOD
<hr style="border-top: 2px dotted #8c8b8b;" >
EOD;

$header2 = <<<EOD
<table>
<tr>
<td rowspan="2" style="text-align: right;"><img src="logo_spk.gif" width="70" height="80"></td>
<td style="text-align: center;"><h1>ใบแจ้งชำระเงินค่าสมัครสอบ</h1></td>
<td style="text-align: right;"><h3>ส่วนที่ 2 (สำหรับธนาคาร)</h3></td>
</tr>
<tr>

<td  style="text-align: center;"><h2>โรงเรียนสตรีภูเก็ต</h2></td>
<td></td>
</tr>
</table>
<br>
<table>
<tr>
<td><img src="../../images/logo_bank.jpg" width="70" height="70"> </td>
<td style="text-align: left;">ธนาคารกรุงไทย จำกัด(มหาชน)<br> Product Code : $payment_code</td>
<td colspan="2" style="border: 1px solid black;"> $line1 <br> $line2 <br> $line3</td>

</tr>
<tr>
<td  style="border: 1px solid black; text-align: center;">เงินสด (ตัวอักษร)</td>

<td colspan="2" style="border: 1px solid black;text-align: center;">เงินสด (ตัวเลข)</td>
<td  rowspan="2" style="border: 1px solid black; text-align: center;">สำหรับเจ้าหน้าที่ธนาคาร <br /> <br /></td>
</tr>
<tr>
<td  style="border: 1px solid black;text-align: center;"> &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;สองร้อยบาทถ้วน&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;</td>

<td colspan="2"  style="border: 1px solid black;text-align: right;"> &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;200.00&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166; </td>

</tr>
</table>
EOD;
$textbarcode = "|099400057769900\n". $reg_id_card . "\n". $reg_id ."\n20000";
$textbarcodecomment = "ท่านสามารถชำระได้ทันที". " \n ". " ผ่าน Mobile Banking Application ทุกธนาคาร" . " \n ". "scan QR Code ตรงนี้ =======>";

//$pdf->SetFont('dejavusans', '', 14);
$pdf->writeHTMLCell(0, 0, '', 40, $line1, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $line2, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $line3, 0, 1, 0, true, '', true);
$pdf->Ln(8);
$pdf->writeHTMLCell(0, 0, '', '', $line4, 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', $textbarcodecomment, 0, 1, 0, true, '', true);
$pdf->write2DBarcode($textbarcode, 'QRCODE,L', 170, 175, 50, 30, $style, 'N');
$pdf->Ln(5);
$pdf->writeHTMLCell(0, 0, '', '', $hr_style, 0, 1, 0, true, '', true);
$pdf->Ln(3);
$pdf->writeHTMLCell(0, 0, '', '', $header2, 0, 1, 0, true, '', true);

ob_clean();
$pdf->Output('spk_reg_payment.pdf', 'I');
end_ob_clean();

$conn = null;
