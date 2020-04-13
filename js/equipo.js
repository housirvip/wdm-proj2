
window.onload = creaeteEquipoHtml();

function creaeteEquipoHtml() {

    const data = getEquipo();
    let rowId = 0;
    $.each(data, function (index, value) {
        if (index % 3 === 0) {
            rowId++;
            const wrapperElement = document.getElementById("wrapper");
            const rowElement = document.createElement("div");
            rowElement.className = "row";
            rowElement.id = "row" + rowId;
            wrapperElement.appendChild(rowElement);
        }
        const rowElement = document.getElementById("row"+rowId);
        const colElement = document.createElement("col");
        colElement.className = "col-8";
        colElement.innerHTML = "<br>\n" +
            "                <img src=\"" + value.avatar+ "\" alt=\"\"/>\n" +
            "                <h3>" + value.name + "</h3>\n" +
            "                <p>" + value.experience + "</p>\n" +
            "                <p>Teléf.: " + value.phone + "</p>\n" +
            "                <p>E-mail: " + value.email + "</p>";
        rowElement.appendChild(colElement);
    });
}

function getEquipo() {

    let res;
    $.ajax({
        url: '/router.php/equipo',
        type: "GET",
        dataType: "json",
        async : false,
        success: function (data) {
            res = data;
        }
    });
    return res;
}