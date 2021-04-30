<?php
/**
 * @author Ben Foley 
 */

namespace vega\hw4\views\elements;

abstract class Element {
    /**
     * Constructor
     */
    public function __contruct() {
    }

    /**
     * Function to render element
     */
    abstract public function renderElement($i, $j, $m, $l);
}