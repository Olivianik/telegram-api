<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\DomainService\Interfaces\Factory;

use PHPTCloud\TelegramApi\DomainService\Interfaces\ChatDomainServiceInterface;
use PHPTCloud\TelegramApi\TelegramApiManagerInterface;
use PHPTCloud\TelegramApi\TelegramBotInterface;

/**
 * @author  Пешко Илья peshkoi@mail.ru
 * @version 1.0.0
 */
interface ChatDomainServiceFactoryInterface
{
    public function create(
        ?TelegramBotInterface $telegramBot = null,
        ?string               $host = TelegramApiManagerInterface::TELEGRAM_API_HOST,
    ): ChatDomainServiceInterface;
}