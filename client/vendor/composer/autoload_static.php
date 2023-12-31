<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit87f584823839e3cabe868910fc85ebc0
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit87f584823839e3cabe868910fc85ebc0::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit87f584823839e3cabe868910fc85ebc0::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit87f584823839e3cabe868910fc85ebc0::$classMap;

        }, null, ClassLoader::class);
    }
}
