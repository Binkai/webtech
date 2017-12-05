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
require_once 'database.php';

class databaseRAM implements database {

    private $dbram;

    public function __constructor() {
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
        $index = 0;
       foreach($this->dbram as $row) {
           if($row[$name] == $string) {
               unset($this->dbram[$index]);
               break;
           }
           $index++;
       }
        
    }

    public function insert($record) {
        $this->dbram[] = $record;
    }

    public function open() {
        if(file_exists('db.txt')){
        $this->dbram = unserialize(file_get_contents('db.txt'));
        }
        else { 
            echo "Achtung db.txt nicht gefunden! Bitte über die Funktion close() abspeichern.";
        }
    }

    public function query($name, $string) {
        foreach($this->dbram as $row) {
            if($row[$name] == $string) {
                return $row;
            }
                
        }
    }

}
?>
