<?php

declare(strict_types=1);

namespace CaseInsensitiveCommands;

use pocketmine\plugin\PluginBase;

class Main extends PluginBase
{
    protected function onEnable(): void
    {
        $this->getServer()->getPluginManager()->registerEvents(
            new CaseInsensitiveCommandListener(),
            $this
        );
    }
}
