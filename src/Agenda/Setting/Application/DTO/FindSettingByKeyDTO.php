<?php

namespace Src\Agenda\Setting\Application\DTO;

use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;

class FindSettingByKeyDTO
{
    private string $key;

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @param EnumKeySetting $key
     * @return $this
     */
    public function setKey(EnumKeySetting $key): self
    {
        $this->key = $key->value;
        return $this;
    }

}
