<?php
function noOfJumps($arr, $length)
{
    $ans = 0;
    $i = 0;

    while ($i  < $length) {
        $currJumpLength = $arr[$i];
        $nextMaxJump = 0;
        $ans++;

        $subarrayindex = 1;

        while ($currJumpLength--) {
            if (isset($arr[$i + $subarrayindex]) > 0) {
                if ($nextMaxJump < $arr[$i + $subarrayindex]) {
                    $nextMaxJump = $arr[$i + $subarrayindex];
                    $i = $i + $subarrayindex;
                    $subarrayindex++;
                }
            } else {
                $i = $i + $subarrayindex;
                $nextMaxJump = $arr[$length - 1];
                break;
            }
        }


        echo "Next {$nextMaxJump} and Ans : {$ans} and i : {$i}\n";
        if ($nextMaxJump == 0) return -1;
    }
    return $ans;
};

$arr = [1, 3, 5, 8, 9, 2, 6, 7, 6, 8, 9];
// echo "\n Ans : " . noOfJumps($arr, count($arr));

$arr = [1, 2, -1, 1, 3];
echo "\n Ans : " . noOfJumps($arr, count($arr));
