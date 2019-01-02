<?php
include '../../lib/mylib.php';
session_start();
session_destroy();

$url = base_url('admin', 'login');
header("location:$url");
?>