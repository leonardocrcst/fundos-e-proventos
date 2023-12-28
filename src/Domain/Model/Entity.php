<?php

namespace App\Domain\Model;

use App\Domain\Utility\EntityTool;
use DateTime;

abstract class Entity implements EntityInterface
{
    protected ?int $id = null;
    protected ?DateTime $createdAt;
    protected ?DateTime $updatedAt = null;
    protected ?DateTime $deletedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getCreatedAt(): ?DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

    use EntityTool;

    public function getUpdatedAt(): ?DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    public function getDeletedAt(): ?DateTime
    {
        return $this->deletedAt;
    }

    public function setDeletedAt(DateTime $deletedAt): self
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    public function jsonSerialize(): array
    {
        $data = [];
        foreach (get_object_vars($this) as $property => $value) {
            $method = "get$property";
            $field = $value instanceof EntityInterface
                ? $this->toPersistenceField($property) . '_id'
                : $this->toPersistenceField($property);
            $data[$field] = $this->toPersistenteValue($this->$method());
        }
        return $data;
    }
}
