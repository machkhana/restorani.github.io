<?php
if(isset($_GET['daterange'])) {
    if (isset($_GET['daterange'])) {$daterange = $sql->real_escape_string($_GET['daterange']);}
    $start = substr($daterange, 0, 10);
    $end = substr($daterange, 13, 23);
    $query=$report->selectrange($start,$end);
    if ($query->num_rows > 0) {
        echo "1";
    } else {
        echo "0";
    }
}
?>