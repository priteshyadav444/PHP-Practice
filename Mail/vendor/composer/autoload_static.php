<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd212403c2da63f8e2b1dc3978cde0729
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd212403c2da63f8e2b1dc3978cde0729::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd212403c2da63f8e2b1dc3978cde0729::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitd212403c2da63f8e2b1dc3978cde0729::$classMap;

        }, null, ClassLoader::class);
    }
}