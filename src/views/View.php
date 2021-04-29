<?php
/**
 * @author vega
 */
namespace vega\hw4\views;

require_once('layouts/Header.php');
require_once('layouts/Footer.php');

use vega\hw4\views\layouts as LTS;

abstract class View {
    protected $header;
    protected $footer;

    /**
     * Contructor
     */
    public function __construct() {
        $this->header = new LTS\Header();
        $this->footer = new LTS\Footer();
    }

    /**
     * Function to render page
     */
    abstract public function render();
}