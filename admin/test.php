<?php
/* Headers */
$color = $_POST['colors'];
$color1 = explode(',', $color);
include "dbConnect.php";

$sql = "select max(articleId) as articleId from article";
$result1 = mysqli_query($CONNECTION, $sql);
$notify = mysqli_fetch_assoc($result1);
$articleId = $notify['articleId'];
$i = 0;
while($i < count($color1))
{
    $sql = "INSERT INTO color(color, articleId) VALUES('$color1[$i]',$articleId)";
    $result2 = mysqli_query($CONNECTION, $sql);
    $i++;
}
?>