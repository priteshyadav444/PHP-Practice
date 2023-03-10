<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit70624096dd35d551787185606de0d187
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Priteshyadav444\\Tracker\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Priteshyadav444\\Tracker\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit70624096dd35d551787185606de0d187::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit70624096dd35d551787185606de0d187::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit70624096dd35d551787185606de0d187::$classMap;

        }, null, ClassLoader::class);
    }
}
