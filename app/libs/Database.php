<?php

class Database
{
    private $HOST = DB_HOST;
    private $USER = DB_USER;
    private $PASS = DB_PASS;
    private $DBNM = DB_NAME;

    private $stmt;
    private $conn;
    private $error;

    public function __construct()
    {
        $dsn = 'mysql:host=' . $this->HOST . ';dbname=' . $this->DBNM;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            $this->conn = new PDO($dsn, $this->USER, $this->PASS, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Allows us to write queries
    public function query($sql)
    {
        $this->stmt = $this->conn->prepare($sql);
    }

    // Bind values
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }

    // Execute the prepared stmt
    public function execute()
    {
        return $this->stmt->execute();
    }

    // Return an array
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    // Return a specific row as an object
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    // Return the last inserted ID
    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }
}
