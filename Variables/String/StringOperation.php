<?php
class StringOperation
{
    function cleanStr($string)
    {
        // Replaces all spaces with hyphens.
        $string = str_replace(' ', '-', $string);
        // Removes special chars.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string);
        // Replaces multiple hyphens with single one.

        return $string;
    }

    function countWords($paragraph)
    {
        $paragraph = cleanStr($paragraph);
        $words = explode("-", $paragraph);
        $wordCounts = array();
        foreach ($words as $word) {
            if ($word == "" && $word == null)
                continue;
            $wordCounts[$word] = substr_count($paragraph, $word);
        }
        arsort($wordCounts);
        return $wordCounts;
    }
}
