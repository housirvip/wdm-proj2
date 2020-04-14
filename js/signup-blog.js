
window.onload = createSignUpHtml();

function createSignUpHtml() {
    const signupHtml = "    <div class=\"form-popup\" id=\"signupWindow\">\n" +
        "        <div class=\"closeButton\">\n" +
        "            <img src=\"http://xxh8517.uta.cloud/images/closeButton.png\" onclick=\"closeSignupForm()\"/>\n" +
        "        </div>\n" +
        "        <div class=\"container\">\n" +
        "            <div class=\"content\">\n" +
        "                <div class=\"oneElementCenter\">\n" +
        "                    <img src=\"http://xxh8517.uta.cloud/images/logo.png\" alt=\"\" style=\"width: 80px; height: 80px\"/>\n" +
        "                    <h3>Registro</h3>\n" +
        "                </div>\n" +
        "                <div class=\"row\">\n" +
        "                    <div class=\"col-12-left\">\n" +
        "                        <form id=\"signupForm\">\n" +
        "                            <div class=\"row\">\n" +
        "                                <label for=\"signupUsername\"></label><input type=\"text\" id=\"signupUsername\" placeholder=\"Numbre\"/>\n" +
        "                                <label for=\"correo\"></label><input type=\"text\" id=\"email\" placeholder=\"Correo\"/>\n" +
        "                            </div>\n" +
        "                            <div class=\"row\">\n" +
        "                                <label for=\"signupPassword\"></label><input type=\"password\" id=\"signupPassword\" placeholder=\"Contraseña\"/>\n" +
        "                                <label for=\"signupPassword2\"></label><input type=\"password\" id=\"signupPassword2\" placeholder=\"Repeater Contraseña\"/>\n" +
        "                            </div>\n" +
        "                            <div class=\"row\">\n" +
        "                                <label for=\"direction\"></label><input type=\"text\" id=\"address\" placeholder=\"Direccion\"/>\n" +
        "                            </div>\n" +
        "                            <div>\n" +
        "                                <button type=\"button\" onclick=\"signup()\">Guardar</button>\n" +
        "                            </div>\n" +
        "                        </form>\n" +
        "                    </div>\n" +
        "                    <div class=\"col-12-right\">\n" +
        "                        <img src=\"http://xxh8517.uta.cloud/images/logo.png\" alt=\"\"/>\n" +
        "                        <h2>CENTRO AUGUSTO MIJARES</h2>\n" +
        "                    </div>\n" +
        "                </div>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>"

    const signupPage = document.createElement("div");
    signupPage.innerHTML = signupHtml;
    document.getElementById("signupPage").appendChild(signupPage);
}

function openSignupForm() {
    document.getElementById("signupWindow").style.display = "block";
}

function closeSignupForm() {
    document.getElementById("signupWindow").style.display = "none";
}

function signup() {
    let username = document.getElementById("signupUsername").value;
    let password = document.getElementById("signupPassword").value;
    let password2 = document.getElementById("signupPassword2").value;
    let email = document.getElementById("email").value;
    let address = document.getElementById("address").value;

    if(username === null || username === '') {
        alert("Username is null!");
        return;
    }
    if(password === null || password === '') {
        alert("Password is null!");
        return;
    }
    if(email === null || email === '') {
        alert("Email is null!");
        return;
    }
    if(address === null || address === '') {
        alert("Address is null!");
        return;
    }
    if(password !== password2) {
        alert("Password and repeat password is different!");
        return;
    }
    if(!email.match('@')) {
        alert('Email format is wrong!');
        return;
    }

    $.ajax({
        url: '/router.php/register',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({'username': username, 'password': password, 'email': email, 'address': address}),
        dataType: 'json',
        async : false,
        success: function (data) {
            localStorage.setItem("uid", data.id);
            localStorage.setItem("role", data.role);
            sendEmail(data.email, data.username);
            alert("Congratulation! Your registration is successful and an email has been sent to your email-box.")
            location.href = "dashboard.html"
        }
    });
}

function sendEmail(email, username) {
    $.ajax({
        url: 'http://35.193.61.114:6062/email/send?address=' + email + '&username=' + username,
        type: 'GET',
        dataType: 'json',
        async : true,
        success: function (data) {
        }
    });
}
