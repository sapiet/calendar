<?php
    require 'calendar.php';
    $month = array_key_exists('month', $_GET) ? $_GET['month'] : null;
    $year = array_key_exists('year', $_GET) ? $_GET['year'] : null;
    $calendar = new Calendar($month, $year);
?>

<?= $calendar->getCurrentDay()->day ?>
<?= $calendar->getCurrentDay()->date ?>
<br><br>

<a href="?month=<?= $calendar->getPreviousMonth()->month ?>&year=<?= $calendar->getPreviousMonth()->year ?>">
    <
</a>
<?= $calendar->toString() ?>
<a href="?month=<?= $calendar->getNextMonth()->month ?>&year=<?= $calendar->getNextMonth()->year ?>">
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
