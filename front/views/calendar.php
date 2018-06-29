<div class="calendar-container">
    <?= $calendar->getCurrentDay()->day ?>
    <?= $calendar->getCurrentDay()->date ?>
    <div class="current-hour">
        <?= $calendar->getCurrentHour() ?>
    </div>

    <br><br>

    <div data-body>
        <?php require 'calendar-body.php'; ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
<script src="../assets/javascripts/calendar.js" type="text/javascript" charset="utf-8"></script>