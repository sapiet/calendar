<div class="month-selector">
    <a href="?month=<?= $calendar->getPreviousMonth()->month ?>&year=<?= $calendar->getPreviousMonth()->year ?>" data-change-month>
        <i class="fa fa-chevron-left"></i>
    </a>
    <div class="selected-month">
        <?= $calendar->toString() ?>
    </div>
    <a href="?month=<?= $calendar->getNextMonth()->month ?>&year=<?= $calendar->getNextMonth()->year ?>" data-change-month>
        <i class="fa fa-chevron-right"></i>
    </a>
</div>

<div class="calendar">
    <div class="header">
        <?php foreach(Calendar::getShortDays() as $day): ?>
            <span>
                <?= $day ?>
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
                            <?= $day->date ?>
                        </span>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</div>
