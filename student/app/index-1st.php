<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel='stylesheet' type='text/css' href='../../css/student/student_style.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>โรงเรียนสตรีภูเก็ต |ประกาศผลสอบ โครงการพิเศษ</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="../../images/logo_spk.gif" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">โรงเรียนสตรีภูเก็ต</span>
                    <span class="profession">ประกาศผลสอบ</span>
                </div>
            </div>
            
            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">          
                    <i class="bx bx-search icon"></i>
                    <input type="text" placeholder="ค้นหา.....">
                </li>                
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                        <i class='bx bxs-dashboard icon'></i>
                            <span class="text nav-text">หน้าแรก</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                        <i class='bx bx-list-check icon'></i>
                            <span class="text nav-text">รายงานตัว</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">ออกจากระบบ</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="moon-sun">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>    
                    </div>
                    <span class="mode-text text">Dark Mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <section class="home">
        <div class="text">
            โรงเรียนสตรีภูเก็ต : {{แผนการเรียน}}
        </div>
        <div class="detail">
            <p>ชื่อ - นามสกุล : {{ชื่อ - นามสกุล}}</p>
            <p>เลขประจำตัวประชาชน : {{เลขประจำตัวประชาชน}}</p>
            <p>รหัสประจำตัวสอบ : {{รหัสประจำตัวสอบ}}</p>
            <p>ระดับชั้นมัธยมศึกษาปีที่ : {{ระดับชั้น}}</p>
            <p>แผนการเรียน : {{แผนการเรียน}}</p>
        </div>

        <div class="result">
            <div class="text">
                ผลคะแนนสอบ        
                <hr>
            </div>
            <table class="table_background">
                <tr>
                    <th>{{คณิตศาสตร์({{20}})}}</th>
                    <th>{{ภาษาอังกฤษ({{50}})}}</th>
                    <th>{{สัมภาษณ์({{30}})}}</th>
                    <th>{{รวม({{100}})}}</th>                    
                </tr>
                <tr>
                    <td>{{คะแนน คณิตศาสตร์}}</td>
                    <td>{{คะแนน ภาษาอังกฤษ}}</td>
                    <td>{{คะแนน สัมภาษณ์}}</td>
                    <td>{{คะแนน รวม}}</td>                    
                </tr>
                
            </table>
            <table>
                <tr>
                    <th>ลำดับที่สอบได้</th>
                    <th>ผลการสอบ</th>
                </tr>
                <tr>
                    <td>{{ลำดับที่สอบได้}}</td>
                    <td>{{ผลการสอบ}}</td>
                </tr>
            </table>
        </div>

        <div class="link_btn">
            <button class="button" onclick="myFunction()">พิมพ์ใบรายงานผลการสอบ</button>
        </div>
    </section>


    <script src="../../js/student/student.js"></script>
</body>
</html>