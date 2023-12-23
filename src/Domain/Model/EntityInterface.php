<?php

namespace App\Domain\Model;

use DateTime;

interface EntityInterface
{
    public function getId(): ?int;

    public function setId(int $id): self;

    public function getCreatedAt(): ?DateTime;

    public function setCreatedAt(DateTime $createdAt): self;

    public function getUpdatedAt(): ?DateTime;

    public function setUpdatedAt(DateTime $updatedAt): self;

    public function getDeletedAt(): ?DateTime;

    public function setDeletedAt(DateTime $deletedAt): self;

    public function jsonSerialize(): array;

    public static function builder(): self;
}
