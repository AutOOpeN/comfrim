<?php
include("config/stat.inc.php");
?>
<link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.css">
<div>
    <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 1</p>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>แผนการรับ</th>
                <th colspan="3" class="text-center bg-warning">24 เม.ย. 64</th>
                <th colspan="3" class="text-center">25 เม.ย. 64</th>
                <th colspan="3" class="text-center bg-warning">26 เม.ย. 64</th>
                <th colspan="3" class="text-center">27 เม.ย. 64</th>
                <th colspan="3" class="text-center bg-warning">28 เม.ย. 64</th>
                <th colspan="3" class="text-center bg-success">รวมทั้งสิ้น</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td class="bg-warning">ในเขต</td>
                <td class="bg-warning">นอกเขต</td>
                <td class="bg-warning">รวม</td>
                <td>ในเขต</td>
                <td>นอกเขต</td>
                <td>รวม</td>
                <td class="bg-warning">ในเขต</td>
                <td class="bg-warning">นอกเขต</td>
                <td class="bg-warning">รวม</td>
                <td>ในเขต</td>
                <td>นอกเขต</td>
                <td>รวม</td>
                <td class="bg-warning">ในเขต</td>
                <td class="bg-warning">นอกเขต</td>
                <td class="bg-warning">รวม</td>
                <td class="bg-success">ในเขต</td>
                <td class="bg-success">นอกเขต</td>
                <td class="bg-success">รวม</td>

            </tr>
            <tr>
                <td>ทั่วไป</td>
                <td class="bg-warning"><?php echo $m1_in_03 ?></td>
                <td class="bg-warning"> <?php echo $m1_out_03 ?></td>
                <td class="bg-warning"> <?php echo $m1_in_03 + $m1_out_03 ?></td>
                <td><?php echo $m1_in_04 ?></td>
                <td><?php echo $m1_out_04 ?></td>
                <td><?php echo $m1_in_04 + $m1_out_04 ?></td>
                <td class="bg-warning"><?php echo $m1_in_05 ?></td>
                <td class="bg-warning"><?php echo $m1_out_05 ?></td>
                <td class="bg-warning"><?php echo $m1_in_05 + $m1_out_05 ?></td>
                <td><?php echo $m1_in_06 ?></td>
                <td><?php echo $m1_out_06 ?></td>
                <td><?php echo $m1_in_06 + $m1_out_06 ?></td>
                <td class="bg-warning"><?php echo $m1_in_07 ?></td>
                <td class="bg-warning"><?php echo $m1_out_07 ?></td>
                <td class="bg-warning"><?php echo $m1_in_07 + $m1_out_07 ?></td>
                <td class="bg-success"><?php echo $total_m1_in ?></td>
                <td class="bg-success"><?php echo $total_m1_out ?></td>
                <td class="bg-success"><?php echo $total_m1_in + $total_m1_out ?></td>

            </tr>


        </tbody>
    </table>

    <p class="h3 bg-primary text-center">ชั้นมัธยมศึกษาปีที่ 4</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>แผนการรับ</th>
                <th colspan="3" class="text-center bg-warning">24 เม.ย. 64</th>
                <th colspan="3" class="text-center">25 เม.ย. 64</th>
                <th colspan="3" class="text-center bg-warning">26 เม.ย. 64</th>
                <th colspan="3" class="text-center">27 เม.ย. 64</th>
                <th colspan="3" class="text-center bg-warning">28 เม.ย. 64</th>
                <th colspan="3" class="text-center bg-success">รวมทั้งสิ้น</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td class="bg-warning">ม.3 รร.เดิม</td>
                <td class="bg-warning">ม.3 รร.อื่น</td>
                <td class="bg-warning">รวม</td>
                <td>ม.3 รร.เดิม</td>
                <td>ม.3 รร.อื่น</td>
                <td>รวม</td>
                <td class="bg-warning">ม.3 รร.เดิม</td>
                <td class="bg-warning">ม.3 รร.อื่น</td>
                <td class="bg-warning">รวม</td>
                <td>ม.3 รร.เดิม</td>
                <td>ม.3 รร.อื่น</td>
                <td>รวม</td>
                <td class="bg-warning">ม.3 รร.เดิม</td>
                <td class="bg-warning">ม.3 รร.อื่น</td>
                <td class="bg-warning">รวม</td>
                <td class="bg-success">ม.3 รร.เดิม</td>
                <td class="bg-success">ม.3 รร.อื่น</td>
                <td class="bg-success">รวม</td>

            </tr>
            <tr>
                <td>ทั่วไป</td>
                <td class="bg-warning"><?php echo $m4_in_03 ?></td>
                <td class="bg-warning"> <?php echo $m4_out_03 ?></td>
                <td class="bg-warning"> <?php echo $m4_in_03 + $m4_out_03 ?></td>
                <td><?php echo $m4_in_04 ?></td>
                <td><?php echo $m4_out_04 ?></td>
                <td><?php echo $m4_in_04 + $m4_out_04 ?></td>
                <td class="bg-warning"><?php echo $m4_in_05 ?></td>
                <td class="bg-warning"><?php echo $m4_out_05 ?></td>
                <td class="bg-warning"><?php echo $m4_in_05 + $m4_out_05 ?></td>
                <td><?php echo $m4_in_06 ?></td>
                <td><?php echo $m4_out_06 ?></td>
                <td><?php echo $m4_in_06 + $m4_out_06 ?></td>
                <td class="bg-warning"><?php echo $m4_in_07 ?></td>
                <td class="bg-warning"><?php echo $m4_out_07 ?></td>
                <td class="bg-warning"><?php echo $m4_in_07 + $m4_out_07 ?></td>
                <td class="bg-success"><?php echo $total_m4_in ?></td>
                <td class="bg-success"><?php echo $total_m4_out ?></td>
                <td class="bg-success"><?php echo $total_m4_in + $total_m4_out ?></td>

            </tr>


        </tbody>
    </table>
</div>