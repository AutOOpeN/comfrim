<?php
// เรียกไฟล์ TCPDF Library เข้ามาใช้งาน กำหนดที่อยู่ตามที่แตกไฟล์ไว้
/*


    คำสั่ง Cell()
    Cell($w, $h, $txt, $border, $ln, $align, $fill, $link, $stretch, $ignore_min_height, $calign, $valign)
    $w = กำหนดความกว้างของกล่องข้อความ
    $h = กำหนดความสูงของกล่องข้อความ
    $txt = ข้อความที่ต้องการให้แสดง
    $border = กำหนดเส้นกรอบของกล่องข้อความ
    $ln = กำหนดให้หลังจากแทรกข้อความนี้แล้วข้อความต่อไปให้แสดงต่อตำแหน่งไหน
    $align = การจัดตำแหน่งข้อความ
    $fill = กำหนดให้ใส่สีพื้นหลังของกล่องข้อความ
    $link = ใส่ URL ที่ข้อความ เช่น http://www.mindphp.com
    $stretch = ใช้การบีบและกระจายข้อความ
    $ignore_min_height = ถ้าข้อความมีความสูงเกินกว่าที่กำหนดไว้ให้ปรับความสูงให้พอดี
    $calign = กำหนดตำแหน่งของกล่องข้อความตามตำแหน่งของข้อความ
    $valign = กำหนดตำแหน่งข้อความในแนวตั้ง

    คำสั่ง Multicell()
    MultiCell($w, $h, $txt, $border, $align, $fill, $ln, $x, $y, $reseth, $stretch, $ishtml, $autopadding, $maxh, $valign, $fitcell)
    $w = กำหนดความกว้างของกล่องข้อความ
    $h = กำหนดความสูงของกล่องข้อความ
    $txt = ข้อความที่ต้องการให้แสดง
    $border = กำหนดเส้นกรอบของกล่องข้อความ
    $align = การจัดตำแหน่งข้อความ
    $fill = กำหนดให้ใส่สีพื้นหลังของกล่องข้อความ
    $ln = กำหนดให้หลังจากแทรกข้อความนี้แล้วข้อความต่อไปให้แสดงต่อตำแหน่งไหน
    $x = กำหนดตำแหน่งของกล่องข้อความในแนวนอนตามแกน x
    $y = กำหนดตำแหน่งของกล่องข้อความในแนวตั้งตามแกน y
    $reseth = ล้างค่าความสูงของกล่องข้อความก่อนหน้านี้
    $stretch = ใช้การบีบและกระจายข้อความ
    $ishtml = กำหนดว่าข้อความใช้คำสั่ง HTML
    $autopadding = กำหนดระยะห่างระหว่างกรอบกับข้อความแบบอัตโนมัติ
    $maxh = กำหนดค่าสูงสุดของความสูง
    $valign = กำหนดตำแหน่งข้อความในแนวตั้ง
    $fitcell = ปรับขนาดข้อความให้พอดีกับกรอบ
    คำสั่ง WriteHTML()
    writeHTML($html, $ln, $fill, $reseth, $cell, $align)
    $html = กำหนดข้อความหรือคำสั่ง HTML
    $ln = กำหนดให้หลังจากแทรกข้อความนี้แล้วข้อความต่อไปให้แสดงต่อตำแหน่งไหน
    $fill = กำหนดให้ใส่สีพื้นหลังของกล่องข้อความ
    $reseth = ล้างค่าความสูงของกล่องข้อความก่อนหน้านี้
    $cell = กำหนดข้อความให้เริ่มต้นชิดซ้าย
    $align = การจัดตำแหน่งข้อความ
    คำสั่ง writeHTMLCell()
    writeHTMLCell($w, $h, $x, $y, $html, $border, $ln, $fill, $reseth, $align, $autopadding)
    $w = กำหนดความกว้างของกล่องข้อความ
    $h = กำหนดความสูงของกล่องข้อความ
    $x = กำหนดตำแหน่งของกล่องข้อความในแนวนอนตามแกน x
    $y = กำหนดตำแหน่งของกล่องข้อความในแนวตั้งตามแกน y
    $html = กำหนดข้อความหรือคำสั่ง HTML
    $border = กำหนดเส้นกรอบของกล่องข้อความ
    $ln = กำหนดให้หลังจากแทรกข้อความนี้แล้วข้อความต่อไปให้แสดงต่อตำแหน่งไหน
    $fill = กำหนดให้ใส่สีพื้นหลังของกล่องข้อความ
    $reseth = ล้างค่าความสูงของกล่องข้อความก่อนหน้านี้
    $align = การจัดตำแหน่งข้อความ
    $autopadding = กำหนดระยะห่างระหว่างกรอบกับข้อความแบบอัตโนมัติ

*/
require_once('../TCPDF/tcpdf.php');

class myTCPDF extends TCPDF {

    public function Header(){
        $str_headder = "รายชื่อผู้มีสิทธิสอบ";
        /*
        $html = '<table>'
                . '<tr>'
                . '<td width="30%"><img src="http://reg.satreephuket.ac.th/images/logo_spk.gif" width="60" /></td>'
                . '<td width="60%" align="center"> <h3> '. $str_headder . ' <br>Product code : 80069 </h3> </td>'
                . '<td width="10%" align="right"> ส่วนที่ 1 </td></tr>'
                . '</table>'
                . '<hr />';
        $this->writeHTMLCell('','','','',$html);
        */
//Cell( $w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '', $stretch = 0, $ignore_min_height = false, $calign = 'T', $valign = 'M' )
/*
    คำสั่ง Cell()
    Cell($w, $h, $txt, $border, $ln, $align, $fill, $link, $stretch, $ignore_min_height, $calign, $valign)
    $w = กำหนดความกว้างของกล่องข้อความ
    $h = กำหนดความสูงของกล่องข้อความ
    $txt = ข้อความที่ต้องการให้แสดง
    $border = กำหนดเส้นกรอบของกล่องข้อความ
    $ln = กำหนดให้หลังจากแทรกข้อความนี้แล้วข้อความต่อไปให้แสดงต่อตำแหน่งไหน
    $align = การจัดตำแหน่งข้อความ
    $fill = กำหนดให้ใส่สีพื้นหลังของกล่องข้อความ
    $link = ใส่ URL ที่ข้อความ เช่น http://www.txt.com
    $stretch = ใช้การบีบและกระจายข้อความ
    $ignore_min_height = ถ้าข้อความมีความสูงเกินกว่าที่กำหนดไว้ให้ปรับความสูงให้พอดี
    $calign = กำหนดตำแหน่งของกล่องข้อความตามตำแหน่งของข้อความ
    $valign = กำหนดตำแหน่งข้อความในแนวตั้ง
*/
        $image_file = K_PATH_IMAGES.'logo_spk.gif';
        $this->Image($image_file, 10, 10, 15, '', 'gif', '', 'T', false, 300, '', false, false, 0, false, false, false);
        $this->SetFont('', 'B', 16);
        $this->Cell(0, 15, $str_headder, 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $this->Cell(0, 18, "ส่วนที่ 1 สำหรับผู้สมัคร", 0, false, 'C', 0, '', 0, false, 'M', 'M');
    }

}

//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');
$pdf = new myTCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8');
$pdf->SetCreator('Mindphp');
$pdf->SetAuthor('Mindphp Developer');
$pdf->SetTitle('ใบสำคัญจ่าย');
$pdf->SetSubject('Mindphp Example');
$pdf->SetKeywords('Mindphp, TCPDF, PDF, example, guide');

/*
$pdf->setHeaderFont(array('freeserif', 'B', 12));
$pdf->SetHeaderData('mindphp.png', 20, 'Mindphp Example 06', 'การแทรกรูปภาพ กำหนดขนาด เส้นขอบและความละเอียดของภาพ', array (0, 64, 255), array (0, 64, 128));
$pdf->setFooterData(array (0, 64, 0), array (0, 64, 128));
*/
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->AddPage();

$reg_id_card='1234567890121';//$_POST['id_card'];

$servername = "localhost";
$username = "root";
$password = ",uok8,";
$dbname = "SpkEntrance";
$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$str_sql = "SELECT * FROM `m1_s` where `m1s003` = " . '1234567890121';//$_POST['id_card'];
$stmt = $conn->query($str_sql);
while ($row = $stmt->fetch()){
  $reg_name = $row['m1s010'].$row['m1s020']. '  ' . $row['m1s030'];
  $reg_id = $row['m1s001'];

  if ($reg_id < 1000) {
    if ($reg_id < 10) {
        $reg_id = "000".$reg_id;
    }elseif($reg_id < 100) {
      $reg_id = "00".$reg_id;
    }else{
      $reg_id= "0".$reg_id;
    }
  }
}

$line1 = "ชื่อ-สกุล ผู้สมัคร :<u> $reg_name </u>";
$line2 = "เลขประจำตัวประชาชน (Ref.1) :<u> $reg_id_card</u>";
$line3 = "ลำดับผู้สมัคร (Ref.2):<u> $reg_id</u>";
$line4 = <<<EOD
<table width="595" border="1" cellspacing="0" cellpadding="0">
  <tbody>
    <tr align="center" bgcolor="#aaa">
      <td width="100">รายการที่ </td>
      <td colspan="2">รายการ </td>
      <td width="100" >จำนวนเงิน</td>
    </tr>
    <tr>
      <td align="center" width="100">1</td>
      <td colspan="2" >ค่าสมัครสอบ</td>
		<td align="right" width="100">100</td>
    </tr>
    <tr>
      <td colspan="2" align="left">เงินสด (ตัวอักษร) &#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;สองร้อยบาทถ้วน&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;&#166;</td>
      <td align="right" >รวม</td>
      <td align="right" >200</td>
    </tr>
    <tr>
    	<td colspan="2">
        หมายเหตุ
        <ul>
        	<li>ยอดเงินรวมข้างต้น ยังไม่รวมอัตราค่าธรรมเนียมของธนาคาร</li>
          <li>ผู้ชำระเงินเป็นผู้รับผิดชอบค่าธรรมเนียมธนาคารในอัตรา 10 บาท อัตราเดียวทั่วประเทศ</li>
          <li>สามารถนำไปชำระเงินได้ที่<u>ธนาคารกรุงไทย จำกัด (มหาชน)</u> ทุกสาขาทั่วประเทศ</li>
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
//$pdf->SetFont('dejavusans', '', 14);
$pdf->writeHTMLCell(0, 0, '', 50, $line1, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $line2, 0, 1, 0, true, '', true);
$pdf->Ln(1);
$pdf->writeHTMLCell(0, 0, '', '', $line3, 0, 1, 0, true, '', true);
$pdf->Ln(8);
$pdf->writeHTMLCell(0, 0, '', '', $line4, 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', "<hr>", 0, 1, 0, true, '', true);
$pdf->Ln(10);
$pdf->writeHTMLCell(0, 0, '', '', "หมายเหตุ : สามารถนำไปชำระเงิน ที่ธนาคารกรุงไทยทุกสาขา ตั้งแต่วันที่ 23 ถึง 28 กุมภาพันธ์ พ.ศ. 2562 เท่านั้น", 0, 1, 0, true, '', true);
/*
$pdf->writeHTMLCell(50, '', '', 150, 'writeHTMLCell()<br /><img src="http://www.mindphp.com/images/info/mindphp.png" width="150" />', 1);
$pdf->writeHTMLCell(50, '', 145, 150, 'writeHTMLCell()<br /><img src="http://www.mindphp.com/images/info/mindphp.png" width="150" />', 1);
$pdf->writeHTMLCell(50, '', 80, 200, 'writeHTMLCell()<br /><img src="http://www.mindphp.com/images/info/mindphp.png" width="150" />', 1);
*/
ob_clean();
$pdf->Output('payment.pdf', 'I');
end_ob_clean();
?>