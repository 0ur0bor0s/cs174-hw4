<?php
/**
 * @author vega, dat
 */
namespace vega\hw4\views;

use vega\hw4\views\elements as ELEMS;

require_once('View.php');
require_once(getcwd().'/src/views/elements/ZoomElement.php');
require_once(getcwd().'/src/views/elements/CoordinatesElement.php');
class MapView extends View {
    private $map_arr;
    private $i, $j, $m, $l;
    private $zoom_element;
    private $coordinates_element;

    /**
     * Constructor 
     * @param array $map_arr array of map resources
     */
    public function __construct($map_arr, $i=null, $j=null, $m=null, $l=null) {
        parent::__construct();    
        $this->map_arr = $map_arr;
        $this->i = $i;
        $this->j = $j;
        $this->m = $m;
        $this->l = $l;
        $this->zoom_element = new ELEMS\ZoomElement();
        $this->coordinates_element = new ELEMS\CoordinatesElement();
    }

    public function render() {

        $this->header->render("");
        
        ?><div class="controls"><?php
        $this->coordinates_element->renderElement($this->i, $this->j, $this->m, $this->l);
        ?> <br></br><?php
        $this->zoom_element->renderElement($this->i, $this->j, $this->m, $this->l);
        ?>
        </div>
        <div class="map"><?php
        if (sizeof($this->map_arr) == 1) {

            ob_start();
            imagejpeg($this->map_arr[0]);
            $raw_image_bytes = ob_get_clean();

            ?>
            <img src='data:image/jpeg;base64,<?= base64_encode($raw_image_bytes) ?>'/>
            <?php
        }
        else {
            $index = 1;
            foreach ($this->map_arr as $img) {
                
                if ($img == null) {
                    ?><a class='empty-cell'></a><?php
                } else {
                    ob_start();
                    imagejpeg($img);
                    $raw_image_bytes = ob_get_clean();
    
                    ?>
                    <img src='data:image/jpeg;base64,<?= base64_encode($raw_image_bytes) ?>'/>
                    <?php
    

                }

                if ($index++ == 3) {
                    ?><br><?php
                    $index = 1;
                }
            }
        }
        ?></div><?php


        $this->footer->render("");
    }
}