<?php
if (isset($_GET['time'])) {
    # code...
    $time = $_GET['time'];
    echo ('<center>Generating timetable...<br><br><img src="loadericon.gif"> </center>');
    header('refresh:15; url=timetable.php');
}?>