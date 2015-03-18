<?php
require_once 'characters.php';


// print_characters($characters);


// print_character($characters['♥']);

// 52 columns x 7
// If each character gets 5 columns and we need 1 column for space between characters
// floor(52/(5+1)) = total 8 characters length
$message = "! c o d e !";
$charactersInCols['!'] = $charactersInCols['♥'];
$messageArray = str_split($message);
?>

<div class="boxed-group-inner" id="contributions-calendar">
    <div class="js-calendar-graph is-graph-loading graph-canvas calendar-graph">
        <svg class="js-calendar-graph-svg" height="110" width="721">
            <g transform="translate(20, 20)">

                <?php
                $index = 0;
                foreach ($messageArray as $character) {

                    $pixelsCharacter = $charactersInCols[$character];

                    foreach ($pixelsCharacter as $column) { ?>

                    <g transform="translate(<?php echo $index*13; ?>, 0)">

                        <?php
                        $pixels = str_split($column);
                        foreach ($pixels as $row=>$pixel) {
                            if ($pixel=="1") {
                                $color = "#1e6823";
                            } else {
                                if (rand(1,15)==3) {
                                    $color = "#d6e685";
                                } elseif (rand(1,50)==3) {
                                    $color = "#44a340";
                                } else {
                                    $color = "#eeeeee";
                                }
                            }
                            ?>

                            <rect data-date="2014-03-17" data-count="0" fill="<?php echo $color; ?>" y="<?php echo $row*13; ?>" height="11" width="11" class="day"/>

                        <?php } ?>

                    </g>

                <?php
                        $index++;
                    } ?>

                <?php }?>


                <g transform="translate(507, 0)">
                    <rect data-date="2014-12-14" data-count="1" fill="#d6e685" y="0" height="11" width="11" class="day"/>
                    <rect data-date="2014-12-15" data-count="0" fill="#1e6823" y="13" height="11" width="11" class="day"/>
                    <rect data-date="2014-12-16" data-count="0" fill="#1e6823" y="26" height="11" width="11" class="day"/>
                    <rect data-date="2014-12-17" data-count="3" fill="#d6e685" y="39" height="11" width="11" class="day"/>
                    <rect data-date="2014-12-18" data-count="2" fill="#d6e685" y="52" height="11" width="11" class="day"/>
                    <rect data-date="2014-12-19" data-count="0" fill="#eeeeee" y="65" height="11" width="11" class="day"/>
                    <rect data-date="2014-12-20" data-count="15" fill="#44a340" y="78" height="11" width="11" class="day"/>
                </g>
            </g>
        </svg>

    </div>

</div>