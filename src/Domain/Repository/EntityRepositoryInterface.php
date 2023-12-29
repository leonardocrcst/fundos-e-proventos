<?php

namespace App\Domain\Repository;

use App\Domain\Model\EntityInterface;

interface EntityRepositoryInterface
{
    public function remove(EntityInterface $entity): void;

    public function openBy(string $field, mixed $value): EntityInterface;

    public function openById(int $id): EntityInterface;

    public function list(): array;
}
