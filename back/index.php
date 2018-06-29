<?php
if (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    require 'views/calendar-body.php';
} else {
    require 'views/calendar.php';
}
