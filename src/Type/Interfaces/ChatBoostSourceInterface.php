<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Interfaces;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @author  Юдов Никита yudov.nikita@bk.ru
 * @version 1.0.0
 *
 * Этот объект описывает источник усиления чата. Это может быть один из:
 * - ChatBoostSourcePremium (https://core.telegram.org/bots/api#chatboostsourcepremium);
 * - ChatBoostSourceGiftCode (https://core.telegram.org/bots/api#chatboostsourcegiftcode);
 * - ChatBoostSourceGiveaway (https://core.telegram.org/bots/api#chatboostsourcegiveaway).
 *
 * @link    https://core.telegram.org/bots/api#chatboostsource
 */
interface ChatBoostSourceInterface
{
    /**
     * Источник повышения.
     *
     * @return string
     * @see \PHPTCloud\TelegramApi\Type\Enums\ChatBoostSourceEnum
     */
    public function getSource(): string;

    /**
     * Пользователь, который улучшил чат.
     *
     * @return UserInterface
     */
    public function getUser(): UserInterface;
}