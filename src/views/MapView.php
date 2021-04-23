<?php
/**
 * @author vega
 */
namespace vega\hw4\views;

require_once('View.php');

class MapView extends View {
    private $map_arr;

    /**
     * Constructor 
     * @param array $map_arr array of map resources
     */
    public function __construct($map_arr) {
        parent::__construct();    
        $this->$map_arr = $map_arr;
    }

    public function render() {
        $this->header->render("");

        echo var_dump($map_arr);
        
        if (sizeof($this->$map_arr) == 1) {
            $image = imagepng($this->$map_arr[0])
            ?>
            <img src="<?= $image ?>"/>
            <?php
        }
        else {

        }


        $this->footer->render("");
    }
}