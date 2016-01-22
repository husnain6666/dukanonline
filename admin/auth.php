
<?php
        session_start();
        if(isset($_SESSION['USERNAME'])) {
            header("location: ../starter.php");
            exit();
        }
?>