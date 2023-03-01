<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<body>
    <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="post">
        <label>Enter Input 1:</label><input type="text" name="data1" required>
        <label>Enter Input 2:</label><input type="text" name="data2" required> <br><br>
        <label>Operation </label>

        <select name="operation" id="operation">
            <option value="primeno">Print Prime No</option>
            <option value="fibonacci">Print Fibonacci </option>
            <option value="even">Even </option>
            <option value="odd">Odd </option>
        </select>
        <input type="submit" name="submit" />
    </form>
</body>
<?php



function isPrime($input): bool
{
    // for 1 or less than all values are not prime
    if ($input <= 1)
        return false;

    for ($i = 2; $i <= sqrt($input); $i++) {
        if ($input % $i == 0)
            return false;
    }
    return true;
}
function printPrimeNo($start, $end)
{
    if ($start > $end || $start <= 1) return;
    echo "<br> Even Numbers :";
    for ($i = $start; $i <= $end; $i++) {
        if (isPrime($i))
            echo "$i ";
    }
}
function printNumber($start, $end, $type)
{
    if ($start > $end) return;
    if ($type == "odd") {
        echo "<br> Odd Numbers :";
        for ($i = $start; $i <= $end; $i++) {
            if ($i % 2 == 1 || $i % 2 == -1) {
                echo "$i ";
            }
        }
    } elseif ($type = "even") {
        echo "<br> Even Numbers :";

        for ($i = $start; $i <= $end; $i++) {
            if ($i % 2 == 0) {
                echo "$i ";
            }
        }
    }
}
function printFibo($start, $noofelement)
{

    $first = 0;
    $second = 1;

    $result = array();
    $count = count($result);

    while ($count <= $noofelement) {
        if ($start >= 0)
            $nextFibo = $first + $second;
        else
            $nextFibo = $second - $first;

        $nextFibo = $first + $second;


        if (($start < 0 && $nextFibo == 1) || $start < 0) {
            array_unshift($result, $nextFibo);
            // echo "if $nextFibo unshift $count \n";
        } else {
            // echo "else $nextFibo unshift $count \n";

            array_push($result, $nextFibo);
        }

        $first = $second;
        $second = $nextFibo;

        $count = count($result);
    }
    for ($i = 0; $i < count($result); $i++) {
        echo $result[$i] . " ";
    }
}


if (isset($_POST['submit'])) {

    if (!empty($_POST['data1']) && !empty($_POST['data2']) && !empty($_POST['operation'])) {

        $operation = $_POST['operation'];

        $num1 = $_POST['data1'];
        $num2 = $_POST['data2'];

        if ($operation == "even" || $operation == "odd") {
            if ($num1 > $num2) {
                echo "Num 1 Cannot be greater than Num 2 <br>";
                echo "Enter Valid Range";
            } else {
                printNumber($num1, $num2, $operation);
            }
        } elseif ($operation == "primeno") {
            if ($num1 > $num2 || $num1 <= 0) {
                echo "Enter Valid Range";
            } else {
                printPrimeNo($num1, $num2);
            }
        } elseif ($operation == "fibonacci") {
            if ($num1 > $num2) {
                echo "Enter Valid Range";
            } else {
                printFibo($num1, $num2);
            }
        }
    }
}
?>

</html>