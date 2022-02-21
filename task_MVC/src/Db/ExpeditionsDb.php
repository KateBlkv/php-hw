<?php


namespace Climbers\Db;


use Climbers\Kernel\DBConnection;
use PDO;

use Climbers\Kernel\DBConnection;

class ExpeditionsDb
{
    private $connection;
    public function __construct(){
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    public function getFutureExpeditions(){
        $sql = "SELECT id, mountain_name, start FROM tb_expeditions WHERE start > NOW();";
        $statement = $this->connection->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFutureEexpiditions(): MountainsDb
    {
        $sql = "SELECT id, mountain_name, start FROM tb_expiditions WHERE start > NOW();";
        $statement = $this->connection->query($sql);
        /*$statement = $this->connection->prepare($sql);
        $statement->execute();*/
        return $statement->fetchAll(PDO::FETCH_ASSOC);
        //return $statement->fetchAll(\PDO::FETCH_ASSOC); \ - использование абсолютного имени, тогда без use

    }
}