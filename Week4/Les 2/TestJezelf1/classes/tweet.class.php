<?php
class Tweet {
    private $m_sTweet;
    private $m_iUserID;
    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Post":
                $this->m_sTweet = $p_vValue;
                break;
            case "UserID":
                $this->m_iUserID = $p_vValue;
                break;
        }
    }
    public function __get($p_sProperty)
    {
        switch ($p_sProperty) {
            case "Post":
                return $this->m_sTweet;
                break;
            case "UserID":
                return $this->m_iUserID;
                break;
        }
    }
    public function Save() {
        $conn = new PDO("mysql:host=localhost;dbname=imd", "root", "");
        $statement = $conn->prepare("insert into tweets (text, userID) values (:text, :userID)");
        $statement->bindValue(":text", $this->m_sTweet);
        $statement->bindValue(":userID", $this->m_iUserID);
        $result = $statement->execute();
        return $result;
    }
    public function GetAll() {
        $conn = new PDO("mysql:host=localhost;dbname=imd", "root", "");
        $statement = $conn->prepare("select * from tweets where userID = ".$_SESSION['userID']);
        $statement->execute();
        $result = $statement->fetchAll();
        return $result;
    }
}