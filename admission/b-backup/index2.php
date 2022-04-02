<?php
require_once 'config/settings.config.php';
require_once "config/function.php";
$spkObject = new spk();
$spkObject->spkHeader();
?>
<link rel='stylesheet' type='text/css' href='css/app_css.css'>
<body>
	<div class="container-top">
		<img src="../spkimg/head1.gif" alt="header" width="100%" height="150" class="responsive">
	</div>
	<div class=" text-center">
		<div class="container">
			<h1 class="jumbotron-heading">โรงเรียนสตรีภูเก็ต </h1>
			<p class="lead text-muted">ระบบรับนักเรียนปีการศึกษา 2562</p>
			<br>
			<h3>ประกาศรับสมัคร &raquo;
			<a href="pdf/M1_SMTE_IP.pdf" >ระดับชั้นมัธยมศึกษาปีที่ 1 &raquo;</a>
			<a href="pdf/M4_SMTE_IP.pdf" >ระดับมัธยมศึกษาปีที่ 4 &raquo;</a></h3>
		</div>
	</div>
	<div class="container-fluid text-center">
		<div class="row content">
			<div class="col-sm-2 sidenav">
				<p><a href="#">หน้าแรก</a></p>
				<p><a href="#">พิมพ์ใบสมัคร</a></p>
				<p><a href="#">รายงาน</a></p>
			</div>
			<div class="col-sm-10 text-left">
				<main role="main">
					<!-- Main jumbotron for a primary marketing message or call to action -->
					<div>
						<div class="container">
							<h2 class="card text-center text-white bg-info">ขั้นตอนการสมัครออนไลน์</h2>
							<div class="row">
								<div class="col-sm-12">
									<div class="card text-center text-white bg-info">
										<div class="card-header">
											1. ตรวจสอบรายละเอียดผู้สมัคร
										</div>
										<div class="card-body">
											<h5 class="card-title">ตรวจสอบรายละเอียดของผู้สมัคร และไฟล์สำเนาเอกสารการสมัครพร้อมรับรองสำเนาถูกต้องทุกหน้าก่อนการ Upload</h5>
										</div>
									</div>
									<br>
									<div class="card text-center text-white bg-info">
										<div class="card-header">
											2. กรอกใบสมัคร
										</div>
										<div class="card-body">
											<h5 class="card-title">กรอกใบสมัครจากแบบฟอร์มออนไลน์ด้านล่าง</h5>
										</div>
									</div>
									<br>
									<div class="card text-center text-white bg-info">
										<div class="card-header">
											3. พิมแบบฟอร์มชำระเงิน
										</div>
										<div class="card-body">
											<h5 class="card-title">พิมพ์แบบฟอร์มชำระเงิน นำไปชำระได้ที่เคาน์เตอร์ธนาคารกรุงไทยจนถึงวันที่ 27 มีนาคม 2562 เท่านั้น</h5>
										</div>
									</div>
									<br>
									<div class="card text-center text-white bg-info">
										<div class="card-header">
											4. ตรวจสอบรายชื่อผู้มีสิทธิ์สอบ
										</div>
										<div class="card-body">
											<h5 class="card-title">ประกาศรายชื่อผู้มีสิทธิ์สอบและสถานที่สอบในวันที่ 29 มีนาคม 2562</h5>
										</div>
									</div>
									<br>
								</div>
							</div>
							<br>
						</div>
						<br>
						<hr>
						<div class="text-white text-center bg-info">
							<h2><i class="fas fa-sign-in-alt"></i> สมัครสอบ</h2>
						</div>
						<p></p>
						<!-- สมัครออนไลน์ -->
						<div class="row">
							<div class="col-sm-12">
								<div class="card text-center text-white bg-info">
									<div class="card-header">
										ระดับชั้นมัธยมศึกษาปีที่ 1
									</div>
									<div class="card-body">
										<p class="card-text"><a href="pdf/M1_SMTE_IP.pdf" class="btn btn-secondary">รายละเอียดผู้สมัครระดับชั้นมัธยมศึกษาปีที่ 1</a></p>
										<p class="card-text"><a href="#" class="btn btn-secondary">สมัคร ระดับชั้นมมัธยมศึกษาปีที่ 1 </a></p>
										<p class="card-text"><a href="#" class="btn btn-secondary">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 1 </a></p>
										<p class="card-text"><a href="#" class="btn btn-secondary">บันทึกคะแนน โอเน็ต สำหรับผู้ที่สมัครก่อนวันที่ 25 มีนาคม 2562 </a></p>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-sm-12">
								<div class="card text-center text-white bg-primary">
									<div class="card-header">
										ระดับชั้นมัธยมศึกษาปีที่ 4
									</div>
									<div class="card-body">
										<p class="card-text"><a href="pdf/M4_SMTE_IP.pdf" class="btn btn-secondary">รายละเอียดผู้สมัครระดับชั้นมัธยมศึกษาปีที่ 4</a></p>
										<p class="card-text"><a href="#" class="btn btn-secondary">สมัคร ระดับชั้นมัธยมศึกษาปีที่ 4 </a></p>
										<p class="card-text"><a href="#" class="btn btn-secondary">ตรวจสอบสถานะผู้สมัคร ระดับชั้นมัธยมศึกษาปีที่ 4 </a></p>
										<p class="card-text"><a href="#" class="btn btn-secondary">บันทึกคะแนน โอเน็ต สำหรับผู้ที่สมัครก่อนวันที่ 26 มีนาคม 2562 </a></p>
									</div>
								</div>
							</div>
						</div>
						<hr>
						<div class="text-center bg-primary">
							<a href="#" class="btn btn-primary"><h2><i class="fas fa-print"></i> พิมพ์ใบชำระเงิน</h2></a>
							<hr>
						</div>
					</div>
			<!-- 	</div> -->
			</main>
		</div>
		<?php
$spkObject->spkFooter();
?>
	<!-- </div>
</div> -->
</body>
</html>