<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Test page</title>
</head>
<body>
    <div class="container" style="width:100%; margin:0;">
    
    <div style="text-align: center; margin: 10px;"><h1>Test page</h1><h2>TEST</h2><input input class="btn btn-primary btn-lg" type="button" value="GET INFORMATION" id="add_block" /></div>
        
<?php include $content_view; ?>

</div>
<!--<script src="tch/test/cvs_test/public/js/xmlhttp.js"></script>-->
<script>
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

    // function addData() {
    //     if (XMLHttp.readyState == 4) {
    //         var json = XMLHttp.responseText;
    //         var data = JSON.parse(json);
    //         // var idata = data[1].id;
    //         // var namedata = data[3].first_name;
    //         var list = document.getElementById("text");
    //         var newNode = list.appendChild(document.createElement('div'));
    //
    //         for (var key in data){
    //             for (var i=0; i < key.length; i++){
    //                 console.log(data[key].first_name);
    //
    //             }
    //
    //             }newNode.innerHTML = "<tr><td>"+data[1].first_name+"</td></tr>";
    //         }
    //     }

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

            // var table = createTable(data);
            // document.body.appendChild(table);

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

</script>


<!--<input type="button" onclick="addData();" value="3"/>-->

<script src="/public/js/jquery-3.2.1.slim.min.js"></script>
<script src="/public/bootstrap/js/bootstrap.min.js" ></script>

</body>
</html>