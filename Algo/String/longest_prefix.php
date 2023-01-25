<?php
function solve($inputArray, $length)
{
    $firstString = $inputArray[0];
    $prefixLength = strlen($firstString);

    for ($i = 1; $i < $length; $i++) {
        $currentString = $inputArray[$i];
        $currentLength = 0;
        for ($j = 0; $j < strlen($currentString) and $j < strlen($firstString); $j++) {
            if ($currentString[$j] == $firstString[$j]) {
                $currentLength++;
            } else {
                break;
            }
        }
        if ($prefixLength > $currentLength) $prefixLength = $currentLength;
    }

    if ($prefixLength == 0) return -1;
    return substr($firstString, 0, $prefixLength);
}

$arr = [
    'dmlrpjyatcoqotxzplqmlptaipczhlikztcofaoaedruyqundkzqatqkkvjrgucineyugnxmsohsgdfmngcpbvamqldyfhgvnfrv',
    'oioerglunzjvbzxwblooqnuytrnyijuxtibkoogdppzrqyptjeizrezmvnnfyherqidgyjkoyjfrhwkscsrvytivivbgcfxupab',
    'llclwjcdfpvijodijndriexnmwhbyiplvtxrcbwkqtsaixitn',
    'lvskkgjujheztaustxtqhklbkvyupnhajbmvhvprfusawmspjlhsvtthouddhlfsmsqwpfpubhuzvmrhaazx'
];

print_r(solve($arr, count($arr)));
