<?php
$reg_id = 9999;
if ($reg_id < 1000) {
    if ($reg_id < 10) {
        $reg_id = "000".$reg_id;
    }elseif($reg_id < 100) {
      $reg_id = "00".$reg_id;
    }else{
      $reg_id= "0".$reg_id;
    }
  }

echo $reg_id;
?>