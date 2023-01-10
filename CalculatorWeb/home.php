<!doctype html>
<html lang="en">

<head>
    <title>Calculator</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <div class="container mt-5">
        <?php
        include './Calculator.php';
        if (isset($_POST['submit'])) {
            $operation = (string)$_POST['operation'];
            if (!is_numeric($_POST['num1']) || !is_numeric($_POST['num2'])) {
                echo '<div class="alert alert-danger" role="alert">';
                echo "Enter valid Number";
                echo '</div>';
            } else {
                $num1 = floatval($_POST['num1']);
                $num2 = floatval($_POST['num2']);

                $calculator = new Calculator($num1, $num2, $operation);

                try {
                    $calculator->calcalate();
                    echo '<div class="alert alert-success" role="alert">';
                    echo "Result : {$num1} {$operation} {$num2} = " . $calculator->getResult();
                    echo '</div>';
                } catch (DivisionByZeroError $th) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo "Error : Cannot Divide by a Number with Zero. Line:" . $th->getMessage();
                    echo '</div>';
                } catch (Exception $ex) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $ex->getMessage();
                    echo '</div>';
                }
            }
        }
        ?>
        <form action="#" method="post">

            <div class="form-row">
                <div class="form-group col-md-2">
                    <label for="inputPassword4">Enter Num 1</label>
                    <input type="text" class="form-control" id="inputPassword4" name="num1" placeholder="Enter Number" value="12" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Operation</label>
                    <select id="inputState" class="form-control" name="operation" required>
                        <option selected value="">Choose...</option>
                        <option value="+">+ Addition</option>
                        <option value="-">- Substraction</option>
                        <option value="/">/ Divide</option>
                        <option value="*">* Multiplication</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                    <label for="inputPassword5">Enter Num 2</label>
                    <input type="text" class="form-control" id="inputPassword5" name="num2" placeholder="Enter Number" value="12" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" value="submit" name="submit">submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>