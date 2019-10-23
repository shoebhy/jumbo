<?php

class AbstractRepository
{
    protected $Object;

    /**
     * @var mysqli
     */
    protected $db;

    /**
     * @return mixed
     */
    public function getObject()
    {
        return $this->Object;
    }

    /**
     * @param mixed $Object
     * @return AbstractRepository
     */
    public function setObject($Object)
    {
        $this->Object = $Object;
        return $this;
    }

    /**
     * Sets up the db connection
     * @return bool
     */
    protected function getConnection()
    {
        $DBConnection = new DBConnection();
        $connected = $DBConnection->establishConnection();
        if (!$connected) {
            return false;
        }
        $this->db = $DBConnection->getConnection();
        return true;
    }
}