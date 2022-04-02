<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel='stylesheet' type='text/css' href='../../css/student/student.css'>
    <link rel='stylesheet' type='text/css' href='../../css/student/signin.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>ประกาศผลสอบ ห้องเรียนทั่วไป | โรงเรียนสตรีภูเก็ต  </title>
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="post" action="login_action.php">
            <img class="mb-4" src="../../images/logo_spk.gif" alt="logo" width="120" height="150">
            <h1 class="h1 mb-3 fw-normal text-primary">โรงเรียนสตรีภูเก็ต</h1>
            <h2 class="h3 mb-3 fw-normal">ประกาศผลการสอบ</h2>
            <h2 class="h3 mb-3 fw-normal">รายงานตัวและมอบตัว</h2>
            <h3 class="h4 mb-3 fw-normal">ห้องเรียนทั่วไป</h3>

            <div class="form-floating">
                <input type="text" name="id_card" class="form-control" id="floatingInput" placeholder="เลขประจำตัวประชาชน">
                <label for="floatingInput">เลขประจำตัวประชาชน</label>
            </div>
            <div class="form-floating">
                <input type="text" name="id_exam" class="form-control" id="floatingPassword" placeholder="เลขที่นั่งสอบ">
                <label for="floatingPassword">เลขที่นั่งสอบ</label>
            </div>

            
            <button class="w-100 btn btn-lg btn-primary" type="submit">เข้าสู่ระบบ</button>

            <p class="mt-5 mb-3 text-muted">&copy; งานรับนักเรียน กลุ่มบริหารวิชาการ <?php  echo date("Y") + 543;  ?></p>
        </form>
    </main>
</body>

</html>