<?php
/**
 * @author vega
 */
namespace vega\hw4\views;

require_once('View.php');

class MapView extends View {
    public $map_arr;

    /**
     * Constructor 
     * @param array $map_arr array of map resources
     */
    public function __construct($map_arr) {
        parent::__construct();    
        $this->map_arr = $map_arr;
    }

    public function render() {

        $this->header->render("");        
        
        if (sizeof($this->map_arr) == 1) {

            ob_start();
            imagejpeg($this->map_arr[0]);
            $raw_image_bytes = ob_get_clean();

            //$image = imagepng($this->map_arr[0])
            ?>
            <img src='data:image/jpeg;base64,<?= base64_encode($raw_image_bytes) ?>'/>
            <?php
        }
        else {
            $i = 1;
            foreach ($this->map_arr as $img) {  
                ob_start();
                imagejpeg($img);
                $raw_image_bytes = ob_get_clean();

                //$image = imagepng($this->map_arr[0])
                ?>
                <img src='data:image/jpeg;base64,<?= base64_encode($raw_image_bytes) ?>'/>
                <?php

                if ($i++ == 3) {
                    ?><br><?php
                    $i = 1;
                }
            }
        }


        $this->footer->render("");
    }
}