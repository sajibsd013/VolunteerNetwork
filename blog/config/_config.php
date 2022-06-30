<?php

function postTime($timestand)
{

    $start = new DateTime();
    $end = new DateTime($timestand, timezone_open('asia/dhaka'));

    $interval = $start->diff($end);

    $year = $interval->format('%y');
    $months = $interval->format('%m');
    $days = $interval->format('%a');
    $hours = $interval->format('%h');
    $min = $interval->format('%i');
    $sec = $interval->format('%s');
    $post_time = "Just now";

    if ($year > 0) {
        $post_time = $year . ' yers ago';
    } else if ($months > 0) {
        $post_time = $months . ' months ago';
    } else if ($days > 0) {
        $post_time = $days . ' days ago';
    } else if ($hours > 0) {
        $post_time = $hours . ' hours ago';
    } else if ($min > 0) {
        $post_time = $min . ' mins ago';
    }
    return $post_time;
}

?>
