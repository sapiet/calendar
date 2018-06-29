<a href="?month=<?= $calendar->getPreviousMonth()->month ?>&year=<?= $calendar->getPreviousMonth()->year ?>" data-change-month>
    <
</a>
<?= $calendar->toString() ?>
<a href="?month=<?= $calendar->getNextMonth()->month ?>&year=<?= $calendar->getNextMonth()->year ?>" data-change-month>
    >
</a>

<br><br>

<?php foreach(Calendar::getShortDays() as $day): ?>
    <?= $day ?>
<?php endforeach; ?>

<br>

<?php foreach ($calendar->get() as $week): ?>
    <?php foreach ($week as $day): ?>
        <?php if ($day->isActive): ?>
            <strong>
                <?= $day->date ?>
            </strong>
        <?php elseif (!$day->isSameMonth): ?>
            <i>
                <?= $day->date ?>
            </i>
        <?php else: ?>
            <?= $day->date ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <br>
<?php endforeach; ?>
