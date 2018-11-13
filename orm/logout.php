<?php
session_start();
unset($_SESSION['review_customer_id']);
header('Location:index');	

?>