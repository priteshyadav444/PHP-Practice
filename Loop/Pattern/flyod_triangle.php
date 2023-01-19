<?PHP
function flyodtriangle($height)
{
    $count = 1;
    for ($i = 1; $i <= $height; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            echo $count++ . " ";
        }
        echo "\n";
    }
}
flyodtriangle(8);
