<?php

declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Interfaces\DataObject;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @author  Юдов Никита yudov.nikita@bk.ru
 *
 * При получении сообщения с этим объектом клиенты Telegram отобразят пользователю интерфейс ответа (де
 * йствуйте так, как будто пользователь выбрал сообщение бота и нажал «Ответить»). Это может быть чрезв
 * ычайно полезно, если вы хотите создать удобные для пользователя пошаговые интерфейсы, не жертвуя реж
 * имом конфиденциальности.
 *
 * @see     https://core.telegram.org/bots/api#forcereply
 */
interface ForceReplyInterface
{
    /**
     * Показывает пользователю интерфейс ответа, как если бы он вручную выбрал сообщение бота и нажал «Repl
     * y».
     */
    public function isForceReply(): bool;

    /**
     * Необязательный. Заполнитель, который будет отображаться в поле ввода, когда ответ активен; 1-64 симв
     * олов.
     */
    public function getInputFieldPlaceholder(): ?string;

    /**
     * Необязательный. Используйте этот параметр, если вы хотите показывать клавиатуру только определенным
     * пользователям. Цели:
     * 1) пользователи, @mentioned в тексте объекта «Message»;
     * 2) если сообщение бота является ответом на сообщение в том же чате и теме форума.
     *
     * Пример: пользователь запрашивает изменение языка бота, бот отвечает на запрос с помощью клавиатуры д
     * ля выбора нового языка. Другие пользователи в группе не видят клавиатуру.
     */
    public function isSelective(): ?bool;
}
