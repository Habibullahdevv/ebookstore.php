<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf3f166b802ea4b78793c6a6604b02136
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitf3f166b802ea4b78793c6a6604b02136::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf3f166b802ea4b78793c6a6604b02136::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf3f166b802ea4b78793c6a6604b02136::$classMap;

        }, null, ClassLoader::class);
    }
}
