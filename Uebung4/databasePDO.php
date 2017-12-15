<?php

require_once "database.php";

class databasePDO implements database {

    private $conn;
    private $user;
    private $dsn;
    private $password;

    function __construct($dbtyp, $host, $namedb, $user, $password) {
        $this->dsn = $dbtyp .
                ':host=' . $host .
                ';dbname=' . $namedb;
        $this->user = $user;
        $this->password = $password;
    }

    public function close() {
        $this->conn = null;
        echo "Verbindung geschlossen" . PHP_EOL;
    }

    public function delete($name, $string) {
        //TO-DO
        $id = $this->query($name, $string)['id'];
        $deletequery = "DELETE FROM tab WHERE id = '$id'";
        $this->conn->exec($deletequery);
    }

    public function insert($record) {
        $insert = "INSERT INTO tab(id,produkt,preis) VALUES (${record['id']}, '${record['produkt']}', ${record['preis']})";
        $rtn = $this->conn->exec($insert);
        if ($rtn === false) {
            $error = $this->conn->errorInfo();
            echo 'DB ERROR: #' . $error[1] . " " . $error[2] . PHP_EOL;
            ;
        }
    }

    public function open() {
        $this->conn = new PDO($this->dsn, $this->user, $this->password);
        $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        echo "Verbindung aufgebaut." . PHP_EOL;
    }

    public function query($name, $string) {
        ## prep Variante
//        $query = $this->conn->prepare("SELECT * FROM table WHERE :name = :string");
//        $query->bindParam(':name', $name);
//        $query->bindParam(':string', $string);
//        $query->execute();
//        echo $query->fetch();
        ## ohne Prep
        $query = "SELECT * FROM tab WHERE " . $name . "='" . $string . "'";
        $data = $this->conn->query($query);

        return $data->fetch();
    }

}

//$db1 = new databasePDO("mysql","localhost","gruppe","root","");
//$db1->open();
//$val[] =  array('produkt' => 'lol', 'preis'=> 5.4);
//$db1->delete("id", 5);
?>

