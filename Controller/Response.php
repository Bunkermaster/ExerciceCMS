<?php
/**
 * Created by PhpStorm.
 * User: yannlescouarnec
 * Date: 29/06/15
 * Time: 10:38
*/

namespace Controller;


class Response {
    private $body;
    private $title;

    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     * @return $this
     */
    public function setBody( $body )
    {
        $this->body = $body;
        return $this;
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
     * @return $this
     */
    public function setTitle( $title )
    {
        $this->title = $title;
        return $this;
    }

}