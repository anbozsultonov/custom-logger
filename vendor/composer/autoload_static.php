<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1f28d05cd9529675938925f95b288116
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Anboz\\CustomLogger\\' => 19,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Anboz\\CustomLogger\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1f28d05cd9529675938925f95b288116::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1f28d05cd9529675938925f95b288116::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1f28d05cd9529675938925f95b288116::$classMap;

        }, null, ClassLoader::class);
    }
}
