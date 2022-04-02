<?php
  session_start();

  require_once '../../TCPDF/tcpdf.php';
  include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");
  include($_SERVER['DOCUMENT_ROOT']. "/spk/word.php");

  $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);    

  $sql = "SELECT * 
  FROM ((confirm_student 
  INNER JOIN confirm_father ON confirm_student.m1s003 = confirm_father.fStudent_id)
  INNER JOIN confirm_mother ON confirm_student.m1s003 = confirm_mother.mStudent_id)
  INNER JOIN confirm_parent ON confirm_student.m1s003 = confirm_parent.pStudent_id
  WHERE m1s003 = '" . $_SESSION['ref1'] . "'";

  try{
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
  } catch(PDOException $e) {
    echo $e->getMessage();
  }
  // try{ // result table
  //     $stmt_res = $conn->prepare($_SESSION['sql_res']);
  //     $stmt_res->execute();
  //     $row_res = $stmt_res->fetch();
  // } catch (PDOException $e) {
  //     echo $e->getMessage();
  // }

  // try{// confirm table
  //     $stmt_reg = $conn->prepare($_SESSION['sql_confirm']);
  //     $stmt_reg->execute();
  //     $row = $stmt_reg->fetch();
  // } catch (PDOException $e) {
  //     echo $e->getMessage();
  // }


$name = $row['m1s010'] . $row['m1s020'] .  " " . $row['m1s030'] ;
$id_card = $_SESSION['ref1'];
$ex_id = $_SESSION['ex_id'];
$m = $_SESSION['m'];
// m1s040 ปีเดือนวันเกิด
$b_y =  substr($row['m1s040'],0,4); // ปีเกิด
$b_m = substr($row['m1s040'],4,2); // เดือนเกิด
$b_d = substr($row['m1s040'],6,2); // วันเกิด


switch ($_SESSION['plan']){
    case 11: // m1-smte
        $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
        break;
    case 12: // m1-ip
        $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
        break;
    case 13: // m1-ipc
        $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
        break;
    case 41; // m4-smte
        $str_plan = "โครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์ เทคโนโลยีและสิ่งแวดล้อม (SMTE)";
        break;
    case 42: // m4-ip
        $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตรนานาชาติ (International Program) ";
        break;
    case 43: // m4-ipc
        $str_plan = "ห้องเรียนพิเศษโครงการนานาชาติ  หลักสูตร Cambridge (IPC Year 8) ";
        break;
    default:
        $str_plan = "";
        
}
// class MYPDF extends TCPDF {

//   //Page header
//   public function Header() {
//       // Logo
//       $image_file = K_PATH_IMAGES.'logo_example.jpg';
//       $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
//       // Set font
//       $this->SetFont('helvetica', 'B', 20);
//       // Title
//       $this->Cell(0, 15, '<< TCPDF Example 003 >>', 0, false, 'C', 0, '', 0, false, 'M', 'M');
//   }

//   // Page footer
//   public function Footer() {
//       // Position at 15 mm from bottom
//       $this->SetY(-15);
//       // Set font
//       $this->SetFont('helvetica', 'I', 8);
//       // Page number
//       $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
//   }
// }

// $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('bukpee@gmail.com');
$pdf->SetTitle('Satreephuket School');
$pdf->SetSubject('Satreephuket');
$pdf->SetKeywords('satreephuket');


// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);



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


// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage('','A4');

// set text shadow effect
// $pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์");
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม");
// echo $thaiweek[date("w")] ,"ที่",date(" j "), $thaimonth[date(" m ")-1] , " พ.ศ. ",date(" Y ")+543;
$occupation = array(
  "0"=>"ไม่ได้ประกอบอาชีพ",
  "1"=>"รับราชการ",
  "2"=>"พนักงานรัฐวิสาหกิจ",
  "3"=>"นักธุรกิจ-ค้าขาย",
  "4"=>"เกษตรกรรม",
  "5"=>"รับจ้าง",
  "6"=>"พนักงาน/เจ้าหน้าที่ของรัฐ/ลูกจ้างประจำ/ลูกจ้างชั่วคราว",
  "7"=>"ข้าราชการ/พนักงานของรัฐเกษียณ",
  "8"=>"พระ/นักบวช",
  "99"=>"อื่นๆ");

$dd = date("d");
$mm = $thaimonth[date(" m ")-1];
$b_m_thai = $thaimonth[intval($b_m)-1];
$yy = date("Y") + 543;
$y_edu = substr($strEducationYear, -4);

$studentHomeIdNo = $row['studentHomeIdNo'];
$studentHomeNo = $row['studentHomeNo'];
$studentMoo = $row['studentMoo'];
$studentSoi = $row['studentSoi'];
$studentStreet = $row['studentStreet'];
$studentTambon = $row['studetTumbol'];
$studentAmphur = $row['studentAmphur'];
$studentProvince = $row['studentProvince'];
$studentPostCode = $row['studentPostCode'];
$studentTelNo = $row['studentTelNo'];

$race= $row['studentRace'];
$nation= $row['studentNation'];
$religion=$row['studentReligion'];


$fatherName = $row['fTitle'] . $row['fFirst_name'] . " " . $row['fLast_name'];
$motherName = $row['mTitle'] . $row['mFirst_name'] . " " . $row['mLast_name'];
$parentName = $row['pTitle'] . $row['pFirst_name'] . " " . $row['pLast_name'];

$parentOccupation = $occupation[$row['pOccupation']];
$parentRelationShip = $row['pRelationship'];
$parent = $row['pTel'];
$parentJobPlace = $row['pOffice'];

$fatherTelNo = $row['fTel'];
$motherTelNo = $row['mTel'];
$parentTelNo = $row['pTel'];

$oldSchoolName = $row['m1s260'];
$oldSchoolAmphur = $row['m1s270'];
$oldSchoolProvince = $row['m1s280'];




$pdf->SetFont('thsarabun', '', '18'); 
$pdf->MultiCell(50, 50, 'ติดรูปถ่าย', 1, 'C',0, 0, '155', '6', true);
$pdf->MultiCell(60, 60, 'ขนาด 1.5 นิ้ว', 0, 'C',0, 0, '150', '16', true);
$pdf->MultiCell(60, 60, 'เครื่องแบบนักเรียน', 0, 'C',0, 0, '150', '26', true);
$pdf->MultiCell(60, 60, 'โรงเรียนสตรีภูเก็ต', 0, 'C',0, 0, '150', '36', true);
$pdf->Image('logo.jpg', 90, 5, 25, '', '', '', '', false, 300);
// $pdf->MultiCell($w=20, $h=15, $txt='teszt', $border='TL', $align='C', $fill=0, 1, $x=$startx, $y=$starty, $reseth=true, $strech=0, $ishtml=false, $autopadding=true, $maxh=13, $valign='M');

$pdf->SetFont('thsarabun', 'B', '20'); 
$pdf->SetXY($x,$y+35);
$pdf->Write(0, 'ใบมอบตัวนักเรียนเข้าเรียนในโรงเรียนสตรีภูเก็ต', '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('thsarabun', 'B', '18'); 
$pdf->Write(0,"ชั้นมัธยมศึกษาปีที่ $m   $strEducationYear", '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('thsarabun', '', '14'); 
$pdf->SetXY($x+15,$y+55);
$pdf->Write(0,'ชื่อนักเรียน...................'.$name.'...................', '', 0, '', true, 0, false, false, 0);
$id_array = str_split($_SESSION['ref1']);
$html_id_card = 'เลขประจำตัวประชาชน <table width="250px" border="1" ><tr style="text-align:center; vertical-align:middle">';
foreach ($id_array as $char){
  $html_id_card .= "<td >$char</td>";
}
$html_id_card .= '</tr></table>';
$pdf->writeHTML($html_id_card, true, false, true, false, '');


$pdf->Write(0,'วันที่......'.$dd.'......เดือน......'.$mm.'......พ.ศ. ..'.$yy.'......', '', 0, 'C', true, 0, false, false, 0);

$pdf->SetXY($x+15,$y+80);
$pdf->Write(0, 'ข้าพเจ้า..........'.$parentName.'.......................อาชีพ........'.$parentOccupation.'......... ', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'เป็นผู้ปกครองของ............'.$name.'............ ', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'โทรศัพท์...........'.$parentTelNo.'............', '', 0, '', true, 0, false, false, 0);

$pdf->SetXY($x+15,$y+100);
$pdf->SetFont('thsarabun', 'b', '14'); 
$pdf->Write(0, 'ขอทำการมอบตัวนักเรียนให้ไว้ต่อผู้อำนวนการโรงเรียนสตรีภูเก็ต', '', 0, '', true, 0, false, false, 0);
$pdf->SetFont('thsarabunbi', '', '14'); 
$pdf->Write(0, 'ประวัตินักเรียน', '', 0, '', true, 0, false, false, 0);
$pdf->SetFont('thsarabun', '', '14'); 
$pdf->Write(0, '1. นักเรียนชื่อ............'.$name.'................... ', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'เกิดวันที่...'.$b_d.'...เดือน...'.$b_m_thai.'...พ.ศ...'.$b_y.'...เชื้อชาติ ...'.$row['studentRace'].'...  สัญชาติ...'.$row['studentNation'].'...ศาสนา...'.$row['studentReligion'].'...', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'สถานที่เกิดตำบล..'.$row['studentBornTambon'].'..อำเภอ..'.$row['studentBornAmphur'].'..จังหวัด..'.$row['studentBornProvince'].'..', '', 0, '', true, 0, false, false, 0);

// บิดา
$pdf->SetXY($x+15,$y+135);

$fid_array = str_split($row['fCard_id']);
$html_fIdCard = 'เลขประจำตัวประชาชนบิดา <table width="250px" border="1" ><tr style="text-align:center; vertical-align:middle">';
foreach ($fid_array as $fid){
  $html_fIdCard .= "<td >$fid</td>";
}
$html_fIdCard .= '</tr></table>';

$pdf->Write(0, '2. บิดาชื่อ......'.$fatherName.'......อาชีพบิดา...'.$occupation[$row['fOccupation']].'...', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'สถานที่ทำงาน ......'.$row['fOffice'].'...... รายได้ต่อปี ......'.$row['fIncome'].'...... บาท', '', 0, '', true, 0, false, false, 0);
$pdf->writeHTML($html_fIdCard, true, false, true, false, '');
// มารดา
$pdf->SetXY($x+15,$y+160);


$mid_array = str_split($row['mCard_id']);
$html_mIdCard = 'เลขประจำตัวประชาชนมารดา <table width="250px" border="1" ><tr style="text-align:center; vertical-align:middle">';
foreach ($mid_array as $mid){
  $html_mIdCard .= "<td >$mid</td>";
}
$html_mIdCard .= '</tr></table>';

$pdf->Write(0, 'มารดาชื่อ......'.$motherName.'......อาชีพมารดา...'.$occupation[$row['mOccupation']].'...', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'สถานที่ทำงาน ......'.$row['mOffice'].'...... รายได้ต่อปี ......'.$row['mIncome'].'...... บาท', '', 0, '', true, 0, false, false, 0);
$pdf->writeHTML($html_mIdCard, true, false, true, false, '');

// ผู้ปกครอง
$pdf->SetXY($x+15,$y+183);
$pdf->Write(0, '3. ผู้ปกครองที่มอบตัวนักเรียนเกี่ยวข้องเป็น ....'.$parentRelationShip .'....ของนักเรียน โดยที่อยู่ของนักเรียนตามทะเบียนบ้าน', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'รหัสบ้าน ...'.$row['psHomeIdNo'].'...  เลขที่ ...'.$row['m1s050'].'... หมู่ที่ ...'.$row['psMoo'].'...ซอย ...'.$row['psSoi'].'...', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'ถนน ...'.$row['m1s060'].'...ตำบล...'.$row['m1s070'].'...อำเภอ...'.$row['m1s080'].'...', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'จังหวัด...'.$row['m1s090'].'...รหัสไปรษณีย์...'.$row['m1s100'].'...โทรศัพท์...'.$row['m1s110'].'...', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'ตามหลักฐานผลการเรียนและสำเนาทะเบียนบ้านดังแนบ', '', 0, '', true, 0, false, false, 0);
$pdf->SetXY($x+15,$y+215);
$pdf->Write(0, 'ก่อนที่จะเข้ามาเรียนโรงเรียนนี้ ได้จบจากโรงเรียน...............................'.$oldSchoolName.'....................................', '', 0, '', true, 0, false, false, 0);
$pdf->Write(0, 'อำเภอ...............'.$oldSchoolAmphur.'...............จังหวัด...............'.$oldSchoolProvince.'...............', '', 0, '', true, 0, false, false, 0);
$pdf->SetXY($x+25,$y+228);
$pdf->Write(0,'ข้าพเจ้าขอมอบตัว......................'.$name .'.............................','',0,'', true,0,false,false,0);
// $pdf->SetXY($x+15,$y+22);
$pdf->Write(0,'ให้เป็นนักเรียน และศึกษาเล่าเรียนในชั้นมัธยมศึกษาปีที่....' .$m . '.... ปีการศึกษา......' .$y_edu . '......ของโรงเรียนสตรีภูเก็ตตั้งแต่วันนี้เป็นต้นไป','',0,'L', true,0,false,false,0);

$pdf->SetXY($x+10,$y+255);
$pdf->Write(0,'ลงชื่อ...................................................................ผู้ปกครองนักเรียน','',0,'', true,0,false,false,0);
$pdf->SetXY($x+18,$y+265);
$pdf->Write(0,'(.................................................................)','',0,'', true,0,false,false,0);
$pdf->SetXY($x+110,$y+255);
$pdf->Write(0,'ลงชื่อ...................................................................ครูผู้รับมอบตัว','',0,'', true,0,false,false,0);
$pdf->SetXY($x+115,$y+265);
$pdf->Write(0,'(.................................................................)','',0,'', true,0,false,false,0);


// $pdf->SetXY($x,$y+255);
// $pdf->Cell(0, 10, 'หน้า 1/2', 0, false, 'R', 0, '', 0, false, 'T', 'M');
$pdf->lastPage();

// มอบตัวหน้า 3
// add a page
$pdf->AddPage();

$split_id_card = '';
foreach ($id_array as $char){
  $split_id_card .= "$char" . "&nbsp;";
}



$html_table = <<<EDO
<table width="650" border="0">
  <tbody>
    <tr>
      <td>ชื่อนักเรียน ......<i>$name</i>......ชั้น  ม........<i>$m</i>......../..............เลขที่..........................</td>
    </tr>
    <tr>
      <td>เกิดวันที่...<i>$b_d</i>...เดือน...<i>$b_m_thai</i>...พ.ศ....<i>$b_y</i>...เชื้อชาติ...<i>$race</i>...สัญชาติ...<i>$nation</i>...ศาสนา...<i>$religion</i>...</td>
    </tr>
    <tr>
      <td>เลขบัตรประจำตัวประชาชน....<i>$split_id_card</i>...ปัจจุบันอยู่บ้านเลขที่...<i>$studentHomeNo</i>...หมู่ที่...<i>$studentMoo</i>...ซอย...<i>$studentSoi</i>...</td>
    </tr>
    <tr>
      <td>ถนน...<i>$studentStreet</i>...ตำบล...<i>$studentTambon</i>...อำเภอ...<i>$studentAmphur</i>...จังหวัด...<i>$studentProvince</i>...รหัสไปรษณีย์...<i>$studentPostCode</i>...</td>
    </tr>
    <tr>
      <td>โทรศัพท์นักเรียน...<i>$studentTelNo</i>...ความสามารถพิเศษของนักเรียน...............</td>
    </tr>
    <tr>
      <td>ชื่อบิดา...<i>$fatherName</i>...โทรศัพท์...<i>$fatherTelNo</i>...</td>
    </tr>
    <tr>
      <td>ชื่อมารดา...<i>$motherName</i>...โทรศัพท์...<i>$motherTelNo</i>...</td>
    </tr>
    <tr>
      <td>ข้าพเจ้าชื่อ.........$parentName.........อายุ.................ปี  อาชีพ.........$parentOccupation.........</td>
    </tr>
    <tr>
      <td>เป็นผู้ปกครองของนักเรียน  ปัจจุบันอยู่บ้านเลขที่...<i>$studentHomeNo</i>...หมู่ที่...<i>$studentMoo</i>...ซอย...<i>$studentSoi</i>...</td>
    </tr>
    <tr>
      <td><p>ถนน...<i>$studentStreet</i>...ตำบล...<i>$studentTambon</i>...อำเภอ...<i>$studentAmphur</i>...จังหวัด...<i>$studentProvince</i>...รหัสไปรษณีย์...<i>$studentPostCode</i>...</p></td>
    </tr>
    <tr>
      <td><p>โทรศัพท์  (บ้าน)............ โทรศัพท์  (มือถือ)......$parentTelNo......</td>
    </tr>
    <tr>
      <td><p>สถานที่ทำงานชื่อ......<i>$parentJobPlace</i>......ตั้งอยู่เลขที่......................หมู่ที่...............ซอย..................................</p></td>
    </tr>
    <tr>
      <td><p>ถนน..............................ตำบล...........................อำเภอ.......................จังหวัด……...………........รหัสไปรษณีย์...........................</p></td>
    </tr>
    <tr>
      <td><p>โทรศัพท์(ที่ทำงาน)..................................................................................................................................................................      </p></td>
    </tr>
    <tr style="text-align: center">
      <td><u><b>ข้าพเจ้าได้ศึกษาคู่มือนักเรียนแล้ว  มีความเข้าใจและยินดีปฏิบัติตามระเบียบของโรงเรียน ดังนี้</b></u></td>
    </tr>
    <tr>
      <td>
        1. ข้าพเจ้ารับทราบนโยบายของกระทรวงศึกษาธิการ  ที่จะให้โรงเรียนและผู้ปกครอง ติดต่อสื่อสารกันอย่างใกล้ชิดและร่วมกันแก้ไขปัญหาเพื่อปรับเปลี่ยนพฤติกรรมของนักเรียนให้เป็นไปในทิศทางที่ดี
      </td>
    </tr>
    <tr>
      <td>2. ข้าพเจ้าจะดูแลเอาใจใส่นักเรียนในเรื่องการเรียน  การมาโรงเรียนให้ทันตามเวลาที่กำหนด การแต่งเครื่องแบบนักเรียน การไว้ทรงผม การใช้โทรศัพท์มือถือ  และการปฏิบัติตนให้เป็นไปตามระเบียบของโรงเรียนที่ปรากฏในคู่มือนักเรียน</td>
    </tr>
    <tr>
      <td>3. ข้าพเจ้ายินดีสนับสนุนให้นักเรียนได้ร่วมทำกิจกรรมต่างๆ ที่โรงเรียนจัดขึ้น เพื่อส่งเสริมให้นักเรียนมีคุณลักษณะที่   พึงประสงค์ตามที่โรงเรียนกำหนด</td>
    </tr>
    <tr>
      <td>4. ข้าพเจ้ายินดีมาร่วมกิจกรรมตามที่โรงเรียนมีหนังสือเชิญทุกครั้ง เพื่อรับทราบข้อดี ข้อด้อยของนักเรียน และเพื่อให้ข้อคิดเห็น อันจะเป็นประโยชน์ต่อการบริหารจัดการศึกษาของโรงเรียนต่อไป</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>ข้าพเจ้าขอมอบตัว.................$name.......................................ให้เป็นนักเรียนและศึกษา</td>
    </tr>
    <tr>
      <td>เล่าเรียนในโรงเรียนสตรีภูเก็ต ตั้งแต่วันนี้เป็นต้นไป    หากนักเรียนมีการฝ่าฝืน หรือไม่ปฏิบัติตามระเบียบวินัยของ
         โรงเรียนประการใด ข้าพเจ้ายินดีให้โรงเรียนพิจารณาดำเนินการตามที่เห็นสมควร</td>
    </tr>

  </tbody>
</table>
EDO;

$html_comment = "<p style='font-style: normal;text-decoration-style: dotted; font-weight: bold;'>หมายเหตุ  คู่มือนักเรียนให้ศึกษาในเว็บไซต์ของโรงเรียน</p>";


$text01 = "แบบบันทึกความเข้าใจของผู้ปกครอง";
$text02 = "เพื่อพัฒนาคุณธรรม จริยธรรมนักเรียนโรงเรียนสตรีภูเก็ต $strEducationYear";

$pdf->Image('logo.jpg', 90, 5, 25, '', '', '', '', false, 300);
$pdf->SetXY($x,$y+35);
$pdf->SetFont('thsarabun', 'B', '15');
$pdf->Write(0, $text01, '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, $text02, '', 0, 'C', true, 0, false, false, 0);
$pdf->SetFont('thsarabun', '', '15');
$pdf->writeHTML($html_table, true, false, true, false, '');
// $pdf->writeHTML($html_page3_02, true, false, true, false, '');

// *********************************************

$pdf->Cell(0, 0, 'ลงชื่อ.........................................................................ผู้ปกครองนักเรียน', 0, 1, 'R', 0, '', 0);
$pdf->Ln(2);
$pdf->Cell(0, 0, '(.......................................................................)                     ', 0, 1, 'R', 0, '', 0);
$pdf->Cell(0, 0, 'ลงชื่อ.........................................................................ครูผู้รับมอบตัว', 0, 1, 'R', 0, '', 0);
$pdf->Ln(2);
$pdf->Cell(0, 0, '(.......................................................................)                  ', 0, 1, 'R', 0, '', 0);
// $pdf->SetXY($x+15,$y+262);
// $pdf->Cell(0, 10, 'หน้า 1/1', 0, false, '', 0, '', 0, false, 'T', 'M');


// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('satreephuket.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+