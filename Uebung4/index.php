<?php

interface database {

    public function open();

    public function insert($record);

    public function query($name, $string);

    public function delete($name, $string);

    public function close();
}

class erstertest implements database {

    private $conn;
    private $user;
    private $dsn;
    private $password;

    function __construct($dbtyp, $host, $namedb, $user, $password) {
        $this->dsn = $dbtyp .
                ':host=' . $host .
                ':dbname=' . $namedb;
        $this->user = $user;
        $this->password = $password;
    }

    public function close() {
        $this->conn = null;
        echo "Verbindung geschlossen";
    }

    public function delete($name, $string) {
        //TO-DO
        echo $name . $string . "noch nix";
    }

    public function insert($record) {
        foreach($record as $rec){
            $insert = "INSERT INTO table(produkt,preis) VALUES ('${rec['produkt']}', '${rec['preis']})";
            $rtn = $this->conn->exec($insert);
            if($rtn===false) {
                $error = $this->conn->errorInfo();
                echo 'DB ERROR: #'.$error[1]." ".$error[2].PHP_E0L;                
            }
        }
    }

    public function open() {
        $this->conn = new PDO($this->dsn, $this->user, $this->password);
        echo "Verbindung aufgebaut.";
    }

    public function query($name, $string) {
        ## prep Variante
//        $query = $this->conn->prepare("SELECT * FROM table WHERE :name = :string");
//        $query->bindParam(':name', $name);
//        $query->bindParam(':string', $string);
//        $query->execute();
//        echo $query->fetch();
        ## ohne Prep
        $query = "SELECT * FROM table WHERE " . $name . "='".$string."'";
        $data = $this->conn->query($query);
        echo $data->fetch();
    }

}

$db1 = new erstertest("mysql","localhost","gruppe","root","");
$db1->open();
$db1->query("apfel","katze");
?>

