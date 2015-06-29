<?php
/**
 * Created by PhpStorm.
 * User: yannlescouarnec
 * Date: 27/05/15
 * Time: 15:10
*/

namespace Controller;


use Entity\ContentEntity;
use Repository\ContentRepository;

class ContentController {

    /**
     * @var ContentRepository
     */
    private $contentRepository;

    public function __construct( ContentRepository $contentRepository )
    {
        $this->contentRepository = $contentRepository;
    }

    public function viewPageAction( )
    {
        $id = $_GET['id'];
        /** @var ContentEntity $entity */
        $entity = $this->contentRepository->getOneContent( $id );
        if(!($entity instanceof ContentEntity)){
//        if($entity === false){
            throw new \Exception( 'OMGNODATA' );
        }
        ob_start(  );
        include( 'View/ViewOnePage.php' );
        $response = new Response();
        $response->setBody(ob_get_clean())->setTitle($entity->getHeaderTitle());
        return $response;
    }

    public function viewPageJsonAction( )
    {
        $id = $_GET['id'];
        $entity = $this->contentRepository->getOneContent( $id );
        if(!($entity instanceof ContentEntity)){
            throw new \Exception( 'OMGNODATA' );
        }
        $response = new Response();
        $response->setBody( json_encode( $entity ));
        return $response;
    }

    public function listAction()
    {
        $entityCollection = $this->contentRepository->listContent();
        ob_start(  );
        include( 'View/ListPages.php' );
        $response = new Response();
        $response->setBody(ob_get_clean())->setTitle( 'Liste des contenus' );
        return $response;
    }

}