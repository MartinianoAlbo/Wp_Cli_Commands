<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite1373c7574e6e931ae4b7b6876a9ae93
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'Root\\McoTest\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Root\\McoTest\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite1373c7574e6e931ae4b7b6876a9ae93::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite1373c7574e6e931ae4b7b6876a9ae93::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite1373c7574e6e931ae4b7b6876a9ae93::$classMap;

        }, null, ClassLoader::class);
    }
}
