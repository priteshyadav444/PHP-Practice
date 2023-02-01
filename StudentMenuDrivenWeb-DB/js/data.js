
$(document).ready(function () {
    function loadData() {
        $("#studentTable tbody").empty();

        const apiUrl = 'http://192.168.1.126/programs/StudentMenuDrivenWeb-DB/StudentCollection.php';
        $.ajax({
            url: apiUrl,
            method: "GET",
            success: function (response) {
                const result = response
                const data = result.data;
                data.forEach(data => {
                    var newRowContent = "<tr><td>" + data.studentId + "</td><td>MCA" + data.studentId + "</td><td>" + data.name + "</td><td>" + data.address + "</td> <td> <form action='update.php' method='post'> <input type='hidden' value=" + data.studentId + " name='uid'> <button type='submit' class='btn btn-primary'>Update</button> </form></td></td> <td> <form action='update.php' method='post'> <input type='hidden' value= name='uid'> <button type='submit' class='btn btn-danger'>Delete</button> </form></td></tr>";
                    $("#studentTable tbody").append(newRowContent);
                });
            }
        });
    }

    $("#refreshBtn").click(function (event) {
        event.preventDefault();
        loadData();
    })
    loadData();

});
