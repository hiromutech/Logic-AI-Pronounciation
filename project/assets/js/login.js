
let eyeicon = document.getElementById("eyeicon");
let password = document.getElementById("password");

var filePath = window.location.origin + "/project/assets/images/";


eyeicon.onclick = function(){
    if (password.type =="password"){
        password.type = "text";
        eyeicon.src = filePath + "eyeopen.jpg";
    }else {
        password.type = "password";
        eyeicon.src = filePath + "eyeclose.png";
    }
}