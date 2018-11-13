<?php
session_start();
 if($_SESSION["review_customer_id"]==''){
header("location:../");
 }
?>