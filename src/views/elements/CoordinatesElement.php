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
                <label for='j'><strong>j:  </strong></label>
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
        if (isset($_REQUEST['arg1']) && isset($_REQUEST['arg2']) && isset($_REQUEST['arg3']) && isset($_REQUEST['arg4'])) { // all inputs
            ?>
                <a href='index.php?c=MapController&m=show_map&arg1=<?= $_REQUEST['arg1'] ?>&arg2=<?= $_REQUEST['arg2'] ?>&arg3=<?= $_REQUEST['arg3'] ?>&arg4=<?= $_REQUEST['arg4'] ?>'><button>GO</button></a>
            <?php
        } 
        else if (isset($_REQUEST['arg1']) && isset($_REQUEST['arg2'])) { // i and j inputs
            ?>
                <a href='index.php?c=MapController&m=show_map&arg1=<?=$_REQUEST['arg1'] ?>&arg2=<?= $_REQUEST['arg2'] ?>'><button>GO</button></a>
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