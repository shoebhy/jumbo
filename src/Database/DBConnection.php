<?php

class DBConnection
{
    const SERVER_NAME = "localhost";
    const SERVER_USERNAME = "shoeb";
    const SERVER_PASSWORD = "pwdpwd";
    const DATABASE_NAME = "jumbo";
    /**
     * @var mysqli
     */
    protected $connection;

    /**
     * @param mysqli $Connection
     * @return $this
     */
    public function setConnection(mysqli $Connection)
    {
        $this->connection = $Connection;
        return $this;
    }

    /**
     * @return mysqli
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * @return bool
     */
    public function establishConnection()
    {
        $this->connection = new mysqli(static::SERVER_NAME, static::SERVER_USERNAME, static::SERVER_PASSWORD, static::DATABASE_NAME);
        if ($this->connection->connect_error) {
            return false;
        }
        return true;
    }
}