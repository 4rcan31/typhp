<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit98d827dc80bd3389feef03a39690c174
{
    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'Typhp\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Typhp\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit98d827dc80bd3389feef03a39690c174::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit98d827dc80bd3389feef03a39690c174::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit98d827dc80bd3389feef03a39690c174::$classMap;

        }, null, ClassLoader::class);
    }
}
