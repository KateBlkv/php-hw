<?php

namespace Climbers\Db;

use Climbers\Kernel\DBConnection;
use PDO;

class ClimbersDb
{
    private $connection;
    public function __construct(){
        $this->connection = DBConnection::getInstance()->getConnection();
    }

    public function getClimberByPhone($phone){
        $sql = "SELECT id, name FROM tb_climbers WHERE phone = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$phone]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function addNewClimber($name, $phone){
        $sql = "INSERT INTO tb_climbers(name, phone) VALUE (:name_param, :phone_param);";
        $params = [
            'name_param' => $name,
            'phone_param' => $phone
        ];
        $statement = $this->connection->prepare($sql);
        return $statement->execute($params);
    }

    public function addToExpedition($climber_id, $expedition_id){
        $sql = "INSERT INTO tb_climbers_expeditions(id_climber, id_expedition)
                VALUES  (:climber_id_param, :expedition_id_param)";
        $params = [
            'climber_id_param' => $climber_id,
            'expedition_id_param' => $expedition_id
        ];
        $statement = $this->connection->prepare($sql);
        return $statement->execute($params);
    }
}