<?php
    function statusFiles($strPlan, $strIDCARD, $strStatus, $numberOfFile,$classRoom ){
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

        $status = '<a href="update.php?m= '. $classRoom .'&file='. $numberOfFile .'&p='. $strPlan .'&idcard=%27' . $strIDCARD . '%27" ><span class="badge rounded-pill ' . $strBg . ' ">' . $txtSatus . '</span></a>';
        return $status;
    }

    function statusFilesToExcel($strStatus){
        switch ($strStatus){
            case 0:
                $fStatus = "ยังไม่ส่งหลักฐาน";
                break;
            case 1:
                $fStatus = "รอตรวจหลักฐาน";
                break;
            case 2:
                $fStatus = "หลักฐานสมบูรณ์";
                break;
            default:
                $fStatus = "";
            }        
        return $fStatus;
    }    