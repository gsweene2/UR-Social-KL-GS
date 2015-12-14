
function getPeople(str) {
    if (str.length == 0) { 
        document.getElementById("peopleHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("peopleHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET", "getPeople.php?q=" + str, true);
        xmlhttp.send();
    }
}
