<?php
include_once ("Vehicle.class.php");
    class Car extends Vehicle
    {
        public function Save()
        {
            // conn
            $conn = new PDO("mysql:host=localhost;dbname=scotchbox", "root", "");

            // query INSERT / PDO prepared statements
            $statement = $conn->prepare("insert into cars (brand,price) values ( :brand, :price )");
            $statement->bindValue(":brand", $this->Brand);
            $statement->bindValue(":price", $this->Price);
            $result = $statement->execute();
            return $result;
        }

    }
?>