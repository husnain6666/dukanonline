<?php

include_once('dbConnect.php');
$q = intval($_GET['q']);
$a = intval($_GET['a']);
        $query = "UPDATE article SET weekDeal='0' WHERE articleId = '$q'";
        $result = mysqli_query($CONNECTION, $query);
if ($result) {
    $query = "SELECT *  FROM article where weekDeal='1' ";
    $result = mysqli_query($CONNECTION, $query);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($member = mysqli_fetch_assoc($result)) {
                $userId = $member['articleId'];
                $userName = $member['articleName'];
                $pic1= "images/".$member['picture1'];
                echo "<tr>".
                    "<td> {$member['articleId']} </td>".
                    "<td> {$member['articleName']} </td>".
                    "<td> <img src='.$pic1.'/> </td>".
                    "<td align='center'><button class='btn btn-primary btn-xs' data-toggle='tooltip' onclick='newtab(this)' title='' data-user-id='$userId' data-original-title='View'><i class='fa fa-eye'></i></button>&nbsp;".
                    "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#resetModal' title='' data-original-title='Reset Password' data-user-id='$userId' data-user-name='$userName'><i class='fa fa-refresh'></i></button>&nbsp;".
                    "</tr>";
            }
        }
    }
}
?>