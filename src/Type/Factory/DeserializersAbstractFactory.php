<?php
declare(strict_types=1);

namespace PHPTCloud\TelegramApi\Type\Factory;

use PHPTCloud\TelegramApi\DeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatLocationDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatLocationDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatPermissionsDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatPermissionsDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatPhotoDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ChatPhotoDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\LocationDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\LocationDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\MessageDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\MessageDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeCustomEmojiDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeCustomEmojiDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeEmojiDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\ReactionTypeEmojiDeserializerInterface;
use PHPTCloud\TelegramApi\Type\Deserializer\UserDeserializer;
use PHPTCloud\TelegramApi\Type\Deserializer\UserDeserializerInterface;

/**
 * @author  Юдов Алексей tcloud.ax@gmail.com
 * @version 1.0.0
 */
class DeserializersAbstractFactory implements DeserializersAbstractFactoryInterface
{
    public function __construct(
        private readonly TypeFactoriesAbstractFactoryInterface $typeFactoriesAbstractFactory,
    ) {}

    public function create(string $type): DeserializerInterface
    {
        switch ($type) {
            case UserDeserializerInterface::class:
            case UserDeserializer::class:
                return $this->createUserDeserializer();
            case MessageDeserializer::class:
            case MessageDeserializerInterface::class:
                return $this->createMessageDeserializer();
            case ChatDeserializer::class:
            case ChatDeserializerInterface::class:
                return $this->createChatDeserializer();
            case ChatPhotoDeserializer::class:
            case ChatPhotoDeserializerInterface::class:
                return $this->createChatPhotoDeserializer();
            case ReactionTypeDeserializer::class:
            case ReactionTypeDeserializerInterface::class:
                return $this->createReactionTypeDeserializer();
            case ReactionTypeCustomEmojiDeserializer::class:
            case ReactionTypeCustomEmojiDeserializerInterface::class:
                return $this->createReactionTypeCustomEmojiDeserializer();
            case ReactionTypeEmojiDeserializer::class:
            case ReactionTypeEmojiDeserializerInterface::class:
                return $this->createReactionTypeEmojiDeserializer();
            case ChatPermissionsDeserializer::class:
            case ChatPermissionsDeserializerInterface::class:
                return $this->createChatPermissionsDeserializer();
            case ChatLocationDeserializer::class:
            case ChatLocationDeserializerInterface::class:
                return $this->createChatLocationDeserializer();
            case LocationDeserializer::class:
            case LocationDeserializerInterface::class:
                return $this->createLocationDeserializer();
            default:
                throw new \InvalidArgumentException(sprintf('Десериалайзер с типом "%s" не определен.', $type));
        }
    }

    public function createUserDeserializer(): UserDeserializerInterface
    {
        /** @var UserTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(UserTypeFactoryInterface::class);

        return new UserDeserializer($typeFactory);
    }

    public function createMessageDeserializer(bool $wantCreateMessageDeserializer = true): MessageDeserializerInterface
    {
        /** @var MessageTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(MessageTypeFactoryInterface::class);

        return new MessageDeserializer(
            $typeFactory,
            $this->createChatDeserializer($wantCreateMessageDeserializer),
        );
    }

    /**
     * @param bool $wantCreateMessageDeserializer - флаг для того, чтобы избежать циклической зависимости между
     *                                            ChatDeserializer и MessageDeserializer.
     *
     * @return ChatDeserializerInterface
     */
    public function createChatDeserializer(bool $wantCreateMessageDeserializer = true): ChatDeserializerInterface
    {
        /** @var ChatTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatTypeFactoryInterface::class);

        $messageDeserializer = null;
        if ($wantCreateMessageDeserializer) {
            $messageDeserializer = $this->createMessageDeserializer(false);
        }

        return new ChatDeserializer(
            $typeFactory,
            $this->createChatPhotoDeserializer(),
            $this->createReactionTypeDeserializer(),
            $this->createChatPermissionsDeserializer(),
            $this->createChatLocationDeserializer(),
            $messageDeserializer,
        );
    }

    public function createChatPhotoDeserializer(): ChatPhotoDeserializerInterface
    {
        /** @var ChatPhotoTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatPhotoTypeFactoryInterface::class);

        return new ChatPhotoDeserializer($typeFactory);
    }

    public function createReactionTypeDeserializer(): ReactionTypeDeserializerInterface
    {
        return new ReactionTypeDeserializer(
            $this->createReactionTypeCustomEmojiDeserializer(),
            $this->createReactionTypeEmojiDeserializer(),
        );
    }

    public function createReactionTypeCustomEmojiDeserializer(): ReactionTypeCustomEmojiDeserializerInterface
    {
        /** @var ReactionTypeCustomEmojiTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ReactionTypeCustomEmojiTypeFactoryInterface::class);

        return new ReactionTypeCustomEmojiDeserializer($typeFactory);
    }

    public function createReactionTypeEmojiDeserializer(): ReactionTypeEmojiDeserializerInterface
    {
        /** @var ReactionTypeEmojiTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ReactionTypeEmojiTypeFactoryInterface::class);

        return new ReactionTypeEmojiDeserializer($typeFactory);
    }

    public function createChatPermissionsDeserializer(): ChatPermissionsDeserializerInterface
    {
        /** @var ChatPermissionsTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatPermissionsTypeFactoryInterface::class);

        return new ChatPermissionsDeserializer($typeFactory);
    }

    public function createChatLocationDeserializer(): ChatLocationDeserializerInterface
    {
        /** @var ChatLocationTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(ChatLocationTypeFactoryInterface::class);

        return new ChatLocationDeserializer($typeFactory, $this->createLocationDeserializer());
    }

    public function createLocationDeserializer(): LocationDeserializerInterface
    {
        /** @var LocationTypeFactoryInterface $typeFactory */
        $typeFactory = $this->typeFactoriesAbstractFactory->create(LocationTypeFactoryInterface::class);

        return new LocationDeserializer($typeFactory);
    }
}
