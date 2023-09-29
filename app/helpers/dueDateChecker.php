<?php
function dueDateChecker($due_date){
    $end_date = new DateTime($due_date);
    $start_date = new DateTime();
    $interval = $end_date->diff($start_date);

    if($start_date > $end_date){
    return "passed";
    }
    elseif($interval->y > 0){
    return $interval->y . " years" . $interval->d . " days";
    }
    elseif($interval->d > 0){
    return $interval->d . " days";
    }
    elseif($interval->d == 1){
    return "tomorrow";
    }
    elseif($interval->h <= 24 && $interval->h > 5 ){
    return "today";
    }
    else{
    return $interval->h . " hours " . $interval->m . " minutes";
    }
}