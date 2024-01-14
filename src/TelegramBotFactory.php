<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @version 1.0.0
 */
class TelegramBotFactory implements TelegramBotFactoryInterface
{
    public function create(
        string  $token,
        ?string $username = null,
        ?string $name = null,
        ?string $description = null,
    ): TelegramBotInterface {
        return TelegramBot::NewBasic($token, $username, $name, $description);
    }
}
