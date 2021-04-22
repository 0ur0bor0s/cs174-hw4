<?php
/**
 * @author vega
 */
namespace vega\hw4;

use vega\hw4\controllers as CTRLS;

if (!isset($_REQUEST['arg1'])) {
    
}
else if (isset($_REQUEST['arg1']) && isset($_REQUEST['arg2']) && isset($_REQUEST['arg3']) && isset($_REQUEST['arg4'])) { // 2nd zoom level
    $class = new CTRLS\MapController();
}
else if (isset($_REQUEST['arg1']) && isset($_REQUEST['arg2'])) { // 1st zoom level

}


?>
<html>
    <head>
        <title>hw4</title>
    </head>
    <body>
        <h1>Test to see if this works</h1>
    </body>
</html>