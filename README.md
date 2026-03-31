# CaseInsensitiveCommands

PocketMine-MP plugin that normalizes all incoming commands to lowercase before dispatch, allowing players to use any capitalization variant.

## Behavior

Any command typed in any case is accepted and resolved correctly:

| Input | Resolved |
|---|---|
| `/eC` | `/ec` |
| `/Ec` | `/ec` |
| `/EC` | `/ec` |
| `/gOd` | `/god` |

> Arguments are preserved exactly as the player typed them — only the command name is normalized.

## How it works

The plugin hooks into `CommandEvent` at `LOWEST` priority, intercepting every command before PocketMine's dispatcher processes it. The command name is lowercased via `strtolower()` and the event is updated with the normalized string.

```php
public function onCommand(CommandEvent $event): void
{
    $parts       = explode(' ', $event->getCommand(), 2);
    $commandName = strtolower(ltrim($parts[0], '/'));
    $args        = isset($parts[1]) ? ' ' . $parts[1] : '';

    $event->setCommand('/' . $commandName . $args);
}
```

## Compatibility

- PocketMine-MP API 5.0.0+
- Works with all plugins and custom forks — no configuration needed
