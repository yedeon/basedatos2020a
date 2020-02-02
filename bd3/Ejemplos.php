
<?php

$past24hrs = $now->sub( new DateInterval( 'P24H' ) );
echo $past24hrs;
$timestamp = $past24hrs->getTimestamp();
echo $timestamp;

?>