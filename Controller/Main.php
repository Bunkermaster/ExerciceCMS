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
        'viewPageJson' => [ 'controller' => 'contentController' , 'method' => 'viewPageJsonAction' , 'json' => true ],
        'viewPage' => [ 'controller' => 'contentController' , 'method' => 'viewPageAction'],
        'listPages' => [ 'controller' => 'contentController' , 'method' => 'listAction' ],
    ];
    /**
     * @var string
     */
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
        // le controller reponds avec un objet de type \Controller\Response qui contient toutes donnees necessaires
        /** @var \Controller\Response $response */
        $response = $$controllerName->$methodName();
        if(!($response instanceof Response )){
            throw new exception( 'Response dafuck' );
        }
        // generation de la page en HTML ou de la sortie en JSON
        if( isset($_REQUEST['p'] ) && isset( $this->route[$_REQUEST['p']]['json'] ) && $this->route[$_REQUEST['p']]['json'] === true ){
            echo $response->getBody();
        } else {
            echo $this->outputHeader($response->getTitle()).$response->getBody().$this->outputFooter();
        }
    }

    /**
     * @return string
     */
    private function outputHeader( $title )
    {
        return $this->outputPart( 'header' , $title );
    }

    /**
     * @return string
     */
    private function outputFooter()
    {
        return $this->outputPart( 'footer' );
    }

    /**
     * @param $part
     *
     * @return string
     */
    private function outputPart( $part , $data = '' )
    {
        ob_start(  );
        include( 'View/'.$part.'.php' );
        return ob_get_clean();
    }

}