<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite1373c7574e6e931ae4b7b6876a9ae93
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInite1373c7574e6e931ae4b7b6876a9ae93', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite1373c7574e6e931ae4b7b6876a9ae93', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite1373c7574e6e931ae4b7b6876a9ae93::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
