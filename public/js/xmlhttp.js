function getXMLHttp() {
    var XMLHttp = null;
    if (window.XMLHttpRequest) {
        try {
            XMLHttp = new XMLHttpRequest();
        } catch (e){}
    } else if (window.ActiveXObject) {
        try {
            XMLHttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                XMLHttp = new ActiveXObject(
                    "Microsoft.XMLHTTP"
                );
            } catch (e) {}
        }
    }
    return XMLHttp;
}

    var XMLHttp = getXMLHttp();
    XMLHttp.open("GET","data/data.json");
    XMLHttp.onreadystatechange = addData();
    XMLHttp.send(null);

    function createTable(data) {
        var table = document.createElement('table');
        var thead = document.createElement('thead');
        var tr = document.createElement('tr');
        for ( var i=0; i < data.length; i++){
            var th = document.createElement('th');
            var newText = document.createTextNode(data[0],[i]);
            th.appendChild(newText);
            tr.appendChild(th);
        }
        thead.appendChild(tr);
        table.appendChild(thead);

        var tbody = document.createElement('tbody');
        for ( var i = 1; i < data.length; i++){
            var tr = document.createElement('tr');
            for ( var j = 0; j < data[i].length; j++){
                var td = document.createElement('td');
                var newText = document.createTextNode(data[i][j]);
                td.appendChild(newText);
                tr.appendChild(td);
            }
            tbody.appendChild(tr);
        }
        table.appendChild(tbody);
        return table;

    }
    function addData() {
        if (XMLHttp.readyState == 4) {
            var json = XMLHttp.responseText;
            var data = JSON.parse(json);
            console.log(data);

            var list = document.getElementById("text");
            var newNode = list.appendChild(document.createElement('tr'));
            var maxAmount = list.getElementsByTagName("tr").length;
            var newData = data[maxAmount-1];

            for( var key in data ){
                var lenInTab = key;
            }
            console.log(lenInTab);

            if (maxAmount > lenInTab){
                alert("There is nothing in the DataBase!");
            }else {
                newNode.innerHTML = "<td>" + newData.id +
                    "</td><td>" + newData.first_name +
                    "</td><td>" + newData.last_name +
                    "</td><td>" + newData.email +
                    "</td><td>" + newData.gender +
                    "</td><td>" + newData.ip_address +
                    "</td><td>" + newData.company +
                    "</td><td>" + newData.city +
                    "</td><td>" + newData.title +
                    "</td><td>" + newData.website + "</td>";
            }
        }
    }
    var add_block = document.getElementById("add_block");
    add_block.addEventListener("click", addData, false);
