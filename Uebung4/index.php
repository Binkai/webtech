<?php

require 'databaseFactory.php';

function gibHashAus($data) {
    if (!($data === null || $data === FALSE)) {
        $keys = array_keys($data);
        for ($index = 0; $index < count($keys); $index++) {
            printf('%3s ', $keys[$index]);
        }
        unset($index);
        echo PHP_EOL;
        for ($index = 0; $index < count($data); $index++) {
            printf('%3s ', $data[$keys[$index]]);
        }
    } else {
        echo "Hash ist leer!";
    }
    echo PHP_EOL;
    unset($index);
}

$db = databaseFactory::create("mysql", "localhost", "gruppe", "root", "");
$db->open();
$insertrecord = array('id' => 6, 'produkt' => 'Kaese', 'preis' => 3.20);
$db->insert($insertrecord);
$insertrecord2 = array('id' => 7, 'produkt' => 'Schokolade', 'preis' => 3.20);
$db->insert($insertrecord2);
$insertrecord3 = array('id' => 8, 'produkt' => 'Wasser', 'preis' => 0.20);
$db->insert($insertrecord3);
gibHashAus($db->query('preis', 0.20));
$db->close();
$db->open();
$db->delete('id', 8);
gibHashAus($db->query('id', 8));
$db->close();
?>
