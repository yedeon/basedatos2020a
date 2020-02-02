
<?php

$past24hrs = $now->sub( new DateInterval( 'P24H' ) );
$timestamp = $past24hrs->getTimestamp();


?>