<?php
/**
 * @author dat
 */
namespace vega\hw4\views\elements;

require_once('Element.php');

class CoordinatesElement extends Element {


    public function __construct() {

    }

    public function renderElement($i, $j, $m, $l) {
        ?>
        <div class='coordinates' >
        <span>Coordinates: </span>
        <form>
            <div>
                <label for='i-coordinate'><strong>i:  </strong></label>
                <input id='i-coordinate' name="arg1" placeholder="0" type="text" />   
            </div>
            <div>
                <label for='j-coordinate'><strong>j:  </strong></label>
                <input id='j-coordinate' name="arg2" placeholder="0" type="text" />   
            </div>
            <div>
                <label for='m-coordinate'><strong>n: </strong></label>
                <input id='m-coordinate' name="arg3" placeholder="0" type="text" />   
            </div>
            <div>
                <label for='l-coordinate'><strong>m:</strong></label>
                <input id='l-coordinate' name="arg4" placeholder="0" type="text" />   
            </div>
        </form>
        <?php
        if (isset($i) && isset($j) && isset($m) && isset($l)) { // all inputs
            ?>
                <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>&arg3=<?= $m ?>&arg4=<?= $l ?>'><button>GO</button></a>
            <?php
        } 
        else if (isset($i) && isset($j)) { // i and j inputs
            ?>
                <a href='index.php?c=MapController&m=show_map&arg1=<?=$i ?>&arg2=<?= $j ?>'><button>GO</button></a>
            <?php
        } 
        else { // no inputs
            ?>
                <a href='index.php?c=MapController&m=show_map'><button>GO</button></a>
            <?php
        }
        ?></div><?php
    }
}