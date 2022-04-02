
<?php 
    include_once("../../spk/word.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ระบบรับนักเรียน ม. 4 โครงการพิเศษ SMTE  <?php echo ($strEducationYear) ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="../js/spk.js"></script>
    <body>
        <div class=" text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                            <p></p>
            <h1 class="jumbotron-heading">ระบบรับนักเรียน  <?php echo ($strEducationYear) ?> </h1>
            <h4> โรงเรียนสตรีภูเก็ต </h4>
                <hr>
                <p class="lead text-muted">ใบสมัครเข้าศึกษาโครงการห้องเรียนพิเศษวิทยาศาสตร์ คณิตศาสตร์
                เทคโนโลยีและสิ่งแวดล้อม (SMTE)</p>
                <p class="lead text-muted">ชั้นมัธยมศึกษาปีที่ 4 <?php echo ($strEducationYear) ?></p>
                <hr>
            </div>
        </div>
        <?php

include("../../config/StatusAPP.inc.php");

if ($status == '0' && ($_SESSION['admin_level'] != "0")  ) {
 ?>
    <div class="container">
       <div class="alert alert-primary" role="alert">
         <h4 class="alert-heading">กำหนดการรับสมัคร</h4>
         <p></p>
            <?php
                include_once("../../spk/schedule_app.html")
            ?>
       </div>
    </div>
    <hr>
        <footer class="footer">
            <div class="container">
                <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000  โทร 076-222368 </p>
                <p></p>
            </div>
      </footer>

 <?php       
        exit;
    }

?>
        <div class="container">

            <form class="needs-validation" method="post" enctype="multipart/form-data" action="insert_spkentrance.php"  novalidate>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">รายละเอียดผู้สมัคร</legend>
                    <div class="form-row">
                        <div class="col-md4 mb-3">
                            <label for="myOption">คำนำหน้านาม: </label>
                            <select id="myOption" class="custom-select" onchange="setValue(this,'xm1s010','xm1s011')" required>
                                <option value="">เลือกคำนำหน้านาม</option>
                                <option value="1">เด็กชาย</option>
                                <option value="2">เด็กหญิง</option>
                                <option value="3">นาย</option>
                                <option value="4">นางสาว</option>
                            </select>
                            <input type="hidden" name="xm1s010" id="xm1s010" size="2">
                            <input type="hidden" name="xm1s011" id="xm1s011" size="2">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="sm1s020">ชื่อ: </label>
                            <input id="xm1s020" type="text" class="form-control " name="xm1s020" size="35" placeholder="ชื่อผู้สมัคร *" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s030">นามสกุล: </label>
                            <input type="text" class="form-control " name="xm1s030" size="35" placeholder="นามสกุลผู้สมัคร *" required>
                        </div>

                    </div>
                    <div class="form-group">

                        <label for="xm1s003">เลขบัตรประชาชน: </label>
                        <input type="text" class="form-control " name="xm1s003" maxlength="13"  placeholder="เลขบัตรประชาชน *" onkeyup="keyup(this,event)" onkeypress="return Numbers(event)"  required>


                        <label for="xm1s004">เลขหนังสือเดินทาง: </label>
                        <input type="text" class="form-control " name="xm1s004" size="15" maxlength="13" placeholder="เลขหนังสือเดินทาง">

                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="myOptionDD">เกิดวันที่ </label>
                            <select id="myOptionDD" name="myOptionDD" class="custom-select" onchange="setValueDD(this,'xm1s040dd','xm1s041dd')" required>
                                <option value="">-วันที่-</option>
                                <?php
for ($i = 1; $i <= 31; $i++) {
    if ($i < 10) {
        echo "<option value='0" . $i . "'>0" . $i . "</option>";
    } else {
        echo "<option value='" . $i . "'>" . $i . "</option>";
    }

}
?>
                            </select>
                            <input type="hidden" name="xm1s040dd" id="xm1s040dd" size="2">
                            <input type="hidden" name="xm1s041dd" id="xm1s041dd" size="2">

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="myOptionMM">เดือน</label>
                        <select id="myOptionMM" name="myOptionMM" class="custom-select" onchange="setValueMM(this,'xm1s040mm','xm1s041mm')" required>
                            <option value="">-เดือน-</option>
                            <option value="01">มกราคม</option>
                            <option value="02">กุมภาพันธ์</option>
                            <option value="03">มีนาคม</option>
                            <option value="04">เมษายน</option>
                            <option value="05">พฤษภาคม</option>
                            <option value="06">มิถุนายน</option>
                            <option value="07">กรกฎาคม</option>
                            <option value="08">สิงหาคม</option>
                            <option value="09">กันยายน</option>
                            <option value="10">ตุลาคม</option>
                            <option value="11">พฤศจิกายน</option>
                            <option value="12">ธันวาคม</option>
                        </select>

                        <input type="hidden" name="xm1s040mm" id="xm1s040mm" size="15">
                        <input type="hidden" name="xm1s041mm" id="xm1s041mm" size="15">

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="myOptionYY">ปี พ.ศ. </label>
                        <select id="myOptionYY" name="myOptionYY" class="custom-select" onchange="setValueYY(this,'xm1s040yy','xm1s041yy')" required>

                            <option value="" >-พ.ศ.-</option>
                                <?php
                                $tmp_year = date("Y");
                                $tmp_year_start = ($tmp_year + 543) -19;
                                $tmp_year_end = ($tmp_year + 543) - 12;
                                for ($i = $tmp_year_start; $i <= $tmp_year_end; $i++) {
    echo "<option value='" . $i . "'>" . $i . "</option>";

}
?>

                        </select>
                        <input type="hidden" name="xm1s040yy" id="xm1s040yy" size="10">
                        <input type="hidden" name="xm1s041yy" id="xm1s041yy" size="10">

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="xm1s005">E-mail: </label>
                        <input type="email" class="form-control " name="xm1s005" size="35" placeholder="Email Address">
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">ที่อยู่ ปัจจุบัน</legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="xm1s050">เลขที่: </label>
                            <input type="text" class="form-control" name="xm1s050" size="15" placeholder="เลขที่ *" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s060">ถนน: </label>
                            <input type="text" class="form-control" name="xm1s060" size="35" placeholder="ถนน *" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">

                                <label for="prov11">จังหวัด : * </label>
                                <!-- <span id="province"> -->
                                <span id="province">
                                    <select id="prov11" class="custom-select" required>
                                        <option value="">- เลือกจังหวัด -</option>
                                    </select>
                                </span>

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="amphur">อำเภอ : *</label>
                            <span id="amphur">
                                <select class="custom-select" required>
                                    <option value="">- เลือกอำเภอ -</option>
                                </select>
                            </span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="district">ตำบล : * </label>
                            <span id="district">
                                <select class="custom-select" required>
                                    <option value=''>- เลือกตำบล -</option>
                                </select>
                            </span>
                        </div>
                    </div>
                    <div class="form-row">
                    	<!--
                        <div class="col-md-4 mb-3">
                            <label for="xm1s100">รหัสไปรษณีย์ </label>
                            <input type="text" name="xm1s100" size="15" class="form-control">
                        </div>
                    -->
                        <div class="col-md-4 mb-3">
                            <label for="xm1s110"> โทร </label>
                            <input type="text" name="xm1s110" size="12" class="form-control" onkeyup="autoTab(this)"  onkeypress="return Numbers(event)" required>
                        </div>
                    </div>

                </fieldset>

                <fieldset class="myfieldset">

                    <legend class="myfieldset">ข้อมูล บิดา </legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="xm1s120">ชื่อ: </label>
                            <input type="text" name="xm1s120" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s130">นามสกุล: </label>
                            <input type="text" name="xm1s130" size="35" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="xm1s140">อาชีพ: </label>
                            <input type="text" name="xm1s140" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s150">โทร: </label>
                            <input type="text" name="xm1s150" size="35" class="form-control"  onkeyup="autoTab(this)"  onkeypress="return Numbers(event)" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">ข้อมูล มารดา</legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="xm1s160">คำนำหน้านาม</label>
                           <input type="text" name="xm1s160" size="10" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s170">ชื่อ: </label>
                            <input type="text" name="xm1s170" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s180">สกุล: </label>
                            <input type="text" name="xm1s180" size="35"  class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="xm1s190">อาชีพ: </label>
                            <input type="text" name="xm1s190" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s200">โทร: </label>
                            <input type="text" name="xm1s200" size="35" class="form-control"  onkeyup="autoTab(this)"  onkeypress="return Numbers(event)" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">ข้อมูล ผู้ปกครอง </legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="xm1s210">คำนำหน้านาม</label>
                           <input type="text" name="xm1s210" size="10" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s220">ชื่อ: </label>
                            <input type="text" name="xm1s220" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s230">สกุล: </label>
                            <input type="text" name="xm1s230" size="35"  class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="xm1s240">เกี่ยวข้องกับนักเรียน: </label>
                            <input type="text" name="xm1s240" size="35"  class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="xm1s250">โทร: </label>
                            <input type="text" name="xm1s250" size="35"  class="form-control"  onkeyup="autoTab(this)"  onkeypress="return Numbers(event)" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">กำลังศึกษาชั้น ม. 3 หรือจบ ม. 3 </legend>
                        <div class="form-group">
                            <label for="xm1s260">จากโรงเรียน: </label>
                            <input type="text" name="xm1s260" size="35"  class="form-control" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                จังหวัด :
                                <!-- <span id="province"> -->
                                <span id="province_3">
                                    <select class="custom-select" required>
                                        <option value=''>- เลือกจังหวัด -</option>
                                    </select>
                                </span>
                            </div>
                            <div class="col-md-4 mb-3">
                                อำเภอ :
                                <span id="amphur_3">
                                    <select class="custom-select" required>
                                        <option value=''>- เลือกอำเภอ -</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">สมัครโครงการ (สมัครได้เพียง 1 โครงการ) </legend>
                    <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" type="radio" name="xm1s290" id="radio2901"  value ="1" required>
                        <label class="custom-control-label" for="radio2901"> SMTE ผลการเรียนเฉลี่ยชั้นมัธยมศึกษาปีที่ 1 และ 2 รายวิชาพื้นฐาน ดังนี้
                        </label>
                    </div>
                    โครงการ:
                    <div class="form-row">
                        <div clall="col-md-4 mb-3">
                            <label for="xm1s300">วิชาคณิตศาสตร์พื้นฐาน</label> <input type="text" name="xm1s300" id="xm1s300" class="form-control" required onkeypress="return event.charCode >= 46 && event.charCode <= 57" maxlength="4" >
                            <label for="xm1s310">วิทยาศาสตร์พื้นฐาน </label> <input type="text" name="xm1s310" id="xm1s310" class="form-control" required required onkeypress="return event.charCode >= 46 && event.charCode <= 57" maxlength="4" >
                            <label for="xm1s320">ผลการเรียนเฉลี่ยรวม </label> <input type="text" name="xm1s320" id="xm1s310" class="form-control" required required onkeypress="return event.charCode >= 46 && event.charCode <= 57" maxlength="4" >
                        </div>
                    </div>

                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">หลักฐานการสมัคร (เอกสาร Upload) </legend>
                    <p class="text-danger text-center"><i class="fas fas-lg fa-info-circle"></i> *** เอกสารต้องใช้เครื่อง Scanner เท่านั้น ไม่อนุญาตให้ใช้กล้องจากมือถือ ***</p>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file1" id="customFile1" accept="image/*" required>
                        <label class="custom-file-label" for="customFile1"> รูปถ่ายขนาด 1 นิ้ว [ ประเภทไฟล์ JPEG (*.jpg,*.jpeg,*.jpe,*.jfif) ]</label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file2" id="customFile2" accept="application/pdf, image/*" required>
                        <label class="custom-file-label" for="customFile2"> สำเนาหนังสือรับรองผลการเรียนวิชาวิทยาศาสตร์และคณิตศาสตร์ หรือ ปพ. 1 (โครงการ SMTE) พร้อมเซ็นรับรองสำเนาถูกต้องทุกหน้า</label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file3" id="customFile3" accept="application/pdf, image/*" >
                        <label class="custom-file-label" for="customFile3"> สำเนาหนังสือรับรองผลการเรียนวิชาวิทยาศาสตร์และคณิตศาสตร์ หรือ ปพ. 1 (โครงการ SMTE) *ถ้ามี</label>
                    </div>
                </fieldset>
                <fieldset class="myfieldset">
                    <legend class="myfieldset">เงื่อนไขการสมัคร </legend>
                    <input type="checkbox" required name="checkbox" value="check" id="agree"  /> ยอมรับและได้อ่าน <a href="../../agree.html" target="_blank" rel="noopener noreferrer">เงื่อนไขการสมัคร</a> 
                </fieldset>
                <script>
                	$('.custom-file-input').on('change', function() {
    					let fileName = $(this).val().split('\\').pop();
    					$(this).siblings('.custom-file-label').addClass("selected").html(fileName);
					});
                </script>
                            <div class="text-center">
                <br />
                <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> ส่งใบสมัคร</button>

            </div>
            </form>

        </div>
        <hr>
        <footer class="footer">
            <div class="container">
                <p><i class="far fa-copyright"></i> <a href="http://www.satreephuket.ac.th">โรงเรียนสตรีภูเก็ต </a> 1 ถนนดำรง ตำบลตลาดใหญ่ อำเภอเมือง จังหวัดภูเก็ต 83000  โทร 076-222368 </p>
                <p></p>
            </div>
      </footer>
    </div>


    </body>

</html>
