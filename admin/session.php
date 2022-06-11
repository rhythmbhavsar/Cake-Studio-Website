<?php
    if(isset($_SESSION['admin']))
    {
        $user = $_SESSION['admin'];
    }
    else {
        // echo "NATHI THATU";
        // header("location:../index.php");
    }
