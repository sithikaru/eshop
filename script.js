function changeView() {
    var signUpBox = document.getElementById("signUpBox");
    var signInBox = document.getElementById("signInBox");

    signUpBox.classList.toggle("d-none");
    signInBox.classList.toggle("d-none");
}

function signUp() {
    var f = document.getElementById("f");
    var l = document.getElementById("l");
    var e = document.getElementById("e");
    var p = document.getElementById("p");
    var m = document.getElementById("m");
    var g = document.getElementById("g");

    var form = new FormData();

    form.append("f", f.value);
    form.append("l", l.value);
    form.append("e", e.value);
    form.append("p", p.value);
    form.append("m", m.value);
    form.append("g", g.value);

    var request = new XMLHttpRequest();

    request.onreadystatechange = function() {
        if (request.readyState == 4) {
            var text = request.responseText;

            if (text == "Success") {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msg").className = "bi bi-check2-circle fs-5";
                document.getElementById("alertdiv").className = "alert alert-success";
                document.getElementById("msgdiv").className = "d-block";
                document.getElementById("f".value).innerHTML = "";
            } else {
                document.getElementById("msg").innerHTML = text;
                document.getElementById("msgdiv").className = "d-block";
            }

        }
    };

    request.open("POST", "signUpProcess.php", true);
    request.send(form);
}



function signIn() {
    var email = document.getElementById("email2");
    var password = document.getElementById("password2");
    var rememberme = document.getElementById("rememberme");

    var f = new FormData();
    f.append("e", email.value);
    f.append("p", password.value);
    f.append("r", rememberme.checked);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                window.location = "home.php";

                document.getElementById("msg2").innerHTML = "";
            } else {
                document.getElementById("msg2").innerHTML = t;

            }
        }
    };

    r.open("POST", "signInProcess.php", true);
    r.send(f);
}


var bm;

function forgotPassword() {

    var email = document.getElementById("email2");

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var t = r.responseText;
            if (t == "success") {
                alert("Verification code has sent to your email. Please check your inbox");
                var m = document.getElementById("forgotPasswordModal");
                bm = new bootstrap.Modal(m);
                bm.show();
            } else {
                alert(t);
            }
        }
    };

    r.open("get", "forgotPasswordProcess.php?e=" + email.value, true);
    r.send();

}

function ShowPassword() {
    var input = document.getElementById("npi");
    var eye = document.getElementById("e1");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

function ShowPassword2() {
    var input = document.getElementById("rnp");
    var eye = document.getElementById("e2");

    if (input.type == "password") {
        input.type = "text";
        eye.className = "bi bi-eye-fill";
    } else {
        input.type = "password";
        eye.className = "bi bi-eye-slash-fill";
    }
}

var bm;

function resetpw() {
    var vcode = document.getElementById("vc");
    var np = document.getElementById("npi");
    var rnp = document.getElementById("rnp");
    var email = document.getElementById("email2");

    var f = new FormData();
    f.append("e", email.value);
    f.append("v", vcode.value);
    f.append("n", np.value);
    f.append("r", rnp.value);

    var r = new XMLHttpRequest();

    r.onreadystatechange = function() {
        if (r.readyState == 4) {
            var text = r.responseText;
            if (text == "success") {

                bm.hide();
                alert("Password reset success");

            } else {
                alert(text);
            }
        }
    };

    r.open("POST", "resetPassword.php", true);
    r.send(f);

}

function signout(){
    
    var r = new XMLHttpRequest();

    r.onreadystatechange = function(){
        if(r.readyState == 4){
            var t = r.responseText;
            if (t == "Success"){
                window.location.reload();
            }
        }
    }

    r.open("GET", "signoutProcess.php",true);
    r.send();

}