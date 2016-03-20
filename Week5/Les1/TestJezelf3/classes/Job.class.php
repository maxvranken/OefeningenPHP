<?php
include_once('Db.class.php');

class Job
{

    private $m_sName;
    private $m_sPeriod;
    private $m_sDescription;

    public function __set($p_sProperty, $p_vValue)
    {
        switch ($p_sProperty) {
            case "Name":
                $this->m_sName = $p_vValue;
                break;

            case "Period":
                $this->m_sPeriod = $p_vValue;
                break;

            case "Description":
                $this->m_sDescription = $p_vValue;
                break;
        }
    }

    public function __get($p_sProperty)
    {
        switch ($p_sProperty) {
            case "Name":
                return $this->m_sName;
                break;

            case "Period":
                return $this->m_sPeriod;
                break;

            case "Description":
                return $this->m_sDescription;
                break;
        }
    }

    public function GetAllJobs()
    {

        $conn = Db::getInstance();
        $jobs = $conn->query("select * from newjob");
        $jobs->execute();
        $results = $jobs->fetchAll();


        foreach ($results as $res) {
            if (($res['id'] % 2) == 0) {
                ?>
                <li>
                    <div class="direction-r">
                        <div class="flag-wrapper">
                            <span class="flag"> <?php echo $res['job']; ?></span>
                            <span class="time-wrapper"><span class="time"><?php echo $res['period']; ?></span></span>
                        </div>
                        <div class="desc"><?php echo $res['description']; ?></div>
                    </div>
                </li>
            <?php } else {
                 ?>
                <li>
                    <div class="direction-l">
                        <div class="flag-wrapper">
                            <span class="flag"> <?php echo $res['job']; ?></span>
                            <span class="time-wrapper"><span class="time"><?php echo $res['period']; ?></span></span>
                        </div>
                        <div class="desc"><?php echo $res['description']; ?></div>
                    </div>
                </li>
            <?php }
        }

        return $results;
    }

    function Save()
    {
        $conn = Db::getInstance();
        $statement = $conn->prepare("insert into newjob (job, period, description) values (:job, :period, :description)");
        $statement->bindValue(":job", $this->Name);
        $statement->bindValue(":period", $this->Period);
        $statement->bindValue(":description", $this->Description);
        $result = $statement->execute();
        return $result;
    }

}

?>