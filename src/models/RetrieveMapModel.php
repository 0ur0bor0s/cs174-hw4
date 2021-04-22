<?php
/**
 * @author vega
 */
namespace vega\hw4\models;

class RetrieveMapModel {

    /**
     * Data
     */
    private $zoom_level;
    private $i, $j, $m, $l;

    /**
     * Contructor
     * @param int $i, $j, $m, $l coordinates of the center image
     */
    public function __construct($i=null, $j=null, $m=null, $l=null) {
        if ($i === null && $j === null && $m === null && $l === null) { // full image
            $this->zoom_level = 0;
        }
        else if ($m === null && $l === null) { // zoom level 1
            $this->$zoom_level = 1;
        }
        else { // zoom level 2
            $this->$zoom_level = 2;
        }

        $this->$i = $i;
        $this->$j = $j;
        $this->$m = $m;
        $this->$l = $l;
    }


    /**
     * Retrieve images given coordinates of middle tile
     * @return array $img_arr is an array of image resources that are needed.
     * Empty images are null
     */
    public function retrieveImages() {
        $img_arr = array();

        if ($this->zoom_level == 0) { // justreturn the all.jpeg
            $full_img = imagecreatefromjpeg('../resources/all.jpeg');
            $img_arr[] = $full_img;
        }
        else if ($this->zoom_level == 1) {

            for ($index = $this->$i-1; $index <= $this->$i+1; ++$index) {
                for ($jndex = $this->$j-1; $jndex <= $this->$j+1; ++$jndex) {

                    // For invalid tiles, add a null item
                    if ($index < 0 || $index > 3 || $jndex < 0 || $jndex > 3) {
                        $img_arr[] = null;
                        continue;
                    }
                    
                    // Load image resource
                    $image_name = "../resources/".$index.$jndex.".jpeg";
                    $img_res = imagecreatefromjpeg($image_name);
                    
                    // Add image to array
                    $img_arr[] = $img_res;
                }
            }
        }
        else if ($this->zoom_level == 2) {
            
            for ($index = $this->$m-1; $index <= $this->$m+1; ++$index) {
                for ($jndex = $this->$l-1; $jndex <= $this->$l+1; ++$jndex) {

                    // For invalid tiles, add a null item
                    if ($index < 0 || $index > 3 || $jndex < 0 || $jndex > 3) {
                        $img_arr[] = null;
                        continue;
                    }
                    
                    // Load image resource
                    $image_name = "../resources/".$this->$i.$this->$j.$index.$jndex.".jpeg";
                    $img_res = imagecreatefromjpeg($image_name);
                    
                    // Add image to array
                    $img_arr[] = $img_res;
                }
            }
        }
        else {
            echo "<h1>ERROR: Invalid zoom level</h1>";
        }

        return $img_arr;
    }
}