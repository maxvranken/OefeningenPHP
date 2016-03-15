<?php

class Booking
{
    private $m_sFirstname;
    private $m_sLastname;
    private $m_sHotel;
    private $m_iCheckinDay;
    private $m_iCheckoutDay;
    private $m_iCheckinMonth;
    private $m_iCheckoutMonth;


    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Firstname":
                if (!empty($p_vValue)) {
                    $this->m_sFirstname = $p_vValue;
                } else {
                    throw new Exception("Firstname can't be empty");
                }

                break;
            case "Lastname":
                $this->m_sLastname = $p_vValue;
                break;
            case "Hotel":
                $this->m_sHotel = $p_vValue;
                break;
            case "CheckinDay":
                $this->m_iCheckinDay = $p_vValue;
                break;
            case "CheckoutDay":
                $this->m_iCheckoutDay = $p_vValue;
                break;
            case "CheckinMonth":
                $this->m_iCheckinMonth = $p_vValue;
                break;
            case "CheckoutMonth":
                $this->m_iCheckoutMonth = $p_vValue;
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
            case "Hotel":
                return $this->m_sHotel;
                break;
            case "CheckinDay":
                return $this->m_iCheckinDay;
                break;
            case "CheckoutDay":
                return $this->m_iCheckoutDay;
                break;
            case "CheckinMonth":
                return $this->m_iCheckinMonth;
                break;
            case "CheckoutMonth":
                return $this->m_iCheckoutMonth;
                break;
        }
    }

    private function canBook()
    {
        if ($this->m_iCheckoutMonth > $this->m_iCheckinMonth
            || ($this->m_iCheckinMonth == $this->m_iCheckoutMonth && $this->m_iCheckoutDay > $this->m_iCheckinDay)
        ) {
            return true;

        } else {
            return false;
        }
    }

    public function save(){

        if(!$this->canBook()){
            throw new Exception("Booking dates are incorrect.");
        } try{
            $booking = new Booking();
            $booking->Firstname = $_POST['firstname'];
            $booking->Lastname = $_POST['lastname'];
            $booking->Hotel = $_POST['hotel'];
            $booking->Checkinday = $_POST['checkinday'];
            $booking->CheckinMonth = $_POST['checkinmonth'];
            $booking->CheckoutDay = $_POST['checkoutday'];
            $booking->CheckoutMonth = $_POST['checkoutmonth'];
            $booking->save();
        } catch(Exception $e){
            $error = $e->getMessage();

        }

        $conn = new PDO("mysql:host=localhost; dbname=imd", "root", "");
        $query = $conn->prepare(    "insert into tblhotelbookings (
                                    booking_first_name,
                                    booking_last_name,
                                    booking_from_day,
                                    booking_from_month,
                                    booking_to_day,
                                    booking_to_month,
                                    booking_hotel)
                                    values (
                                    :firstname,
                                    :lastname,
                                    :checkinday,
                                    :checkinmonth,
                                    :checkoutday,
                                    :checkoutmonth,
                                    :hotel)");

        $query->bindValue(":firstname", $this->m_sFirstname);
        $query->bindValue(":lastname", $this->m_sLastname);
        $query->bindValue(":checkinday", $this->m_iCheckinDay);
        $query->bindValue(":checkinmonth", $this->m_iCheckinMonth);
        $query->bindValue(":checkoutday", $this->m_iCheckoutDay);
        $query->bindValue(":checkoutmonth", $this->m_iCheckoutMonth);
        $query->bindValue(":hotel", $this->m_sHotel);
        return $query->execute();
    }
}


?>