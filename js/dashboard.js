const _table_ = document.createElement('table'),
    _tr_ = document.createElement('tr'),
    _th_ = document.createElement('th'),
    _td_ = document.createElement('td');

// Builds the HTML Table out of myList json data from Ivy restful service.
function buildHtmlTable(arr) {
    const table = _table_.cloneNode(false),
        columns = addAllColumnHeaders(arr, table);
    for (let i = 0, maxi = arr.length; i < maxi; ++i) {
        let tr = _tr_.cloneNode(false);
        for (let j = 0, maxj = columns.length; j < maxj; ++j) {
            let td = _td_.cloneNode(false);
            // cellValue = arr[i][columns[j]];
            td.appendChild(document.createTextNode(arr[i][columns[j]] || ''));
            tr.appendChild(td);
        }
        const operationDiv = document.createElement("div");
        operationDiv.className = "operation";

        const editButton = document.createElement("button");
        editButton.className = "editButton";
        editButton.onclick = function () {
            currentData = arr[i];
            openEditForm();
        };
        const editButtonText = document.createTextNode("Edit");
        editButton.appendChild(editButtonText);
        operationDiv.appendChild(editButton);

        const deleteButton = document.createElement("button");
        deleteButton.className = "deleteButton";
        deleteButton.onclick = function () {
            currentData = arr[i];
            openDeleteForm();
        };
        const deleteButtonText = document.createTextNode("Delete");
        deleteButton.appendChild(deleteButtonText);
        operationDiv.appendChild(deleteButton);

        tr.appendChild(operationDiv);
        table.appendChild(tr);
    }
    return table;
}

// Adds a header row to the table and returns the set of columns.
// Need to do union of keys from all records as some records may not contain
// all records
function addAllColumnHeaders(arr, table) {
    const columnSet = [],
        tr = _tr_.cloneNode(false);
    for (let i = 0, l = arr.length; i < l; i++) {
        for (let key in arr[i]) {
            if (arr[i].hasOwnProperty(key) && columnSet.indexOf(key) === -1) {
                columnSet.push(key);
                const th = _th_.cloneNode(false);
                th.appendChild(document.createTextNode(key));
                tr.appendChild(th);
            }
        }
    }
    const th_operation = _th_.cloneNode(false);
    th_operation.appendChild(document.createTextNode("Operation"));
    tr.appendChild(th_operation);
    table.appendChild(tr);
    return columnSet;
}

let lastTab = "equipo";
let currentData = null;

function changeTab(key) {
    if (lastTab) {
        document.getElementById(lastTab).classList.remove("active");
    }
    lastTab = key;
    document.getElementById(lastTab).classList.add("active");
    renderTable()
}

function renderTable() {
    const tableDiv = document.getElementById("table");
    tableDiv.innerHTML = "";
    let url;
    switch (lastTab) {
        case "equipo":
            url = '/router.php/equipo';
            break;
        case "event":
            url = '/router.php/event';
            break;
        case "project":
            url = '/router.php/project';
            break;
        default:
            url = '/router.php/equipo';
    }
    $.ajax({
        url: url,
        type: "GET",
        dataType: "json",
        success: function (data) {
            currentData = data;
            tableDiv.appendChild(buildHtmlTable(data));
        }
    });
}

function openAddForm() {
    if (lastTab === "equipo") {
        document.getElementById("addEquipo").style.display = "block";
    } else if (lastTab === "event") {
        document.getElementById("addEvent").style.display = "block";
    } else if (lastTab === "project") {
        document.getElementById("addProject").style.display = "block";
    } else {
        document.getElementById("addEquipo").style.display = "block";
    }
}

function closeAddForm() {
    if (lastTab === "equipo") {
        document.getElementById("addEquipo").style.display = "none";
    } else if (lastTab === "event") {
        document.getElementById("addEvent").style.display = "none";
    } else if (lastTab === "project") {
        document.getElementById("addProject").style.display = "none";
    } else {
        document.getElementById("addEquipo").style.display = "none";
    }
}

function submitAddForm() {
    let url;
    currentData = {};
    if (lastTab === "equipo") {
        url = '/router.php/equipo';
        currentData.name = document.getElementById("user").value;
        currentData.email = document.getElementById("email").value;
        currentData.phone = document.getElementById("phone").value;
        currentData.experience = document.getElementById("experience").value;
        currentData.avatar = document.getElementById("avatar").value;
    } else if (lastTab === "event") {
        url = '/router.php/event';
    } else if (lastTab === "project") {
        url = '/router.php/project';
    } else {
        url = '/router.php/equipo';
    }
    closeAddForm();
    $.ajax({
        url: url,
        type: "POST",
        data: JSON.stringify(currentData),
        dataType: "json",
        success: function (data) {
            if (data) {
                renderTable();
            } else {
                alert('failed');
            }
        }
    });
    console.log(currentData);
}

function openEditForm() {
    console.log(currentData);
    if (lastTab === "equipo") {
        document.getElementById("editEquipo").style.display = "block";
        document.getElementById("userEdit").value = currentData.name;
        document.getElementById("emailEdit").value = currentData.email;
        document.getElementById("phoneEdit").value = currentData.phone;
        document.getElementById("experienceEdit").value = currentData.experience;
        document.getElementById("avatarEdit").value = currentData.avatar;
    } else if (lastTab === "event") {
        document.getElementById("editEvent").style.display = "block";
    } else if (lastTab === "project") {
        document.getElementById("editProject").style.display = "block";
    } else {
        document.getElementById("editEquipo").style.display = "block";
    }
}

function closeEditForm() {
    if (lastTab === "equipo") {
        document.getElementById("editEquipo").style.display = "none";
    } else if (lastTab === "event") {
        document.getElementById("editEvent").style.display = "none";
    } else if (lastTab === "project") {
        document.getElementById("editProject").style.display = "none";
    } else {
        document.getElementById("editEquipo").style.display = "none";
    }
}

function submitEditForm() {
    let url;
    if (lastTab === "equipo") {
        url = '/router.php/equipo';
        currentData.name = document.getElementById("userEdit").value;
        currentData.email = document.getElementById("emailEdit").value;
        currentData.phone = document.getElementById("phoneEdit").value;
        currentData.experience = document.getElementById("experienceEdit").value;
        currentData.avatar = document.getElementById("avatarEdit").value;
    } else if (lastTab === "event") {
        url = '/router.php/event';
    } else if (lastTab === "project") {
        url = '/router.php/project';
    } else {
        url = '/router.php/equipo';
    }
    closeEditForm();
    $.ajax({
        url: url,
        type: "PUT",
        data: JSON.stringify(currentData),
        dataType: "json",
        success: function (data) {
            if (data) {
                renderTable();
            } else {
                alert('failed');
            }
        }
    });
    console.log(currentData);
}

function openDeleteForm() {
    if (lastTab === "equipo") {
        document.getElementById("deleteEquipo").style.display = "block";
    } else if (lastTab === "event") {
        document.getElementById("deleteEvent").style.display = "block";
    } else if (lastTab === "project") {
        document.getElementById("deleteProject").style.display = "block";
    } else {
        document.getElementById("deleteEquipo").style.display = "block";
    }
}

function closeDeleteForm() {
    if (lastTab === "equipo") {
        document.getElementById("deleteEquipo").style.display = "none";
    } else if (lastTab === "event") {
        document.getElementById("deleteEvent").style.display = "none";
    } else if (lastTab === "project") {
        document.getElementById("deleteProject").style.display = "none";
    } else {
        document.getElementById("deleteEquipo").style.display = "none";
    }
}

function submitDeleteForm() {
    let url;
    if (lastTab === "equipo") {
        url = '/router.php/equipo';
    } else if (lastTab === "event") {
        url = '/router.php/event';
    } else if (lastTab === "project") {
        url = '/router.php/project';
    } else {
        url = '/router.php/equipo';
    }
    closeDeleteForm();
    $.ajax({
        url: url + '?id=' + currentData.id,
        type: "DELETE",
        dataType: "json",
        success: function (data) {
            if (data) {
                renderTable();
            } else {
                alert('failed');
            }
        }
    });
    console.log(currentData);
}

window.onload = renderTable;
