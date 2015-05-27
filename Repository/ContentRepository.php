<?php
namespace Repository;


use Entity\ContentEntity;

class ContentRepository
{
    public function __construct( \PDO $pdo )
    {
        $this->pdo = $pdo;
    }

    public function getOneContent( $id )
    {
        $sql = "SELECT
                    `id` ,
                    `title` ,
                    `body` ,
                    `menu_title`,
                    `header_title` ,
                    `created_at` ,
                    `updated_at`
                FROM
                    `content`
                WHERE
                    `id` = :id_content
                ";
        $pdoStmt = $this->pdo->prepare( $sql );
        $pdoStmt->bindParam(':id_content', $id, \PDO::PARAM_INT);
        if(!$pdoStmt->execute()){
            return false;
        }
        if( $pdoStmt->rowCount() === 0 ){
            return false;
        }
        $result = $pdoStmt->fetchObject();
        $entity = new ContentEntity();
        $entity->setId( $result->id );
        $entity->setTitle( $result->title );
        $entity->setBody( $result->body );
        $entity->setMenuTitle( $result->menu_title );
        $entity->setHeaderTitle( $result->header_title );
        $entity->setCreatedAt( $result->created_at );
        $entity->setUpdatedAt( $result->updated_at );
        return $entity;
    }

    public function listContent( )
    {
        $sql = "SELECT
                    `id` ,
                    `title` ,
                    `body` ,
                    `menu_title`,
                    `header_title` ,
                    `created_at` ,
                    `updated_at`
                FROM
                    `content`
                ";
        $pdoStmt = $this->pdo->prepare( $sql );
        if(!$pdoStmt->execute()){
            return false;
        }
        if( $pdoStmt->rowCount() === 0 ){
            return false;
        }
        $entityCollection = [];
        $inc = 0;
        while( $result = $pdoStmt->fetchObject( )){
            $entityCollection[$inc] = new ContentEntity();
            $entityCollection[$inc]->setId( $result->id );
            $entityCollection[$inc]->setTitle( $result->title );
            $entityCollection[$inc]->setBody( $result->body );
            $entityCollection[$inc]->setMenuTitle( $result->menu_title );
            $entityCollection[$inc]->setHeaderTitle( $result->header_title );
            $entityCollection[$inc]->setCreatedAt( $result->created_at );
            $entityCollection[$inc]->setUpdatedAt( $result->updated_at );
            $inc++;
        }
        return $entityCollection;
    }
}
