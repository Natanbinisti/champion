<?php

namespace App\Repository;

use App\Entity\Champion;
use Core\Attributes\TargetEntity;
use Core\Repository\Repository;
#[TargetEntity(name: Champion::class)]

class ChampionRepository extends Repository
{

}