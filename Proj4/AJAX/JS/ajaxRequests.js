/**
 * Created by drapek on 21.12.15.
 */

//for defalut asynchronic is set
function ajaxGet(asynchronic = 1) {
        var xhttp = new XMLHttpRequest();
        var tableSufix = (asynchronic == 1) ? "Asynch" : "Synch";
        xhttp.onreadystatechange = function() {
            if (xhttp.readyState == 4 && xhttp.status == 200) {
                document.getElementById("tableGet" + tableSufix).innerHTML =  document.getElementById("tableGet" + tableSufix).innerHTML + xhttp.responseText;
            }
        };
        var min = document.getElementById("minVal").value;
        var max = document.getElementById("maxVal").value;
        var sleep_time = document.getElementById("sleep_time").value;

        xhttp.open("GET", "ajaxRequestHandlerGET.php?minVal="+ min + "&maxVal=" + max + "&type=" + ((asynchronic == 1)?"asynch":"synch") + "&sleep_time=" + sleep_time , (asynchronic == 1));
        xhttp.send();
}

function ajaxPost(asynchronic = 1) {
    var xhttp = new XMLHttpRequest();
    var tableSufix = (asynchronic == 1) ? "Asynch" : "Synch";
    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("tablePost" + tableSufix).innerHTML =  document.getElementById("tablePost" + tableSufix).innerHTML + xhttp.responseText;
        }
    };
    var min = document.getElementById("minVal").value;
    var max = document.getElementById("maxVal").value;
    var sleep_time = document.getElementById("sleep_time").value;

    xhttp.open("POST", "ajaxRequestHandlerPOST.php" , (asynchronic == 1));
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("minVal="+ min + "&maxVal=" + max + "&type=" + ((asynchronic == 1)?"asynch":"synch") + "&sleep_time=" + sleep_time);
}
