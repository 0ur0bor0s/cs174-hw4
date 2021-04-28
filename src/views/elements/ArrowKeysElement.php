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
    public function __construct()
    {
    }

    /**
     * Renders the arrow keys on the web browser
     */
    public function renderElement($i, $j, $m, $l)
    {

?>
        <div class="arrow-keys">
            <?php

            ?>
            <button>
                <?php $this->zoom_level_2_arrowkeys($m, $l); ?><i class="arrow up"></i>
            </button>
            </a>

            </br>

        
            <button><i class="arrow left"></button></i>
            <button><i class="arrow right"></i></button></br>
            <button><i class="arrow down"></i></button>
        </div>



    <?php
    }


    private function zoom_level_1_arrowkeys($i, $j, $m, $l )
    {
    ?> 
        <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>&arg3<?= $l ?>$arg4<?= $m ?>'>

        <?php
    }
    private function zoom_level_2_arrowkeys($m, $l)
    {
        ?>
            <a href='index.php?c=MapController&m=show_map&arg1=<?= $m ?>&arg2=<?= $l ?>'>

        <?php
    }
}
