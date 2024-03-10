<?php

declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Interfaces\Factory;

use PHPTCloud\TelegramApi\Type\Interfaces\DataObject\ReactionTypeCustomEmojiInterface;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 */
interface ReactionTypeCustomEmojiTypeFactoryInterface extends TypeFactoryInterface
{
    public function create(string $type, string $customEmojiId): ReactionTypeCustomEmojiInterface;
}
