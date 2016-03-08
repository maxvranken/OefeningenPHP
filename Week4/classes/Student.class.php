<?php

class Student
{
    private $m_sFirstname;
    private $m_sLastname;
    private $m_iAge;

    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Firstname":
                if ($p_vValue == "") {
                    echo "Invalid firstname";
                }
                $this->m_sFirstname = $p_vValue;
                break;
            case "Lastname":
                $this->m_sLastname = $p_vValue;
                break;
            case "Age":
                $this->m_iAge = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty)
    {
        switch ($p_sProperty) {
            case "Firstname":
                return $this->m_sFirstname;
                break;
            case "Lastname":
                return $this->m_sLastname;
                break;
            case "Age":
                if($this->m_iAge > 100){
                    echo " Kan niet! ";
                } else{
                    return $this->m_iAge = $p_vValue;
                    break;
                }


            default:
                echo "Invalid Property: " . $p_sProperty;
                break;
        }
    }

}

?>