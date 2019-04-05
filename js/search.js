document.getElementById("searchbox").onkeyup = function () {
    var val = document.getElementById("searchbox").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xmlhttp);
            document.getElementById("dropdownarea").innerHTML = xmlhttp.response;
        }
    };
    xmlhttp.open("GET", "search.php?sc="+val, true);
    xmlhttp.send();
}