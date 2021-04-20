<?php
/**
 *  @author Ben Foley
 */
namespace vega\hw4\controllers;


class Controller {
    /**
     * Data
     */
    protected $model;
    protected $view;

    /**
     * Constructor
     */
    public function __construct() {
        $this->model = 0;
        $this->view = 0;
    }
}