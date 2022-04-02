<?php

require "../config/function.php";
require_once '../config/settings.config.php';
$spkObject = new spk();
$spkObject->spkHeader();
?>
                <script src='spk.js'> </script>
				<link rel='stylesheet' type='text/css' href='../css/app_css.css'>
</head>
    <body>
        <div class=" text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 style="color:#043c96;text-shadow: 2px 2px 4px #000000;"><?php echo $txt['SCHOOLNAME']; ?> </h1>
                <p class="lead text-muted"><?php echo $txt['SYSTEMNAME']; ?></p>
                <hr>
                <h3  style="color:#102c4c;text-shadow: 2px 2px 4px #000000;">ใบสมัครชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา 2562</h3>

                <hr>
            </div>
        </div>

        <div class="container">

            <form method="post" enctype="multipart/form-data" action="summary.php" class="needs-validation" novalidate>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">รายละเอียดผู้สมัคร</legend>
                    <div class="form-row">
                        <div class="col-md4 mb-3">
                            <label for="myOption">คำนำหน้านาม: </label>
                            <select id="myOption" class="custom-select" onchange="setValue(this,'reg_name_title','reg_name_id')" required>
                                <option value="">เลือกคำนำหน้านาม</option>
                                <option value="1">เด็กชาย</option>
                                <option value="2">เด็กหญิง</option>
                                <option value="3">นาย</option>
                                <option value="4">นางสาว</option>
                            </select>
                            <input type="hidden" name="reg_name_title" id="reg_name_title">
                            <input type="hidden" name="reg_name_id" id="reg_name_id">
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reg_name">ชื่อ: </label>
                            <input id="reg_name" type="text" class="form-control " name="reg_name" size="35" placeholder="ชื่อผู้สมัคร *" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reg_suname">นามสกุล: </label>
                            <input type="text" class="form-control " name="reg_suname" size="35" placeholder="นามสกุลผู้สมัคร *" required>
                        </div>

                    </div>
                    <div class="form-group">

                        <label for="reg_card_id">เลขบัตรประชาชน: </label>
                        <input type="text" class="form-control " name="reg_card_id" maxlength="13"  placeholder="เลขบัตรประชาชน *" onkeyup="keyup(this,event)" onkeypress="return Numbers(event)"  required>


                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="myOptionDD">เกิดวันที่ </label>
                            <select id="myOptionDD" name="myOptionDD" class="custom-select" required>
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


                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="myOptionMM">เดือน</label>
                        <select id="myOptionMM" name="myOptionMM" class="custom-select"  required>
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

                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="myOptionYY">ปี พ.ศ. </label>
                        <select id="myOptionYY" name="myOptionYY" class="custom-select" required>

                            <option value="" >-พ.ศ.-</option>
                                <?php
for ($i = 2540; $i <= 2551; $i++) {
    echo "<option value='" . $i . "'>" . $i . "</option>";

}
?>

                        </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="reg_email">E-mail: </label>
                        <input type="email" class="form-control " name="reg_email" size="35" placeholder="Email Address">
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">ที่อยู่ตามทะเบียนบ้าน</legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="reg_no">เลขที่: </label>
                            <input type="text" class="form-control" name="reg_no" size="15" placeholder="เลขที่ *" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="reg_road">ถนน: </label>
                            <input type="text" class="form-control" name="reg_road" size="35" placeholder="ถนน *" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">

                                <label for="prov11">จังหวัด : * </label>
                                <!-- <span id="province"> -->
                                <span id="province">
                                    <select id="prov11" class="custom-select" >
                                        <option value="">- เลือกจังหวัด -</option>
                                    </select>
                                </span>

                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="amphur">อำเภอ : *</label>
                            <span id="amphur">
                                <select class="custom-select" >
                                    <option value="">- เลือกอำเภอ -</option>
                                </select>
                            </span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="district">ตำบล : * </label>
                            <span id="district">
                                <select class="custom-select" >
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
                            <label for="reg_tel"> โทร </label>
                            <input type="text" name="reg_tel" size="12" class="form-control"   onkeypress="return Numbers(event)" required>
                        </div>
                    </div>

                </fieldset>

                <fieldset class="myfieldset">

                    <legend class="myfieldset">ข้อมูล บิดา </legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="father_name">ชื่อ: </label>
                            <input type="text" name="father_name" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="father_suname">นามสกุล: </label>
                            <input type="text" name="father_suname" size="35" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="father_job">อาชีพ: </label>
                            <input type="text" name="father_job" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="father_tel">โทร: </label>
                            <input type="text" name="father_tel" size="35" class="form-control"    onkeypress="return Numbers(event)" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">ข้อมูล มารดา</legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="mother_title">คำนำหน้านาม</label>
                           <input type="text" name="mother_title" size="10" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="mother_name">ชื่อ: </label>
                            <input type="text" name="mother_name" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="mother_suname">สกุล: </label>
                            <input type="text" name="mother_suname" size="35"  class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="mother_job">อาชีพ: </label>
                            <input type="text" name="mother_job" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="mother_tel">โทร: </label>
                            <input type="text" name="mother_tel" size="35" class="form-control"    onkeypress="return Numbers(event)" required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">ข้อมูล ผู้ปกครอง </legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                           <label for="parent_title">คำนำหน้านาม</label>
                           <input type="text" name="parent_title" size="10" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="parent_name">ชื่อ: </label>
                            <input type="text" name="parent_name" size="35" class="form-control" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="parent_suname">สกุล: </label>
                            <input type="text" name="parent_suname" size="35"  class="form-control" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="relationship">เกี่ยวข้องกับนักเรียน: </label>
                            <input type="text" name="relationship" size="35"  class="form-control"required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="parent_tel">โทร: </label>
                            <input type="text" name="parent_tel" size="35"  class="form-control"    onkeypress="return Numbers(event)"required>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">กำลังศึกษาชั้น ป.6 หรือจบ ป.6 </legend>
                        <div class="form-group">
                            <label for="old_school_name">จากโรงเรียน*  : </label>
                            <input type="text" name="old_school_name" size="35"  class="form-control" required>
                        </div>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                                จังหวัด :
                                <!-- <span id="province"> -->
                                <span id="province_3">
                                    <select class="custom-select" >
                                        <option value=''>- เลือกจังหวัด* -</option>
                                    </select>
                                </span>
                            </div>
                            <div class="col-md-4 mb-3">
                                อำเภอ :
                                <span id="amphur_3">
                                    <select class="custom-select" >
                                        <option value=''>- เลือกอำเภอ* -</option>
                                    </select>
                                </span>
                            </div>
                        </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">สมัครความสามารถพิเศษ รับสมัครเฉพาะวันที่ 22-23 มีนาคม 2562 พร้อมชำระเงิน ภายในวันที่ 23 มีนาคม 2562 เท่านั้น </legend>
                    <div class="custom-control custom-radio mb-3">
                        <input class="custom-control-input" type="radio" name="reg_plan" value="1" id="radio2902">
                        <label class="custom-control-label" for="radio2902">ความสามารถพิเศษ </label>
                    </div>

                     <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file7" id="customFile7" accept="application/pdf">
                        <label class="custom-file-label" for="customFile7"> เอกสารประกอบความสามารถพิเศษไฟล์ 1 พร้อมเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u></label>
                    </div>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file8" id="customFile8" accept="application/pdf">
                        <label class="custom-file-label" for="customFile8"> เอกสารประกอบความสามารถพิเศษไฟล์ 2 (ถ้ามี) พร้อมเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u></label>
                    </div>
                     <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file9" id="customFile9" accept="application/pdf">
                        <label class="custom-file-label" for="customFile9"> เอกสารประกอบความสามารถพิเศษไฟล์ 3 (ถ้ามี) พร้อมเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u></label>
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">หลักฐานการสมัคร O-NET (เอกสาร Upload) เอกสารต้องใช้เครื่อง Scanner เท่านั้น ไม่อนุญาตให้ใช้กล้องจากมือถือ </legend>
                        <div class="col-md-4 mb-3">
                            <label for="reg_onet_point">คะแนน O-NET: </label>
                            <input type="text" name="reg_onet_point" size="4" class="form-control" >
                        </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file6" id="customFile6" accept="application/pdf">
                        <label class="custom-file-label" for="customFile6">สำเนาผลการทดสอบระดับชาติ (O-NET) พร้อมผู้สมัครเซ็นรับรองสำเนาถูกต้อง <u> สามารถ upload ได้หลังจากสมัครไปแล้ว ไฟล์ PDF เท่านั้น</u>    </label>
                    </div>
                    <div class="alert alert-warning text-center" role="alert">
                      ** คะแนน และเอกสาร O-NET สามารถ upload ได้หลังจากวันที่ 25 มีนาคม 2562
                    </div>
                </fieldset>

                <fieldset class="myfieldset">
                    <legend class="myfieldset">หลักฐานการสมัคร (เอกสาร Upload) เอกสารต้องใช้เครื่อง Scanner เท่านั้น ไม่อนุญาตให้ใช้กล้องจากมือถือ</legend>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file1" id="customFile1" accept="image/*" required>
                        <label class="custom-file-label" for="customFile1"> รูปถ่ายผู้สมัคร <u>ไฟล์ รูปภาพ (*.jpg,*.jpeg,*.bmp,*.png) เท่านั้น</u> </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file2" id="customFile2" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile2">สำเนาทะเบียนบ้านหน้าแรก พร้อมเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u></label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file3" id="customFile3" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile3">สำเนาทะเบียนบ้าน(หน้าที่มีชื่อเจ้าบ้าน) พร้อมเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u>   </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file4" id="customFile4" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile4">สำเนาทะเบียนบ้าน(หน้าที่มีชื่อผู้สมัคร) พร้อมเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u>   </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file5" id="customFile5" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile5">สำเนาหนังสือรับรองกำลังศึกษาอยู่ชั้น ป.6 หรือ สำเนา ปพ.1 พร้อมผู้สมัครเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u>   </label>
                    </div>


                </fieldset>

                <script>
                    $('.custom-file-input').on('change', function() {
                        let fileName = $(this).val().split('\\').pop();
                        $(this).siblings('.custom-file-label').addClass("selected").html(fileName);
                    });
                </script>
			<div class="text-center">
                <button class="btn btn-lg btn-primary" type="submit"><i class="fas fa-sign-in-alt"></i> ส่งใบสมัคร</button>
            </div>
            </form>

        </div>
        <hr>

    </div>
<script type="text/javascript">


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


</script>
    <?php
$spkObject->spkFooter();
?>
    </body>

</html>
