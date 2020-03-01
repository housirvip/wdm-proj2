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
            openEditForm();
        }
        const editButtonText = document.createTextNode("Edit");
        editButton.appendChild(editButtonText);
        operationDiv.appendChild(editButton);

        const deleteButton = document.createElement("button");
        deleteButton.className = "deleteButton";
        deleteButton.onclick = function () {
            openDeleteForm();
        }
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

const contact = [
    {"ID": 1, "User": "Bob", "Company": "Alfreds Futterkiste", "Country": "Germany", "Phone": "(682)123-1234"},
    {"ID": 2, "User": "Tom", "Company": "Alfreds Futterkiste", "Country": "Germany", "Phone": "(682)123-1234"},
    {"ID": 3, "User": "Chris", "Company": "Alfreds Futterkiste", "Country": "Germany", "Phone": "(682)123-1234"},
    {"ID": 4, "User": "Betty", "Company": "Alfreds Futterkiste", "Country": "Germany", "Phone": "(682)123-1234"},
];
const events = [
    {"ID": 1, "Title": "Apple IPhone 11 Pro Max 50% discount", "Date": "2020-01-28 05:54:37"},
    {"ID": 2, "Title": "Apple IPhone 12 Pro Max 60% discount", "Date": "2020-01-28 05:54:37"},
    {"ID": 3, "Title": "Apple IPhone 13 Pro Max 70% discount", "Date": "2020-01-28 05:54:37"},
    {"ID": 4, "Title": "Apple IPhone 14 Pro Max 80% discount", "Date": "2020-01-28 05:54:37"},
];
const projects = [
    {"ID": 1, "Title": "Bootstrap version 5 has released", "Date": "2020-01-28 05:54:37"},
    {"ID": 2, "Title": "Bootstrap version 6 has released", "Date": "2020-01-28 05:54:37"},
    {"ID": 3, "Title": "Bootstrap version 7 has released", "Date": "2020-01-28 05:54:37"},
    {"ID": 4, "Title": "Bootstrap version 8 has released", "Date": "2020-01-28 05:54:37"},
];
// const messages = [
//     {"ID": 1, "Title": "Betty send you a private message", "Date": "2020-01-28 05:54:37"},
//     {"ID": 1, "Title": "Tom send you a private message", "Date": "2020-01-28 05:54:37"},
//     {"ID": 1, "Title": "Chris send you a private message", "Date": "2020-01-28 05:54:37"},
//     {"ID": 1, "Title": "Bob send you a private message", "Date": "2020-01-28 05:54:37"},
// ];

let lastTab = "contact";

function changeTab(key) {
    if (lastTab) {
        document.getElementById(lastTab).classList.remove("active");
    }
    lastTab = key;
    document.getElementById(lastTab).classList.add("active");
    renderTable(key)
}

function renderTable(key) {
    const tableDiv = document.getElementById("table");
    tableDiv.innerHTML = "";
    switch (key) {
        case "contact":
            tableDiv.appendChild(buildHtmlTable(contact));
            break;
        case "event":
            tableDiv.appendChild(buildHtmlTable(events));
            break;
        case "project":
            tableDiv.appendChild(buildHtmlTable(projects));
            break;
        // case "message":
        //     tableDiv.appendChild(buildHtmlTable(messages));
        //     break;
        default:
            tableDiv.appendChild(buildHtmlTable(contact));
    }
}


function openAddForm() {
    if (lastTab == "contact") {
        document.getElementById("addContact").style.display = "block";
    } else if(lastTab == "event") {
        document.getElementById("addEvent").style.display = "block";
    } else if(lastTab == "project") {
        document.getElementById("addProject").style.display = "block";
    } else {
        document.getElementById("addContact").style.display = "block";
    }
}

function closeAddForm() {
    if (lastTab == "contact") {
        document.getElementById("addContact").style.display = "none";
    } else if(lastTab == "event") {
        document.getElementById("addEvent").style.display = "none";
    } else if(lastTab == "project") {
        document.getElementById("addProject").style.display = "none";
    } else {
        document.getElementById("addContact").style.display = "none";
    }
}

function openEditForm() {
    if (lastTab == "contact") {
        document.getElementById("editContact").style.display = "block";
    } else if(lastTab == "event") {
        document.getElementById("editEvent").style.display = "block";
    } else if(lastTab == "project") {
        document.getElementById("editProject").style.display = "block";
    } else {
        document.getElementById("editContact").style.display = "block";
    }
}

function closeEditForm() {
    if (lastTab == "contact") {
        document.getElementById("editContact").style.display = "none";
    } else if(lastTab == "event") {
        document.getElementById("editEvent").style.display = "none";
    } else if(lastTab == "project") {
        document.getElementById("editProject").style.display = "none";
    } else {
        document.getElementById("editContact").style.display = "none";
    }
}

function openDeleteForm() {
    if (lastTab == "contact") {
        document.getElementById("deleteContact").style.display = "block";
    } else if(lastTab == "event") {
        document.getElementById("deleteEvent").style.display = "block";
    } else if(lastTab == "project") {
        document.getElementById("deleteProject").style.display = "block";
    } else {
        document.getElementById("deleteContact").style.display = "block";
    }
}

function closeDeleteForm() {
    if (lastTab == "contact") {
        document.getElementById("deleteContact").style.display = "none";
    } else if(lastTab == "event") {
        document.getElementById("deleteEvent").style.display = "none";
    } else if(lastTab == "project") {
        document.getElementById("deleteProject").style.display = "none";
    } else {
        document.getElementById("deleteContact").style.display = "none";
    }
}

window.onload = renderTable;
