<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' type='text/css' href='../../admission/css/adminindex.css'>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin | โครงการพิเศษ</title>
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
                    <span class="profession">ระบบรับนักเรียน</span>
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
                        <a href="stat.php">
                        <i class='bx bxs-dashboard icon'></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="status.php">
                        <i class='bx bx-list-check icon'></i>
                            <span class="text nav-text">ตรวจเอกสารผู้สมัคร</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-grid icon"></i>
                            <span class="text nav-text">ห้องสอบ</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-cog icon"></i>
                            <span class="text nav-text">ตั้งค่าระบบ</span>
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
            Dashboard
        </div>
    </section>


    <script src="../../admission/js/adminindex.js"></script>
</body>
</html>