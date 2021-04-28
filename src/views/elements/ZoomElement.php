<?php
/**
 * @author vega
 */
namespace vega\hw4\views\elements;

require_once('Element.php');

class ZoomElement extends Element {


    public function __construct() {

    }

    public function renderElement($i, $j, $m, $l) {
        ?>
        <div class='zoom'>
        <span>Zoom: </span>
        <?php
        if ($i == null && $j == null && $m == null && $l == null) { // level 0
            ?>
                <a href='index.php?c=MapController&m=show_map&arg1=1&arg2=1'><button>In</button></a>
                <button disabled>Out</button>
            <?php
        } 
        else if ($m == null && $l == null) { // level 1
            ?>
                <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>&arg3=1&arg4=1'><button>In</button></a>
                <a href='index.php?c=MapController&m=show_map'><button>Out</button></a>
            <?php
        } 
        else { // level 2
            ?>
                <button disabled>In</button>
                <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>'><button>Out</button></a>
            <?php
        }
        ?></div><?php
    }
}