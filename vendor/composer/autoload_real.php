<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInite48c9de15c20624518e5db8ecbf2d8a5
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

        spl_autoload_register(array('ComposerAutoloaderInite48c9de15c20624518e5db8ecbf2d8a5', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInite48c9de15c20624518e5db8ecbf2d8a5', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInite48c9de15c20624518e5db8ecbf2d8a5::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}