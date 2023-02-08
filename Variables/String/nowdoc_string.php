<?php
$my_string = <<< 'EOF'
A similar syntax to heredoc but, similar to single quoted strings,
nothing is parsed (not   even escaped apostrophes \' and backslashes \\.)
GoalKicker.com – PHP Notes for Professionals 50
EOF;
var_dump($my_string);
/*
string(116) "A similar syntax to heredoc but, similar to single quoted strings,
nothing is parsed (not even escaped apostrophes \' and backslashes \\.)"
*/