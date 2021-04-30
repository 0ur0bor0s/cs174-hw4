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
            $this->zoom_level = 1;
        }
        else { // zoom level 2
            $this->zoom_level = 2;
        }

        $this->i = $i;
        $this->j = $j;
        $this->m = $m;
        $this->l = $l;
    }


    /**
     * Retrieve images given coordinates of middle tile
     * @return array $img_arr is an array of image resources that are needed.
     * Empty images are null
     */
    public function retrieveImages() {
        $img_arr = array();

        if ($this->zoom_level == 0) { // just return the all.jpeg
            $full_img = imagecreatefromjpeg(getcwd().'/src/resources/all.jpeg');
            $img_arr[] = $full_img;
        }
        else if ($this->zoom_level == 1) {
            for ($index = $this->i-1; $index <= $this->i+1; ++$index) {
                for ($jndex = $this->j-1; $jndex <= $this->j+1; ++$jndex) {

                    // For invalid tiles, add a null item
                    if ($index < 0 || $index > 3 || $jndex < 0 || $jndex > 3) {
                        $img_arr[] = null;
                        continue;
                    }
                    
                    // Load image resource
                    $image_name = getcwd()."/src/resources/".$jndex.$index.".jpeg";
                    $img_res = imagecreatefromjpeg($image_name);
                    
                    // Add image to array
                    $img_arr[] = $img_res;
                }
            }
        }
        else if ($this->zoom_level == 2) {
            for ($index = $this->m-1; $index <= $this->m+1; ++$index) {
                for ($jndex = $this->l-1; $jndex <= $this->l+1; ++$jndex) {

                    // For invalid tiles, add a null item
                    if (($index < 0 && $this->i == 0) || ($index > 3 && $this->i == 3) || ($jndex < 0 && $this->j == 0) || ($jndex > 3 && $this->j == 3)) {
                        $img_arr[] = null;
                        continue;
                    }

                    // Modulo 4 is needed calculate tiles outside of i and j level
                    $m_mod = (4 + ($jndex % 4)) % 4;
                    $l_mod = (4 + ($index % 4)) % 4;
                    
                    $new_i = $this->j; 
                    $new_j = $this->i; 
                    $new_m = $jndex;
                    $new_l = $index;

                    if ($jndex < 0) { // up
                        $new_m = $m_mod;
                        $new_i--;
                    } else if ($jndex > 3) { // down
                        $new_m = $m_mod;
                        $new_i++;
                    }

                    if ($index < 0) { // left
                        $new_l = $l_mod;
                        $new_j--;                       
                    } else if ($index > 3) { // right
                        $new_l = $l_mod;
                        $new_j++;
                    }

                    
                    // Load image resource
                    $image_name = getcwd()."/src/resources/".$new_i.$new_j.$new_m.$new_l.".jpeg";
                    //echo $new_i.$new_j.$new_m.$new_l."\n";
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