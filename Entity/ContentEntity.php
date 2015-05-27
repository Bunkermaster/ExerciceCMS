<?php
/**
 * Created by PhpStorm.
 * User: yannlescouarnec
 * Date: 27/05/15
 * Time: 11:28
*/

namespace Entity;


class ContentEntity
{
    private $id;
    private $title;
    private $body;
    private $menuTitle;
    private $headerTitle;
    private $createdAt;
    private $updatedAt;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId( $id )
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle( $title )
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody( $body )
    {
        $this->body = $body;
    }

    /**
     * @return mixed
     */
    public function getMenuTitle()
    {
        return $this->menuTitle;
    }

    /**
     * @param mixed $menuTitle
     */
    public function setMenuTitle( $menuTitle )
    {
        $this->menuTitle = $menuTitle;
    }

    /**
     * @return mixed
     */
    public function getHeaderTitle()
    {
        return $this->headerTitle;
    }

    /**
     * @param mixed $headerTitle
     */
    public function setHeaderTitle( $headerTitle )
    {
        $this->headerTitle = $headerTitle;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt( $createdAt )
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     */
    public function setUpdatedAt( $updatedAt )
    {
        $this->updatedAt = $updatedAt;
    }

}
