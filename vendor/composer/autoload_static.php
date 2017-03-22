<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit826975d1d15419eeff6160e6452c9b3e
{
    public static $classMap = array (
        'IdiormMethodMissingException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormResultSet' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormString' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'IdiormStringException' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'Model' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
        'ORM' => __DIR__ . '/..' . '/j4mie/idiorm/idiorm.php',
        'ORMWrapper' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
        'ParisMethodMissingException' => __DIR__ . '/..' . '/j4mie/paris/paris.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit826975d1d15419eeff6160e6452c9b3e::$classMap;

        }, null, ClassLoader::class);
    }
}
