<?php

declare(strict_types=1);

namespace PHPTCloud\TelegramApi\DomainService\Enums;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @author  Пешко Илья peshkoi@mail.ru
 *
 * @version 1.0.0
 */
enum TelegramApiMethodEnum: string
{
    /**
     * @see https://core.telegram.org/bots/api#getme
     *
     * Простой метод проверки токена аутентификации вашего бота. Не требует параметров. Возвращает основную
     * информацию о боте в виде объекта User (https://core.telegram.org/bots/api#user).
     */
    case GET_ME = 'getMe';

    /**
     * @see https://core.telegram.org/bots/api#logout
     *
     * Используйте этот метод для выхода из облачного сервера API бота перед локальным запуском бота. Вы до
     * лжны выйти из системы бота перед его локальным запуском, иначе нет никакой гарантии, что бот будет п
     * олучать обновления. После успешного звонка вы сразу сможете авторизоваться на локальном сервере, но
     * не сможете зайти обратно на сервер Cloud Bot API в течение 10 минут. Возвращает True в случае успеха
     * . Не требует параметров. Примечание: метод может понадобиться если вы используете локаьлный Telegram
     * API (https://github.com/tdlib/telegram-bot-api).
     */
    case LOG_OUT = 'logOut';

    /**
     * @see https://core.telegram.org/bots/api#close
     *
     * Используйте этот метод, чтобы закрыть экземпляр бота перед его перемещением с одного локального серв
     * ера на другой. Вам необходимо удалить веб-перехватчик перед вызовом этого метода, чтобы гарантироват
     * ь, что бот не запустится снова после перезапуска сервера. Метод вернет ошибку 429 в первые 10 минут
     * после запуска бота. Возвращает True в случае успеха. Не требует параметров.
     */
    case CLOSE = 'close';

    /**
     * @see https://core.telegram.org/bots/api#sendmessage
     *
     * Используйте этот метод для отправки текстовых сообщений. В случае успеха отправленное сообщение возв
     * ращается с типом Message (https://core.telegram.org/bots/api#message).
     */
    case SEND_MESSAGE = 'sendMessage';

    /**
     * @see https://core.telegram.org/bots/api#getchat
     *
     * Используйте этот метод, чтобы получить актуальную информацию о чате. В случае успеха возвращает объе
     * кт с типом Chat (https://core.telegram.org/bots/api#chat).
     */
    case GET_CHAT = 'getChat';

    /**
     * @see  https://core.telegram.org/bots/api#sendchataction
     *
     * Используйте этот метод, когда вам нужно сообщить пользователю, что что-то происходит на стороне бота.
     * Статус устанавливается на 5 секунд или меньше (при поступлении сообщения от вашего бота клиенты Te
     * legram очищают его статус набора). Возвращает True в случае успеха.
     *
     * Пример: ImageBot требуется некоторое время для обработки запроса и загрузки изображения. Вместо отпр
     * авки текстового сообщения типа «Получение изображения, пожалуйста, подождите…» бот может использоват
     * ь sendChatAction с action = upload_photo. Пользователь увидит статус бота «отправка фото».
     *
     * @link https://t.me/imagebot
     *
     * Мы рекомендуем использовать этот метод только в том случае, если получение ответа от бота займет зам
     * етное время.
     */
    case SEND_CHAT_ACTION = 'sendChatAction';

    /**
     * @see https://core.telegram.org/bots/api#forwardmessage
     *
     * Используйте этот метод для пересылки сообщений любого типа. Служебные сообщения и сообщения с защище
     * нным содержимым пересылаться не могут. В случае успеха отправленное сообщение возвращается.
     */
    case FORWARD_MESSAGE = 'forwardMessage';

    /**
     * @see https://core.telegram.org/bots/api#forwardmessages
     *
     * Используйте этот метод для пересылки нескольких сообщений любого типа. Если некоторые из указанных с
     * ообщений не удается найти или переслать, они пропускаются. Служебные сообщения и сообщения с защищен
     * ным содержимым пересылаться не могут. Группировка альбомов сохраняется для пересылаемых сообщений. В
     * случае успеха возвращается массив MessageId отправленных сообщений.
     */
    case FORWARD_MESSAGES = 'forwardMessages';

    /**
     * @see https://core.telegram.org/bots/api#copymessage
     *
     * Используйте этот метод для копирования сообщений любого типа. Служебные сообщения, сообщения о розыг
     * рышах, сообщения о победителях розыгрышей и сообщения о счетах не могут быть скопированы. Опрос викт
     * орины можно скопировать только в том случае, если боту известно значение поля correct_option_id. Мет
     * од аналогичен методу forwardMessage, но скопированное сообщение не имеет ссылки на исходное сообщени
     * е. Возвращает MessageId отправленного сообщения в случае успеха.
     */
    case COPY_MESSAGE = 'copyMessage';

    /**
     * @see https://core.telegram.org/bots/api#copymessages
     *
     * Используйте этот метод для копирования сообщений любого типа. Если некоторые из указанных сообщений
     * невозможно найти или скопировать, они пропускаются. Служебные сообщения, сообщения о розыгрышах, соо
     * бщения о победителях розыгрышей и сообщения о счетах не могут быть скопированы. Опрос викторины можн
     * о скопировать только в том случае, если значение поля correct_option_id известно боту. Метод аналоги
     * чен методу forwardMessages, но скопированные сообщения не имеют ссылки на исходное сообщение. Группи
     * ровка альбомов сохраняется для скопированных сообщений. В случае успеха возвращается массив MessageI
     * d отправленных сообщений.
     */
    case COPY_MESSAGES = 'copyMessages';

    /**
     * @see https://core.telegram.org/bots/api#sendphoto
     *
     * Используйте этот метод для отправки фотографий. В случае успеха отправленное сообщение возвращается.
     */
    case SEND_PHOTO = 'sendPhoto';

    /**
     * @see  https://core.telegram.org/bots/api#sendaudio
     *
     * Используйте этот метод для отправки аудиофайлов, если вы хотите, чтобы клиенты Telegram отображали и
     * х в музыкальном проигрывателе. Ваш звук должен быть в формате .MP3 или .M4A. В случае успеха отправл
     * енное сообщение возвращается. Боты в настоящее время могут отправлять аудиофайлы размером до 50 МБ,
     * в будущем этот лимит может быть изменен.
     *
     * Вместо этого для отправки голосовых сообщений используйте метод sendVoice.
     * @see  https://core.telegram.org/bots/api#sendvoice
     */
    case SEND_AUDIO = 'sendAudio';

    /**
     * @see https://core.telegram.org/bots/api#senddocument
     *
     * Используйте этот метод для отправки общих файлов. В случае успеха отправленное сообщение возвращаетс
     * я. Боты на данный момент могут отправлять файлы любого типа размером до 50 МБ, в будущем этот лимит
     * может быть изменен.
     */
    case SEND_DOCUMENT = 'sendDocument';
}
