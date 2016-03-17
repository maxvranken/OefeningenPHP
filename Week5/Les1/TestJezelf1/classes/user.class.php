<?php
include_once('Db.class.php');

class User
{
    private $m_sEmail;
    private $m_sUserName;
    private $m_sPassword;

    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Email":
                $this->m_sEmail = $p_vValue;
                break;
            case "Name":
                $this->m_sUserName = $p_vValue;
                break;
            case "Password":
                $this->m_sPassword = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty)
    {
        switch ($p_sProperty) {
            case "Email":
                return $this->m_sEmail;
                break;
            case "Name":
                return $this->m_sUserName;
                break;
            case "Password":
                return $this->m_sPassword;
                break;
        }
    }

    public function canLogin()
    {
        if (!empty($this->m_sEmail) && !empty($this->m_sPassword)) {
            session_start();
            $conn = new mysqli('localhost', 'root', '', 'twitter');
            $sql = "select * from users
                    where email = '" . $conn->real_escape_string($this->m_sEmail) . "'";
            $password = $this->m_sPassword;
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                $person = $result->fetch_assoc();
                $hash = $person['password'];
                $_SESSION["userID"] = $person["id"];
                if (password_verify($password, $hash)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public function Register()
    {
        if (!empty($this->m_sEmail) && !empty($this->m_sPassword) && !empty($this->m_sUserName)) {
            $conn = Db::getInstance();
            $statement = $conn->prepare("insert into users (email, password, name) values (:email, :password, :name)");
            $options = [
                'cost' => 12
            ];
            $password = password_hash($this->m_sPassword, PASSWORD_DEFAULT, $options);
            $statement->bindValue(":email", $this->m_sEmail);
            $statement->bindValue(":password", $password);
            $statement->bindValue(":name", $this->m_sUserName);
            $statement->execute();
        } else {
        }
    }
}

?>