<?php
// utilisation de l'autoloader composer
$loader = require_once( 'vendor/autoload.php' );
// declaration les repertoires de sources de mon app
$loader->add('Controller\\', __DIR__);
$loader->add('Repository\\', __DIR__);
$loader->add('Entity\\', __DIR__);
// changement du header
//header( 'content-type:text/binary;charset=utf8' );
$main = new \Controller\Main( );
