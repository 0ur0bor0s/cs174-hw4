<?php
/**
 * @author vega
 */
namespace vega\hw4;

require_once('src/controllers/MapController.php');

use vega\hw4\controllers as CTRLS;


if(!isset($_REQUEST['c'])) {
    header("Location: index.php?c=MapController&m=show_map");
    header("refresh: 0");
}


switch ($_REQUEST['c']) {
case "MapController":
    $method = $_REQUEST['m'];
    $class = "vega\\hw4\\controllers\\".$_REQUEST['c'];
    $object = new $class();
    
    // set show_map with args
    if (isset($_REQUEST['arg3']) && isset($_REQUEST['arg4'])) // level 2
        $object->$method($_REQUEST['arg1'], $_REQUEST['arg2'], $_REQUEST['arg3'], $_REQUEST['arg4']);
    else if (isset($_REQUEST['arg1']) && isset($_REQUEST['arg2'])) // level 1
        $object->$method($_REQUEST['arg1'], $_REQUEST['arg2']);
    else // level 0
        $object->$method();

    break;
}

/*
if (!isset($_REQUEST['arg1'])) {
    
}
else if (isset($_REQUEST['arg1']) && isset($_REQUEST['arg2']) && isset($_REQUEST['arg3']) && isset($_REQUEST['arg4'])) { // 2nd zoom level
    $class = new CTRLS\MapController();
    $method = "zoom";

}
else if (isset($_REQUEST['arg1']) && isset($_REQUEST['arg2'])) { // 1st zoom level

}*/