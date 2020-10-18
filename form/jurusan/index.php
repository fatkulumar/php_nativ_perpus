<?php
    if(!$_SESSION){
        header("location: ../index.php");
    }elseif(!$_SESSION["username"]){
        header("location : ../index.php");
    }
?>