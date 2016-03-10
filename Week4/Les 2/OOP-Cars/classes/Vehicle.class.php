<?php

class Vehicle
{
    //private enkel binnen de klasse, protected ook in subklassen te gebruiken
    private $m_sBrand;
    private $m_dPrice;


//index.php $car->Brand = "toyota";
    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Brand":
                $this->m_sBrand = $p_vValue;
                break;
            case "Price":
                if( $p_vValue < 0){
                    throw new Exception("Price cannot be lower than 0.");
                }
                $this->m_dPrice = $p_vValue;
                break;
        }
    }



    public function __get( $p_sProperty )
    {
        switch($p_sProperty){
            case "Brand":
                return $this->m_sBrand;
                break;
            case "Price":
                return $this->m_dPrice;
                break;
        }
    }

}

?>