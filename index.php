<?php
    require 'calendar.php';
    $month = array_key_exists('month', $_GET) ? $_GET['month'] : null;
    $year = array_key_exists('year', $_GET) ? $_GET['year'] : null;
    $calendar = new Calendar($month, $year);
?><!DOCTYPE html>
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
                    <?= $calendar->getCurrentDay()->day ?>
                </div>
                <div class="current-day-number">
                    <?= $calendar->getCurrentDay()->date ?>
                </div>
            </div>

            <div class="body">
                <div class="month-selector">
                    <a href="?month=<?= $calendar->getPreviousMonth()->month ?>&year=<?= $calendar->getPreviousMonth()->year ?>">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <div class="selected-month">
                        <?= $calendar->toString() ?>
                    </div>
                    <a href="?month=<?= $calendar->getNextMonth()->month ?>&year=<?= $calendar->getNextMonth()->year ?>">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>

                <div class="calendar">
                    <div class="header">
                        <?php foreach(DAYS as $day): ?>
                            <span>
                            <?= substr($day, 0, 3) ?>
                                
                            </span>
                        <?php endforeach; ?>
                    </div>
                    <div class="weeks">
                        <?php foreach ($calendar->get() as $week): ?>
                            <div class="week">
                                <?php foreach ($week as $day): ?>
                                    <div
                                        class="
                                            day
                                            <?php if ($day->isActive): ?>active<?php endif; ?>
                                            <?php if (!$day->isSameMonth): ?>not-same-month<?php endif; ?>
                                        "
                                    >
                                        <span>
                                            <?= $day->date->format('j') ?>
                                        </span>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>