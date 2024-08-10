<?php
@$page = $_GET['page'];
switch ($page) {

    case 'user':
        include('../admin/pages/user/user.php');
        break;
    case 'absence':
        include('../admin/pages/absence/absence.php');
        break;
    case 'report_data':
        include('../admin/pages/report_data/report_data.php');
        break;
    case 'profile':
        include('../admin/pages/profile/profile.php');
        break;
    default:
        include('../admin/pages/home/home.php');
        break;
}
