<?php
    function statusFiles($strPlan, $strIDCARD, $strStatus, $numberOfFile ){
        switch ($strStatus){
            case 0:
                $txtSatus = "ยังไม่ส่งหลักฐาน";
                $strBg= "bg-secondary";
                break;
            case 1:
                $txtSatus = "รอตรวจหลักฐาน";
                $strBg = "bg-info";
                break;
            case 2:
                $txtSatus = "หลักฐานสมบูรณ์";
                $strBg = "bg-success";
                break;
            default:
                $txtSatus = "";
                $strBg = "bg-transparent";
            }

        $status = '<a href="update.php?file='. $numberOfFile .'&p='. $strPlan .'&idcard=%27' . $strIDCARD . '%27" ><span class="badge rounded-pill ' . $strBg . ' ">' . $txtSatus . '</span></a>';
        return $status;
    }