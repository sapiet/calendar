<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Calendar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="calendar.css" rel="stylesheet">
    </head>
    <body>

        <div class="calendar-container">
            <div class="head">
                <div class="current-day">
                    Le jour
                </div>
                <div class="current-day-number">
                    N°
                </div>
            </div>

            <div class="body">
                <div class="month-selector">
                    <a href="">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <div class="selected-month">
                        Mois Année
                    </div>
                    <a href="">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>

                <div class="calendar">
                    <div class="header">
                        <?php for($i = 0; $i < 7; $i++): ?>
                            <span>
                                <?= $i ?>
                            </span>
                        <?php endfor; ?>
                    </div>
                    <div class="weeks">
                        <?php for ($i = 0; $i < 5; $i++): ?>
                            <div class="week">
                                <?php for ($j = 0; $j < 8; $j++): ?>
                                    <div
                                        class="
                                            day
                                            <?php if ($i+$j%2==0): ?>active<?php endif; ?>
                                            <?php if ($i*$j%2==0): ?>not-same-month<?php endif; ?>
                                        "
                                    >
                                        <span>
                                            X
                                        </span>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>