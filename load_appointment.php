<?php
include('database_server.php');
$ss = "SELECT * FROM appointment WHERE `date`='$date'";
$re = mysqli_query($database, $ss);
$data = array();
if (mysqli_num_rows($re) > 0) {
    while ($row = mysqli_fetch_assoc($re)) {
        array_push($data, $row['number']);
    }
    echo min($data);
}
