<?php
@$page = $_GET['action'];
switch ($page) {
    case 'setting':
        include 'setting.php';
        break;
    case 'location':
        include 'location.php';
        break;
    default:
        include 'show.php';
        break;
}
