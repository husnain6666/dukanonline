<?php
/* Headers */
include "connectdb.php";
/* Variables */
/* Message */
$alpha= $_POST['alpha'];
if(!empty($_POST['reviewText']) && !empty($_POST['alpha']))
{
    $review = $_POST['reviewText'];
    $rating = $_POST['rated'];
    $userId = $_SESSION['loginId'];

    $query="insert into reviews (review, articleId, userId, date) VALUES ('$review',$alpha,$userId,NOW())";

    try{
        $result=mysqli_query($connection,$query);
        if($result)
        {
            $selquery="SELECT reviewId FROM reviews where userId = ".$userId." ORDER BY reviewId DESC LIMIT 1";
            $result1=mysqli_query($connection,$selquery);
            $table_record1=mysqli_fetch_array($result1);
            $reviewId = $table_record1['reviewId'];
            //insert ratings after review
            $insquery="insert into ratings (rating, articleId, userId, reviewId,date) VALUES ($rating,$alpha,$userId,$reviewId,NOW())";
            $result2=mysqli_query($connection,$insquery);
            $table_record2=mysqli_fetch_array($result2);
            mysqli_close($connection);
            header("location: products_page_v1.php?articleId=".$alpha);
        }
        else
        {
            mysqli_close($connection);
            header("location: products_page_v1.php?articleId=".$alpha);
            throw new Exception("Problem in Query");
        }
    }

    catch (Exception $e){
        $e->getMessage();
        mysqli_close($connection);
    }
}
else
{
    $error = true;
    header("location: products_page_v1.php?articleId=".$alpha."&warning=Please login first");
}

?>