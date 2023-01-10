<?php
if ($condition) :
    echo "Do something if\n";
elseif ($another_condition) :
    echo "Do something elseif\n";

else :
    echo "Do something else\n";
endif;
?>
<?php if ($condition) : ?>
    <p>Do something in HTML</p>
<?php elseif ($another_condition) : ?>
    <p>Do something else in HTML</p>
<?php else : ?>
    <p>Do something different in HTML</p>
<?php endif; ?>