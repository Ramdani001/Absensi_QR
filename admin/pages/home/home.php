<?php
@$page = $_GET['action'];
switch ($page) {
    case 'reset':
        include 'reset.php';
        break;
    default:
        include('show.php');
        break;
}
