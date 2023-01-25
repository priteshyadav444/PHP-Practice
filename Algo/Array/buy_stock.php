<?php
function solve($arr, $length)
{
    $ans = array();
    $totalProfit = 0;
    $i = 0;

    while ($i < $length - 1) {
        $boughtPrice = $arr[$i];
        $tempProfit = 0;
        $tempProfitIdx = -1;

        for ($j = $i + 1; $j < $length; $j++) {
            $currentProfit = $arr[$j] - $boughtPrice;
            // if currrent Profit is negative than sell at privious Maximum Price 
            if ($currentProfit < 0) {
                // Check previous maximum value is availabe or not if not start iterating from $i + 1 
                if ($tempProfitIdx != -1) {
                    array_push($ans, "($i,$tempProfitIdx)");
                    $totalProfit += $tempProfit;
                    $i = $tempProfitIdx + 1;
                } else {
                    $i++;
                }
                break;
            } else {
                // if current profit is Maximum than previous set $tempProfit to $currentProfit  else sell the stock at that point 
                if ($currentProfit >= $tempProfit) {
                    $tempProfit = $currentProfit;
                    $tempProfitIdx = $j;
                } else {
                    array_push($ans, "($i,$tempProfitIdx)");
                    $totalProfit += $tempProfit;
                    $i = $tempProfitIdx + 1;
                    break;
                }
            }
        }
        if ($j == $length) {
            array_push($ans, "($i,$tempProfitIdx)");
            $totalProfit += $tempProfit;
            $i = $tempProfitIdx + 1;
        };
    }
    array_push($ans, array("Profit" => $totalProfit));
    return $ans;
}

$arr = [100, 1, 260, 45, 500, 12, 10];
$arr = [4, 2, 2, 2, 4];
$arr = [100, 180, 260, 310, 40, 535, 695];
$arr = [1, 2, 1, 2, 1, 2, 23];

print_r(solve($arr, count($arr)));
