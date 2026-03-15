<?php
$conn = mysqli_connect('localhost', 'root', '', 'raffbs');
if (!$conn) {
    die('Could not connect to MySQL: ' . mysqli_connect_error());
    echo myysqli_error($conn);
}
mysqli_query($conn, 'SET NAMES \'utf8\'');

//mysqli_close($conn);

?>