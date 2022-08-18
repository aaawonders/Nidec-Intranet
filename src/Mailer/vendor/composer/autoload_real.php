<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf2a44e06ccf9d34107a4bbee7eeb8ea3
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

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitf2a44e06ccf9d34107a4bbee7eeb8ea3', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf2a44e06ccf9d34107a4bbee7eeb8ea3', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf2a44e06ccf9d34107a4bbee7eeb8ea3::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}