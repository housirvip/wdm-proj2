
window.onload = createSignUpHtml();

function createSignUpHtml() {
    const signupHtml = "    <div class=\"form-popup\" id=\"signupWindow\">\n" +
        "        <div class=\"closeButton\">\n" +
        "            <img src=\"images/closeButton.png\" onclick=\"closeSignupForm()\"/>\n" +
        "        </div>\n" +
        "        <div class=\"container\">\n" +
        "            <div class=\"content\">\n" +
        "                <div id=\"signupDiv\">\n" +
        "                    <img src=\"images/logo.png\" alt=\"\"/>\n" +
        "                    <h3>Registro</h3>\n" +
        "                </div>\n" +
        "                <div class=\"row\">\n" +
        "                    <div id=\"signupDiv1\">\n" +
        "                        <form id=\"signupForm\">\n" +
        "                            <div class=\"row\">\n" +
        "                                <label for=\"signupUsername\"></label><input type=\"text\" id=\"signupUsername\" placeholder=\"Numbre\"/>\n" +
        "                                <label for=\"correo\"></label><input type=\"text\" id=\"correo\" placeholder=\"Correo\"/>\n" +
        "                            </div>\n" +
        "                            <div class=\"row\">\n" +
        "                                <label for=\"signupPassword\"></label><input type=\"password\" id=\"signupPassword\" placeholder=\"Contraseña\"/>\n" +
        "                                <label for=\"signupPassword2\"></label><input type=\"password\" id=\"signupPassword2\" placeholder=\"Repeater Contraseña\"/>\n" +
        "                            </div>\n" +
        "                            <div class=\"row\">\n" +
        "                                <label for=\"direction\"></label><input type=\"text\" id=\"direction\" placeholder=\"Direccion\"/>\n" +
        "                            </div>\n" +
        "                            <div>\n" +
        "                                <a href=\"dashboard.html\">Guardar</a>\n" +
        "                            </div>\n" +
        "                        </form>\n" +
        "                    </div>\n" +
        "                    <div id=\"signupDiv2\">\n" +
        "                        <img src=\"images/logo.png\" alt=\"\"/>\n" +
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
