<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	<script type="text/javascript"> 
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
		for(i=0;i<=tagInput.length;i++){
			if(tagInput[i].id.substring(0,5) == 'txtID'){ 
				if(tagInput[i].value.length == tagInput[i].getAttribute('maxlength')){
					id += tagInput[i].value;
					if(tagInput[i].id == 'txtID5') break;
				}
				else{
					tagInput[i].focus();
					return;
				}
			}
		} 
		if(checkID(id)) nextObj.focus();
		else alert('รหัสประชาชนไม่ถูกต้อง');
		nextObj.focus();
	}
	
}

function checkID(id){
	if(id.length != 13) return false;
	for(i=0, sum=0; i < 12; i++)
		sum += parseFloat(id.charAt(i))*(13-i); 
	if((11-sum%11)%10!=parseFloat(id.charAt(12)))
		return false; 
	return true;
}
</script>
<form id="form1" name="form1" method="post">

รหัสประจำตัวประชาชน : 
<input type="text" name="txtID1" id="txtID1" style="width:12px" maxlength=1 onkeyup="keyup(this,event)" onkeypress="return Numbers(event)" /> - 
<input type="text" name="txtID2" id="txtID2" style="width:35px" maxlength=4 onkeyup="keyup(this,event)" onkeypress="return Numbers(event)" /> - 
<input type="text" name="txtID3" id="txtID3" style="width:40px" maxlength=5 onkeyup="keyup(this,event)" onkeypress="return Numbers(event)" /> - 
<input type="text" name="txtID4" id="txtID4" style="width:20px" maxlength=2 onkeyup="keyup(this,event)" onkeypress="return Numbers(event)" /> - 
<input type="text" name="txtID5" id="txtID5" style="width:12px" maxlength=1 onkeyup="keyup(this,event)" onkeypress="return Numbers(event)" />
</form> 
</body>
</html>