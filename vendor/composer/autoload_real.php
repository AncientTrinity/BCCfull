<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdbbf80ac018e2db04477e0f9c62dce5e
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

        spl_autoload_register(array('ComposerAutoloaderInitdbbf80ac018e2db04477e0f9c62dce5e', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdbbf80ac018e2db04477e0f9c62dce5e', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdbbf80ac018e2db04477e0f9c62dce5e::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
