<?php
class CURD
{
    public $connection;
    public function __construct()
    {
            $this->connection = new PDO(DB_CONNECTION . ":host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    public function getData($table, $columns = "*", $condition = true)
    {
        $query = "SELECT $columns FROM $table WHERE $condition";
        $data = $this->connection->query($query);
        return $data->fetchAll();
    }

    public function insertData($table, $columns, $data)
    {
        $d = array_map(function ($x) {
            return gettype($x) == 'string' ?  "'" . $x . "'" : $x;
        }, $data);
        $info = implode(', ', $d);
        $query = "INSERT INTO $table ($col) VALUES ($info)";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }

    public function updateData($table, $data, $condition)
    {
        $info = implode(', ', $d);
        $query = "UPDATE $table SET $info WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }

    public  function deleteData($table, $condition = true)
    {
        $query = "DELETE FROM $table WHERE $condition";
        $sql = $this->connection->prepare($query);
        return $sql->execute();
    }
}
?>
