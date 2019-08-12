<?php
session_start();
require 'admin/includes/database.php';
require 'admin/includes/session.php';
require 'admin/includes/user.inc.php';
function redirect($location)
{
    header("Location: {$location}");
}