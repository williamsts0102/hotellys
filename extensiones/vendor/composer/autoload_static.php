<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit17a2e4148745c70dafbb3bfcd08a6a0a
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Cache\\' => 10,
            'PHPMailer\\PHPMailer\\' => 20,
        ),
        'M' => 
        array (
            'MercadoPago\\' => 12,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Cache\\' => 22,
            'Doctrine\\Common\\Annotations\\' => 28,
            'Doctrine\\Common\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/cache/src',
        ),
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
        'MercadoPago\\' => 
        array (
            0 => __DIR__ . '/..' . '/mercadopago/dx-php/src/MercadoPago',
            1 => __DIR__ . '/..' . '/mercadopago/dx-php/tests',
            2 => __DIR__ . '/..' . '/mercadopago/dx-php/src/MercadoPago/Generic',
            3 => __DIR__ . '/..' . '/mercadopago/dx-php/src/MercadoPago/Entities',
            4 => __DIR__ . '/..' . '/mercadopago/dx-php/src/MercadoPago/Entities/Shared',
        ),
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
        'Doctrine\\Common\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/common/lib/Doctrine/Common',
        ),
    );

    public static $prefixesPsr0 = array (
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/lexer/lib',
            ),
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
            'Doctrine\\Common\\Collections\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/collections/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit17a2e4148745c70dafbb3bfcd08a6a0a::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit17a2e4148745c70dafbb3bfcd08a6a0a::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit17a2e4148745c70dafbb3bfcd08a6a0a::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit17a2e4148745c70dafbb3bfcd08a6a0a::$classMap;

        }, null, ClassLoader::class);
    }
}
