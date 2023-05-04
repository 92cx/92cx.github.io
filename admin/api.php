<?php
include ('data.php');
    unset($yzm['uid']);
    unset($yzm['key']);
    unset($yzm['fdhost']);
    unset($yzm['by_json1']);
    $json = [
       'code' => 1,
       'data' => $yzm
    ];
die(json_encode($json));