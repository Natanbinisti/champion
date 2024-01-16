<?php

namespace App\Repository;

use App\Entity\Champion;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(name: Champion::class)]

class ChampionRepository extends Repository
{
    public function save(Champion $champion):void
    {
        $query = $this->pdo->prepare("INSERT INTO $this->tableName SET name = :name, type = :type, difficulty = :difficulty");
        $query->execute([
            "name"=>$champion->getName(),
            "type"=>$champion->getType(),
            "difficulty"=>$champion->getDifficulty(),
        ]);

    }
}