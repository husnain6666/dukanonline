<?php
/* Headers */

include "dbConnect.php";
/* Variables */

$title = $_POST['title'];
$desc = $_POST['desc'];
$date = $_POST['date'];

if (!isset($_FILES['image']['error']) > 0)
{
    echo "<font size = '5'><font color=\"#e31919\">Error: NO CHOSEN FILE <br />";
    echo"<p><font size = '5'><font color=\"#e31919\">INSERT TO DATABASE FAILED";
}
else {
    move_uploaded_file($_FILES["image"]["tmp_name"], "../photo/" . $_FILES["image"]["name"]);
    echo "<font size = '5'><font color=\"#0CF44A\">SAVED<br>";

    $file = "../photo/" . $_FILES["image"]["name"];
    echo $file;
}

?>