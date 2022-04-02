<?php
include_once '../config/config.inc.php';
include_once '../class/PDO.class.php';

?>
<head>
  <script scr="js/jquery-3.3.1.min.js"></script>
</head>
<body>
<?php
$database = new DB(DBHost, DBName2, DBUser, DBPassword);
$result   = $database->query("SELECT * FROM province  ORDER BY CONVERT(PROVINCE_NAME USING TIS620) ASC ");

// ตรวจสอบ

if (!empty($result)) {
// พบข้อมูล
    // echo '<label>   จังหวัด : </label>';
    echo '<select id="province" name="province">';
    /*
    foreach ($result as $province) {
    echo '<option value="' . $province->PROVINCE_ID . '">' . $province->PROVINCE_NAME . '</option>';
    }
     */
    foreach ($result as $key => $x_value) {
        # code...
        foreach ($x_value as $key2 => $value) {
            # code...
            //echo "<br />key2 = {$key2}  value =  {$value}<hr />";
            //echo $value;
            if ($key2 == "PROVINCE_NAME") {
                # code...
                $p_name = "{$value}";
            } elseif ($key2 == "PROVINCE_ID") {
                $p_id = "{$value}";
            }
        }
        echo "<option value='$p_id'>$p_name</option>";
    }
    echo '</select>';
}

// อำเภอ
echo '<label>   อำเภอ : </label>';
echo '<select id="amphoe" name="amphoe">';
echo '<option value=""> --- กรุณาเลือกจังหวัด (ก่อน) --- </option>';
echo '</select>';

// ตำบล
echo '<label>   ตำบล : </label>';
echo '<select id="district" name="district">';
echo '<option value=""> --- กรุณาเลือกอำเภอ (ก่อน) --- </option>';
echo '</select>';

?>
<script type="text/javascript">
    jQuery(function($) {
        jQuery('body').on('change','#province',function(){
            jQuery.ajax({
                'type':'POST',
                'url':'amphoe.php',
                'cache':false,
                'data':{province:jQuery(this).val()},
                'success':function(html){
                    jQuery("#amphoe").html(html);
                }
            });
            return false;
        });
         jQuery('body').on('change','#amphoe',function(){
            jQuery.ajax({
                'type':'POST',
                'url':'district.php',
                'cache':false,
                'data':{amphoe:jQuery(this).val()},
                'success':function(html){
                    jQuery("#district").html(html);
                }
            });
            return false;
        });
    });
</script>
</body>
