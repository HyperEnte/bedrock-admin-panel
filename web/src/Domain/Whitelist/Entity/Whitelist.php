<?php

declare(strict_types=1);

namespace Domain\Whitelist\Entity;

final class Whitelist
{
    /**
     * @var array|Player[]
     */
    private array $players = [];

    /**
     * Whitelist constructor.
     * @param array $players
     */
    public function __construct(array $players)
    {
        foreach ($players as $player) {
            $this->addPlayer(new Player(
                $player['name'], $player['uuid'],
                $player['xuid'] ?? null, new Role($player['role'] ?? 'default'),
                $player['ignoresPlayerLimit'] === 'true' ? true : false
            ));
        }
    }

    /**
     * @return array|Player[]
     */
    public function getPlayers(): array
    {
        return $this->players;
    }

    public function getPlayersArray(): array
    {
        $players = [];

        foreach ($this->players as $player) {
            $players[] = $player->asArray();
        }

        return $players;
    }

    public function addPlayer(Player $player): void
    {
        $this->players[] = $player;
    }

    public function editPlayerByUuid(
        string $uuid,
        Role $role,
        bool $ignoresPlayerLimit
    ): void
    {
        foreach ($this->players as $whitelistPlayer) {
            if ($whitelistPlayer->getUuid() === $uuid) {
                $whitelistPlayer->edit(
                    $role,
                    $ignoresPlayerLimit
                );
            }
        }
    }

    public function removePlayer(Player $player): void
    {
        foreach ($this->players as $key => $whitelistPlayer) {
            if ($whitelistPlayer->isEqual($player)) {
                unset($this->players[$key]);
            }
        }
    }

    public function countPlayers(): int
    {
        return count($this->players);
    }
}