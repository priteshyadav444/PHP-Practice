<?php
$big_array = array();
for ($i = 0; $i < 1000000; $i++) {
   $big_array[] = $i;
}

echo 'After building the array.<br>';
print_mem();
unset($big_array);
echo 'After unsetting the array.<br>';
print_mem();

function print_mem()
{
   /* Currently used memory */
   $mem_usage = memory_get_usage();

   /* Peak memory usage */
   $mem_peak = memory_get_peak_usage();
   echo 'The script is now using: <strong>' . round($mem_usage / 1024) . 'KB</strong> of memory.<br>';
   echo 'Peak usage: <strong>' . round($mem_peak / 1024) . 'KB</strong> of memory.<br><br>';
}
