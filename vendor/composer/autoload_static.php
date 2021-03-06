<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf16d0bad42a381963313bfae823004b8
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf16d0bad42a381963313bfae823004b8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf16d0bad42a381963313bfae823004b8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitf16d0bad42a381963313bfae823004b8::$classMap;

        }, null, ClassLoader::class);
    }
}
