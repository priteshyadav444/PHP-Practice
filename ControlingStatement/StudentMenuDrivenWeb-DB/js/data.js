
$(document).ready(function () {
    $("#refreshBtn").click(function (event) {
        event.preventDefault();
        console.log("clicked");

        function loadData() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    const response = JSON.parse(this.responseText);
                    const data = response.data;
                    console.log(data);
                    
                    data.forEach(data => {
                        var newRowContent = "<tr><td>"+ data.studentId +"</td><td>MCA"+ data.studentId +"</td><td>"+ data.name +"</td><td>"+ data.address +"</td> <td> <form action='update.php' method='post'> <input type='hidden' value= name='uid'> <button type='submit' class='btn btn-primary'>Update</button> </form></td></td> <td> <form action='update.php' method='post'> <input type='hidden' value= name='uid'> <button type='submit' class='btn btn-danger'>Delete</button> </form></td></tr>";
                        $("#studentTable tbody").append(newRowContent); 

                    });
        
                }
            };
            const apiUrl = 'http://192.168.1.126//programs/ControlingStatement/StudentMenuDrivenWeb-DB/StudentCollection.php';
            xhttp.open("GET", apiUrl, true);
            xhttp.send();
        }
        loadData();
    })
    loadData();
});
