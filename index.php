<?php
// utilisation de l'autoloader composer
$loader = require_once( 'vendor/autoload.php' );
// declaration les repertoires de sources de mon app
$loader->add('Controller\\', __DIR__);
$loader->add('Repository\\', __DIR__);
$loader->add('Entity\\', __DIR__);
// changement du header
//header( 'content-type:text/binary;charset=utf8' );
// tentative de connexion PDO
try {
    $db = new PDO( 'mysql:dbname=web1-cms-exo;host=127.0.0.1', 'root', 'root' );
} catch( PDOException $e ){
    die( $e->getMessage() );
}
//
$content = new \Repository\ContentRepository( $db );
$maPage = $content->getOneContent( 1 );
?>
<html>
    <head>
        <title><?php echo $maPage->getTitle()?></title>
    </head>
    <body>
    <h1><?php echo $maPage->getHeaderTitle()?></h1>
    <?php echo $maPage->getBody()?>
    </body>
</html>
