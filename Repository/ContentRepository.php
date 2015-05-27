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
}
