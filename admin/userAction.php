<?php
/**
 * User: Shehroz
 * Date: 9/21/2015
 * Time: 11:45
 */
include_once('dbConnect.php');
$q = intval($_GET['q']);
$a = intval($_GET['a']);
switch($a) {
    case 1:
        $query = "DELETE FROM userinfo WHERE userId = '$q'";
        $result = mysqli_query($CONNECTION, $query);
        break;
    case 2:
        $query = "UPDATE userinfo SET password = 'Honliz@123' WHERE userId = '$q'";
        $result = mysqli_query($CONNECTION, $query);
        break;
    case 3:
        $query = "DELETE FROM clothes WHERE articleId='$q'";
        $result = mysqli_query($CONNECTION, $query);
        break;
    default:
        $result = null;
        break;
}

if ($result) {
    $query = 'SELECT * FROM userinfo';
    $result = mysqli_query($CONNECTION, $query);
    if ($result) {
        if ($result->num_rows > 0) {
            while ($member = mysqli_fetch_assoc($result)) {
                $userId = $member['userId'];
                $userName = $member['firstName'];
                echo "<tr>".
                    "<td> {$member['userId']} </td>".
                    "<td> {$member['firstName']} </td>".
                    "<td> {$member['lastName']} </td>".
                    "<td> {$member['emailAddress']} </td>".
                    "<td align='center'><button class='btn btn-primary btn-xs' data-toggle='tooltip' title='' data-original-title='View'><i class='fa fa-eye'></i></button>&nbsp;".
                    "<button class='btn btn-success btn-xs' data-toggle='modal' data-target='#resetModal' title='' data-original-title='Reset Password' data-user-id='$userId' data-user-name='$userName'><i class='fa fa-refresh'></i></button>&nbsp;".
                    
                    "</tr>";
            }
        }
    }
}

?>