
/**
 * Created by Administrator on 22/06/2017.
 */

function requiredfields() {
    var pass = document.forms["form"]["password"].value;
    var passcheck= document.forms["form"]["passwordcheck"].value;
    var email= document.forms["form"]["email"].value;
    var emailcheck= document.forms["form"]["emailcheck"].value;
    var firstname= document.forms["form"]["firstname"].value;
    var lastname= document.forms["form"]["lastname"].value;

    if(email!=emailcheck){
        alert("Emails are not the same");
        return false;
    }else if (pass!=passcheck){
        alert("Passwords are not the same");
        return false;
    }

    if (email=="" || emailcheck=="" || passcheck=="" || pass=="" || firstname == "" || lastname == ""){
        alert("fill in the required fields");
        return false;
        if (email == pass){
            alert("Passoword cannot equal to the email");
            return false;
        }
    }
    var phone = document.forms["form"]["phone"];
    var phonecode = /^(9[1236]\d{7}|2\d{8})$/;
    if(phone.value>0){

        if (phone.value.match(phonecode)) {
            return true;
        } else {
            alert("The number is not portuguese the system will only take on portuguese numbers.");
            return false;
        }

    }else{

    }
}
function passtest(){

    var code = document.getElementById("password").value;
    var strength = 0;
    var show = document.getElementById("show");
if(code != ""){
    if((code.length >= 4) && (code.length <= 7)){
        strength += 15;
    }else if(code.length>7){
        strength += 30;
    }
    if(code.match(/[a-z]+/)){
        strength += 15;
    }
    if(code.match(/[A-Z]+/)){
        strength += 20;
    }
    if(code.match(/\d+/)){
        strength += 25;
    }
    if(code.match(/\W+/)){
        strength += 35;
    }
    if(strength < 30){
        show.innerHTML = '<span class="label label-danger">Very weak</span>';
    }else if((strength >= 30) && (strength < 60)){
        show.innerHTML = '<span class="label label-warning">Weak</span>';
    }else if((strength >= 60) && (strength < 85)){
        show.innerHTML = '<span class="label label-info">Strong</span>';
    }else{
        show.innerHTML = '<span class="label label-success">Very Strong</span>';
    }

    return;
}else{
    show.innerHTML = '<span class="label"></span>';
}
}

function zipcheck(){
    var portugal = document.forms["form"]["country"].value;
    var zip = document.forms["form"]["postal"].value;
    var ziphiphen = document.forms["form"]["postal"];
    var zipcode = /^\d{4}-\d{3}?$/;
    var key = event.keyCode || event.charCode;

    if(portugal == "PT"){

        ziphiphen.maxLength=8;
        ziplength= zip.length;
        if(ziplength == 4){
            if(key == 8 || key == 46){
                return false;
            }else {
                ziphiphen.value = zip + String.fromCharCode(45);
            }
            }else if(ziplength >= 8){
                if(zip.match(zipcode)){
                    return true;
                } else {
                    while(!zip.match(zipcode)){
                    zip= zip.substring(0,4)+"-"+zip.substring(5,8);
                    ziphiphen.value = zip.substring(0,4)+"-"+zip.substring(5,8);
                    alert("Zip code is not valid");
                    return false;
                }
                }
            }

    }

}

function countrycheck(){

    var country = document.forms["form"]["country"].value;
    var hidepostal = document.forms["form"]["postal"];
    var hidephone = document.forms["form"]["phone"];


         if (country == "PT"){
             hidepostal.removeAttribute("disabled");
             hidephone.removeAttribute("disabled");
             hidepostal.removeAttribute("hidden");
             hidephone.removeAttribute("hidden");
             document.getElementById('TIN').removeAttribute("disabled");
             document.getElementById('TIN').removeAttribute("hidden");
             document.getElementById('labelphone').style.display = 'inline';
             document.getElementById('labelpostal').style.display = 'inline';
             document.getElementById('listphone').removeAttribute("style");
             document.getElementById('TINlist').removeAttribute("style");
             document.getElementById('TINlabel').removeAttribute("style");

         }else{
             hidepostal.value = "";
             hidephone.value ="";
             hidepostal.setAttribute("disabled","");
             hidephone.setAttribute("disabled","");
             hidepostal.setAttribute("hidden","");
             hidephone.setAttribute("hidden","");
             document.getElementById('labelphone').style.display = 'none';
             document.getElementById('labelpostal').style.display = 'none';
             document.getElementById('listphone').style.display = 'none';
             document.getElementById('TIN').setAttribute("disabled","");
             document.getElementById('TIN').setAttribute("hidden","");
             document.getElementById('TINlist').style.display = 'none';
             document.getElementById('TINlabel').style.display = 'none';


         }
         console.log("test");
    }

/*AJAX*/

function validateemail() {

    var request;

    try {

        request= new XMLHttpRequest();

    }

    catch (tryMicrosoft) {

        try {

            request= new ActiveXObject("Msxml2.XMLHTTP");
        }

        catch (otherMicrosoft)
        {
            try {
                request= new ActiveXObject("Microsoft.XMLHTTP");
            }

            catch (failed) {
                request= null;
            }
        }
    }

    var url="../resources/gateway.php";
    var emailaddress= document.getElementById("email").value;
    var vars= "email="+emailaddress;
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange= function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data=  request.responseText;
            document.getElementById("validate").innerHTML= return_data;
        }
    }

    request.send(vars);
}


function validatetaxes() {




    var request;

    try {

        request= new XMLHttpRequest();

    }

    catch (tryMicrosoft) {

        try {

            request= new ActiveXObject("Msxml2.XMLHTTP");
        }

        catch (otherMicrosoft)
        {
            try {
                request= new ActiveXObject("Microsoft.XMLHTTP");
            }

            catch (failed) {
                request= null;
            }
        }
    }



    var url="../resources/taxes.php";
    var TIN= document.getElementById("TIN").value;
    var vars= "TIN="+TIN;




    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange= function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data=  request.responseText;
            document.getElementById("valTIN").innerHTML= return_data;
        }
    }

    request.send(vars);

}

function passwordequ() {

    var passwordk= document.getElementById("password").value;
    var passwordcheckk= document.getElementById("passwordcheck").value;
    passlabel = document.getElementById("passwordcheckequ");

    if (passwordk!=passwordcheckk){
        passlabel.innerHTML = '<span style="color:darkred;">✗ Invalid password!</span>';
        document.forms["form"]["isolated"].setAttribute("disabled","");
        document.forms["form"]["isolated"].setAttribute("hidden","");
    }else{
        passlabel.innerHTML = '<span style="color:green;">✔ Valid password!</span>';
        document.forms["form"]["isolated"].removeAttribute("disabled");
        document.forms["form"]["isolated"].removeAttribute("hidden");
    }

}

function emailequ() {

    var emailk= document.getElementById("email").value;
    var emailcheckk= document.getElementById("emailcheck").value;
    emaillabel = document.getElementById("emailcheckequ");
    if (email!=""&&emailcheckk!=""){
    if (emailk!=emailcheckk){
        emaillabel.innerHTML = '<span style="color:darkred;">✗ Emails are not equal!</span>';
        document.forms["form"]["isolated"].setAttribute("disabled","");
        document.forms["form"]["isolated"].setAttribute("hidden","");
    }else{
        emaillabel.innerHTML = '<span style="color:green;">✔ Emails are equal!</span>';
        document.forms["form"]["isolated"].removeAttribute("disabled");
        document.forms["form"]["isolated"].removeAttribute("hidden");
    }
    }else{
        emaillabel.innerHTML = '<span></span>';
    }
}



