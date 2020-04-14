window.onload = function () {

    const data = getEvent();
    $.each(data, function (index, value) {
        const wrapperElement = document.getElementById("wrapper");
        const rowElement = document.createElement("div");
        rowElement.className = "row";
        rowElement.id = "row" + index;
        wrapperElement.appendChild(rowElement);
        {
            const pos = index % 2 ? 'right' : 'left';
            const colElement = document.createElement("col");
            colElement.className = 'col-12-' + pos;
            // colElement.style.textAlign = "center";
            let content = value.content.replace(/\r\n/g, '<br>');
            colElement.innerHTML = "<h2>" + value.title + "</h2><p>" + content + "</p>";
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