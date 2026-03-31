<?php

declare(strict_types=1);

namespace CaseInsensitiveCommands;

use pocketmine\event\Listener;
use pocketmine\event\server\CommandEvent;

class CaseInsensitiveCommandListener implements Listener
{
    public function onCommand(CommandEvent $event): void
    {
        $parts       = explode(' ', $event->getCommand(), 2);
        $commandName = strtolower(ltrim($parts[0], '/'));
        $args        = isset($parts[1]) ? ' ' . $parts[1] : '';

        $event->setCommand('/' . $commandName . $args);
    }
}
