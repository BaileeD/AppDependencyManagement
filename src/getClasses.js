/**
 * Created by Ethan on 24/05/2017.
 */
var xhr;
if (window.XMLHttpRequest)
{
    xhr = new XMLHttpRequest();
}
else if (window.ActiveXObject)
{
    xhr = new ActiveXObject("Microsoft.XMLHTTP");
}

function test() {
    var table = document.getElementById("Classes");
    var row = table.insertRow();
    var cell = row.insertCell(0);
    cell.innerHTML = "Hello World!";
}

function allClasses(source, project){
    // alert("Hello World");

    xhr.open("POST", source, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function()
    {
        if ((xhr.readyState == 4) && (xhr.status == 200)) {
            var table = document.getElementById("Classes");

            while (table.rows.length > 1) {
                table.deleteRow(1);
            }

            var message = xhr.responseText;

            if (message != "") {
                var classArray = message.split(",");
                for (var i in classArray) {
                    var row = table.insertRow();
                    var cell = row.insertCell(0);
                    cell.innerHTML = "" + classArray[i] + "";
                }
            }
        }
    };
    xhr.send("project=" + project);
}