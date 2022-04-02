<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form method="post" enctype="multipart/form-data" action="file.php" >
	                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file1" id="customFile1" required>
                        <label class="custom-file-label" for="customFile1"> รูปถ่ายผู้สมัคร <u>ไฟล์ รูปภาพ (*.jpg,*.jpeg,*.bmp,*.png) เท่านั้น</u> </label>
                    </div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="file2" id="customFile2" accept="application/pdf" required>
                        <label class="custom-file-label" for="customFile2">สำเนาทะเบียนบ้านหน้าแรกและ หน้าที่มีชื่อเจ้าบ้าน  พร้อมเซ็นรับรองสำเนาถูกต้อง <u>ไฟล์ PDF เท่านั้น</u></label>
                    </div>
                    <input type="submit" value="Submit">
</form>
</body>
</html>
