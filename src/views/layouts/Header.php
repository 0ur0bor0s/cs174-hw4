<?php

/**
 * @author vega
 */

namespace vega\hw4\views\layouts;

require_once('Layout.php');

/**
 * 
 */
class Header extends Layout
{

    function render($data)
    {
?>
        <!DOCTYPE html>
        <html>

        <head>
            <title>Map</title>
            <link href="src/styles/map.css" media="screen" rel="stylesheet" type="text/css" />
            <style>
                .arrow {
                    border: solid black;
                    border-width: 0 3px 3px 0;
                    display: inline-block;
                    padding: 3px;
                }

                .right {
                    transform: rotate(-45deg);
                    -webkit-transform: rotate(-45deg);
                    margin-left: 8px;
                }

                .left {
                    transform: rotate(135deg);
                    -webkit-transform: rotate(135deg);
                }

                .up {
                    transform: rotate(-135deg);
                    -webkit-transform: rotate(-135deg);
                    padding-left:2px;
                    margin-left: 10px;
                   
                }

                .down {
                    transform: rotate(45deg);
                    -webkit-transform: rotate(45deg);
                    margin-left: 10px;
                }
            </style>
        </head>

        <body>
    <?php
    }
}
