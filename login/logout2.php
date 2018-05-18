<?php
session_start();
require_once 'class.user2.php';
$user = new USER();
if(!$user->is_logged_in())
{
	$user->redirect('index2.php');
}
if($user->is_logged_in()!="")
{
	$user->logout();
	$user->redirect('index2.php');
}
?> 
