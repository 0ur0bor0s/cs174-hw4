<?php
/**
 * @author Ben Foley
 */
namespace vega\hw4\controllers;

require_once('Controller.php');
require_once(getcwd().'/src/models/RetrieveMapModel.php');
require_once(getcwd().'/src/views/MapView.php');

use vega\hw4\views as VW;
use vega\hw4\models as MDL;

class MapController extends Controller {
    
    /**
     * Contructor
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Renders the Map page and passes parameters
     */
    public function show_map($i = null, $j = null, $m = null, $l = null) {
        $this->model = new MDL\RetrieveMapModel($i, $j, $m, $l);
        $map_imgs = $this->model->retrieveImages();
        
        $this->view = new VW\MapView($map_imgs, $i, $j, $m, $l);
        $this->view->render();
    }

}