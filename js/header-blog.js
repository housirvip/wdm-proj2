
window.onload = createHeaderHtml();

function createHeaderHtml() {

    const header = document.getElementById("header");

    if (localStorage.getItem("uid") != null) {

        const dashboard = document.createElement("a");
        dashboard.href = "../dashboard.html";
        dashboard.setAttribute("style", "color:black");
        const dashboardText = document.createTextNode("UserCenter");
        dashboard.appendChild(dashboardText);
        header.appendChild(dashboard);

        const logout = document.createElement("a");
        logout.onclick = function () {
            signOut();
        }
        logout.setAttribute("style", "color:black");
        const logoutText = document.createTextNode("LogOut");
        logout.appendChild(logoutText);
        header.appendChild(logout);

    } else {

        const login = document.createElement("a");
        login.onclick = function () {
            openLoginForm();
        };
        login.setAttribute("style", "color:black");
        const loginText = document.createTextNode("Inicio De Sesion");
        login.appendChild(loginText);
        header.appendChild(login);

        const signup = document.createElement("a");
        signup.onclick = function () {
            openSignupForm();
        };
        signup.setAttribute("style", "color:black");
        const signupText = document.createTextNode("Registro");
        signup.appendChild(signupText);
        header.appendChild(signup);
    }
}
