<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Calendar</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <link href="../assets/stylesheets/calendar.css" rel="stylesheet">
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
                <div class="current-hour">
                    Heure
                </div>
            </div>

            <div class="body" data-body>
                <?php require 'views/calendar-body.php'; ?>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="../assets/javascripts/calendar.js" type="text/javascript" charset="utf-8"></script>
    </body>
</html>
