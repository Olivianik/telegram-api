<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Argument\Serializer;

use PHPTCloud\TelegramApi\Argument\Interfaces\LinkPreviewOptionsArgumentInterface;
use PHPTCloud\TelegramApi\SerializerInterface;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @version 1.0.0
 */
interface LinkPreviewOptionsArgumentArraySerializerInterface extends SerializerInterface
{
    public function serialize(LinkPreviewOptionsArgumentInterface $argument): array;
}
