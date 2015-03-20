<?php
require_once __DIR__ . '/../app/app.php';
$app = new App();
$app->initialize();
?>

<div class="boxed-group-inner" id="contributions-calendar">
    <div class="js-calendar-graph is-graph-loading graph-canvas calendar-graph">
        <svg class="js-calendar-graph-svg" height="110" width="721">

            <g transform="translate(20, 20)">
                <?php
                $indexCol = 0;
                $pixels = str_split($app->getPixels());

                for ($i = 0; $i <= 365; $i++) {
                    $today = date('Y-m-d', strtotime('+' . $i . ' days'));
                    $app->setToday($today);
                    if (!isset($pixels[$i])) break;
                    $color = ($pixels[$i]) ? "#1e6823" : "#eee";
                    ?>

                    <?php if ($i == 0 || $i % 7 == 0) {
                        $indexRow = 0; ?>
                        <g transform="translate(<?php echo $indexCol * 13; ?>, 0)">
                    <?php } ?>


                    <rect data-date="2014-03-17" data-count="0" fill="<?php echo $color; ?>"
                          y="<?php echo $indexRow * 13; ?>" height="11" width="11" class="day"/>

                    <?php if ($i % 7 == 6) { ?>
                        </g>
                        <?php $indexCol++; ?>
                    <?php }
                    $indexRow++; ?>
                <?php }
                ?>
            </g>
        </svg>

    </div>

</div>