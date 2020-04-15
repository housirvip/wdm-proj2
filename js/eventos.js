window.onload = function () {

    const data = getEvent();
    $.each(data, function (index, value) {
        const wrapperElement = document.getElementById("wrapper");

        const eventElement = document.createElement("div");
        eventElement.id = "event" + (index+1);
        eventElement.style.maxHeight = "500px";
        eventElement.style.overflow = "hidden";

        const rowElement = document.createElement("div");
        rowElement.className = "row";
        rowElement.id = "row" + index;
        // rowElement.style.alignItems="center";
        eventElement.appendChild(rowElement);
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

        wrapperElement.appendChild(eventElement);

        if(window.getComputedStyle(eventElement).getPropertyValue('height') === "500px") {
            leerMarsDiv = document.createElement("div");
            leerMarsDiv.id = "leerMars";
            leerMarsDiv.className = "oneElementCenter";
            leerMarsButton = document.createElement("button");
            leerMarsButton.innerText = "Leer Mars";
            leerMarsButton.onclick = function () {
                eventElement.style.maxHeight = "10000px";
                eventElement.style.overflow = "visible";
                wrapperElement.removeChild(leerMarsDiv);
            };
            leerMarsDiv.appendChild(leerMarsButton);

            const leerMarsText = document.createElement("p3");
            leerMarsText.innerText = " <- You can click it to read full information!";
            leerMarsText.style.fontStyle = "italic";
            leerMarsDiv.appendChild(leerMarsText);

            wrapperElement.appendChild(leerMarsDiv);
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