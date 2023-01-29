<?php

namespace app\Core\Interfaces;

use GameResult;

interface GameCoreInterface
{
    public function getWinner(?int $bet): GameResult;
}
