<?php

/**
 * @author vega
 */

namespace vega\hw4\views\elements;

require_once('Element.php');

abstract class ArrowKeysElement extends Element
{


    /**
     * Constructor for the arrow key class
     */
    public function __construct(){}

    /**
     * Renders the arrow keys on the web browser
     */
    public function renderElement($i, $j, $m, $l)
    {
        /* Arg1 = i
         - Arg2 = j
         - Arg3 = m
         - Arg4 = l
         */

    ?>
        <div class="arrow-keys">
            <?php
            //zoom level 0
            if ($i == null && $j == null && $m == null && $l == null) {
            ?>
                <button disabled><i class="arrow up"></i>
                </button></a>
                </br>

                <button disabled>
                    <i class="arrow left"></button></i></a>

                <button disabled>
                    <i class="arrow right"></i>
                </button></a>
                </br>

                <button disabled>
                    <i class="arrow down"></i>
                </button></a>

            <?php
            } else if ($m == null && $l == null) { //zoom level 1
            ?>
                <button>
                    <?php
                    $up = $i++;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $up ?>&arg2=<?= $j ?>'><i class="arrow up"></i>
                </button></a>
                </br>

                <button>
                    <?php
                    $left = $j--;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $left ?>'><i class="arrow left"></button></i></a>

                <button>
                    <?php
                    $right = $j++;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $up ?>&arg2=<?= $right ?>'><i class="arrow right"></i>
                </button></a>
                </br>

                <button>
                    <?php
                    $down = $i--;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $down ?>&arg2=<?= $l ?>'><i class="arrow down"></i>
                </button></a>
            <?php

            } else { //zoom level 2
            ?>
                <button>
                    <?php
                    $up = $m++;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>?>&arg3=<?= $up ?>&arg4=<?= $i ?>'><i class="arrow up"></i>
                </button></a>
                </br>

                <button>
                    <?php
                    $left = $l--;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>?>&arg3=<?= $i ?>&arg4=<?= $left ?>'><i class="arrow left"></button></i></a>

                <button>
                    <?php
                    $right = $l++;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i ?>&arg2=<?= $j ?>?>&arg3=<?= $i ?>&arg4=<?= $right ?>'><i class="arrow right"></i>
                </button></a>
                </br>

                <button>
                    <?php
                    $down = $m--;
                    ?>
                    <a href='index.php?c=MapController&m=show_map&arg1=<?= $i?>&arg2=<?= $j?>?>&arg3=<?= $down ?>&arg4=<?= $i ?>'><i class="arrow down"></i>
                </button></a>
            <?php
            }
            ?>
        </div><?php
            }
        }
