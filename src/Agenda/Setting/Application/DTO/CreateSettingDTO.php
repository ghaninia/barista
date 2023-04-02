<?php

namespace Src\Agenda\Setting\Application\DTO;

use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\User\Domain\Entities\User\User;

class CreateSettingDTO
{
    private string $key;
    private mixed $value;
    private User $updateBy;
    private User $createBy;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    /**
     * @return User
     */
    public function getCreateBy(): User
    {
        return $this->createBy;
    }

    /**
     * @param User $createBy
     * @return $this
     */
    public function setCreateBy(User $createBy): self
    {
        $this->createBy = $createBy;
        return $this;
    }

    /**
     * @return User
     */
    public function getUpdateBy(): User
    {
        return $this->updateBy;
    }

    /**
     * @param User $updateBy
     * @return $this
     */
    public function setUpdateBy(User $updateBy): self
    {
        $this->updateBy = $updateBy;
        return $this;
    }

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

    /**
     * @return mixed
     */
    public function getValue(): mixed
    {
        return $this->value;
    }

    /**
     * @param mixed $value
     * @return $this
     */
    public function setValue(mixed $value): self
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     * @return $this
     */
    public function setUpdatedAt(\DateTime $updatedAt): self
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     * @return $this
     */
    public function setCreatedAt(\DateTime $createdAt): self
    {
        $this->createdAt = $createdAt;
        return $this;
    }

}
