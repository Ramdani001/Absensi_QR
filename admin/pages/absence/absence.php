<?php
@$page = $_GET['action'];
switch ($page) {
    case 'delete';
        include "delete.php";
        break;
    default:
        include "show.php";
        break;
}
