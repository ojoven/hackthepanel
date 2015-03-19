<?php

require_once __DIR__.'/../app/app.php';

$app = new App();
$app->initialize();

?>

<div class="boxed-group-inner" id="contributions-calendar">
    <div class="js-calendar-graph is-graph-loading graph-canvas calendar-graph">
        <svg class="js-calendar-graph-svg" height="110" width="721">

            <?php
            for ($i=0;$i<=365;$i++) {
                $today = date('Y-m-d', strtotime('+' . $i . ' days'));
                $app->setToday($today)
                ?>

                <?php if ($i%7==0) {
                    $indexCol = 0; ?>
                    <g transform="translate(20, 20)">
                <?php } ?>

                    <g transform="translate(<?php echo $indexCol*13; ?>, 0)">
                        <rect data-date="2014-03-17" data-count="0" fill="<?php echo $color; ?>" y="<?php echo $row*13; ?>" height="11" width="11" class="day"/>
                    </g>

                <?php if ($i%7==0) { ?>
                    </g>
                <?php }
                $indexCol++;
                ?>


            <?php }
            ?>

        </svg>

    </div>

</div>