<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of databaseFactory
 *
 * @author Kai
 */
include('databasePDO.php');
include('databaseRAM.php');
class databaseFactory {
   public static function create($dbtyp, $host, $namedb, $user, $password){
       echo "Welche Datenbank soll genutzt werden? MYSQL oder RAM";
       echo PHP_EOL;
       $line = readline();
       if ($line == 'MYSQL') {
           return new databasePDO($dbtyp,$host,$host,$namedb,$user,$password);
       }
       else if($line == 'RAM') {
           return new databaseRAM();
       }
       else {
           die("Nur MYSQL oder RAM möglich!");
       }
   }
}
