<?php
include "../include/functions.php";

if(logout()) {
    header('Location: ../index.php');
     exit();
}
