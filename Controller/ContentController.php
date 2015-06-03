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
        $entity = $this->contentRepository->getOneContent( $id );
        if(!($entity instanceof ContentEntity)){
//        if($entity === false){
            throw new \Exception( 'OMGNODATA' );
        }
        ob_start(  );
        include( 'View/ViewOnePage.php' );
        $output = ob_get_clean();
        var_dump($output);
    }

    public function listAction()
    {
        $entityCollection = $this->contentRepository->listContent();
        include( 'View/ListPages.php' );
    }

}