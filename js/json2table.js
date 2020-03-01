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
        const editButtonText = document.createTextNode("Edit");
        editButton.appendChild(editButtonText);
        operationDiv.appendChild(editButton);

        const deleteButton = document.createElement("button");
        deleteButton.className = "deleteButton";
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
