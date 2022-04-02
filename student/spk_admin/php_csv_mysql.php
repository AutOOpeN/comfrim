<?php
    include($_SERVER['DOCUMENT_ROOT']. "/config/configAPP.inc.php");

?>




<table align="center" width="800" border="1" style="border-collapse:collapse; border:1px solid #ddd;" cellpadding="5" cellspacing="0">
	<thead>
		<tr bgcolor="#FFCC00">
			<th>0 เลขประจำตัวสอบ</th>
			<th>1 เลขประจำตัวประชาชน</th>
			<th>2 ชื่อ-สกุล</th>
			<th>3 วิทย์(50)</th>
			<th>4 คณิต(50)</th>
			<th>5 รวม(100)</th>
			<th>6 สอบได้ลำดับที่</th>
			<th>7 ผลสอบสถานะ</th>
			<th>8 ผลสอบสถานะ</th>
			<th>9 ผลสอบสถานะ</th>
		</tr>
	</thead>
	<tbody>
	<?php


$conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if(($handle		=	fopen("m4-ip-cam.csv", "r")) !== FALSE){
	$n			=	1;
    
	while(($row	=	fgetcsv($handle)) !== FALSE){

		// $sql = "UPDATE ex_m4_s_result SET sci =". $row[3] .", math = ". $row[4] .", result_no = '". $row[6] ."', result_status = ". $row[7] .", result_text = '". $row[8] ."' WHERE ref1 = '" . $row[1] . "'";
		// $sql = "UPDATE ex_m4_ip_result SET math =". $row[3] .", eng = ". $row[4] . ", interview = ". $row[5] .", result_no = '". $row[7] ."', result_status = ". $row[8] .", result_text = '". $row[9] ."' WHERE ref1 = '" . $row[1] . "'";
		$sql = "UPDATE ex_m4_ip_cam_result SET sci =". $row[3] .", math = ". $row[4] . ", eng = " .$row[5] .", interview = ". $row[6] .", result_no = '". $row[8] ."', result_status = ". $row[9] .", result_text = '". $row[10] ."' WHERE ref1 = '" . $row[1] . "'";
        // echo $sql . "<br>";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        
        
        // if($n>1){
				?>
				<tr>
					<td><?php echo $row[0];?></td>
					<td><?php echo $row[1];?></td>
					<td><?php echo $row[2];?></td>
					<td><?php echo $row[3];?></td>
					<td><?php echo $row[4];?></td>
					<td><?php echo $row[5];?></td>
					<td><?php echo $row[6];?></td>
					<td><?php echo $row[7];?></td>
					<td><?php echo $row[8];?></td>
					<td><?php echo $row[9];?></td>

				</tr>
				<?php
		// 	}
		// 	$n++;
		}
		fclose($handle);
	}
	?>
	</tbody>
</table>