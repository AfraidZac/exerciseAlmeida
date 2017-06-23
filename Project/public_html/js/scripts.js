/**
 * Created by Administrator on 22/06/2017.
 */
function requiredfields() {
    var pass = document.forms["form"]["password"].value;
    var passcheck= document.forms["form"]["passwordcheck"].value;
    var email= document.forms["form"]["email"].value;
    var emailcheck= document.forms["form"]["emailcheck"].value;
    var name= document.forms["form"]["name"].value;

    if(email!=emailcheck){
        alert("Emails are not the same");
    }else if (pass!=passcheck){
        alert("Passwords are not the same");
    }

}
function passtest(){
    var code = document.getElementById("password").value;
    var strength = 0;
    var show = document.getElementById("show");
    if((code.length >= 4) && (code.length <= 7)){
        strength += 10;
    }else if(code.length>7){
        strength += 25;
    }
    if(code.match(/[a-z]+/)){
        strength += 10;
    }
    if(code.match(/[A-Z]+/)){
        strength += 20;
    }
    if(code.match(/\d+/)){
        strength += 20;
    }
    if(code.match(/\W+/)){
        strength += 25;
    }
    if(strength < 30){
        show.innerHTML = '<tr><td bgcolor="red" width="'+strength+'"></td><td>Muito Fraca </td></tr>';
    }else if((strength >= 30) && (strength < 60)){
        show.innerHTML = '<tr><td bgcolor="yellow" width="'+strength+'"></td><td>Fraca </td></tr>';
    }else if((strength >= 60) && (strength < 85)){
        show.innerHTML = '<tr><td bgcolor="blue" width="'+strength+'"></td><td>Decente </td></tr>';
    }else{
        show.innerHTML = '<tr><td bgcolor="green" width="'+strength+'"></td><td>Forte </td></tr>';
    }
    return;
}