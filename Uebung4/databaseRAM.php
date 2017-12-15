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

    public function __construct() {
        if (!file_exists('db.txt')) {
            echo "Automatisch erstellt";
            $this->dbram[] = array('id' => 1, 'produkt' => 'Milch', 'preis' => 5.50);
            $this->dbram[] = array('id' => 2, 'produkt' => 'Brot', 'preis' => 4);
            $this->dbram[] = array('id' => 3, 'produkt' => 'Joghurt', 'preis' => 3.20);
            $this->dbram[] = array('id' => 4, 'produkt' => 'Eis', 'preis' => 0.90);
            $this->dbram[] = array('id' => 5, 'produkt' => 'Kaffee', 'preis' => 3.20);
        }
    }

    public function close() {
        file_put_contents('db.txt', serialize($this->dbram));
        echo "Datenbank in db.txt gespeichert." . PHP_EOL;
    }

    public function delete($name, $string) {
        $index = 0;
        foreach ($this->dbram as $row) {
            if ($row[$name] == $string) {
                unset($this->dbram[$index]);
                unset($row);
                break;
            }
            $index++;
        }
    }

    public function insert($record) {
        if (in_array($record, $this->dbram)) {
            echo 'Hash mit folgender ID: ' . $record['id'] . ' Bereits im Array vorhanden.' . PHP_EOL;
        } else {
            $this->dbram[] = $record;
        }
    }

    public function open() {
        if (file_exists('db.txt')) {
            $this->dbram = unserialize(file_get_contents('db.txt'));
            echo "Datenbank geladen." . PHP_EOL;
        } else {
            echo "Achtung db.txt nicht gefunden! Bitte über die Funktion close() abspeichern." . PHP_EOL;
        }
    }

    public function query($name, $string) {
        foreach ($this->dbram as $row) {
            if ($row[$name] == $string) {
                $returnrow = $row;
                unset($row);
                return $returnrow;
            }
        }
    }

}

?>
