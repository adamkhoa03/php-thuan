<?php
session_unset();
$_COOKIE['user_id'] = '';
header('location: index.php');