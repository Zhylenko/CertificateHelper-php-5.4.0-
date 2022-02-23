<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc2839ef38b948d0755f33d54055f8561
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'CertificateHelper\\' => 18,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'CertificateHelper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/CertificateHelper',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc2839ef38b948d0755f33d54055f8561::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc2839ef38b948d0755f33d54055f8561::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitc2839ef38b948d0755f33d54055f8561::$classMap;

        }, null, ClassLoader::class);
    }
}