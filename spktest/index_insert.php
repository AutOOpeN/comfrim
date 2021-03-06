<!DOCTYPE html>
<html lang="en">
<head>
<title>ระบบรับนักเรียน ม. 1 โครงการพิเศษ ปีการศึกษา 2562</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<script language = "JavaScript">

</Script>

<style>
* {
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
header {
    background-color: #00F;
	background-img src="/spkimg/head1.gif" alt="Girl in a jacket" width="500" height="600"
	img src="../spkimg/head1.gif" alt="Girl in a jacket" width="500" height="600"
    padding: 30px;
    text-align: center;
    font-size: 35px;
    color: white;
}

/* Create two columns/boxes that floats next to each other */
nav {
    float: left;
    width: 30%;
    height: 300px; /* only for demonstration, should be removed */
    background: #ccc;
    padding: 20px;
}

/* Style the list inside the menu */
nav ul {
    list-style-type: none;
    padding: 0;
}

article {
    float: left;
    padding: 20px;
    width: 100%;
    background-color: #f1f1f1;
    height: auto; /* only for demonstration, should be removed */
}

/* Clear floats after the columns */
section:after {
    content: "";
    display: table;
    clear: both;
}

/* Style the footer */
footer {
    background-color: #777;
    padding: 10px;
    text-align: center;
    color: white;
}

/* Responsive layout - makes the two columns/boxes stack on top of each other instead of next to each other, on small screens */
@media (max-width: 600px) {
    nav, article {
        width: 100%;
        height: auto;
    }
}
</style>

</head>
    <script language=Javascript>
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
                       }
                  }
             };
             req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
             req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
             req.send(null); //ส่งค่า
        }

        window.onLoad=dochange('province', -1);
    </script>


<body>

<!--<h2>CSS Layout Float</h2>-->
<!--<p>In this example, we have created a header, two columns/boxes and a footer. On smaller screens, the columns will stack on top of each other.</p>-->
<!--<p>Resize the browser window to see the responsive effect (you will learn more about this in our next chapter - HTML Responsive.)</p>-->

<header>
  <h2><img src="../spkimg/head1.gif" alt="Girl in a jacket" width="100%" height="150"></h2>
  </header>
<section>

  <article>
    <center><h2>ระบบรับนักเรียน ปีการศึกษา 2562</h2></center>

<br>
<h3><center>ใบสมัครเข้าศึกษาโครงการห้องเรียนพิเศษ โรงเรียนสตรีภูเก็ต</center></h3>
<h3><center>ชั้นมัธยมศึกษาปีที่ 1 ปีการศึกษา 2562</center></h3>
<p><span class="error">* required field</span></p>

<form method="post" action="insert_spkentrance.php">
  1. รายละเอียดผู้สมัคร <br><br>

  &emsp; คำนำหน้านาม

  <select id="myOption" onchange="setValue(this,'xm1s011')">
        <option selected>-คำนำหน้านาม-</option>
        <option value="1">เด็กชาย</option>
        <option value="2">เด็กหญิง</option>
    </select>
    <input type="text" name="xm1s011" id="xm1s011" size="2">

    <script type="text/javascript">
        function setValue(e, target) {
            //var seclectedText = e.options[e.selectedIndex].text;
            var seclectedValue = e.value;
            document.getElementById(target).value = seclectedValue;
        }
    </script>


    ชื่อผู้สมัคร <input type="text" name="xm1s020" size="35">
    <span class="error">* <?php echo $emailErr; ?></span>

    สกุลผู้สมัคร <input type="text" name="xm1s030" size="35">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>

    &emsp; เลขประชาชน <input type="text" name="xm1s003" size="15" maxlength="13">
    <span class="error">* <?php echo $emailErr; ?></span>

    เลขหนังสือเดินทาง <input type="text" name="xm1s004" size="15" maxlength="13">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>

    &emsp; วัน เดือน ปี เกิด <input type="text" name="xm1s040" size="15">
    <span class="error">* <?php echo $emailErr; ?></span>

    E-mail: <input type="text" name="xm1s005" size="35">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br><br>

  2. ที่อยู่ ปัจจุบัน <br><br>

    &emsp; เลขที่ <input type="text" name="xm1s050" size="15">
    <span class="error">* <?php echo $emailErr; ?></span>

    ถนน <input type="text" name="xm1s060" size="35">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
            <p>
                จังหวัด : *
                <span id="province">
                    <select>
                        <option value="0">- เลือกจังหวัด -</option>
                    </select>
                </span>
            </p>
            <p>
                อำเภอ : *
                <span id="amphur">
                    <select>
                        <option value='0'>- เลือกอำเภอ -</option>
                    </select>
                </span>
            </p>
            <p>
                ตำบล : *
                <span id="district">
                    <select>
                        <option value='0'>- เลือกตำบล -</option>
                    </select>
                </span>
            </p>
    &emsp; รหัสไปรษณีย์ <input type="text" name="xm1s100" size="15">
    <span class="error">* <?php echo $emailErr; ?></span>

    &emsp; โทร <input type="text" name="xm1s110" size="15">
    <span class="error">* <?php echo $emailErr; ?></span>
    <br><br>
    <br><br>

  ข้อมูล บิดา <br><br>

  ชื่อ <input type="text" name="xm1s120">
  <span class="error">* <?php echo $emailErr; ?></span>

  สกุล <input type="text" name="xm1s130">
  <span class="error">* <?php echo $emailErr; ?></span>
  <br><br>

  &emsp; อาชีพ <input type="text" name="xm1s140">
  <span class="error">* <?php echo $emailErr; ?></span>

  &emsp; โทร <input type="text" name="xm1s150">
  <span class="error">* <?php echo $emailErr; ?></span>

  <br><br>
  <br><br>

  ข้อมูล มารดา <br><br>

&emsp; คำนำหน้านาม <input type="text" name="xm1s160" value="<?php echo $name; ?>">
<span class="error">* <?php echo $nameErr; ?></span>

ชื่อ <input type="text" name="xm1s170">
<span class="error">* <?php echo $emailErr; ?></span>

สกุล <input type="text" name="xm1s180">
<span class="error">* <?php echo $emailErr; ?></span>
<br><br>

&emsp; อาชีพ <input type="text" name="xm1s190">
<span class="error">* <?php echo $emailErr; ?></span>

&emsp; โทร <input type="text" name="xm1s200">
<span class="error">* <?php echo $emailErr; ?></span>

<br><br>
<br><br>

ข้อมูล ผู้ปกครอง <br><br>

&emsp; คำนำหน้านาม <input type="text" name="xm1s210">
<span class="error">* <?php echo $nameErr; ?></span>

ชื่อ <input type="text" name="xm1s220">
<span class="error">* <?php echo $emailErr; ?></span>

สกุล <input type="text" name="xm1s230">
<span class="error">* <?php echo $emailErr; ?></span>
<br><br>

&emsp; เกี่ยวข้องกับนักเรียน <input type="text" name="xm1s240">
<span class="error">* <?php echo $emailErr; ?></span>

&emsp; โทร <input type="text" name="xm1s250">
<span class="error">* <?php echo $emailErr; ?></span>

<br><br>
<br><br>
<br><br>

3. กำลังศึกษาชั้น ป. 6 หรือจบ ป. 6
  <br><br>
  &emsp; จากโรงเรียน <input type="text" name="xm1s260">
  <span class="error">* <?php echo $emailErr; ?></span>
  &emsp; จังหวัด <input type="text" name="xm1s280">
  <span class="error">* <?php echo $emailErr; ?></span>
  &emsp; อำเภอ <input type="text" name="xm1s270">
  <span class="error">* <?php echo $emailErr; ?></span>

  <br><br>
  <br><br>

  4. สมัครโครงการ  (สมัครได้เพียง 1 โครงการ)
  <br><br>

  &emsp; โครงการ: <br><br>
  &emsp;&emsp; <input type="radio" name="xm1s290" value="1"> SMTE ผลการเรียนเฉลี่ยชั้นประถมศึกษาปีที่ 4 และ 5 ดังนี้<br><br>


  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; วิชาคณิตศาสตร์พื้นฐาน <input type="text" name="xm1s300">
  <span class="error">* <?php echo $emailErr; ?></span>
  &emsp;&emsp; วิทยาศาสตร์พื้นฐาน <input type="text" name="xm1s310">
  <span class="error">* <?php echo $emailErr; ?></span>
  <br><br>
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; ผลการเรียนเฉลี่ยรวม <input type="text" name="xm1s320">
  <span class="error">* <?php echo $emailErr; ?></span>
  <br><br>

  &emsp;&emsp; <input type="radio" name="xm1s290" value="2"> IP แผนการเรียน ภาษาอังกฤษ - คณิตศาสตร์ <br><br>
  &emsp;&emsp; <input type="radio" name="xm1s290" value="3"> IP แผนการเรียน วิทยาศาสตร์ - คณิตศาสตร์ <br><br>
  &emsp;&emsp; <input type="radio" name="xm1s290" value="4"> IPC แผนการเรียน Cambridge <br><br>
  <span class="error"> <?php echo $genderErr; ?></span>


  &emsp;&emsp;&emsp;&emsp;&emsp; ผู้สมัครโครงการ IP เลือกข้อสอบ : <br><br>

  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="xm1s330" value="th"> ภาษาไทย <br><br>
  &emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="radio" name="xm1s330" value="eng"> ภาษาอังกฤษ <br><br>
  <span class="error"><?php echo $genderErr; ?></span>
  <br><br>

  4. หลักฐานการสมัคร (เอกสาร Upload)  <br><br>

  &emsp;&emsp;&emsp; <input type="checkbox" name="sel_2" value="s1"> รูปถ่าย <br><br>
  &emsp;&emsp;&emsp; <input type="checkbox" name="sel_2" value="s2"> หนังสือรับรองผลการเรียนวิชาวิทยาศาสตร์และคณิตศาสตร์ หรือ ปพ. 1 (โครงการ SMTE)<br><br>
  &emsp;&emsp;&emsp; <input type="checkbox" name="sel_2" value="s3"> เอกสารความเป็นนักเรียน (โครงการ IP) <br><br>
  <span class="error"><?php echo $genderErr; ?></span>
  <br><br>


  <input type="submit" name="submit" value="Submit">


  <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["price1"])) {
        $nameErr = "Name is required";
    } else {
        $price1 = testInput($_POST["price1"]);
    }

}
?>


</form>

<?php
echo "<h2>Your Input:</h2>";
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $website;
echo "<br>";
echo $comment;
echo "<br>";
echo $gender;
?>

	<p></p>
  </article>

</section>


</body>
<!--<footer>
  <p>Footer</p>
</footer> -->

</html>
