<?php
@$page = $_GET['action'];
switch ($page) {
    default:
        include "show.php";
        break;
}
