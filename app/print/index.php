<?php

require "../../config/function.php";
require_once '../../config/settings.config.php';
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
                <div class="alert alert-primary" role="alert">
                  <h1> ปิดรับสมัคร</h1>
                </div>

                <hr>
            </div>
        </div>

        <div class="container">

<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>
    </div>



</script>
    <?php
$spkObject->spkFooter();
?>
    </body>

</html>
