<!DOCTYPE html>
<html>
<head>
	<title></title>
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
<form action="insert.php" method="POST">
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
  <input type="submit" name="submit" value="Submit">
</form>
</body>
</html>
