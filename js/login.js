window.onload = createLoginHtml();

function createLoginHtml() {

    const loginHtml = "<div class=\"form-popup\" id=\"loginWindow\">\n" +
        "        <div class=\"closeButton\">\n" +
        "            <img src=\"images/closeButton.png\" onclick=\"closeLoginForm()\"/>\n" +
        "        </div>\n" +
        "        <div class=\"container\">\n" +
        "            <div class=\"content\">\n" +
        "                <div class=\"oneElementCenter\">\n" +
        "                    <img src=\"images/logo.png\" alt=\"\"/>\n" +
        "                    <h2>CENTRO AUGUSTO MIJARES</h2>\n" +
        "                </div>\n" +
        "                <form id=\"loginForm\">\n" +
        "                    <div>\n" +
        "                        <h3>Iniciar Sesion</h3>\n" +
        "                        <label for=\"loginUsername\"></label><input type=\"text\" id=\"loginUsername\" placeholder=\"Numbre de Usuario o Correo\"/>\n" +
        "                        <label for=\"loginPassword\"></label><input type=\"password\" id=\"loginPassword\" placeholder=\"Contraseña\"/>\n" +
        "                    </div>\n" +
        "                    <div>\n" +
        "                        <button type=\"button\" onclick=\"login()\">Entrar</button>\n" +
        "                    </div>\n" +
        "                </form>\n" +
        "            </div>\n" +
        "        </div>\n" +
        "    </div>";

    const loginPage = document.createElement("div");
    loginPage.innerHTML = loginHtml;
    document.getElementById("loginPage").appendChild(loginPage);
}


function openLoginForm() {
    document.getElementById("loginWindow").style.display = "block";
}

function closeLoginForm() {
    document.getElementById("loginWindow").style.display = "none";
}

function login() {

    let username = document.getElementById("loginUsername").value;
    let password = document.getElementById("loginPassword").value;

    if(username === null || username === '') {
        alert("Username is null!");
        return;
    }
    if(password === null || password === '') {
        alert("Password is null!");
        return;
    }

    $.ajax({
        url: '/router.php/login',
        type: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({'username': username, 'password': password}),
        dataType: 'json',
        async : false,
        success: function (data) {
            if(data.code != 0) {
                alert(data.res);
                return;
            }
            localStorage.setItem("uid", data.res.id);
            localStorage.setItem("role", data.res.role);
            location.href = "dashboard.html"
        }
    });
}

function signOut() {
    localStorage.removeItem("uid");
    localStorage.removeItem("role");
    location.reload();
}

