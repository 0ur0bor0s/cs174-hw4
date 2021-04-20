<?php
/**
 * @author vega
 */
namespace vega\hw4\views;

require_once('layouts/Header.php');
require_once('layouts/Footer.php');

use vega\hw3\views\layouts as lts;

abstract class View {
    protected $header;
    protected $footer;

    /**
     * Contructor
     */
    public function __construct() {
        $this->header = new lts\Header();
        $this->footer = new lts\Footer();
    }

    /**
     * Function to render page
     */
    abstract public function render();
}