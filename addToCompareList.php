<?php
include_once("connectdb.php");
session_start();

$userId = $_SESSION["userId"]; //Remove after implementing sessions
$counter = 0;
$defaultText = "No Item Selected";
$item1 = -1;
$item2 = -1;
$item3 = -1;

$articleId = $_GET['articleId'];

$query = "SELECT * FROM comparelist WHERE userId = $userId";
$result = mysqli_query($connection, $query);
if($result) {
    while ($row = mysqli_fetch_assoc($result)) {

        if ($row['item1'] && $row['item1'] != -1) {
            $item1 = $row['item1'];
            $counter = $counter+2;
        }
        if ($row['item2'] && $row['item2'] != -1) {
            $item2 = $row['item2'];
            $counter++;
        }
        if ($row['item3'] && $row['item3'] != -1) {
            $item3 = $row['item3'];
            $counter++;
        }
    }
}

echo $counter . " ";
if($articleId == -1)
{
    $query = "DELETE FROM comparelist WHERE userId = $userId";
}

else {
    switch ($counter) {
        case 1:
            $query = "UPDATE comparelist SET item1=$articleId WHERE userId = $userId";
            echo "1 ";
            break;
        case 2:
            $query = "UPDATE comparelist SET item2=$articleId WHERE userId = $userId";
            echo "2 ";
            break;
        case 3:
            $query = "UPDATE comparelist SET item3=$articleId WHERE userId = $userId";
            echo "3 ";
            break;
        default:
            $query = "INSERT INTO comparelist(userId, item1) VALUES($userId, $articleId)";
            echo "0 ";
            break;
    }
}

if (mysqli_query($connection, $query)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

?>