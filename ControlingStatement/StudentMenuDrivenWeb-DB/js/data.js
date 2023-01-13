
$(document).ready(function () {
    $("#refreshBtn").click(function (event) {
        event.preventDefault();
        console.log("clicked");

        function loadData() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("demo").innerHTML =
                        this.responseText;
                }
            };
            const apiUrl = 'http://192.168.1.126//programs/ControlingStatement/StudentMenuDrivenWeb-DB/StudentCollection.php';
            xhttp.open("GET", apiUrl, true);
            xhttp.send();
        }
        loadData();
    })
});
