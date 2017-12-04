<?php


/**
 *
 * @author Kai
 */

interface database {

    public function open();

    public function insert($record);

    public function query($name, $string);

    public function delete($name, $string);

    public function close();
}
?>
