window.onload = function () {

    const data = getProject();
    $.each(data, function (index, value) {
        const wrapperElement = document.getElementById("wrapper");
        const rowTitleElement = document.createElement("div");
        rowTitleElement.className = "row";
        rowTitleElement.id = "row" + index;
        rowTitleElement.style.alignItems = "center";
        wrapperElement.appendChild(rowTitleElement);
        {
            const colElement = document.createElement("div");
            colElement.className = "col-4-left";
            colElement.innerHTML = "<img src=\"images/logo.png\" alt=\"\" style=\"width: 80px; height: 80px\"/>";
            colElement.style.textAlign = "right";
            rowTitleElement.appendChild(colElement);
        }
        {
            const colElement = document.createElement("div");
            colElement.className = "col-20-right";
            colElement.innerHTML = "<h2><p3>Project " + (index+1) + " : </p3>" + value.title + "</h2>";
            colElement.style.textAlign = "left";
            rowTitleElement.appendChild(colElement);
        }

        const rowContentElement = document.createElement("div");
        rowContentElement.className = "row";
        rowContentElement.id = "row" + index;
        rowContentElement.style.alignItems = "center";
        wrapperElement.appendChild(rowContentElement);
        rowContentElement.appendChild(index % 2 ? content(index, value) : img(index, value));
        rowContentElement.appendChild(index % 2 ? img(index, value) : content(index, value));

        const lineElement = document.createElement("div");
        lineElement.className = "line";
        lineElement.style.marginLeft  = "0%";
        lineElement.style.marginRight = "0%";
        wrapperElement.appendChild(lineElement);
    });
};

function content(index, value) {
    const pos = index % 2 ? 'left' : 'right';
    const colElement = document.createElement("col");
    colElement.className = 'col-12-' + pos;
    // colElement.style.textAlign = "center";
    let content = value.content.replace(/\r\n/g, '<br>');
    colElement.innerHTML = "<h2>" + value.subtitle + "</h2><p>" + content + "</p>";
    return colElement;
}

function img(index, value) {
    const pos = index % 2 ? 'right' : 'left';
    const colElement = document.createElement("col");
    colElement.className = 'col-12-' + pos;
    colElement.style.textAlign = index % 2 ? 'left' : 'right';
    let imgHtmlCode = '';
    let imageUrlList = value.image_url.split(",");
    for(let i=0; i<imageUrlList.length; i++) {
        imgHtmlCode += '<img src="' + imageUrlList[i] + '" alt=""/><br>';
    }
    colElement.innerHTML = imgHtmlCode;
    return colElement;
}

function getProject() {

    let res;
    $.ajax({
        url: '/router.php/project',
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