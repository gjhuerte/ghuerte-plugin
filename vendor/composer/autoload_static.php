<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit834ed8bc05425015303b1c0152da14e5
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Inc\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Inc\\' => 
        array (
            0 => __DIR__ . '/../..' . '/inc',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit834ed8bc05425015303b1c0152da14e5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit834ed8bc05425015303b1c0152da14e5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
