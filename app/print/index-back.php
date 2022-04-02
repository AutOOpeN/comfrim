<!DOCTYPE html>
<html lang="en">
    <head>
        <title>ระบบรับนักเรียน โครงการพิเศษ ปีการศึกษา 2562</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="../../bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
    <script src="../js/spk.js"></script>
    <body>

        <div class="text-center">
        <img src="../../spkimg/head1.gif" class ="img-fluid pull-center">
            <div class="container">
                <h1 class="jumbotron-heading">ระบบรับนักเรียนปีการศึกษา 2562 </h1>
                <hr>
            </div>
        </div>

        <div class="container">
        	<form action="../bill/payment.php" method="POST">
        		<fieldset class="myfieldset">
                    <legend class="myfieldset">ค้นหาใบสมัคร</legend>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label for="xm1s050">เลขที่บัตรประชาชน: </label>
                            <input type="text" class="form-control" name="id_card"  placeholder="เลขที่บัตรประชาชน" required>
                        </div>
                        <div class="col-md-4 mb-3">
                        <label for="myOptionMM">โครงการที่สมัคร</label>
                        <select id="myOptionMM" name="plan" class="custom-select"  required>
                            <option value="">โครงการที่สมัคร</option>
                            <option value="m1_smte">โครงการ SMTE ชั้นมัธยมศึกษาปีที่ 1</option>
                            <option value="m1_ip">โครงการ IP ชั้นมัธยมศึกษาปีที่ 1</option>
                            <option value="m4_smte">โครงการ SMTE ชั้นมัธยมศึกษาปีที่ 4</option>
                            <option value="m4_ip">โครงการ IP ชั้นมัธยมศึกษาปีที่ 4</option>
                        </select>
                    	</div>
                    </div>
                </fieldset>
        	                <button class="btn btn-primary" type="submit"><i class="fas fa-print"></i> พิมพ์ใบชำระเงิน</button>
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
