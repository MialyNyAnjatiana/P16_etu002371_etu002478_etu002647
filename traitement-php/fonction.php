<?php
function getPoidCueilli(array $array_c, $poid_init) {
    $poid  = $poid_init;
    foreach($array_c as $row) {
        $poid -= $row;
    }
    return $poid;
}

function getPoidRestant(array $array_c) {
    
}
?>