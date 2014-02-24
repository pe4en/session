<?php
/**
 * Created by PhpStorm.
 * User: pe4en
 * Date: 2/24/14
 * Time: 3:03 PM
 */
include_once 'database/database.php';
include_once 'view/view.php';

$con = new connection();
$user = new Database();
$user->getAllUsers();