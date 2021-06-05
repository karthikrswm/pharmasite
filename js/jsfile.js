
function validate() {

 var var1 = document.getElementById("email_jsid");
 var var2 = document.getElementById("username_jsid");
 var var3 = document.getElementById("password_jsid");
 var var4 = document.getElementById("confirm_password_jsid");
 var var5 = document.getElementById("fname_jsid");
  var var6 = document.getElementById("lname_jsid");

if(var1.value == "" || var2.value == "" || var3.value == "" || var4.value == "" || var5.value == "" || var6.value == "")
{
	alert("No field should be left empty!!!!!!!!!!");
        if(var1.value == "") var1.style.border = "solid 2px red";
        if(var2.value == "") var2.style.border = "solid 2px red";
        if(var3.value == "") var3.style.border = "solid 2px red";
        if(var4.value == "") var4.style.border = "solid 2px red";
        if(var5.value == "") var5.style.border = "solid 2px red";
		if(var6.value == "") var6.style.border = "solid 2px red";
	return false;
}

	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*\.(\w+)$/;
    if(var1.value.search(mailformat)==-1)  
    {  
    alert("Invalid email address!!!");  
    var1.focus(); 
	var1.style.border = "solid 2px red";
    return false;   
    }  

 if (var3.value.length < 8) {
 alert("Password must contain at least 8 characters");
 var3.focus();
 var3.style.border = "solid 2px red";
 return false;
 }

if (var3.value!=var4.value) {
 alert("Passwords don't match");
 var4.focus();
 var4.style.border = "solid 2px red";
 
 return false;
}


 }


function validate_login() {

    var var7 = document.getElementById("un_jsid");
    var var8 = document.getElementById("pwd_jsid");
	var input=document.getElementById("inputText");

    if (var8.value == "" || var7.value == "" || input.value== "") {
        alert("No field should be left empty!!!!");
        if (var8.value == "") var8.style.border = "solid 2px red";
        if (var7.value == "") var7.style.border = "solid 2px red";
		if (input.value== "") input.style.border = "solid 2px red";
        return false;
    }


    if (var8.value.length < 8) {
        alert("Password must contain at least 8 characters");
        var8.focus();
        var8.style.border = "solid 2px red";
        return false;
    }
	     
    if(input.value!=captcha)
	{
        alert("Incorrect captcha!!");
		input.focus();
        input.style.border = "solid 2px red";
		return false;
    }


}

function validate_fb() {

    var var9 = document.getElementById("name_jsid");
    var var10 = document.getElementById("fb_jsid");

    if (var9.value == "" || var10.value == "") {
        alert("No field should be left empty!!!!");
        if (var9.value == "") var9.style.border = "solid 2px red";
        if (var10.value == "") var10.style.border = "solid 2px red";
        return false;
    }


}