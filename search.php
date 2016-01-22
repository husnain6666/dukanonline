<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysql_connect("localhost","root","");
    $db=mysql_select_db("electroshop",$con);
    $query=mysql_query("select * from article where articleName LIKE '%{$key}%' Limit 8");
    while($row=mysql_fetch_assoc($query))
    {
      $array[] = $row['articleName'];
    }
    echo json_encode($array);
?>
