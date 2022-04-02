<?php

require "../config/function.php";
require_once '../config/settings.config.php';
$spkObject = new spk();
//$spkObject->spkHeader();
?>
      <!DOCTYPE html>
            <html lang='en'>
            <head>
                <title>ระบบรับนักเรียน ปีการศึกษา 2562</title>
                <meta charset='utf-8'>
                <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
                <link rel='stylesheet' type='text/css' href='../../../bootstrap/dist/css/bootstrap.css'>
                <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.1/css/all.css' integrity='sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr' crossorigin='anonymous'>
                <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
				<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js' integrity='sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1' crossorigin='anonymous'></script>
				<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js' integrity='sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM' crossorigin='anonymous'></script>
                


<!-- <link rel='stylesheet' type='text/css' href='../css/app_css.css'> -->
</head>
    <body>
        <div class=" text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"><?php echo $txt['SCHOOLNAME']; ?> </h1>
                <p class="lead text-muted"><?php echo $txt['SYSTEMNAME']; ?></p>
                <hr>
                <p class="lead text-muted">ชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา 2562</p>

                <hr>
            </div>
        </div>

        <div class="container">

        <form class="needs-validation" method="post" enctype="multipart/form-data" action="summary.php"  novalidate>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">รายละเอียดผู้สมัคร</legend>
                    <div class="form-row">
                        <div class="col-md4 mb-3">
                            <label for="myOption">คำนำหน้านาม: </label>
                            <select id="myOption" class="custom-select" onchange="setValue(this,'xm1s010','xm1s011')" required>
                                <option value="">เลือกคำนำหน้านาม</option>
                                <option value="1">เด็กชาย</option>
                                <option value="2">เด็กหญิง</option>
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
for ($i = 2540; $i <= 2551; $i++) {
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
                    <legend class="myfieldset">กำลังศึกษาชั้น ป. 6 หรือจบ ป. 6 </legend>
                        <div class="form-group">
                            <label for="xm1s260">จากโรงเรียน*  : </label>
                            <input type="text" name="xm1s260" size="35"  class="form-control" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                จังหวัด :
                                <!-- <span id="province"> -->
                                <span id="province_3">
                                    <select class="custom-select" required>
                                        <option value=''>- เลือกจังหวัด* -</option>
                                    </select>
                                </span>
                            </div>
                            <div class="col-md-4 mb-3">
                                อำเภอ :
                                <span id="amphur_3">
                                    <select class="custom-select" required>
                                        <option value=''>- เลือกอำเภอ* -</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">สมัครประเภท * </legend>
                    <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" type="radio" name="xm1s290" value="2" id="radio2902">
                        <label class="custom-control-label" for="radio2902">ความสามารถพิเศษ</label>
                    </div>

                     <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file9" id="customFile9" accept="application/pdf">
                        <label class="custom-file-label" for="customFile9"> เอกสารประกอบความสามารถพิเศษ </label>
                    </div>

                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">หลักฐานการสมัคร (เอกสาร Upload) เอกสารต้องใช้เครื่อง Scanner เท่านั้น ไม่อนุญาตให้ใช้กล้องจากมือถือ</legend>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file1" id="customFile1" accept="image/*" required>
                        <label class="custom-file-label" for="customFile1"> รูปถ่ายผู้สมัคร * </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file2" id="customFile2" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile2">สำเนาสำเนาทะเบียนบ้านหน้าแรก พร้อมผู้สมัครเซ็นรับรองสำเนาถูกต้อง *</label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file3" id="customFile3" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile3">สำเนาทะเบียนบ้านหน้าแรก พร้อมผู้สมัครเซ็นรับรองสำเนาถูกต้อง*   </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file4" id="customFile4" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile4">สำเนาหนังสือรับรองกำลังศึกษาอยู่ชั้น ป.๖ หรือ สำเนา ปพ.๑ พร้อมผู้สมัครเซ็นรับรองสำเนาถูกต้อง*   </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file5" id="customFile5" accept="application/pdf">
                        <label class="custom-file-label" for="customFile5">สำเนาผลการทดสอบระดับชาติ (O-NET) พร้อมผู้สมัครเซ็นรับรองสำเนาถูกต้อง *   </label>
                    </div>
                            ** O-NET สามารถ upload ได้หลังจากวันที่ 25 มีนาคม 2562
                </fieldset>

                <script>
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
                    });
                </script>

                <button class="btn btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> ส่งใบสมัคร</button>
            </form>

        </div>
        <hr>

    </div>

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                alert("กรุณากรอกข้อมูลให้ครบ (ช่องที่มีกรอบสีแดง)");
                    }
                form.classList.add('was-validated');

            }, false);
        });
    }, false);
})();

function Inint_AJAX() {
    try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
    try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
    try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
    alert("XMLHttpRequest not supported");
    return null;
 };

 function dochange(src, val) {
      var req = Inint_AJAX();
      req.onreadystatechange = function () {
           if (req.readyState==4) {
                if (req.status==200) {
                     document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                } // End If
           } // End If
      }; // End Function
      req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
      req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
      req.send(null); //ส่งค่า
 } window.onLoad=dochange('province', -1);
 // =========================================================================================
function dochange_3(src_3, val_3) {
      var req = Inint_AJAX();
      req.onreadystatechange = function () {
           if (req.readyState==4) {
                if (req.status==200) {
                     document.getElementById(src_3).innerHTML=req.responseText; //รับค่ากลับมา
                } // End If
           } // End If
      };
      req.open("GET", "localtion_3.php?data="+src_3+"&val="+val_3); //สร้าง connection
      req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
      req.send(null); //ส่งค่า
 } window.onLoad=dochange_3('province_3', -1);
 // =========================================================================================
// คำนำหน้านาม
function setValue(e, target10, target11) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target10).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target11).value = seclectedValue;
}
function setValueDD(e, target40dd, target41dd) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target40dd).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target41dd).value = seclectedValue;
}
function setValueMM(e, target40mm, target41mm) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target40mm).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target41mm).value = seclectedValue;
}
function setValueYY(e, target40yy, target41yy) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target40yy).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target41yy).value = seclectedValue;
}

$('#customFile1').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})


function autoTab(obj){ 
    /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย 
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น รูปแบบเลขที่บัตรประชาชน 
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น _-____-_____-_-__ 
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____ 
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__ 
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน 
    */ 
    var pattern=new String("__-____-____"); // กำหนดรูปแบบในนี้ 
    var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้ 
    var returnText=new String(""); 
    var obj_l=obj.value.length; 
    var obj_l2=obj_l-1; 

    for(i=0;i<pattern.length;i++){ 
        if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){ 
            returnText+=obj.value+pattern_ex; 
            obj.value=returnText; 
        } 
    } 
    if(obj_l>=pattern.length){ 
        obj.value=obj.value.substr(0,pattern.length); 
    } 
} 
/* ID CARD */
function Numbers(e){
	var keynum;
	var keychar;
	var numcheck;
	if(window.event) {// IE
	  keynum = e.keyCode;
	}
	else if(e.which) {// Netscape/Firefox/Opera
	  keynum = e.which;
	}
	if(keynum == 13 || keynum == 8 || typeof(keynum) == "undefined"){
			return true;
	}
	keychar= String.fromCharCode(keynum);
	numcheck = /^[0-9]$/;
	return numcheck.test(keychar);
}

function keyup(obj,e){
	var keynum;
	var keychar;
    var id = '';
	if(window.event) {// IE
	  keynum = e.keyCode;
	}
	else if(e.which) {// Netscape/Firefox/Opera
	  keynum = e.which;
	}
	keychar= String.fromCharCode(keynum); 

	var tagInput = document.getElementsByTagName('input');
	for(i=0;i<=tagInput.length;i++){
		if(tagInput[i] == obj){ 
			var prevObj = tagInput[i-1];
			var nextObj = tagInput[i+1];
			break;
		}
	} 
	if(obj.value.length == 0 && keynum == 8) prevObj.focus();
	
	if(obj.value.length == obj.getAttribute('maxlength')){ 
       id = obj.value;
        if(checkID(id)){ 
            obj.style.borderColor = "green";    
        nextObj.focus();
        }
        else
        {
            alert('รหัสบัตรประจำตัวประชาชนไม่ถูกต้อง !!');
            obj.style.borderColor = "red";
            obj.focus();
        }
		//nextObj.focus();
	}
	
}

function checkID(id){
	if(id.length != 13) return false;
	for(i=0, sum=0; i < 12; i++)
        sum += parseFloat(id.charAt(i))*(13-i);
        //console.log(sum); 
	if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false; 
	return true;
}

function SplitString($str)
{
    $checkAt = substr_count($str, "@"); //นับจำนวน @
    if ($checkAt == 1) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); // id
        $myString[1] = substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)); // name
        return $myString;
    } elseif ($checkAt == 2) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); //id
        $myString[1] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), 0, strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@"));
        $myString[2] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), (strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@") + 1), (strlen(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1))) - 1));
        return $myString;
    } else {
        return false;
    }

}
			
</script>

    <?php
$spkObject->spkFooter();
?>
    </body>

</html>
