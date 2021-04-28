<?php

/**
 * @author vega
 */

namespace vega\hw4\views\elements;

require_once('Element.php');

abstract class ArrowKeys extends Element
{


    /**
     * Constructor for the arrow key class
     */
    public function __construct($dir)
    {
    }

    /**
     * Renders the arrow keys on the web browser
     */
    public function renderElement($i, $j, $m, $l)
    {

    ?>
        <form method = "post">
            <i class="arrow up"></i></p>
            <i class="arrow left"></i> <i class="arrow right"></i></br>
            <i class="arrow down"></i></p>
        </form> 

        
    <?php

    }
}
