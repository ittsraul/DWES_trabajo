<?php


class GameResult
{
    private $code;
    private $playerWins;
    public function __construct(?string $code, ?bool $playerWins)
    {
        $this->code = $code;
        $this->playerWins = $playerWins;
    }

    /**
     * Get the value of playerWins
     */
    public function getPlayerWins(): ?bool
    {
        return $this->playerWins;
    }

    /**
     * Get the value of code
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
}
