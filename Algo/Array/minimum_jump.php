<?php
function noOfJumps($arr, $length)
{
    $ans = 0;
    $i = 0;

    while ($i  < $length) {
        $currJumpLength = $arr[$i];
        $nextMaxJump = 0;
        $ans++;
        echo "Current {$currJumpLength} and Ans : {$ans} and i : {$i}\n";

        if (($i + $currJumpLength + 1) >= $length) {
            break;
        }
        $subarrayindex = 1;

        while ($currJumpLength--) {
            if (isset($arr[$i + $subarrayindex]) > 0) {
                if ($nextMaxJump < $arr[$i + $subarrayindex]) {
                    $nextMaxJump = $arr[$i + $subarrayindex];
                }
            } elseif ($i  >= $length - 1) {
                $i = $i + $subarrayindex;
                $nextMaxJump = $arr[$length - 1];
                break;
            }
            $i = $i + $subarrayindex;
            $subarrayindex++;
            echo "Next {$nextMaxJump} and Ans : {$ans} and i : {$i}\n";
        }
        if ($nextMaxJump == 0) return -1;
    }
    return $ans;
};

// $arr = [1, 3, 5, 8, 9, 2, 6, 7, 6, 8, 9];
$arr = [1, 2, -1, 1, 3];
// $arr = [1, 3, -1, 1, 0]; 
// $arr = [1, 4, 3, 2, 6, 7];


echo "\n Ans : " . noOfJumps($arr, count($arr));
