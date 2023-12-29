<?php

namespace App\Domain\Utility;

use App\Domain\Model\EntityInterface;
use DateTime;
use Exception;
use UnitEnum;

trait EntityTool
{
    public function toPersistenteValue(mixed $value): mixed
    {
        $transformed = $value;
        if ($value instanceof DateTime) {
            $transformed = $value->format('Y-m-d H:i:s');
        }
        if ($value instanceof UnitEnum) {
            $transformed = $value->value ?? $value->name;
        }
        if ($value instanceof EntityInterface) {
            $transformed = $value->getId();
        }
        if (is_bool($value)) {
            $transformed = $value ? 1 : 0;
        }
        return $transformed;
    }

    /**
     * @throws Exception
     */
    public function fromPersistenceValue(mixed $value): mixed
    {
        $transformed = null;
        if (!empty($value)) {
            $transformed = $value;
            if (in_array($value, [0, 1, '0', '1'])) {
                $transformed = $value === 1;
            }
            if (DateTool::isDateTime($value)) {
                $transformed = new DateTime($value);
            }
        }
        return $transformed;
    }

    public function toPersistenceField(string $name): string
    {
        $transformed = null;
        for ($i = 0; $i < strlen($name); $i++) {
            if (ctype_upper($name[$i])) {
                $transformed .= '_';
            }
            $transformed .= strtolower($name[$i]);
        }
        return $transformed;
    }

    public function fromPersistenceField(string $name): string
    {
        $transformed = null;
        $i = 0;
        do {
            $transformed .= '_' == $name[$i]
                ? strtoupper($name[++$i])
                : $name[$i];
            $i++;
        } while($i < strlen($name));
        return $transformed;
    }
}
