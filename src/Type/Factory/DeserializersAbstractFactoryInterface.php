<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Factory;

use PHPTCloud\TelegramApi\DeserializerInterface;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @version 1.0.0
 */
interface DeserializersAbstractFactoryInterface
{
    public function create(string $type): DeserializerInterface;
}