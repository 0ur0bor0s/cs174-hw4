<?php
/**
 * @author vega
 */
namespace vega\hw4\views\layouts;

require_once('Layout.php');

/**
 * 
 */
class Header extends Layout {

    function render($data) {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title>Map</title>
                <link href="src/styles/map.css" media="screen" rel="stylesheet" type="text/css" />
            </head>
            <body>
        <?php       
    }
}
