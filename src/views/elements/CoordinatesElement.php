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
        <span>Coordinates: </span>
        <form method="post" name="myForm" id='coordinates' onsubmit="return validateForm()">
            <div>
                <label for='i-coordinate'><strong>i:  </strong></label>
                <input id='i-coordinate' name="arg1" placeholder="i coordinate" type="text" required/>   
            </div>
            <div>
                <label for='j-coordinate'><strong>j:  </strong></label>
                <input id='j-coordinate' name="arg2" placeholder="j coordindate" type="text" required/>   
            </div>
            <div>
                <label for='m-coordinate'><strong>n: </strong></label>
                <input id='m-coordinate' name="arg3" placeholder="n coordinate" type="text" value=""/>   
            </div>
            <div>
                <label for='l-coordinate'><strong>m:</strong></label>
                <input id='l-coordinate' name="arg4" placeholder="m coordinate" type="text" value=""/>   
            </div>
            <div>
                <input type="submit" value="GO">
            </div>
        </form>      
        <?php
    }
}