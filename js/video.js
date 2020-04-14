window.onload = function () {

    const data = getVideo();
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
        const rowElement = document.getElementById("row" + rowId);
        const colElement = document.createElement("col");
        colElement.className = "col-8";
        value.url = value.url.replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/");
        colElement.innerHTML = "<br>\n" +
            "                <iframe width=\"350\" height=\"200\" src=\"" + value.url + "\" frameborder=\"0\"\n" +
            "                        allow=\"accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture\"\n" +
            "                        allowfullscreen></iframe>\n" +
            "                <h3>" + value.author + "</h3>\n" +
            "                <p>" + value.description + "</p>" +
            "                <p> URL: " + value.url + "</p>";
        rowElement.appendChild(colElement);
    });
};

function getVideo() {

    let res;
    $.ajax({
        url: '/router.php/video',
        type: "GET",
        dataType: "json",
        async: false,
        success: function (data) {
            res = data;
        }
    });
    return res;
}