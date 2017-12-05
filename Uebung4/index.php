<?php
require 'databaseFactory.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$db = databaseFactory::create("mysql","localhost","gruppe","root","");
$db->open();
var_dump($db->query('id', 1));
$db->close();
?>
