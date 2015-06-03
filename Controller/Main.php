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
    /**
     * @var array
     */
    private $route = [
        'viewPage' => [ 'controller' => 'contentController' , 'method' => 'viewPageAction' ],
        'listPages' => [ 'controller' => 'contentController' , 'method' => 'listAction' ],
    ];
    private $defaultRoute = 'listPages';

    /**
     * @throws \Exception
     */
    public function __construct( )
    {
        // tentative de connexion PDO
        try {
            $db = new \PDO( 'mysql:dbname=web1-cms-exo;host=127.0.0.1', 'root', 'root' );
        } catch( \PDOException $e ){
            die( $e->getMessage() );
        }
        // declaration des services pour l'injection de dependance
        $contentRepository = new ContentRepository( $db );
        $contentController = new ContentController( $contentRepository );
        // recuperation de la route $_REQUEST['p']
        if( isset( $_REQUEST['p'] ) && isset( $this->route[$_REQUEST['p']] )) {
            // appel le controller
            $controllerName = $this->route[$_REQUEST['p']]['controller'];
            $methodName     = $this->route[$_REQUEST['p']]['method'];
        } else {
            $controllerName = $this->route[$this->defaultRoute]['controller'];
            $methodName     = $this->route[$this->defaultRoute]['method'];
        }
        $$controllerName->$methodName();
    }

    private function outputHeader(){
        ob_start(  );
        include( 'View/header.php' );
        return ob_get_clean();
    }

}