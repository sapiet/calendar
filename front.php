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

<?php foreach(DAYS as $day): ?>
    <?= substr($day, 0, 3) ?>
<?php endforeach; ?>

<br>

<?php foreach ($calendar->get() as $week): ?>
    <?php foreach ($week as $day): ?>
        <?php if ($day->isActive): ?>
            <strong>
                <?= $day->date->format('j') ?>
            </strong>
        <?php elseif (!$day->isSameMonth): ?>
            <i>
                <?= $day->date->format('j') ?>
            </i>
        <?php else: ?>
            <?= $day->date->format('j') ?>
        <?php endif; ?>
    <?php endforeach; ?>
    <br>
<?php endforeach; ?>
