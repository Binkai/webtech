<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of databaseRAM
 *
 * @author Kai
 */
require 'database.php';

class databaseRAM implements database {

    private $dbram;

    public function __constructor($dbtyp, $host, $namedb, $user, $password) {
        if(!file_exists('db.txt')){
        $this->dbram[] = array('id' => 1, 'produkt' => 'Milch', 'preis' => 5.50);
        $this->dbram[] = array('id' => 2, 'produkt' => 'Brot', 'preis' => 4);
        $this->dbram[] = array('id' => 3, 'produkt' => 'Joghurt', 'preis' => 3.20);
        $this->dbram[] = array('id' => 4, 'produkt' => 'Eis', 'preis' => 0.90);
        $this->dbram[] = array('id' => 5, 'produkt' => 'Kaffee', 'preis' => 3.20);
        }
    }

    public function close() {

        file_put_contents('db.txt', serialize($this->dbram));
    }

    public function delete($name, $string) {
        echo "lol";
    }

    public function insert($record) {
        echo "todo";
    }

    public function open() {
        $this->dbram = unserialize(file_get_contents('db.txt'));
    }

    public function query($name, $string) {
        echo "todo";
    }

}

?>
