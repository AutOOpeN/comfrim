<?php
require_once '../config/settings.config.php';
require_once '../../spk/word.php';
require_once '../../TCPDF/tcpdf.php';


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
$pdf->SetTitle('Satreephuket Payment');
$pdf->SetSubject('Satreephuket');
$pdf->SetKeywords('satreephuket');
// set default header data
$header1 = <<<EOD
<table>
<tr>
<td rowspan="2" style="text-align: center;"><img src="logo_spk.gif" width="100" height="100"></td>
<td style="text-align: center;"><br><h1>ใบแจ้งชำระเงินค่าสมัครสอบ</h1></td>
<td style="text-align: right;"><h3>ส่วนที่ 1 (สำหรับผู้สมัคร)</h3></td>
</tr>
<tr>

<td colspan="2" style="text-align: left;"><h2>โรงเรียนสตรีภูเก็ต Product Code : $strBankCode</h2></td>

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
$dbname     = "admission";
$conn       = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$reg_id_card = $_POST['send_reg_card_id'];
$plan_tmp    = $_POST['send_reg_class'];
//$str_sql     = "SELECT * FROM " . $_POST['send_reg_class'] . " WHERE reg_card_id = '" . $_POST['send_reg_card_id'] . "'";
try {
    switch ($plan_tmp) {
        case 'm1':
            $str_sql        = "SELECT * FROM m1 WHERE reg_card_id = '" . $_POST['send_reg_card_id'] . "'";
            $plan_select    = "ค่าสมัครสอบ <br>เข้าศึกษา ห้องเรียนปกติ ชั้นมัธยมศึกษาปีที่ 1 " . $education_year . "<br>";
            $student_room   = "1"; 
            $pay_total      = "200.00";
            $pay_total_text = "สองร้อยบาทถ้วน";
            break;

        case 'm4':
            $str_sql        = "SELECT * FROM m4 WHERE reg_card_id =  '" . $_POST['send_reg_card_id'] . "'";
            $plan_select    = "ค่าสมัครสอบ <br>เข้าศึกษา ห้องเรียนปกติ ชั้นมัธยมศึกษาปีที่ 4 ปีการศึกษา " . $education_year .  " <br>";
            $student_room   = "4";
            $pay_total      = "200.00";
            $pay_total_text = "สองร้อยบาทถ้วน";
            break;

        default:
            $str_sql        = "";
            $plan_select    = "";
            $student_room   = "";
            $pay_total      = "";
            $pay_total_text = "";
            break;
    }

    //$str_sql = "SELECT * FROM m4_ip where m1s003 =  '" . $_POST['id_card'] . "'";
    $stmt = $conn->query($str_sql);
    while ($row = $stmt->fetch()) {
        $reg_name = $row['reg_name_title'] . $row['reg_name'] . '  ' . $row['reg_suname'];
        $reg_id   = $row['id'];
        $reg_plan = $plan_tmp; //แผนการเรียน

        /*
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
         */
        if ($reg_id < 1000) {
            if ($reg_id < 10) {
                $reg_id = $student_room . "000" . $reg_id;
            } elseif ($reg_id < 100) {
                $reg_id = $student_room . "00" . $reg_id;
            } else {
                $reg_id = $student_room."0" . $reg_id;
            }
        }
    }
} catch (PDOException $e) {

    echo $e->getMessage();

}
$line1 = "ชื่อ-สกุล ผู้สมัคร :<u> $reg_name </u>";
$line2 = "เลขประจำตัวประชาชน (Ref.1) :<u> $reg_id_card</u>";
$line3 = "ลำดับผู้สมัคร (Ref.2):<u> $reg_id</u>";
$line4 = "ระดับชั้น (Ref.3):<u> $plan_tmp</u>";
$line5 = <<<EOD
<table width="100%" border="1" cellspacing="0" cellpadding="0">
<tbody>
<tr align="center" bgcolor="#aaa">
<td >รายการที่ </td>
<td colspan="2">รายการ </td>
<td >จำนวนเงิน</td>
</tr>
<tr>
<td align="center" >1<br><br></td>
<td colspan="2" > $plan_select <br><br> $rec</td>
<td align="right" >$pay_total <br></td>
</tr>
<tr>
<td colspan="2" align="left"><b><br>เงินสด (ตัวอักษร) &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;$pay_total_text&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;<br></b></td>
<td align="right" >รวม</td>
<td align="right" >$pay_total </td>
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
<p>(ลงลายมือชื่อและประทับตรา) </p></td>
</tr>
</tbody>
</table>
EOD;

$hr_style = <<<EOD
<hr style="border-top: 2px dashed #8c8b8b;" >
EOD;

$header2 = <<<EOD
<table>
<tr>
<td rowspan="2" style="text-align: left;"><img src="logo_spk.gif" width="80" height="80"></td>
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
<td style="text-align: left;">ธนาคารกรุงไทย จำกัด(มหาชน)<br> Product Code : $str_bank_code</td>
<td colspan="2" style="border: 1px solid black;"> $line1 <br> $line2 <br> $line3 <br> $line4</td>

</tr>
<tr>
<td  style="border: 1px solid black;">เงินสด (ตัวอักษร)</td>

<td colspan="2" style="border: 1px solid black;text-align: center;">เงินสด (ตัวเลข)</td>
<td  rowspan="2" style="border: 1px solid black; text-align: center;">สำหรับเจ้าหน้าที่ธนาคาร</td>
</tr>
<tr>
<td  style="border: 1px solid black;text-align: center;"> &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;$pay_total_text &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;</td>

<td colspan="2"  style="border: 1px solid black;text-align: right;"> &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;$pay_total &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;  </td>

</tr>
</table>
EOD;

$textbarcode = "|099400057769900\n". $reg_id_card . "\n". $reg_id ."\n20000";
$textbarcodecomment = "ท่านสามารถชำระได้ทันที". " \n ". " ผ่าน Mobile Banking Application ทุกธนาคาร" . " \n ". "scan QR Code ตรงนี้ =======>";
// set style for barcode

$style = array(
	'border' => false,
	'vpadding' => 'auto',
	'hpadding' => 'auto',
	'fgcolor' => array(0,0,0),
	'bgcolor' => false, //array(255,255,255)
	'module_width' => 1, // width of a single module in points
	'module_height' => 1 // height of a single module in points
);

//$pdf->SetFont('dejavusans', '', 14);
$pdf->writeHTMLCell(0, 0, '', 40, $line1, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $line2, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $line3, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $line4, 0, 1, 0, true, '', true);
$pdf->Ln(8);
$pdf->writeHTMLCell(0, 0, '', '', $line5, 0, 1, 0, true, '', true);
// QRCODE,L : QR-CODE Low error correction
$pdf->Ln(5);

$pdf->writeHTMLCell(0, 0, '', '', $strBillComment, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $textbarcodecomment, 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', $hr_style, 0, 1, 0, true, '', true);
$pdf->Ln(6);
$pdf->writeHTMLCell(0, 0, '', '', $header2, 0, 1, 0, true, '', true);
$pdf->write2DBarcode($textbarcode, 'QRCODE,L', 170, 175, 50, 30, $style, 'N');
// $pdf->write2DBarcode($textbarcode, 'QRCODE,L', 170, 125, 50, 30, $style, 'N');

//$pdf->write2DBarcode('www.tcpdf.org', 'QRCODE,L', ซ้าย/ขาว, ขึ้น/ลง, , ขนาด, $style, 'N');

ob_clean();
$pdf->Output('satreephuket_admission.pdf', 'I');
end_ob_clean();

$conn = null;
