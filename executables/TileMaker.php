<?php
/**
 * @author vega 
 */
namespace vega\hw4\tilemaker;

use Monolog\Handler\FirePHPHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

//$logger = new Logger('TileMaker logger');
//$logger->pushHandler(new StreamHandler(__DIR__.'/FileHandler.log', Logger::DEBUG));
//$logger->pushHandler(new FirePHPHandler());

/**
 * Create zoomed images
 * @param int $dest_folder is the folder to write images into
 * @param resource $l_img is the image that will be divided
 * @param int $l_width is the width of the original image
 * @param int $l_height is the height of the original image
 * @param int $stop is a boolean to determine whether to further recursively iterate
 */
function create_zoom_imgs($dest_folder, $l_img, $l_width, $l_height, $stop = false, $u = NULL, $v = NULL) {
    
    $section_size_x = $l_width * .25;
    $section_size_y = $l_height * .25;
   

    // Nested loop to create each tile in the image
    for ($i = 0; $i < 4; ++$i) {
        for ($j = 0; $j < 4; ++$j) {
            // Create image resource
            $sect_img = imagecreatetruecolor(200, 200);

            // Copy necessary tile from original image
            imagecopyresampled($sect_img, $l_img,
                                0, 0,
                                $section_size_x * $i, $section_size_y * $j,
                                200, 200, $section_size_x, $section_size_y);
            
            // Write image to file
            if ($u !== NULL && $v !== NULL) {
                $img_filename = $u.$v.$i.$j.".jpeg";

                if (!imagejpeg($sect_img, "./".$dest_folder."/".$img_filename, 100)) {
                    echo "Error writing ".$u.$v.$i.$j.".jpeg to file";
                    exit(1);
                }
            }
            else {
                $img_filename = $i.$j.".jpeg";

                if (!imagejpeg($sect_img, "./".$dest_folder."/".$img_filename, 100)) {
                    echo "Error writing ".$i.$j.".jpeg to file";
                    exit(1);
                }
            }

            // Feed new image back into function to further divide images
            if (!$stop) {
                create_zoom_imgs($dest_folder, $sect_img, 200, 200, true, $i, $j);
            }
        }
    }
    

    
}

/**
 * Main function to be called
 * @param array $argv command line arguments array
 */
function main($argv) {

    // Debugging dumps
    //var_dump(gd_info());
    //var_dump($argv);

    // Check number of parameters
    if (sizeof($argv) != 3) {
        echo "ERROR: Invalid number of parameters";
        exit(1);
    }
    
    $image_name = $argv[1];
    $dest_folder = $argv[2];

    // Check if file exists and can be accessed
    if (($fp = fopen($image_name, "rb")) == NULL) {
        echo "ERROR: File could not be opened";
        exit(1);
    }
    fclose($fp);


    // Get height and width of original image
    list($i_width, $i_height) = getimagesize($image_name);

    // create image resources
    $origin_img = imagecreatefromjpeg($image_name);
    $all_img = imagecreatetruecolor(800, 800);


    // Resize image if not 800 x 800
    if ($i_width != 800 || $i_height != 800) {
        echo "Resizeing image in all.jpeg";
        imagecopyresampled($all_img, 
                            $origin_img, 
                            0, 0,
                            0, 0,
                            800, 800,
                            $i_width, $i_height);
    }
    // No resize needed. Just copy
    else {
        echo "No resizing needed\nCopying to all.jpeg";
        imagecopy($all_img, 
                  $origin_img, 
                  0, 0,
                  0, 0,
                  800, 800);
    }

    // output $all_img to file
    mkdir($dest_folder);
    if (!imagejpeg($all_img, "./".$dest_folder."/all.jpeg", 100)) {
        echo "Error writing all.jpeg to file";
        exit(1);
    }
    
    //
    // From now on we will use $all_img as our reference
    //

    // create the 16 images for first zoom
    create_zoom_imgs($dest_folder, $origin_img, $i_width, $i_height);
        
}


main($argv);

