
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

}
function passtest(){

    var code = document.getElementById("password").value;
    var strength = 0;
    var show = document.getElementById("show");

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
        show.innerHTML = '<tr><td bgcolor="red" width="'+strength+'"></td><td>Very weak</td></tr>';
    }else if((strength >= 30) && (strength < 60)){
        show.innerHTML = '<tr><td bgcolor="orange" width="'+strength+'"></td><td>Weak</td></tr>';
    }else if((strength >= 60) && (strength < 85)){
        show.innerHTML = '<tr><td bgcolor="blue" width="'+strength+'"></td><td>Strong</td></tr>';
    }else{
        show.innerHTML = '<tr><td bgcolor="green" width="'+strength+'"></td><td>Very Strong</td></tr>';
    }

    return;

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
             hidepostal.setAttribute("type","");
             hidephone.setAttribute("type","");

         }else{
             hidepostal.setAttribute("type","hidden");
             hidephone.setAttribute("type","hidden");

         }
         console.log("test");
    }

    function phonecheck() {

        var phone = document.forms["form"]["phone"];
        var phonecode = /^(9[1236]\d{7}|2\d{8})$/;

        if(phone.value.length == 9){
            if (phone.value.match(phonecode)) {
                return true;
            } else {
                alert("Insert a portuguese number");
                return false;
            }
        }
    }