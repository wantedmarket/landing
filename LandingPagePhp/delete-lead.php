<?php
include "include/functions.php";
if( !isLogin() ) {
    header('location:index.php' );
}

if( isset($_GET['id']) && is_numeric( $_GET['id'] ) && $_GET['id'] > 0 ){
    deleteLead( $_GET['id'] );
}
header('location:leads-panel.php');
exit;