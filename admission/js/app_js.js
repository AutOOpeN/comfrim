// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                alert("กรุณากรอกข้อมูลให้ครบ (ช่องที่มีกรอบสีแดง)");
                    }
                form.classList.add('was-validated');

            }, false);
        });
    }, false);
})();

function Inint_AJAX() {
    try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
    try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
    try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
    alert("XMLHttpRequest not supported");
    return null;
 };

 function dochange(src, val) {
      var req = Inint_AJAX();
      req.onreadystatechange = function () {
           if (req.readyState==4) {
                if (req.status==200) {
                     document.getElementById(src).innerHTML=req.responseText; //รับค่ากลับมา
                } // End If
           } // End If
      }; // End Function
      req.open("GET", "localtion.php?data="+src+"&val="+val); //สร้าง connection
      req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
      req.send(null); //ส่งค่า
 } window.onLoad=dochange('province', -1);
 // =========================================================================================
function dochange_3(src_3, val_3) {
      var req = Inint_AJAX();
      req.onreadystatechange = function () {
           if (req.readyState==4) {
                if (req.status==200) {
                     document.getElementById(src_3).innerHTML=req.responseText; //รับค่ากลับมา
                } // End If
           } // End If
      };
      req.open("GET", "localtion_3.php?data="+src_3+"&val="+val_3); //สร้าง connection
      req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8"); // set Header
      req.send(null); //ส่งค่า
 } window.onLoad=dochange_3('province_3', -1);
 // =========================================================================================
// คำนำหน้านาม
function setValue(e, target10, target11) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target10).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target11).value = seclectedValue;
}
function setValueDD(e, target40dd, target41dd) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target40dd).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target41dd).value = seclectedValue;
}
function setValueMM(e, target40mm, target41mm) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target40mm).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target41mm).value = seclectedValue;
}
function setValueYY(e, target40yy, target41yy) {
    var seclectedText = e.options[e.selectedIndex].text;
    document.getElementById(target40yy).value = seclectedText;

    var seclectedValue = e.value;
    document.getElementById(target41yy).value = seclectedValue;
}

$('#customFile1').on('change',function(){
    //get the file name
    var fileName = $(this).val();
    //replace the "Choose a file" label
    $(this).next('.custom-file-label').html(fileName);
})


function autoTab(obj){ 
    /* กำหนดรูปแบบข้อความโดยให้ _ แทนค่าอะไรก็ได้ แล้วตามด้วยเครื่องหมาย 
    หรือสัญลักษณ์ที่ใช้แบ่ง เช่นกำหนดเป็น รูปแบบเลขที่บัตรประชาชน 
    4-2215-54125-6-12 ก็สามารถกำหนดเป็น _-____-_____-_-__ 
    รูปแบบเบอร์โทรศัพท์ 08-4521-6521 กำหนดเป็น __-____-____ 
    หรือกำหนดเวลาเช่น 12:45:30 กำหนดเป็น __:__:__ 
    ตัวอย่างข้างล่างเป็นการกำหนดรูปแบบเลขบัตรประชาชน 
    */ 
    var pattern=new String("__-____-____"); // กำหนดรูปแบบในนี้ 
    var pattern_ex=new String("-"); // กำหนดสัญลักษณ์หรือเครื่องหมายที่ใช้แบ่งในนี้ 
    var returnText=new String(""); 
    var obj_l=obj.value.length; 
    var obj_l2=obj_l-1; 

    for(i=0;i<pattern.length;i++){ 
        if(obj_l2==i && pattern.charAt(i+1)==pattern_ex){ 
            returnText+=obj.value+pattern_ex; 
            obj.value=returnText; 
        } 
    } 
    if(obj_l>=pattern.length){ 
        obj.value=obj.value.substr(0,pattern.length); 
    } 
} 
/* ID CARD */
function Numbers(e){
	var keynum;
	var keychar;
	var numcheck;
	if(window.event) {// IE
	  keynum = e.keyCode;
	}
	else if(e.which) {// Netscape/Firefox/Opera
	  keynum = e.which;
	}
	if(keynum == 13 || keynum == 8 || typeof(keynum) == "undefined"){
			return true;
	}
	keychar= String.fromCharCode(keynum);
	numcheck = /^[0-9]$/;
	return numcheck.test(keychar);
}

function keyup(obj,e){
	var keynum;
	var keychar;
    var id = '';
	if(window.event) {// IE
	  keynum = e.keyCode;
	}
	else if(e.which) {// Netscape/Firefox/Opera
	  keynum = e.which;
	}
	keychar= String.fromCharCode(keynum); 

	var tagInput = document.getElementsByTagName('input');
	for(i=0;i<=tagInput.length;i++){
		if(tagInput[i] == obj){ 
			var prevObj = tagInput[i-1];
			var nextObj = tagInput[i+1];
			break;
		}
	} 
	if(obj.value.length == 0 && keynum == 8) prevObj.focus();
	
	if(obj.value.length == obj.getAttribute('maxlength')){ 
       id = obj.value;
        if(checkID(id)){ 
            obj.style.borderColor = "green";    
        nextObj.focus();
        }
        else
        {
            alert('รหัสบัตรประจำตัวประชาชนไม่ถูกต้อง !!');
            obj.style.borderColor = "red";
            obj.focus();
        }
		//nextObj.focus();
	}
	
}

function checkID(id){
	if(id.length != 13) return false;
	for(i=0, sum=0; i < 12; i++)
        sum += parseFloat(id.charAt(i))*(13-i);
        //console.log(sum); 
	if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false; 
	return true;
}

function SplitString($str)
{
    $checkAt = substr_count($str, "@"); //นับจำนวน @
    if ($checkAt == 1) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); // id
        $myString[1] = substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)); // name
        return $myString;
    } elseif ($checkAt == 2) {
        $myString[0] = str_replace(strchr($str, "@"), "", $str); //id
        $myString[1] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), 0, strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@"));
        $myString[2] = substr(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), (strpos(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1)), "@") + 1), (strlen(substr($str, (strpos($str, "@") + 1), (strlen($str) - 1))) - 1));
        return $myString;
    } else {
        return false;
    }

}
			