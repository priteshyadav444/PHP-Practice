<?php
spl_autoload_register(function ($class) {
    $path = str_replace("\\", "/", $class);
    $path = __DIR__ . "/../../" . $path . ".php";

    include $path;


    echo "<pre>";
    var_dump(file_exists($path));
    if (file_exists($path) || is_dir($path)) {
        var_dump(__DIR__);
        var_dump(basename(__DIR__));
        var_dump(dirname(__DIR__));
        var_dump(pathinfo(__DIR__));
        echo "Scan dir";
        var_dump(scandir(dirname(__DIR__)));
    }
});


use Validation\Validators\FormValidator;

$obj = new FormValidator();
