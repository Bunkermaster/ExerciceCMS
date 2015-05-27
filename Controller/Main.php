<?php
/**
 * Created by PhpStorm.
 * User: yannlescouarnec
 * Date: 27/05/15
 * Time: 15:39
*/

namespace Controller;


use Repository\ContentRepository;

class Main
{
    private $route = [
        'viewPage' => [ 'controller' => 'contentController' , 'method' => 'viewPageAction' ],
        'listPages' => [ 'controller' => 'contentController' , 'method' => 'listAction' ],
    ];

    public function __construct( )
    {
        // tentative de connexion PDO
        try {
            $db = new \PDO( 'mysql:dbname=web1-cms-exo;host=127.0.0.1', 'root', 'root' );
        } catch( \PDOException $e ){
            die( $e->getMessage() );
        }
        $contentRepository = new ContentRepository( $db );
        $contentController = new ContentController( $contentRepository );
        // recuperation de la route $_REQUEST['p']
        if( isset( $_REQUEST['p'] ) && isset( $this->route[$_REQUEST['p']] )){
            // appel le controller
            $controllerName = $this->route[$_REQUEST['p']]['controller'];
            $methodName = $this->route[$_REQUEST['p']]['method'];
            $$controllerName->$methodName();
        } else {
            throw new \Exception( 'Le caca des canards c\'est caca' );
        }
    }

}