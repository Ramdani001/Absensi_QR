<?php
@$page = $_GET['action'];
switch ($page) {
    case 'add_form':
        include "add_form.php";
        break;
    case 'add_form_admin':
        include "add_form_admin.php";
        break;
    case 'add_excel':
        include "add_excel.php";
        break;
    case 'edit':
        include "edit.php";
        break;
    case 'delete':
        include "delete.php";
        break;
    default:
        include "show.php";
        break;
}
