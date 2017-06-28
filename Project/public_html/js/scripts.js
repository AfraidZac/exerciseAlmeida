/**
 * Created by Administrator on 22/06/2017.
 */
function obligation(){
    var pass = document.forms["form"]["password"].value;
    var passcheck = document.forms["form"]["passwordcheck"].value;
    var email = document.forms["form"]["email"].value;
    var emailcheck = document.forms["form"]["emailcheck"].value;
    var firstname = document.forms["form"]["firstname"].value;
    var lastname = document.forms["form"]["lastname"].value;
    if (email == "" || emailcheck == "" || passcheck == "" || pass == "" || firstname == "" || lastname == "") {
        document.forms["form"]["isolated"].setAttribute("disabled","");
        document.forms["form"]["isolated"].setAttribute("hidden","");
        return false;
    }else{
        document.forms["form"]["isolated"].removeAttribute("disabled");
        document.forms["form"]["isolated"].removeAttribute("hidden");
    }

}
function requiredfields() {
    var pass = document.forms["form"]["password"].value;
    var passcheck = document.forms["form"]["passwordcheck"].value;
    var email = document.forms["form"]["email"].value;
    var emailcheck = document.forms["form"]["emailcheck"].value;
    var firstname = document.forms["form"]["firstname"].value;
    var lastname = document.forms["form"]["lastname"].value;
    console.log(email.localeCompare(pass));
    if (email.localeCompare(pass)) {
        alert("Passoword cannot equal to the email");
        return false;
    }
    console.log(email.localeCompare(pass));
    if (email.localeCompare(pass) == false) {
        alert("Passoword cannot equal to the email");
        return false;
    }
    var phone = document.forms["form"]["phone"];
    var phonecode = /^(9[1236]\d{7}|2\d{8})$/;
    if (phone.value > 0) {

        if (phone.value.match(phonecode)) {
            return true;
        } else {
            alert("The number is not portuguese the system will only take on portuguese numbers.");
            return false;
        }

    } else {

    }
}


function passtest() {

    var wrost = 7,
        // minimum 8 characters
        bad = /(?=.{8,}).*/,
        //Alpha Numeric plus minimum 8
        good = /^(?=\S*?[a-z])(?=\S*?[0-9])\S{8,}$/,
        //Must contain at least one upper case letter, one lower case letter and (one number OR one special char).
        better = /^(?=\S*?[A-Z])(?=\S*?[a-z])((?=\S*?[0-9])|(?=\S*?[^\w\*]))\S{8,}$/,
        //Must contain at least one upper case letter, one lower case letter and (one number AND one special char).
        best = /^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])(?=\S*?[^\w\*])\S{8,}$/;


   var password = document.getElementById("password").value;

    strength = 0;

    progressClass = 'progress-bar progress-bar-',

    $progressBarElement = $('#password-progress-bar');

    /*   var show = document.getElementById("show");*/

if(password!=""){
    if (best.test(password) === true) {
        strength = '100%';
        progressClass += 'success';
            showmsg.innerHTML = '<td>Very Strong</td>';
    } else if (better.test(password) === true) {
        strength = '80%';
        progressClass += 'info';
        showmsg.innerHTML = '<td>Strong</td>';
    } else if (good.test(password) === true) {
        strength = '50%';
        progressClass += 'warning';
        showmsg.innerHTML = '<td>Decent</td>';
    } else if (bad.test(password) === true) {
        strength = '30%';
        progressClass += 'warning';
        showmsg.innerHTML = '<td>Weak</td>';
    } else if (password.length >= 1 && password.length <= wrost) {
        strength = '10%';
        progressClass += 'danger';
        showmsg.innerHTML = '<td>Very Weak</td>';
    } else if (password.length < 1) {
        strength = '0';
        progressClass += 'danger';

    }

    $progressBarElement.removeClass().addClass(progressClass);
    $progressBarElement.attr('aria-valuenow', strength);
    $progressBarElement.css('width', strength);
}else{
    $progressBarElement.attr('aria-valuenow', 0);
    $progressBarElement.css('width', 0);
    showmsg.innerHTML = '<td></td>';
}
}

/*
if (code != "") {
    if ((code.length >= 4) && (code.length <= 7)) {
        strength += 15;
    } else if (code.length > 7) {
        strength += 30;
    }
    if (code.match(/[a-z]+/)) {
        strength += 15;
    }
    if (code.match(/[A-Z]+/)) {
        strength += 20;
    }
    if (code.match(/\d+/)) {
        strength += 25;
    }
    if (code.match(/\W+/)) {
        strength += 35;
    }
    if (strength < 30) {
        show.innerHTML = '<span class="label label-danger">Very weak</span>';
    } else if ((strength >= 30) && (strength < 60)) {
        show.innerHTML = '<span class="label label-warning">Weak</span>';
    } else if ((strength >= 60) && (strength < 85)) {
        show.innerHTML = '<span class="label label-info">Strong</span>';
    } else {
        show.innerHTML = '<span class="label label-success">Very Strong</span>';
    }

    return;
} else {
    show.innerHTML = '<span class="label"></span>';
}*/


function zipcheck() {
    var portugal = document.forms["form"]["country"].value;
    var zip = document.forms["form"]["postal"].value;
    var ziphiphen = document.forms["form"]["postal"];
    var zipcode = /^\d{4}-\d{3}?$/;
    var key = event.keyCode || event.charCode;

    if (portugal == "PT") {

        ziphiphen.maxLength = 8;
        ziplength = zip.length;
        if (ziplength == 4) {
            if (key == 8 || key == 46) {
                return false;
            } else {
                ziphiphen.value = zip + String.fromCharCode(45);
            }
        } else if (ziplength >= 8) {
            if (zip.match(zipcode)) {
                return true;
            } else {
                while (!zip.match(zipcode)) {
                    zip = zip.substring(0, 4) + "-" + zip.substring(5, 8);
                    ziphiphen.value = zip.substring(0, 4) + "-" + zip.substring(5, 8);
                    alert("Zip code is not valid");
                    return false;
                }
            }
        }

    }

}

function countrycheck() {

    var country = document.forms["form"]["country"].value;
    var hidepostal = document.forms["form"]["postal"];
    var hidephone = document.forms["form"]["phone"];


    if (country == "PT") {
        hidepostal.removeAttribute("disabled");
        hidephone.removeAttribute("disabled");
        hidepostal.removeAttribute("hidden");
        hidephone.removeAttribute("hidden");
        document.getElementById('TIN').removeAttribute("disabled");
        document.getElementById('TIN').removeAttribute("hidden");
        document.getElementById('listphone').removeAttribute("style");
        document.getElementById('TINlist').removeAttribute("style");


    } else {
        hidepostal.value = "";
        hidephone.value = "";
        hidepostal.setAttribute("disabled", "");
        hidephone.setAttribute("disabled", "");
        hidepostal.setAttribute("hidden", "");
        hidephone.setAttribute("hidden", "");
        document.getElementById('TIN').setAttribute("disabled", "");
        document.getElementById('TIN').setAttribute("hidden", "");
        document.getElementById('TINlist').style.display = 'none';



    }
    console.log("test");
}

/*AJAX*/

function validateemail() {

    var request;

    try {

        request = new XMLHttpRequest();

    } catch (tryMicrosoft) {

        try {

            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (otherMicrosoft) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }

    var url = "../resources/gateway.php";
    var emailaddress = document.getElementById("email").value;
    var vars = "email=" + emailaddress;
    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data = request.responseText;
            document.getElementById("validate").innerHTML = return_data;
        }
    }

    request.send(vars);
}


function validatetaxes() {




    var request;

    try {

        request = new XMLHttpRequest();

    } catch (tryMicrosoft) {

        try {

            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (otherMicrosoft) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }



    var url = "../resources/taxes.php";
    var TIN = document.getElementById("TIN").value;
    var vars = "TIN=" + TIN;




    request.open("POST", url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            var return_data = request.responseText;
            document.getElementById("valTIN").innerHTML = return_data;
        }
    }
    request.send(vars);

}

function passwordequ() {
    var passwordk = document.getElementById("password").value;
    var passwordcheckk = document.getElementById("passwordcheck").value;
    passwordlabel = document.getElementById("passwordcheckequ");
    if (passwordk != "" && passwordcheckk != "") {
        if (passwordk != passwordcheckk) {
            passwordlabel.innerHTML = '<span style="color:darkred;">✗ Passwords are not equal!</span>';
            document.forms["form"]["isolated"].setAttribute("disabled", "");
            document.forms["form"]["isolated"].setAttribute("hidden", "");
        } else {
            passwordlabel.innerHTML = '<span style="color:green;">✔ Passwords are equal!</span>';
            document.forms["form"]["isolated"].removeAttribute("disabled");
            document.forms["form"]["isolated"].removeAttribute("hidden");
        }
    } else {
        passwordlabel.innerHTML = '<span></span>';
    }
}

function emailequ() {

    var emailk = document.getElementById("email").value;
    var emailcheckk = document.getElementById("emailcheck").value;
    emaillabel = document.getElementById("emailcheckequ");
    if (emailk != "" && emailcheckk != "") {
        if (emailk != emailcheckk) {
            emaillabel.innerHTML = '<span style="color:darkred;">✗ Emails are not equal!</span>';
            document.forms["form"]["isolated"].setAttribute("disabled", "");
            document.forms["form"]["isolated"].setAttribute("hidden", "");
        } else {
            emaillabel.innerHTML = '<span style="color:green;">✔ Emails are equal!</span>';
            document.forms["form"]["isolated"].removeAttribute("disabled");
            document.forms["form"]["isolated"].removeAttribute("hidden");
        }
    } else {
        emaillabel.innerHTML = '<span></span>';
    }
}