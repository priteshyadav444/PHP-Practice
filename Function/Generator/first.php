<?php

function gen_one_to_three()
{
    for ($i = 1; $i <= 3; $i++) {
        // Note that $i is preserved between yields.
        yield $i;
        echo "Inside $i \n";
    }
}

foreach (gen_one_to_three() as $value) {
    echo $value . "\n";
}
