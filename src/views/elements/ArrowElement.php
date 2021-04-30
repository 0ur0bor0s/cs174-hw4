<?php
/**
 * @author Earl Padron and Ben Foley
 */
namespace vega\hw4\views\elements;

require_once('Element.php');

class ArrowElement extends Element {


    public function __construct() {

    }

    public function renderElement($i, $j, $m, $l) {

        if ($i == null && $j == null && $m == null && $l == null) { // level 0
            ?>
            <div class='arrow'>
                &ensp;&ensp;
                <button disabled><pre>^</pre></button><br><br>
                <button disabled><pre><</pre></button>&nbsp;&nbsp;&nbsp;
                <button disabled><pre>></pre></button><br><br>
                &ensp;&ensp;
                <button disabled><pre>v</pre></button>
            </div>           
            <?php
        }
        else if ($m == null && $l == null) { // level 1
            ?><div class='arrow'><?php

                // Handle each arrow rendering individually
                // Up Arrow
                if ($i == 0) { 
                    ?>
                    &ensp;&ensp;
                    <button disabled><pre>^</pre></button><br><br>
                    <?php
                } else {
                    ?>
                    &ensp;&ensp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i-1 ?>&arg2=<?= $j ?>'><button><pre>^</pre></button></a><br><br>
                    <?php
                }
                
                // Left Arrow
                if ($j == 0) {
                    ?>
                    <button disabled><pre><</pre></button>&nbsp;&nbsp;&nbsp;
                    <?php
                } else {
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j-1 ?>'><button><pre><</pre></button></a>&nbsp;&nbsp;&nbsp;
                    <?php
                }

                // Right Arrow
                if ($j == 3) {
                    ?>
                    &nbsp;&nbsp;
                    <button disabled><pre>></pre></button><br><br>
                    <?php
                } else {
                    ?>
                    &nbsp;&nbsp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j+1 ?>'><button><pre>></pre></button></a><br><br>
                    <?php
                }

                // Down Arrow
                if ($i == 3) {
                    ?>
                    &ensp;&ensp;   
                    <button disabled><pre>v</pre></button>
                    <?php
                } else {
                    ?>
                    &ensp;&ensp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i+1 ?>&arg2=<?= $j ?>'><button><pre>v</pre></button></a>
                    <?php
                }
            ?></div><?php
        }
        else { // level 2
            ?><div class='arrow'><?php

            // Handle each arrow rendering individually
            // Up Arrow
            if ($i == 0 && $m == 0) { 
                ?>
                &ensp;&ensp;
                <button disabled><pre>^</pre></button><br><br>
                <?php
            } else {
                if ($m == 0) { // go up level
                    ?>
                    &ensp;&ensp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i-1 ?>&arg2=<?= $j ?>&arg3=3&arg4=<?= $l ?>'><button><pre>^</pre></button></a><br><br>
                    <?php
                } else {
                    ?>
                    &ensp;&ensp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>&arg3=<?= $m-1 ?>&arg4=<?= $l ?>'><button><pre>^</pre></button></a><br><br>
                    <?php
                }
            }
            
            // Left Arrow
            if ($j == 0 && $l == 0) {
                ?>
                <button disabled><pre><</pre></button>&nbsp;&nbsp;&nbsp;
                <?php
            } else {
                if ($l == 0) { // go left 1 level
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j-1 ?>&arg3=<?= $m ?>&arg4=3'><button><pre><</pre></button></a>&nbsp;&nbsp;&nbsp;
                    <?php
                } else {
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>&arg3=<?= $m ?>&arg4=<?= $l-1 ?>'><button><pre><</pre></button></a>&nbsp;&nbsp;&nbsp;
                    <?php
                }
            }

            // Right Arrow
            if ($j == 3 && $l == 3) {
                ?>
                &nbsp;&nbsp;
                <button disabled><pre>></pre></button><br><br>
                <?php
            } else {     
                if ($l == 3) { // go right 1 level
                    ?>
                    &nbsp;&nbsp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j+1 ?>&arg3=<?= $m ?>&arg4=0'><button><pre>></pre></button></a><br><br>
                    <?php
                } else {
                    ?>
                    &nbsp;&nbsp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>&arg3=<?= $m ?>&arg4=<?= $l+1 ?>'><button><pre>></pre></button></a><br><br>
                    <?php
                }
            }

            // Down Arrow
            if ($i == 3 && $m == 3) {
                ?>
                &ensp;&ensp;    
                <button disabled><pre>v</pre></button>
                <?php
            } else {

                if ($m == 3) {
                    ?>
                    &ensp;&ensp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i+1 ?>&arg2=<?= $j ?>&arg3=0&arg4=<?= $l ?>'><button><pre>v</pre></button></a>
                    <?php
                } else {
                    ?>
                    &ensp;&ensp;
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>&arg3=<?= $m+1 ?>&arg4=<?= $l ?>'><button><pre>v</pre></button></a>
                    <?php                   
                }
            }
            ?></div><?php
        }
    }
}