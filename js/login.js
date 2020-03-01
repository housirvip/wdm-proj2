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
        "                        <a href=\"dashboard.html\" onclick=\"login()\">Entrar</a>\n" +
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
    localStorage.setItem("uid", "1");
}

function signOut() {
    localStorage.removeItem("uid");
    location.reload();
}


