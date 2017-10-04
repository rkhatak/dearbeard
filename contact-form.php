<?php
require_once('admin/config.php');
require_once('function.php');

if(!empty($_POST)){
    contactUs($con,$_POST);
}

?>