<?php

namespace Tests\Domain\Utility;

use App\Domain\Model\EntityInterface;
use App\Domain\Utility\EntityTool;
use App\Infrastructure\Database\ColumnDefinitions\ColumnType;
use DateTime;
use PHPUnit\Framework\TestCase;

class EntityToolTest extends TestCase
{
    protected object $entityTool;

    public function setUp(): void
    {
        parent::setUp();
        $this->entityTool = new class { use EntityTool; };
    }

    public static function dataPersistenceFieldProvider(): array
    {
        return [
            [
                'createdAt',
                'created_at'
            ],
            [
                'updatedAt',
                'updated_at'
            ],
            [
                'deletedAt',
                'deleted_at'
            ],
            [
                'fakefield',
                'fakefield'
            ]
        ];
    }

    /**
     * @dataProvider dataPersistenceFieldProvider
     * @param string $field
     * @param string $expected
     * @return void
     */
    public function testItTransformToPersistenceField(string $field, string $expected)
    {
        $this->assertEquals($expected, $this->entityTool->toPersistenceField($field));
    }

    /**
     * @dataProvider dataPersistenceFieldProvider
     * @param string $expected
     * @param string $field
     * @return void
     */
    public function testItTransformFromPersistenceField(string $expected, string $field)
    {
        $this->assertEquals($expected, $this->entityTool->fromPersistenceField($field));
    }

    public static function dataPersistenceValueProvider(): array
    {
        $dateTime = new DateTime('2024-01-01 00:00:00');
        $type = ColumnType::STRING;
        $entityMock = new class implements EntityInterface {

            public function getId(): ?int
            {
                return 1;
            }

            public function jsonSerialize(): array
            {
                return ['id' => 1];
            }

            public function setId(int $id): EntityInterface
            {
                return $this;
            }

            public function getCreatedAt(): ?DateTime
            {
                // TODO: Implement getCreatedAt() method.
            }

            public function setCreatedAt(DateTime $createdAt): EntityInterface
            {
                return $this;
            }

            public function getUpdatedAt(): ?DateTime
            {
                // TODO: Implement getUpdatedAt() method.
            }

            public function setUpdatedAt(DateTime $updatedAt): EntityInterface
            {
                return $this;
            }

            public function getDeletedAt(): ?DateTime
            {
                // TODO: Implement getDeletedAt() method.
            }

            public function setDeletedAt(DateTime $deletedAt): EntityInterface
            {
                return $this;
            }

            public static function builder(): EntityInterface
            {
                return new self();
            }

            public static function factory(array $data): EntityInterface
            {
                return new self();
            }
        };
        $nome = 'Lorem Ipsum';

        return [
            [
                $dateTime,
                $dateTime->format('Y-m-d H:i:s')
            ],
            [
                $type,
                $type->value
            ],
            [
                $entityMock,
                1
            ],
            [
                true,
                1
            ],
            [
                $nome,
                $nome
            ]
        ];
    }

    /**
     * @dataProvider dataPersistenceValueProvider
     * @param mixed $value
     * @param mixed $expected
     * @return void
     */
    public function testItTransformToPersistenceValue(mixed $value, mixed $expected)
    {
        $this->assertEquals($expected, $this->entityTool->toPersistenteValue($value));
    }

    public static function dataFromPersistenceValueProvider(): array
    {
        $nome = 'Lorem Ipsum';
        $dateTime = new DateTime('2024-01-01 00:00:00');
        return [
            [
                $dateTime,
                $dateTime->format('Y-m-d H:i:s')
            ],
            [
                true,
                1
            ],
            [
                $nome,
                $nome
            ]
        ];
    }

    /**
     * @dataProvider dataFromPersistenceValueProvider
     * @param mixed $expected
     * @param mixed $value
     * @return void
     */
    public function testItTransformFromPersistenceValue(mixed $expected, mixed $value)
    {
        $this->assertEquals($expected, $this->entityTool->fromPersistenceValue($value));
    }
}
