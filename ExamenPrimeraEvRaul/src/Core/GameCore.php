<?php

namespace app\Core;

use app\Core\Interfaces\GameCoreInterface;
use GameResult;

class GameCore implements GameCoreInterface
{
    private static $instance;
    protected function __construct()
    {
    }
    protected function __clone()
    {
    }
    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }
        return self::$instance;
    }
    public function getWinner(?int $bet): GameResult
    {
        if ($bet < 1 || $bet > 5) {
            return new GameResult(null,null);
        }
        $computerBet = random_int(0, 4);

        $playerWins = [
            [null, 0, 1, 1, 0],
            [1, null, 0, 0, 1],
            [0, 1, null, 1, 0],
            [0, 1, 0, null, 1],
            [1, 0, 1, 0, null]
        ];
        $codes = [
            [null, "Papel envuelve piedra", "Piedra aplasta tijeras", "Piedra aplasta lagarto", "Spock vaporiza piedra"],
            ["Papel envuelve piedra", null, "Tijera corta papel", "Lagarto devora papel", "Papel desautoriza Spock"],
            ["Piedra aplasta tijeras", "Tijera corta papel", null, "Tijera decapita lagarto", "Spock rompe tijeras"],
            ["Piedra aplasta lagarto", "Lagarto devora papel", "Tijera decapita lagarto", null, "Lagarto envenena Spock"],
            ["Spock vaporiza piedra", "Papel desautoriza Spock", "Spock rompe tijeras", "Lagarto envenena Spock", null]
        ];
        return new GameResult($codes[$bet-1][$computerBet], $playerWins[$bet-1][$computerBet]);
    }
}
