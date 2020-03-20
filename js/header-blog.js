
window.onload = createHeaderHtml();

function createHeaderHtml() {

    const header = document.getElementById("header");

    if (localStorage.getItem("uid") != null) {

        const dashboard = document.createElement("a");
        dashboard.href = "../dashboard.html";
        const dashboardText = document.createTextNode("UserCenter");
        dashboard.appendChild(dashboardText);
        header.appendChild(dashboard);

        const logout = document.createElement("a");
        logout.onclick = function () {
            signOut();
        }
        const logoutText = document.createTextNode("LogOut");
        logout.appendChild(logoutText);
        header.appendChild(logout);

    } else {

        const login = document.createElement("a");
        login.onclick = function () {
            openLoginForm();
        };
        const loginText = document.createTextNode("Inicio De Sesion");
        login.appendChild(loginText);
        header.appendChild(login);

        const signup = document.createElement("a");
        signup.onclick = function () {
            openSignupForm();
        };
        const signupText = document.createTextNode("Registro");
        signup.appendChild(signupText);
        header.appendChild(signup);
    }
}
