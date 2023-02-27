<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTables</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type=" text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.2/js/dataTables.jqueryui.min.js"></script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#logtable').DataTable({
                processing: true,
                serverSide: true,
                ajax: './api.php',
            });
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="./<?php echo basename($_SERVER['PHP_SELF']); ?>">DataTable</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="">Insert</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <table id="logtable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Visited Date</th>
                    <th>Log id</th>
                    <th>Page</th>
                    <th>Referrer</th>
                    <th>Ip Address</th>
                    <th>Location</th>
                    <th>Device</th>
                </tr>
            </thead>

            <tfoot>
                <tr>
                    <th>Visited Date</th>
                    <th>Log id</th>
                    <th>Page</th>
                    <th>Referrer</th>
                    <th>Ip Address</th>
                    <th>Location</th>
                    <th>Device</th>
                </tr>
            </tfoot>
        </table>
    </div>
</body>

</html>