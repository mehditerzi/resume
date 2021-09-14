<?php
$interval=1; //minutes
set_time_limit(0);
while (true)
{
    sleep($interval*10);
    header("location: addexcel.php");
}
?>