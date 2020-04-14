window.onload = function () {

    const data = getEvent();
    $.each(data, function (index, value) {
        const wrapperElement = document.getElementById("wrapper");
        const rowElement = document.createElement("div");
        rowElement.className = "row";
        rowElement.id = "row" + index;
        rowElement.style.alignItems="center";
        wrapperElement.appendChild(rowElement);
        {
            const pos = index % 2 ? 'right' : 'left';
            const colElement = document.createElement("col");
            colElement.className = 'col-12-' + pos;
            // colElement.style.textAlign = "center";
            let content = value.content.replace(/\r\n/g, '<br>');
            colElement.innerHTML = "<h2><p3>Event " + (index+1) + " : </p3>" + value.title + "</h2><p>" + content + "</p>";
            rowElement.appendChild(colElement);
        }
        {
            const pos = index % 2 ? 'left' : 'right';
            const colElement = document.createElement("col");
            colElement.className = 'col-12-' + pos;
            colElement.style.textAlign = "center";
            colElement.innerHTML = '<img src="' + value.image_url + '" alt=""/>';
            rowElement.appendChild(colElement);
        }

        const lineElement = document.createElement("div");
        lineElement.className = "line";
        lineElement.style.marginLeft  = "0%";
        lineElement.style.marginRight = "0%";
        lineElement.style.marginTop = "1%";
        lineElement.style.marginBottom = "1%";
        wrapperElement.appendChild(lineElement);
    });
};

function getEvent() {

    let res;
    $.ajax({
        url: '/router.php/event',
        type: "GET",
        dataType: "json",
        async: false,
        success: function (data) {
            res = data;
        }
    });
    console.log(res);
    return res;
}