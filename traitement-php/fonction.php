<?php
function getSomme(array $array_c) {
    $total  = 0;
    foreach($array_c as $row) {
        $total = $total + $row;
    }
    return $total;
}

function getPoidRestant(array $array_c, $poid_init) {
    $poid = $poid_init;
    foreach($array_c as $row) {
        $poid = $poid - $row;
    }
    return $poid;
}
?>