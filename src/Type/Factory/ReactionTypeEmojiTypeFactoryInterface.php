<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Factory;

use PHPTCloud\TelegramApi\Type\Interfaces\ReactionTypeEmojiInterface;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @version 1.0.0
 */
interface ReactionTypeEmojiTypeFactoryInterface extends TypeFactoryInterface
{
    public function create(string $type, string $emoji): ReactionTypeEmojiInterface;
}
