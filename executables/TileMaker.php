<?php
/**
 * @author vega 
 */
namespace vega\hw4\tilemaker;

var_dump($argv);

// Check number of parameters
if (sizeof($argv) != 2) {
    echo "Invalid number of parameters";
    exit(1);
}

$image_name = $argv[0];
$dest_folder = $argv[1];



