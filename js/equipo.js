
window.onload = getEquipo();

function getEquipo() {

    let list = [];
    $.ajax({
        url: '/router.php/equipo',
        type: "GET",
        dataType: "json",
        success: function (data) {
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
                    "                <img src=\"images/foto6.png\" alt=\"\"/>\n" +
                    "                <h3>" + value.name + "</h3>\n" +
                    "                <p>" + value.experience + "</p>\n" +
                    "                <p>Teléf.: " + value.phone + "</p>\n" +
                    "                <p>E-mail: " + value.email + "</p>";
                rowElement.appendChild(colElement);
            });
        }
    });
}