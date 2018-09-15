
function inputValidation(tipe, id, errId) {
    var re;
    var val = document.getElementById(id).value;
    var err;
    switch (tipe) {
        case "email":
            re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            err= "Format Email Anda Salah atau Tidak Boleh Kosong.";
            break;
        case "name":
            re = /^[a-zA-Z ]+$/;
            err = "Format Nama Anda Salah. Max 30 atau Tidak Boleh Kosong.";
            break;
        case "pass":
            re = /(?=.{6,})/;
            err = "Format Password Anda Salah. Min: 6, Max: 25 atau Tidak Boleh Kosong.";
            break;
        case "npm":
            re = /(?=.{9})^[0-9]+$/;
            err = "Format NPM Anda Salah. 9 Digit dan Hanya Angka.";
            break;
        case "number":
            re = /^[0-9]+$/;
            err = "Format No Telefon Anda Salah. Hanya Angka.";
            break;
        default:
            re = /^[a-zA-Z ]{0, 30}+$/;
            break;
    }
    var a = re.exec(val);
    if(a===null){
        document.getElementById(id).setCustomValidity(err);
        document.getElementById(errId).innerHTML= err;
    }else{
        document.getElementById(id).setCustomValidity("");
        document.getElementById(errId).innerHTML="";
    }
}
function rePassValidation(id1, id2, errId) {
    var err = "Password Tidak Cocok!."
    var val1 = document.getElementById(id1).value;
    var val2 = document.getElementById(id2).value;
    if (val1 !== val2) {
        document.getElementById(id).setCustomValidity(err);
        document.getElementById(errId).innerHTML = err;
    } else {
        document.getElementById(id).setCustomValidity("");
        document.getElementById(errId).innerHTML = "";
    }
}
function setFailLogin(id){
    document.getElementById("fail-login").style.visibility="visible";
}