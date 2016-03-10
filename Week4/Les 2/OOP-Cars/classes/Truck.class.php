<?php
include_once ("Vehicle.class.php");
class Truck extends Vehicle
{
    private $m_iMaxload;

    public function __set($p_sProperty, $p_vValue)
    {
        parent:: __set($p_sProperty, $p_vValue);

        switch ($p_sProperty) {
            case "Maxload":
                $this->m_iMaxload = $p_vValue;
                break;
        }
    }



    public function __get( $p_sProperty )
    {
        $vResult = parent::__get($p_sProperty);

        switch($p_sProperty){
            case "Maxload":
                $vResult = $this->m_iMaxload;
                break;
        }

        return $vResult;
    }

    public function Save()
    {
        // conn
        $conn = new PDO("mysql:host=localhost;dbname=scotchbox", "root", "");

        // query INSERT / PDO prepared statements
        $statement = $conn->prepare("insert into trucks (brand,price,maxload) values ( :brand, :price, :maxload )");
        $statement->bindValue(":brand", $this->Brand);
        $statement->bindValue(":price", $this->Price);
        $statement->bindValue(":maxload", $this->Maxload);
        $result = $statement->execute();
        return $result;
    }
}

?>