<?php
require '../lib/calendar.php';

$month = array_key_exists('month', $_GET) ? $_GET['month'] : null;
$year = array_key_exists('year', $_GET) ? $_GET['year'] : null;

$calendar = new Calendar($month, $year);

if (array_key_exists('HTTP_X_REQUESTED_WITH', $_SERVER) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {
    require 'views/calendar-body.php';
} else {
    require 'views/calendar.php';
}