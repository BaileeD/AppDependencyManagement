/**
 * Created by devey on 22/05/2017.
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

function inputValidate(source, span1, span2, username, password)
{
    var transfer1 = span1 + "=";
    var transfer2 = span2 + "=";

    var display1 = document.getElementById(span1);
    var display2 = document.getElementById(span2);

    if(username.trim() == "")
    {
        display1.innerHTML = "<span style=\"color: red;\" >Can not be empty</span>";
    }
    else
    {
        xhr.open("POST", source, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function()
        {
            if ((xhr.readyState == 4) && (xhr.status == 200))
            {
                var message = xhr.responseText;
                display1.innerHTML = message;
            }
        };
        xhr.send(transfer1 + username);
    }

    if(password.trim() == ""){
        display2.innerHTML = "<span style=\"color: red;\" >Can not be empty</span>";
    }
    else
    {
        xhr.open("POST", source, true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function()
        {
            if ((xhr.readyState == 4) && (xhr.status == 200))
            {
                var message = xhr.responseText;
                display2.innerHTML = message;
            }
        };
        xhr.send(transfer2 + password);
    }
    return display.innerHTML;
}