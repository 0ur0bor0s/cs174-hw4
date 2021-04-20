<?php
/**
 * @author vega
 */

namespace vega\hw4\views\elements;

abstract class Element {
    /**
     * Data
     */
    protected $dir;

    /**
     * Constructor
     */
    public function __contruct($dir) {
        $this->$dir = $dir;
    }

    /**
     * Function to render element
     */
    abstract public function renderElement($array);
}