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


// check passed no is prime or not
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
// print prime no as per passed range
function printPrimeNo($start, $end)
{
    if ($start > $end || $start <= 1) return;
    echo "<br> Prime Numbers :";
    for ($i = $start; $i <= $end; $i++) {
        if (isPrime($i))
            echo "$i ";
    }
}
// $start should ne less than $ned $type takes odd or even
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

// $type argument if postive than it start print fibonachi in positive and negative for negenive fibonachi
function printFibo($type, $noOfElement)
{

    $fib = array();

    // Add the starting points to the Fibonacci series
    $fib[0] = 0;
    $fib[1] =  1;

    // Calculate the remaining elements in the series
    if ($type >= 0) {
        for ($i = 2; $i < $noOfElement; $i++) {
            array_push($fib, $fib[count($fib) - 2] + $fib[count($fib) - 1]);
        }
    } else {
        for ($i = 2; $i < $noOfElement; $i++) {
            array_unshift($fib, $fib[1] - $fib[0]);
        }
        array_pop($fib);
        $fib = array_reverse($fib);
    }


    // Print the Fibonacci series
    foreach ($fib as $num) {
        echo $num . " ";
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