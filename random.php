<?php

if (isset($_SERVER['HTTPS']) &&
    ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) ||
    isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&
    $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
  $protocol = 'https://';
}
else {
  $protocol = 'http://';
}

$strCurrentPath = $protocol . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/';







$count = count(glob('games/*', GLOB_ONLYDIR));

$strId = rand(1,$count);


$strGameUrl = $strCurrentPath . "game.php?id=" . $strId;

header("Location: $strGameUrl");

?>