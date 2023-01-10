<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/crudapp">CRUD APP</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./insert.php">Insert</a>
                    </li>

            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <?php
        include('connection.php');
        if (isset($_POST['uid'])) {
            $id = $_POST['uid'];
            $connection = new Connection();
            $result = $connection->getListingById($id);
            $row = mysqli_fetch_assoc($result);
            // var_dump($row);
        }
        if (isset($_POST['update'])) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $gender = $_POST['gender'];
            $qualification = $_POST['qualification'];
            $query = "update student set name='" . $name . "', email='" . $email . "', gender='" . $gender . "', address='" . $address . "', qualification='" . $qualification . "' where id='$id' ";
            
           
            if ($name == "" or $email == "" or $address == "" or $gender == "" or $qualification == "") {
                echo '<script> 
             alert("All Field Required");
             </script>';
            } else {
                try {
                    $connection = new Connection();
                    if ($connection->updateListing($name, $email, $gender, $address, $qualification,$id)) {
                        echo "<div class='alert alert-success' role='alert'>
                         Record Updated successfully
                        </div>";
                    } else {
                        echo "<div class='alert alert-success' role='alert'>
                        Error: " . $sql . "<br>
                        </div>";
                    }
                } catch (mysqli_sql_exception $e) {
                    echo "<div class='alert alert-danger' role='alert'>
                    Email Alredy Registerd<br>
                    </div>";
                } catch (exception $e) {
                    echo "<div class='alert alert-danger' role='alert'>
                    Error: " . $e . "<br>
                    </div>";
                }

                $result = $connection->getListingById($id);
                $row = mysqli_fetch_assoc($result);
            }

            // if ($conn->query("update student set name='" . $name . "', email='" . $email . "', gender='" . $gender . "', address='" . $address ."', qualification='" . $qualification . "' where id='$id' ")) {
            //     $newUrl = "./home.php";
            //     echo "Record Deleted";
            //     header('Location: ' . $newUrl);
            // } else {
            //     echo "Error: " . $sql . "<br>" . $conn->error;
            // }
        }
        ?>
        <form action="#" method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="hidden" name="id" value=<?php echo $row['id'] ?>>
                    <label for="inputPassword4">Name</label>
                    <input type="name" class="form-control" id="inputPassword4" name="name" placeholder="Enter Name" value="<?php echo $row['name'] ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Enter Email" value="<?php echo $row['email'] ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Address</label>
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St" value="<?php echo $row['address'] ?>" required>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputZip">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="flexRadioDefault1" <?php if ($row['gender'] == 'male') {
                                                                                                                echo "checked";
                                                                                                            } ?> value="male" required="required">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Male
                        </label>
                        <input class="form-check-input ml-2" type="radio" name="gender" id="flexRadioDefault2" <?php if ($row['gender'] == 'female') {
                                                                                                                    echo "checked";
                                                                                                                } ?> value="female" required="required">
                        <label class="form-check-label ml-4" for="flexRadioDefault2">
                            Female
                        </label>
                    </div>

                </div>
                <div class="form-group col-md-6">
                    <label for="inputState">Qualification</label>
                    <select id="inputState" class="form-control" name="qualification" required>
                        <option value="">Choose...</option>
                        <option value="bca" <?php if ($row['qualification'] == 'bca') {
                                                echo "selected";
                                            } ?>>BCA</option>
                        <option value="bcom" <?php if ($row['qualification'] == 'bcom') {
                                                    echo "selected";
                                                } ?>>BCOM</option>
                        <option value="bsc" <?php if ($row['qualification'] == 'bsc') {
                                                echo "selected";
                                            } ?>>BSC</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" value="submit" name="update">submit</button>
        </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>