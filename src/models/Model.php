<?php
/**
 * @author vega
 */
namespace vega\hw4\models;

use vega\hw3 as config;

abstract class Model {

    /**
     * Data
     */
    protected $id;
    protected $type;
    protected static $db;

    /**
     * Contructor
     * @param int $id of Agenda location
     * @param String $type of action that the model will perform 
     */
    public function __construct($id, $type) {
        $this->$id = $id;
        $this->$type = $type;

    }

    
    /**
     * Connects to database
     * @param String $host
     * @param String $username
     * @param String $password
     * @param String @database
     */
    public function connectDatabase($host, $username, $password, $database) {

    }

    /**
     * Processes data passed in the constructor
     * @param array $array
     */
    abstract public function data($array);
}